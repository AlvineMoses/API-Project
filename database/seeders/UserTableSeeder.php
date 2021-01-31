<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Pa$$w0rd!'),
            'user_type' => 'ADM',
        ]);
        $user->save();

        $user = new User([
            'name' => 'Eunice',
            'email' => 'emanyasi@foodapp.com',
            'password' => bcrypt('Pa$$w0rd!'),
        ]);
        $user->save();

    }
}
