#!/bin/bash

# Script to set PHP upload limits for Laravel application
# This script helps configure PHP for file uploads

echo "=== PHP Upload Limits Configuration ==="
echo ""

# Check current PHP version and config
PHP_VERSION=$(php -v | head -n 1 | cut -d " " -f 2 | cut -d "." -f 1,2)
PHP_INI_PATH=$(php --ini | grep "Loaded Configuration File" | awk '{print $4}')

echo "PHP Version: $PHP_VERSION"
echo "PHP Config File: ${PHP_INI_PATH:-'Not found (using defaults)'}"
echo ""

# Check current limits
echo "Current Limits:"
php -r "echo 'upload_max_filesize: ' . ini_get('upload_max_filesize') . PHP_EOL;"
php -r "echo 'post_max_size: ' . ini_get('post_max_size') . PHP_EOL;"
php -r "echo 'max_file_uploads: ' . ini_get('max_file_uploads') . PHP_EOL;"
echo ""

# Instructions
echo "=== To Fix Upload Limits ==="
echo ""
echo "1. For Laravel development server (php artisan serve):"
echo "   Create or edit php.ini in project root (already created)"
echo "   Run: php -c php.ini artisan serve"
echo ""
echo "2. For Apache:"
echo "   - Edit php.ini file (usually in /etc/php/ or /usr/local/etc/php/)"
echo "   - Or use .htaccess (already updated in public/.htaccess)"
echo "   - Restart Apache: sudo apachectl restart"
echo ""
echo "3. For PHP-FPM:"
echo "   - Edit php.ini or php-fpm pool config"
echo "   - Restart PHP-FPM: sudo brew services restart php"
echo ""
echo "4. For Homebrew PHP on macOS:"
echo "   - Edit: /usr/local/etc/php/$PHP_VERSION/php.ini"
echo "   - Or: $(brew --prefix)/etc/php/$PHP_VERSION/php.ini"
echo ""
echo "Required settings:"
echo "  upload_max_filesize = 10M"
echo "  post_max_size = 30M"
echo "  max_file_uploads = 20"
echo ""

