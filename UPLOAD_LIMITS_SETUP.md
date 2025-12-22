# Upload Limits Setup Guide

## Problem
The application form allows multiple file uploads (up to 5MB each), but PHP's default limits are too low (2MB), causing "PostTooLargeException" errors.

## Solution

### Option 1: Update PHP Configuration (Recommended)

1. **Find your PHP configuration file:**
   ```bash
   php --ini
   ```
   Look for "Loaded Configuration File" path.

2. **Edit the php.ini file:**
   ```bash
   sudo nano /path/to/php.ini
   ```

3. **Update these values:**
   ```ini
   upload_max_filesize = 10M
   post_max_size = 30M
   max_file_uploads = 20
   max_execution_time = 300
   max_input_time = 300
   memory_limit = 256M
   ```

4. **Restart your web server:**
   - For Apache: `sudo apachectl restart` or `sudo service apache2 restart`
   - For PHP-FPM: `sudo service php-fpm restart` or `sudo brew services restart php`
   - For Laravel Sail: `./vendor/bin/sail restart`
   - For built-in server: Just restart it

### Option 2: Using .htaccess (Apache only)

The `.htaccess` file in `public/` has been updated with PHP limits. This works if:
- You're using Apache
- `mod_php` is enabled
- You have permission to use `php_value` directives

If you get "500 Internal Server Error", your host may not allow `php_value` in `.htaccess`. Use Option 1 instead.

### Option 3: Using php.ini in project root

A `php.ini` file has been created in the project root. To use it:

1. **For PHP CLI:**
   ```bash
   php -c php.ini artisan serve
   ```

2. **For Apache (if allowed):**
   Add to `.htaccess`:
   ```apache
   php_value auto_prepend_file /path/to/project/php.ini
   ```

### Option 4: Environment-specific (Docker/Laravel Sail)

If using Docker, update your `docker-compose.yml` or create a custom `php.ini` in your Docker setup.

## Verify Changes

After making changes, verify with:
```bash
php -i | grep -E "post_max_size|upload_max_filesize|max_file_uploads"
```

You should see:
- `post_max_size => 30M`
- `upload_max_filesize => 10M`
- `max_file_uploads => 20`

## Current File Limits in Application

- SSCE Certificate: 5MB (PDF, JPG, PNG)
- Birth Certificate: 5MB (PDF, JPG, PNG)
- Passport Photograph: 2MB (JPG, PNG)
- Evidence of Payment: 5MB (PDF, JPG, PNG)
- Other Uploads: 5MB (PDF, JPG, PNG)

**Total possible: ~22MB** (all files at max size)

**Recommended PHP settings:**
- `post_max_size`: 30M (to handle all files + form data)
- `upload_max_filesize`: 10M (individual file limit)
- `max_file_uploads`: 20 (allow multiple files)

## Troubleshooting

1. **Changes not taking effect:**
   - Make sure you restarted the web server
   - Check if you're editing the correct php.ini file
   - Clear any PHP opcache: `php artisan opcache:clear` (if using opcache)

2. **Still getting errors:**
   - Check web server error logs
   - Verify the limits with `php -i`
   - Ensure `post_max_size` is larger than `upload_max_filesize`

3. **For shared hosting:**
   - Contact your hosting provider to increase limits
   - Some hosts allow changes via cPanel or hosting control panel

