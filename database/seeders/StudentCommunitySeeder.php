<?php

namespace Database\Seeders;

use App\Models\StudentCommunity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentCommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentCommunity::create([
            'unique_id' => Str::random(10),
            'title' => 'Course Outcome',
            'content' => "Faff about A bit of how's your father getmate cack codswallop crikey argy-bargy cobblers lost his bottle.",
            'img' => 'img.png',
        ]);
    }
}
