<?php

namespace Database\Seeders;

use App\Models\CTA;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CTASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CTA::create([
            'unique_id' => Str::random(10),
            'sup_text' => 'Coming June',
            'title' => "Built to stand out.",
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eaque expedita fuga laudantium, minima molestias nesciunt nisi nobis perferendis provident recusandae rerum unde. Error natus officiis optio rerum sit.',
            'url' => 'https://spatie.be/docs/laravel-medialibrary/v9/installation-setup',
            'url_text' => 'Take a free course'
        ]);
    }
}
