<?php

namespace App\Providers;

use App\Http\Services\HelperService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            // Skip database queries during package discovery and other non-database commands
            if ($this->app->runningInConsole()) {
                $command = $_SERVER['argv'][1] ?? '';
                $skipCommands = ['package:discover', 'vendor:publish'];
                
                if (in_array($command, $skipCommands)) {
                    return;
                }
            }

            // Check if database connection is available
            DB::connection()->getPdo();
            
            // Check if the table exists
            if (!Schema::hasTable('system_settings')) {
                return;
            }

            $setting = HelperService::getSettings();
            
            if (!$setting) {
                return;
            }

            config([
                'app.name' => Str::slug($setting->app_name),
                'app.url' => $setting->app_url,
                'app.email' => $setting->app_email,
                'app.timezone' => $setting->timezone,
                'app.debug' => $setting->app_debug ? 'true' : 'false',
                'app.env' => $setting->is_live ? 'production' : 'local',
            ]);

            if ($setting->is_live) {
                config([
                    'mail.mailers.smtp.transport' => $setting->mail_mailer,
                    'mail.mailers.smtp.host' => $setting->mail_host,
                    'mail.mailers.smtp.port' => $setting->mail_port,
                    'mail.mailers.smtp.encryption' => $setting->mail_encryption,
                    'mail.mailers.smtp.username' => $setting->mail_username,
                    'mail.mailers.smtp.password' => $setting->mail_password,
                    'mail.from.address' => $setting->app_email,
                    'mail.from.name' => $setting->app_name,
                ]);
            }
        } catch (\Exception $e) {
            // Silently fail during composer operations or when database is not available
            // This prevents errors during package discovery, migrations, etc.
        }
    }
}
