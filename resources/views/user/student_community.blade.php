@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('website_assets/css/fontAwesome5Pro.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Icon Picker Container */
        .icon-picker-container {
            background: #ffffff;
            border: 2px solid #e5e9f2;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        /* Icon Grid Layout - Fixed Grid */
        .icon-grid {
            display: grid !important;
            grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
            gap: 10px;
            margin: 0 !important;
        }
        
        /* Icon Item */
        .icon-item {
            width: 100%;
            padding: 0 !important;
            margin: 0 !important;
        }
        
        /* Icon Button */
        .icon-option-btn {
            width: 100%;
            height: 60px;
            border: 2px solid #e5e9f2 !important;
            background: #ffffff !important;
            border-radius: 8px;
            display: flex !important;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0 !important;
            margin: 0;
            position: relative;
            overflow: hidden;
        }
        
        .icon-option-btn:hover {
            border-color: #227353 !important;
            background: #f0f9f4 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34, 115, 83, 0.15);
        }
        
        .icon-option-btn.selected {
            border-color: #227353 !important;
            background: #e8f5e9 !important;
            box-shadow: 0 0 0 3px rgba(34, 115, 83, 0.1);
        }
        
        /* Icon Styling */
        .icon-picker-container i {
            display: inline-block !important;
            font-family: "Font Awesome 5 Pro", "Font Awesome 6 Free", "Font Awesome 6 Pro", "FontAwesome" !important;
            font-style: normal !important;
            font-weight: 900 !important;
            font-variant: normal !important;
            text-rendering: auto !important;
            line-height: 1 !important;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
            font-size: 20px !important;
            color: #164734 !important;
        }
        
        .icon-option-btn i {
            width: auto !important;
            height: auto !important;
        }
        
        /* Ensure Font Awesome icons load properly */
        .icon-picker-container [class^="fa"],
        .icon-picker-container [class*=" fa"] {
            font-family: "Font Awesome 5 Pro", "Font Awesome 6 Free", "Font Awesome 6 Pro", "FontAwesome" !important;
        }
        
        /* Loading state */
        #icon-loading {
            padding: 40px 20px;
        }
        
        #icon-loading i.fa-spinner {
            animation: fa-spin 2s infinite linear;
            font-size: 32px;
            color: #227353;
        }
        
        @keyframes fa-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* No icons found */
        #no-icons-found {
            padding: 40px 20px;
        }
        
        #no-icons-found i {
            font-size: 48px;
            opacity: 0.3;
            margin-bottom: 15px;
        }
        
        /* Search Input Group */
        .input-group {
            display: flex;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .input-group .form-control {
            border: 2px solid #e5e9f2;
            border-right: none;
        }
        
        .input-group .form-control:focus {
            border-color: #227353;
            box-shadow: 0 0 0 3px rgba(34, 115, 83, 0.1);
        }
        
        .input-group .btn {
            border: 2px solid;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .input-group .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        #icon-search-btn {
            border-color: #227353 !important;
        }
        
        #icon-search-btn:hover {
            background: #164734 !important;
            border-color: #164734 !important;
        }
        
        #icon-clear-btn {
            border-color: #6d6e75 !important;
        }
        
        #icon-clear-btn:hover {
            background: #4a4b52 !important;
            border-color: #4a4b52 !important;
        }
        
        /* Scrollbar styling */
        .icon-picker-container::-webkit-scrollbar {
            width: 8px;
        }
        
        .icon-picker-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        
        .icon-picker-container::-webkit-scrollbar-thumb {
            background: #227353;
            border-radius: 4px;
        }
        
        .icon-picker-container::-webkit-scrollbar-thumb:hover {
            background: #164734;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .icon-grid {
                grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
                gap: 8px;
            }
            
            .icon-option-btn {
                height: 50px;
            }
            
            .icon-picker-container i {
                font-size: 18px !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title text-uppercase">Manage Student Communities</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-5">
                <div class="nk-block">
                    <form class="container needs-validation" novalidate
                          action="{{ route('user.student.community.store') }}"
                          enctype="multipart/form-data" method="POST">
                        @if(session('status_message') && session('status_type'))
                            <div class="alert alert-pro alert-{{ session('status_type') }}">
                                <div class="alert-text"><h6>Setting Successfully updated</h6>
                                    <p>{{ session('status_message') }}</p>
                                </div>
                            </div>
                        @endif
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <div class="form-control-wrap">
                                        <input type="text" name="title" value="{{ $community->title }}"
                                               class="form-control form-control-lg form-control-outlined @error('title') is-invalid @enderror"
                                               required id="title">
                                        <label class="form-label-outlined" for="title">
                                            <strong class="text-uppercase">Names</strong>
                                        </label>
                                    </div>
                                </div>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-control-wrap">
                                    <input type="file" name="img"
                                           class="form-control form-control-lg form-control-outlined @error('img') is-invalid @enderror"
                                           id="img" accept="image/*">
                                    <label class="form-label-outlined" for="img">
                                        <strong class="text-uppercase">Image</strong>
                                    </label>
                                </div>
                                @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap">
                                <textarea
                                    class="form-control form-control-lg form-control-outlined @error('content') is-invalid @enderror"
                                    name="content" id="desc" cols="20"
                                    rows="10">{{ $community->content }}</textarea>
                                    <label class="form-label-outlined" for="desc">
                                        <strong class="text-uppercase">Description (Optional)</strong>
                                    </label>
                                </div>
                                @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <hr>
                                <h5 class="mb-3">Icon & Button Settings</h5>
                            </div>
                            
                            <div class="col-12 mb-4">
                                <label for="icon"><strong class="text-uppercase">Icon Class (Optional)</strong></label>
                                <input type="text" name="icon" value="{{ $community->icon ?? old('icon') }}"
                                       class="form-control form-control-lg @error('icon') is-invalid @enderror"
                                       id="icon" placeholder="e.g., fas fa-check">
                                <small class="form-text text-muted mb-3 d-block">Font Awesome icon class. Search and click an icon below to select, or type manually.</small>
                                
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="text" id="icon-search" class="form-control" placeholder="Search icons (e.g., user, check, heart, star...)" style="border: 1px solid #e5e9f2; border-radius: 4px 0 0 4px; padding: 8px 12px;">
                                        <button type="button" id="icon-search-btn" class="btn" style="background: #227353; color: white; border: 1px solid #227353; border-radius: 0; padding: 8px 20px;">
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                        <button type="button" id="icon-clear-btn" class="btn" style="background: #6d6e75; color: white; border: 1px solid #6d6e75; border-radius: 0 4px 4px 0; padding: 8px 20px;">
                                            <i class="fas fa-times"></i> Clear
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">Click "Search" to find icons or "Clear" to show random icons</small>
                                </div>
                                
                                <div class="icon-picker-container" style="max-height: 500px; overflow-y: auto; min-height: 300px;">
                                    <div id="icon-loading" class="text-center">
                                        <i class="fas fa-spinner fa-spin"></i>
                                        <p style="margin-top: 15px; color: #6d6e75; font-weight: 500;">Loading icons...</p>
                                    </div>
                                    <div class="icon-grid" id="icon-grid" style="display: none;">
                                        <!-- Icons will be loaded here dynamically -->
                                    </div>
                                    <div id="no-icons-found" class="text-center" style="display: none;">
                                        <i class="fas fa-search"></i>
                                        <p style="margin-top: 15px; color: #6d6e75; font-weight: 500;">No icons found matching your search.</p>
                                        <button type="button" class="btn mt-3" onclick="document.getElementById('icon-clear-btn')?.click();" style="background: #227353; color: white; border: none; padding: 8px 20px; border-radius: 6px;">
                                            Show Random Icons
                                        </button>
                                    </div>
                                </div>
                                
                                @error('icon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-control-wrap">
                                    <input type="text" name="button_text" value="{{ $community->button_text ?? old('button_text') }}"
                                           class="form-control form-control-lg form-control-outlined @error('button_text') is-invalid @enderror"
                                           id="button_text" placeholder="e.g., Visit SUG">
                                    <label class="form-label-outlined" for="button_text">
                                        <strong class="text-uppercase">Button Text (Optional)</strong>
                                    </label>
                                </div>
                                @error('button_text')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-control-wrap">
                                    <input type="text" name="button_link" value="{{ $community->button_link ?? old('button_link') }}"
                                           class="form-control form-control-lg form-control-outlined @error('button_link') is-invalid @enderror"
                                           id="button_link" placeholder="e.g., /sug or https://example.com">
                                    <label class="form-label-outlined" for="button_link">
                                        <strong class="text-uppercase">Button Link (Optional)</strong>
                                    </label>
                                    <small class="form-text text-muted">URL or route path</small>
                                </div>
                                @error('button_link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary btn-lg" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                const forms = document.querySelectorAll('.needs-validation');
                forms.forEach(form => {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Icon picker functionality with API
        document.addEventListener('DOMContentLoaded', function() {
            const iconInput = document.getElementById('icon');
            const iconSearch = document.getElementById('icon-search');
            const iconSearchBtn = document.getElementById('icon-search-btn');
            const iconClearBtn = document.getElementById('icon-clear-btn');
            const iconGrid = document.getElementById('icon-grid');
            const iconLoading = document.getElementById('icon-loading');
            const noIconsFound = document.getElementById('no-icons-found');
            let currentSelectedButton = null;
            
            // Function to load icons from API
            function loadIcons(searchTerm = '', random = false) {
                // Show loading state
                iconLoading.style.display = 'block';
                iconGrid.style.display = 'none';
                noIconsFound.style.display = 'none';
                
                // Build API URL
                let apiUrl = '{{ route("api.icons.search") }}';
                const params = new URLSearchParams();
                if (random || (!searchTerm && !random)) {
                    params.append('random', '1');
                } else if (searchTerm) {
                    params.append('q', searchTerm);
                }
                params.append('limit', '200');
                apiUrl += '?' + params.toString();
                
                // Fetch icons from API
                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        iconLoading.style.display = 'none';
                        
                        // Debug log
                        console.log('Icons loaded:', data.count || 0, 'icons from', data.source || 'unknown');
                        
                        if (data.icons && data.icons.length > 0) {
                            iconGrid.style.display = 'grid'; // Use grid display
                            noIconsFound.style.display = 'none';
                            
                            // Clear existing icons
                            iconGrid.innerHTML = '';
                            
                            // List of known problematic icon suffixes that don't work in FA5/FA6
                            const invalidSuffixes = ['-o', '-circle-o', '-square-o']; // Old FA4 style icons
                            
                            // Render icons - filter out invalid ones
                            data.icons.forEach(icon => {
                                if (!icon || !icon.class) return; // Skip invalid icons
                                
                                // Clean and validate icon class
                                let iconClass = icon.class.trim();
                                
                                // Validate icon class format
                                if (!iconClass || iconClass.length < 5) return; // Skip if too short
                                
                                // Ensure proper Font Awesome format: fas/far/fal/fab fa-iconname
                                const faPrefixes = ['fas', 'far', 'fal', 'fab'];
                                const hasPrefix = faPrefixes.some(prefix => iconClass.startsWith(prefix + ' '));
                                
                                if (!hasPrefix) {
                                    // No prefix found, try to extract icon name
                                    const iconName = icon.name || iconClass.replace(/^(fa-|fa6-)/, '');
                                    if (iconName && iconName.length > 0) {
                                        iconClass = 'fas fa-' + iconName;
                                    } else {
                                        return; // Skip if we can't determine icon name
                                    }
                                } else {
                                    // Has prefix, ensure it has fa- in the name part
                                    if (!iconClass.includes(' fa-') && !iconClass.includes(' fa6-')) {
                                        // Missing fa- in the name part, try to fix
                                        const parts = iconClass.split(' ');
                                        if (parts.length >= 2) {
                                            const prefix = parts[0];
                                            const name = parts.slice(1).join(' ').replace(/^(fa-|fa6-)/, '');
                                            if (name) {
                                                iconClass = prefix + ' fa-' + name;
                                            } else {
                                                return; // Skip if we can't fix it
                                            }
                                        }
                                    }
                                }
                                
                                // Final validation - must have format like "fas fa-iconname"
                                if (!/^(fas|far|fal|fab)\s+fa-[a-z0-9-]+$/i.test(iconClass)) {
                                    return; // Skip invalid format
                                }
                                
                                // Check for invalid suffixes (old FA4 icons that don't exist in FA5/FA6)
                                const iconNamePart = iconClass.split(' fa-')[1];
                                if (iconNamePart && invalidSuffixes.some(suffix => iconNamePart.endsWith(suffix))) {
                                    return; // Skip old FA4 style icons
                                }
                                
                                // Only proceed if we have a valid icon class
                                const iconItem = document.createElement('div');
                                iconItem.className = 'icon-item';
                                iconItem.setAttribute('data-icon-name', icon.name || '');
                                iconItem.setAttribute('data-icon-class', iconClass);
                                
                                const isSelected = iconInput && iconInput.value === iconClass;
                                
                                iconItem.innerHTML = `
                                    <button type="button" class="icon-option-btn ${isSelected ? 'selected' : ''}" 
                                            data-icon="${iconClass.replace(/"/g, '&quot;')}" 
                                            title="${iconClass.replace(/"/g, '&quot;')}">
                                        <i class="${iconClass.replace(/"/g, '&quot;')}"></i>
                                    </button>
                                `;
                                
                                iconGrid.appendChild(iconItem);
                                
                                // Add click handler - wait for next tick to ensure DOM is ready
                                requestAnimationFrame(() => {
                                    const btn = iconItem.querySelector('.icon-option-btn');
                                    if (!btn) return;
                                    
                                    // Note: Invalid icons will be filtered out by validation above
                                    
                                    btn.addEventListener('click', function() {
                                        const selectedIcon = this.getAttribute('data-icon');
                                        if (iconInput) {
                                            iconInput.value = selectedIcon;
                                        }
                                        
                                        // Update visual feedback - remove selected class from all
                                        document.querySelectorAll('.icon-option-btn').forEach(b => {
                                            b.classList.remove('selected');
                                        });
                                        
                                        // Add selected class to clicked button
                                        this.classList.add('selected');
                                        currentSelectedButton = this;
                                    });
                                    
                                    // Hover effects are handled by CSS
                                    
                                    if (isSelected) {
                                        currentSelectedButton = btn;
                                    }
                                });
                            });
                        } else {
                            iconGrid.style.display = 'none';
                            noIconsFound.style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('Error loading icons:', error);
                        iconLoading.style.display = 'none';
                        iconGrid.style.display = 'none';
                        noIconsFound.style.display = 'block';
                        noIconsFound.innerHTML = `
                            <i class="fas fa-exclamation-triangle" style="font-size: 32px; margin-bottom: 10px; opacity: 0.5;"></i>
                            <p>Error loading icons. Please try again.</p>
                        `;
                    });
            }
            
            // Initial load - random icons (200 icons)
            loadIcons('', true);
            
            // Debug: Log when icons are loaded
            console.log('Icon picker initialized, loading random icons...');
            
            // Search button click handler
            if (iconSearchBtn) {
                iconSearchBtn.addEventListener('click', function() {
                    const searchTerm = iconSearch ? iconSearch.value.trim() : '';
                    if (searchTerm) {
                        loadIcons(searchTerm, false);
                    } else {
                        // If no search term, show random icons
                        loadIcons('', true);
                    }
                });
            }
            
            // Clear button click handler
            if (iconClearBtn) {
                iconClearBtn.addEventListener('click', function() {
                    if (iconSearch) {
                        iconSearch.value = '';
                    }
                    // Load random icons
                    loadIcons('', true);
                });
            }
            
            // Allow Enter key to trigger search
            if (iconSearch) {
                iconSearch.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        if (iconSearchBtn) {
                            iconSearchBtn.click();
                        }
                    }
                });
            }
        });

        const visibility_btn = document.querySelector('.seen');
        const password_input = document.querySelector('#mail_password');

        if (visibility_btn && password_input) {
            visibility_btn.addEventListener('click', () => {
                if (password_input.type === 'password') {
                    password_input.type = 'text';
                } else {
                    password_input.type = 'password';
                }
            });
        }
    </script>
    
    <style>
        .icon-picker-container::-webkit-scrollbar {
            width: 8px;
        }
        .icon-picker-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        .icon-picker-container::-webkit-scrollbar-thumb {
            background: #227353;
            border-radius: 4px;
        }
        .icon-picker-container::-webkit-scrollbar-thumb:hover {
            background: #164734;
        }
    </style>
@endsection
