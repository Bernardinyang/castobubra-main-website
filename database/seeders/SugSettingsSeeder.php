<?php

namespace Database\Seeders;

use App\Models\SugSetting;
use Illuminate\Database\Seeder;

class SugSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SugSetting::create([
            'id' => 1
        ]);
    }
}
