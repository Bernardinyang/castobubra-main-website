<?php

namespace Database\Seeders;

use App\Models\WiseTalk;
use Illuminate\Database\Seeder;

class WiseTalkSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        WiseTalk::create([
            'author' => 'Lewis Carroll',
            'source' => 'Alice in Wonderland',
            'quote' => 'My dear, here we must run as fast as we can, just to stay in place. And if you wish to go anywhere you must run twice as fast as that.'
        ]);
    }
}
