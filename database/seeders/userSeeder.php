<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            0 => [
                'id' => 1,
                'name' => 'manager',
                'email' => 'manager@admin.com',
                'password' => Hash::make('123123'),
                'role_as' => 1,

            ],
            1 => [
                'id' => 2,
                'name' => 'warehouse_guard',
                'email' => 'warehouse_guard@admin.com',
                'password' => Hash::make('123123'),
                'role_as' => 2,

            ],
            2 => [
                'id' => 3,
                'name' => 'accountant',
                'email' => 'accountant@admin.com',
                'password' => Hash::make('123123'),
                'role_as' => 3,

            ],
            
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
