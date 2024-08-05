<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Define roles
        $roles = [
            'super-admin',
            'admin',
            'client',
        ];

        // Insert roles into the database
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // Create a user and assign the super-admin role
        User::factory()->create([
            'name' => 'super-admin',
            'email' => 'super-admin@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('super-admin');
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'client',
            'email' => 'client@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('client');
    }
}
