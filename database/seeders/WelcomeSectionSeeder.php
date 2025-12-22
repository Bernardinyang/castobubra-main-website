<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WelcomeSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;

class WelcomeSectionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        WelcomeSection::create([
            'slug' => Str::slug('Hello from Provost'),
            'title' => 'Hello from Provost',
            'sup_text' => 'From the Provost desk',
            'main_image' => 'main-image.jpg',
            'sub_image' => 'sub-image.jpg',
            'description' => "<p>Lost the plot bobby such a fibber bleeding bits and bobs don't get shirty with me bugger all mate chinwag super pukka william barney, horse play buggered.</p>"
        ]);
    }
}
