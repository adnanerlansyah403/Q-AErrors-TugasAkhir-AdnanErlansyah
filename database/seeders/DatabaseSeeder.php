<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seeder Akun User & Role

        $roles = [
            [
                'name' => 'User',
                'slug' => 'user',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Super Admin',
                'slug' => 'superadmin',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $users = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@example.com',
                'username' => 'admin1',
                'password' => bcrypt('12345'),
                'role_id' => 2,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 09'
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@example.com',
                'username' => 'admin2',
                'password' => bcrypt('12345'),
                'role_id' => 2,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 08'
            ],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'username' => 'superadmin',
                'password' => bcrypt('12345'),
                'role_id' => 3,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 7'
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'username' => 'user',
                'password' => bcrypt('12345'),
                'role_id' => 1,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 10'
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'username' => 'user2',
                'password' => bcrypt('12345'),
                'role_id' => 1,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 11'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
