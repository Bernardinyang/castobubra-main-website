<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UsersSeeder::class,
            SystemSettingsSeeder::class,
            SugSettingsSeeder::class,
            StudentCommunitySeeder::class,
            CTASeeder::class,
            WiseTalkSeeder::class,
            WelcomeSectionSeeder::class,
        ]);
    }
}
