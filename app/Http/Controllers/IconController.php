<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IconController extends Controller
{
    /**
     * Get all available icons or search icons from Iconify API
     */
    public function search(Request $request): JsonResponse
    {
        $searchTerm = $request->get('q', '');
        $limit = (int) $request->get('limit', 200); // Limit to 200 icons
        $random = $request->get('random', false); // Get random icons
        
        // Handle random parameter (could be '1', 'true', true, etc.)
        $isRandom = filter_var($random, FILTER_VALIDATE_BOOLEAN) || $random === '1' || $random === 1;
        
        try {
            if ($isRandom || empty($searchTerm)) {
                // Get random icons from Font Awesome collections
                return $this->getRandomIcons($limit);
            }
            
            // Use Iconify API to search for Font Awesome icons
            $apiUrl = 'https://api.iconify.design/search';
            
            $params = [
                'query' => $searchTerm,
                'limit' => $limit,
            ];
            
            // Make request to Iconify API
            $response = Http::timeout(10)->get($apiUrl, $params);
            
            if ($response->successful()) {
                $data = $response->json();
                
                // Transform Iconify response to our format
                $icons = [];
                if (isset($data['icons']) && is_array($data['icons'])) {
                    foreach ($data['icons'] as $iconName) {
                        // Iconify returns icon names like "fa:user" or "fa6-solid:user"
                        $parts = explode(':', $iconName);
                        if (count($parts) === 2) {
                            $prefix = $parts[0];
                            $name = $parts[1];
                            
                            // Only include Font Awesome icons
                            if (strpos($prefix, 'fa') === 0) {
                                $class = $this->convertIconifyToFontAwesome($prefix, $name);
                                if ($class && preg_match('/^(fas|far|fal|fab)\s+fa-[a-z0-9-]+$/', $class)) {
                                    // Extract clean name for display
                                    $cleanName = preg_replace('/^(fa-|fa6-)/', '', $name);
                                    $cleanName = preg_replace('/[^a-z0-9-]/', '', strtolower($cleanName));
                                    $icons[] = [
                                        'class' => $class,
                                        'name' => $cleanName,
                                        'iconify' => $iconName
                                    ];
                                }
                            }
                        }
                    }
                }
                
                return response()->json([
                    'icons' => $icons,
                    'count' => count($icons),
                    'source' => 'iconify'
                ]);
            } else {
                // Fallback to basic icons if API fails
                return $this->getFallbackIcons($searchTerm);
            }
        } catch (\Exception $e) {
            Log::error('Icon API Error: ' . $e->getMessage());
            // Fallback to basic icons on error
            return $this->getFallbackIcons($searchTerm);
        }
    }
    
    /**
     * Get random icons from Font Awesome collections
     */
    private function getRandomIcons(int $limit = 200): JsonResponse
    {
        try {
            // Use Iconify search API with common terms to get a large pool of icons
            // Then shuffle and return random selection
            $commonTerms = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
            $commonWords = ['user', 'check', 'heart', 'star', 'home', 'phone', 'email', 'calendar', 'file', 'folder', 'image', 'video', 'music', 'settings', 'search', 'menu', 'arrow', 'close', 'edit', 'delete', 'save', 'download', 'upload', 'share', 'link', 'book', 'school', 'university', 'graduation', 'trophy', 'award', 'medal', 'flag', 'globe', 'map', 'car', 'plane', 'bus', 'train', 'building', 'hospital', 'store', 'shop', 'cart', 'bag', 'gift', 'cake', 'coffee', 'food', 'utensils'];
            $allIcons = [];
            
            // Combine terms and words for better coverage
            $searchTerms = array_merge($commonTerms, $commonWords);
            
            // Get icons from multiple search queries to build a large pool
            // Use more terms to get more icons
            $maxTerms = min(count($searchTerms), 20); // Use up to 20 terms
            foreach (array_slice($searchTerms, 0, $maxTerms) as $term) {
                try {
                    $apiUrl = 'https://api.iconify.design/search';
                    $params = [
                        'query' => 'fa ' . $term, // Search in Font Awesome
                        'limit' => 100, // Get more per query
                    ];
                    
                    $response = Http::timeout(8)->get($apiUrl, $params);
                    
                    if ($response->successful()) {
                        $data = $response->json();
                        if (isset($data['icons']) && is_array($data['icons'])) {
                            foreach ($data['icons'] as $iconName) {
                                $parts = explode(':', $iconName);
                                if (count($parts) === 2) {
                                    $prefix = $parts[0];
                                    $name = $parts[1];
                                    
                                    if (strpos($prefix, 'fa') === 0) {
                                        $class = $this->convertIconifyToFontAwesome($prefix, $name);
                                        if ($class && preg_match('/^(fas|far|fal|fab)\s+fa-[a-z0-9-]+$/', $class)) {
                                            $cleanName = preg_replace('/^(fa-|fa6-)/', '', $name);
                                            $cleanName = preg_replace('/[^a-z0-9-]/', '', strtolower($cleanName));
                                            // Avoid duplicates using array key for faster lookup
                                            $iconKey = md5($class);
                                            if (!isset($allIcons[$iconKey])) {
                                                $allIcons[$iconKey] = [
                                                    'class' => $class,
                                                    'name' => $cleanName,
                                                    'iconify' => $iconName
                                                ];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    // If we have enough icons, break early
                    if (count($allIcons) >= $limit * 2) {
                        break;
                    }
                } catch (\Exception $e) {
                    // Continue with next term
                    continue;
                }
            }
            
            // Convert associative array back to indexed array
            $allIcons = array_values($allIcons);
            
            // Shuffle and get random icons
            if (count($allIcons) > 0) {
                shuffle($allIcons);
                $randomIcons = array_slice($allIcons, 0, $limit);
                
                return response()->json([
                    'icons' => $randomIcons,
                    'count' => count($randomIcons),
                    'source' => 'iconify-random'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Random Icons API Error: ' . $e->getMessage());
        }
        
        // Fallback: shuffle fallback icons and return
        $fallbackData = $this->getFallbackIcons('');
        $fallbackIcons = json_decode($fallbackData->getContent(), true);
        if (isset($fallbackIcons['icons']) && is_array($fallbackIcons['icons'])) {
            shuffle($fallbackIcons['icons']);
            $randomFallback = array_slice($fallbackIcons['icons'], 0, $limit);
            
            return response()->json([
                'icons' => $randomFallback,
                'count' => count($randomFallback),
                'source' => 'fallback-random'
            ]);
        }
        
        // Final fallback
        return $this->getFallbackIcons('');
    }
    
    /**
     * Fallback method with basic essential icons
     */
    private function getFallbackIcons(string $searchTerm = ''): JsonResponse
    {
        $allIcons = [
            // Common & Basic
            ['class' => 'fas fa-check', 'name' => 'check'],
            ['class' => 'fas fa-check-circle', 'name' => 'check-circle'],
            ['class' => 'fas fa-times', 'name' => 'times'],
            ['class' => 'fas fa-times-circle', 'name' => 'times-circle'],
            ['class' => 'fas fa-plus', 'name' => 'plus'],
            ['class' => 'fas fa-minus', 'name' => 'minus'],
            ['class' => 'fas fa-edit', 'name' => 'edit'],
            ['class' => 'fas fa-trash', 'name' => 'trash'],
            ['class' => 'fas fa-save', 'name' => 'save'],
            ['class' => 'fas fa-download', 'name' => 'download'],
            ['class' => 'fas fa-upload', 'name' => 'upload'],
            ['class' => 'fas fa-search', 'name' => 'search'],
            ['class' => 'fas fa-filter', 'name' => 'filter'],
            ['class' => 'fas fa-sync', 'name' => 'sync'],
            ['class' => 'fas fa-redo', 'name' => 'redo'],
            ['class' => 'fas fa-undo', 'name' => 'undo'],
            
            // Users & People
            ['class' => 'fas fa-user', 'name' => 'user'],
            ['class' => 'fas fa-users', 'name' => 'users'],
            ['class' => 'fas fa-user-circle', 'name' => 'user-circle'],
            ['class' => 'fas fa-user-friends', 'name' => 'user-friends'],
            ['class' => 'fas fa-user-graduate', 'name' => 'user-graduate'],
            ['class' => 'fas fa-user-tie', 'name' => 'user-tie'],
            ['class' => 'fas fa-user-md', 'name' => 'user-md'],
            ['class' => 'fas fa-user-nurse', 'name' => 'user-nurse'],
            ['class' => 'fas fa-user-plus', 'name' => 'user-plus'],
            ['class' => 'fas fa-user-minus', 'name' => 'user-minus'],
            ['class' => 'fas fa-id-card', 'name' => 'id-card'],
            ['class' => 'fas fa-id-badge', 'name' => 'id-badge'],
            
            // Education
            ['class' => 'fas fa-graduation-cap', 'name' => 'graduation-cap'],
            ['class' => 'fas fa-book', 'name' => 'book'],
            ['class' => 'fas fa-book-open', 'name' => 'book-open'],
            ['class' => 'fas fa-university', 'name' => 'university'],
            ['class' => 'fas fa-school', 'name' => 'school'],
            ['class' => 'fas fa-chalkboard-teacher', 'name' => 'chalkboard-teacher'],
            ['class' => 'fas fa-certificate', 'name' => 'certificate'],
            ['class' => 'fas fa-award', 'name' => 'award'],
            ['class' => 'fas fa-medal', 'name' => 'medal'],
            ['class' => 'fas fa-trophy', 'name' => 'trophy'],
            ['class' => 'fas fa-pencil-alt', 'name' => 'pencil-alt'],
            ['class' => 'fas fa-pen', 'name' => 'pen'],
            
            // Communication
            ['class' => 'fas fa-envelope', 'name' => 'envelope'],
            ['class' => 'fas fa-envelope-open', 'name' => 'envelope-open'],
            ['class' => 'fas fa-phone', 'name' => 'phone'],
            ['class' => 'fas fa-phone-alt', 'name' => 'phone-alt'],
            ['class' => 'fas fa-comments', 'name' => 'comments'],
            ['class' => 'fas fa-comment', 'name' => 'comment'],
            ['class' => 'fas fa-comment-dots', 'name' => 'comment-dots'],
            ['class' => 'fas fa-bullhorn', 'name' => 'bullhorn'],
            ['class' => 'fas fa-paper-plane', 'name' => 'paper-plane'],
            ['class' => 'fas fa-inbox', 'name' => 'inbox'],
            
            // Navigation & Arrows
            ['class' => 'fas fa-arrow-right', 'name' => 'arrow-right'],
            ['class' => 'fas fa-arrow-left', 'name' => 'arrow-left'],
            ['class' => 'fas fa-arrow-up', 'name' => 'arrow-up'],
            ['class' => 'fas fa-arrow-down', 'name' => 'arrow-down'],
            ['class' => 'fas fa-chevron-right', 'name' => 'chevron-right'],
            ['class' => 'fas fa-chevron-left', 'name' => 'chevron-left'],
            ['class' => 'fas fa-chevron-up', 'name' => 'chevron-up'],
            ['class' => 'fas fa-chevron-down', 'name' => 'chevron-down'],
            ['class' => 'fas fa-angle-right', 'name' => 'angle-right'],
            ['class' => 'fas fa-angle-left', 'name' => 'angle-left'],
            ['class' => 'fas fa-angle-up', 'name' => 'angle-up'],
            ['class' => 'fas fa-angle-down', 'name' => 'angle-down'],
            ['class' => 'fas fa-long-arrow-alt-right', 'name' => 'long-arrow-alt-right'],
            ['class' => 'fas fa-long-arrow-alt-left', 'name' => 'long-arrow-alt-left'],
            
            // Location
            ['class' => 'fas fa-map-marker-alt', 'name' => 'map-marker-alt'],
            ['class' => 'fas fa-map', 'name' => 'map'],
            ['class' => 'fas fa-globe', 'name' => 'globe'],
            ['class' => 'fas fa-globe-americas', 'name' => 'globe-americas'],
            ['class' => 'fas fa-home', 'name' => 'home'],
            ['class' => 'fas fa-building', 'name' => 'building'],
            ['class' => 'fas fa-hospital', 'name' => 'hospital'],
            ['class' => 'fas fa-landmark', 'name' => 'landmark'],
            ['class' => 'fas fa-map-pin', 'name' => 'map-pin'],
            ['class' => 'fas fa-location-arrow', 'name' => 'location-arrow'],
            
            // Time & Calendar
            ['class' => 'fas fa-calendar', 'name' => 'calendar'],
            ['class' => 'fas fa-calendar-alt', 'name' => 'calendar-alt'],
            ['class' => 'fas fa-calendar-check', 'name' => 'calendar-check'],
            ['class' => 'fas fa-clock', 'name' => 'clock'],
            ['class' => 'fas fa-calendar-day', 'name' => 'calendar-day'],
            ['class' => 'fas fa-calendar-week', 'name' => 'calendar-week'],
            ['class' => 'fas fa-calendar-month', 'name' => 'calendar-month'],
            ['class' => 'fas fa-hourglass', 'name' => 'hourglass'],
            ['class' => 'fas fa-stopwatch', 'name' => 'stopwatch'],
            
            // Media & Files
            ['class' => 'fas fa-image', 'name' => 'image'],
            ['class' => 'fas fa-images', 'name' => 'images'],
            ['class' => 'fas fa-video', 'name' => 'video'],
            ['class' => 'fas fa-file', 'name' => 'file'],
            ['class' => 'fas fa-file-alt', 'name' => 'file-alt'],
            ['class' => 'fas fa-file-pdf', 'name' => 'file-pdf'],
            ['class' => 'fas fa-file-word', 'name' => 'file-word'],
            ['class' => 'fas fa-folder', 'name' => 'folder'],
            ['class' => 'fas fa-folder-open', 'name' => 'folder-open'],
            ['class' => 'fas fa-camera', 'name' => 'camera'],
            ['class' => 'fas fa-photo-video', 'name' => 'photo-video'],
            
            // Social & Actions
            ['class' => 'fas fa-heart', 'name' => 'heart'],
            ['class' => 'fas fa-star', 'name' => 'star'],
            ['class' => 'fas fa-thumbs-up', 'name' => 'thumbs-up'],
            ['class' => 'fas fa-thumbs-down', 'name' => 'thumbs-down'],
            ['class' => 'fas fa-share', 'name' => 'share'],
            ['class' => 'fas fa-share-alt', 'name' => 'share-alt'],
            ['class' => 'fas fa-link', 'name' => 'link'],
            ['class' => 'fas fa-external-link-alt', 'name' => 'external-link-alt'],
            ['class' => 'fas fa-like', 'name' => 'like'],
            ['class' => 'fas fa-comment-alt', 'name' => 'comment-alt'],
            
            // Business & Finance
            ['class' => 'fas fa-handshake', 'name' => 'handshake'],
            ['class' => 'fas fa-briefcase', 'name' => 'briefcase'],
            ['class' => 'fas fa-dollar-sign', 'name' => 'dollar-sign'],
            ['class' => 'fas fa-credit-card', 'name' => 'credit-card'],
            ['class' => 'fas fa-chart-line', 'name' => 'chart-line'],
            ['class' => 'fas fa-chart-bar', 'name' => 'chart-bar'],
            ['class' => 'fas fa-shopping-cart', 'name' => 'shopping-cart'],
            ['class' => 'fas fa-store', 'name' => 'store'],
            ['class' => 'fas fa-coins', 'name' => 'coins'],
            ['class' => 'fas fa-wallet', 'name' => 'wallet'],
            
            // Technology
            ['class' => 'fas fa-laptop', 'name' => 'laptop'],
            ['class' => 'fas fa-desktop', 'name' => 'desktop'],
            ['class' => 'fas fa-mobile-alt', 'name' => 'mobile-alt'],
            ['class' => 'fas fa-tablet-alt', 'name' => 'tablet-alt'],
            ['class' => 'fas fa-wifi', 'name' => 'wifi'],
            ['class' => 'fas fa-database', 'name' => 'database'],
            ['class' => 'fas fa-server', 'name' => 'server'],
            ['class' => 'fas fa-cloud', 'name' => 'cloud'],
            ['class' => 'fas fa-code', 'name' => 'code'],
            ['class' => 'fas fa-microchip', 'name' => 'microchip'],
            
            // Health & Medical
            ['class' => 'fas fa-heartbeat', 'name' => 'heartbeat'],
            ['class' => 'fas fa-ambulance', 'name' => 'ambulance'],
            ['class' => 'fas fa-pills', 'name' => 'pills'],
            ['class' => 'fas fa-stethoscope', 'name' => 'stethoscope'],
            ['class' => 'fas fa-hospital-alt', 'name' => 'hospital-alt'],
            ['class' => 'fas fa-clinic-medical', 'name' => 'clinic-medical'],
            ['class' => 'fas fa-procedures', 'name' => 'procedures'],
            ['class' => 'fas fa-first-aid', 'name' => 'first-aid'],
            ['class' => 'fas fa-notes-medical', 'name' => 'notes-medical'],
            
            // Sports & Activities
            ['class' => 'fas fa-running', 'name' => 'running'],
            ['class' => 'fas fa-swimming-pool', 'name' => 'swimming-pool'],
            ['class' => 'fas fa-futbol', 'name' => 'futbol'],
            ['class' => 'fas fa-basketball-ball', 'name' => 'basketball-ball'],
            ['class' => 'fas fa-volleyball-ball', 'name' => 'volleyball-ball'],
            ['class' => 'fas fa-dumbbell', 'name' => 'dumbbell'],
            
            // Food & Dining
            ['class' => 'fas fa-utensils', 'name' => 'utensils'],
            ['class' => 'fas fa-coffee', 'name' => 'coffee'],
            ['class' => 'fas fa-wine-glass', 'name' => 'wine-glass'],
            ['class' => 'fas fa-birthday-cake', 'name' => 'birthday-cake'],
            ['class' => 'fas fa-pizza-slice', 'name' => 'pizza-slice'],
            
            // Transportation
            ['class' => 'fas fa-car', 'name' => 'car'],
            ['class' => 'fas fa-bus', 'name' => 'bus'],
            ['class' => 'fas fa-train', 'name' => 'train'],
            ['class' => 'fas fa-plane', 'name' => 'plane'],
            ['class' => 'fas fa-ship', 'name' => 'ship'],
            ['class' => 'fas fa-bicycle', 'name' => 'bicycle'],
            ['class' => 'fas fa-motorcycle', 'name' => 'motorcycle'],
            
            // Weather & Nature
            ['class' => 'fas fa-sun', 'name' => 'sun'],
            ['class' => 'fas fa-moon', 'name' => 'moon'],
            ['class' => 'fas fa-cloud-rain', 'name' => 'cloud-rain'],
            ['class' => 'fas fa-tree', 'name' => 'tree'],
            ['class' => 'fas fa-leaf', 'name' => 'leaf'],
            ['class' => 'fas fa-seedling', 'name' => 'seedling'],
            ['class' => 'fas fa-flower', 'name' => 'flower'],
            
            // Tools & Settings
            ['class' => 'fas fa-cog', 'name' => 'cog'],
            ['class' => 'fas fa-cogs', 'name' => 'cogs'],
            ['class' => 'fas fa-wrench', 'name' => 'wrench'],
            ['class' => 'fas fa-tools', 'name' => 'tools'],
            ['class' => 'fas fa-key', 'name' => 'key'],
            ['class' => 'fas fa-lock', 'name' => 'lock'],
            ['class' => 'fas fa-unlock', 'name' => 'unlock'],
            ['class' => 'fas fa-shield-alt', 'name' => 'shield-alt'],
            ['class' => 'fas fa-screwdriver', 'name' => 'screwdriver'],
            
            // Notifications & Alerts
            ['class' => 'fas fa-bell', 'name' => 'bell'],
            ['class' => 'fas fa-bell-slash', 'name' => 'bell-slash'],
            ['class' => 'fas fa-exclamation', 'name' => 'exclamation'],
            ['class' => 'fas fa-exclamation-circle', 'name' => 'exclamation-circle'],
            ['class' => 'fas fa-info', 'name' => 'info'],
            ['class' => 'fas fa-info-circle', 'name' => 'info-circle'],
            ['class' => 'fas fa-question', 'name' => 'question'],
            ['class' => 'fas fa-question-circle', 'name' => 'question-circle'],
            ['class' => 'fas fa-exclamation-triangle', 'name' => 'exclamation-triangle'],
            
            // Music & Entertainment
            ['class' => 'fas fa-music', 'name' => 'music'],
            ['class' => 'fas fa-play', 'name' => 'play'],
            ['class' => 'fas fa-pause', 'name' => 'pause'],
            ['class' => 'fas fa-stop', 'name' => 'stop'],
            ['class' => 'fas fa-film', 'name' => 'film'],
            ['class' => 'fas fa-tv', 'name' => 'tv'],
            ['class' => 'fas fa-gamepad', 'name' => 'gamepad'],
            ['class' => 'fas fa-headphones', 'name' => 'headphones'],
            
            // Shopping & E-commerce
            ['class' => 'fas fa-shopping-bag', 'name' => 'shopping-bag'],
            ['class' => 'fas fa-shopping-basket', 'name' => 'shopping-basket'],
            ['class' => 'fas fa-tags', 'name' => 'tags'],
            ['class' => 'fas fa-tag', 'name' => 'tag'],
            ['class' => 'fas fa-gift', 'name' => 'gift'],
            ['class' => 'fas fa-box', 'name' => 'box'],
            ['class' => 'fas fa-boxes', 'name' => 'boxes'],
            
            // Security & Privacy
            ['class' => 'fas fa-user-shield', 'name' => 'user-shield'],
            ['class' => 'fas fa-fingerprint', 'name' => 'fingerprint'],
            ['class' => 'fas fa-eye', 'name' => 'eye'],
            ['class' => 'fas fa-eye-slash', 'name' => 'eye-slash'],
            ['class' => 'fas fa-lock-open', 'name' => 'lock-open'],
            
            // Miscellaneous
            ['class' => 'fas fa-flag', 'name' => 'flag'],
            ['class' => 'fas fa-fire', 'name' => 'fire'],
            ['class' => 'fas fa-lightbulb', 'name' => 'lightbulb'],
            ['class' => 'fas fa-gem', 'name' => 'gem'],
            ['class' => 'fas fa-palette', 'name' => 'palette'],
            ['class' => 'fas fa-paint-brush', 'name' => 'paint-brush'],
            ['class' => 'fas fa-magic', 'name' => 'magic'],
            ['class' => 'fas fa-sparkles', 'name' => 'sparkles'],
            ['class' => 'fas fa-bolt', 'name' => 'bolt'],
            ['class' => 'fas fa-rocket', 'name' => 'rocket'],
            
            // Regular style (far)
            ['class' => 'far fa-check', 'name' => 'check'],
            ['class' => 'far fa-check-circle', 'name' => 'check-circle'],
            ['class' => 'far fa-user', 'name' => 'user'],
            ['class' => 'far fa-users', 'name' => 'users'],
            ['class' => 'far fa-heart', 'name' => 'heart'],
            ['class' => 'far fa-star', 'name' => 'star'],
            ['class' => 'far fa-envelope', 'name' => 'envelope'],
            ['class' => 'far fa-calendar', 'name' => 'calendar'],
            ['class' => 'far fa-clock', 'name' => 'clock'],
            ['class' => 'far fa-file', 'name' => 'file'],
            ['class' => 'far fa-folder', 'name' => 'folder'],
            ['class' => 'far fa-image', 'name' => 'image'],
            ['class' => 'far fa-bell', 'name' => 'bell'],
            ['class' => 'far fa-flag', 'name' => 'flag'],
            
            // Light style (fal) - if available
            ['class' => 'fal fa-check', 'name' => 'check'],
            ['class' => 'fal fa-check-circle', 'name' => 'check-circle'],
            ['class' => 'fal fa-user', 'name' => 'user'],
            ['class' => 'fal fa-users', 'name' => 'users'],
            ['class' => 'fal fa-heart', 'name' => 'heart'],
            ['class' => 'fal fa-star', 'name' => 'star'],
            ['class' => 'fal fa-envelope', 'name' => 'envelope'],
            ['class' => 'fal fa-calendar', 'name' => 'calendar'],
            ['class' => 'fal fa-graduation-cap', 'name' => 'graduation-cap'],
            ['class' => 'fal fa-book', 'name' => 'book'],
        ];
        
        // Filter icons based on search term
        if (!empty($searchTerm)) {
            $searchTerm = strtolower($searchTerm);
            $allIcons = array_filter($allIcons, function($icon) use ($searchTerm) {
                return strpos(strtolower($icon['name']), $searchTerm) !== false || 
                       strpos(strtolower($icon['class']), $searchTerm) !== false;
            });
        }
        
        return response()->json([
            'icons' => array_values($allIcons),
            'count' => count($allIcons),
            'source' => 'fallback'
        ]);
    }
    
    /**
     * Convert Iconify icon name to Font Awesome class format
     */
    private function convertIconifyToFontAwesome(string $prefix, string $iconName): ?string
    {
        // Clean icon name - remove any existing prefixes
        $name = $iconName;
        
        // Remove fa- or fa6- prefix if present
        $name = preg_replace('/^(fa-|fa6-)/', '', $name);
        
        // Validate name - must be alphanumeric with hyphens/underscores
        $name = preg_replace('/[^a-z0-9-]/', '', strtolower($name));
        
        // Skip if name is empty or too short
        if (empty($name) || strlen($name) < 2) {
            return null;
        }
        
        // Filter out old Font Awesome 4 style icons that don't exist in FA5/FA6
        // These end with -o, -circle-o, -square-o, etc.
        $invalidSuffixes = ['-o', '-circle-o', '-square-o', '-outline'];
        foreach ($invalidSuffixes as $suffix) {
            if (substr($name, -strlen($suffix)) === $suffix) {
                // Try to convert to FA5/FA6 equivalent by removing the suffix
                $name = substr($name, 0, -strlen($suffix));
                // If name becomes too short after removal, skip it
                if (strlen($name) < 2) {
                    return null;
                }
            }
        }
        
        // Map Iconify prefixes to Font Awesome classes
        $faClass = null;
        switch ($prefix) {
            case 'fa':
            case 'fa6-solid':
            case 'fa-solid':
            case 'fa-solid-900':
                $faClass = 'fas fa-' . $name;
                break;
            case 'fa6-regular':
            case 'fa-regular':
            case 'fa-regular-400':
                $faClass = 'far fa-' . $name;
                break;
            case 'fa6-brands':
            case 'fa-brands':
            case 'fa-brands-400':
                $faClass = 'fab fa-' . $name;
                break;
            case 'fa6-light':
            case 'fa-light':
            case 'fa-light-300':
                $faClass = 'fal fa-' . $name;
                break;
            default:
                // Default to solid style for any fa prefix
                if (strpos($prefix, 'fa') === 0) {
                    $faClass = 'fas fa-' . $name;
                }
                break;
        }
        
        // Final validation - ensure format is correct
        if ($faClass && preg_match('/^(fas|far|fal|fab)\s+fa-[a-z0-9-]+$/', $faClass)) {
            return $faClass;
        }
        
        return null;
    }
}
