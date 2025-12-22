<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dev_role = Role::where('name', 'developer')->first();
        $admin_role = Role::where('name', 'admin')->first();

        $user1 = new User;
        $user1->role_id = 2;
        $user1->name = 'CASTObubra Admin';
        $user1->email = 'admin@castobubra.ng';
        $user1->password = bcrypt('admin@2021');
        $user1->email_verified_at = now();
        $user1->save();
        $user1->roles()->attach($admin_role);

        $user2 = new User;
        $user2->role_id = 1;
        $user2->name = 'Isaac Ekabua';
        $user2->email = 'izyekabs@gmail.com';
        $user2->password = bcrypt('izyekabs@2021');
        $user2->email_verified_at = now();
        $user2->save();
        $user2->roles()->attach($dev_role);
        $user2->roles()->attach($admin_role);

        $user3 = new User;
        $user3->role_id = 1;
        $user3->name = 'Bernode Limited';
        $user3->email = 'bernodelimited@gmail.com';
        $user3->password = bcrypt('casacodes2633');
        $user3->email_verified_at = now();
        $user3->save();
        $user3->roles()->attach($dev_role);
        $user3->roles()->attach($admin_role);
    }
}
