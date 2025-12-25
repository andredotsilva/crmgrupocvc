<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'code' => 'ADM001',
                'role_title' => 'Admin',
            ],
            [
                'name' => 'Backoffice User',
                'email' => 'backoffice@example.com',
                'password' => Hash::make('password123'),
                'code' => 'BCK001',
                'role_title' => 'Backoffice',
            ],
            [
                'name' => 'Client User',
                'email' => 'client@example.com',
                'password' => Hash::make('password123'),
                'code' => 'CLI001',
                'role_title' => 'Cliente',
            ],
        ];

        foreach ($users as $userData) {
            $roleTitle = $userData['role_title'];
            unset($userData['role_title']);

            $role = Role::firstOrCreate(['title' => $roleTitle]);

            $user = User::firstOrNew(['email' => $userData['email']]);
            $user->fill([
                'name' => $userData['name'],
                'password' => $userData['password'],
                'code' => $userData['code'],
            ]);
            $user->email_verified_at = now();
            $user->save();

            $user->roles()->syncWithoutDetaching([$role->id]);
        }
    }
}
