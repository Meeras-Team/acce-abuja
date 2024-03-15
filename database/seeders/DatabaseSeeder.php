<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Bowofade Oyerinde',
            'email' => 'contact@bowofade.com',
            'phone' => '07081353229',
            'current_role' => 'super-admin',
            'password' => bcrypt(env('PASSWORD'))
        ]);
        \App\Models\User::factory()->create([
            'name' => 'School Admin',
            'email' => 'info@acce-abuja.com',
            'phone' => '08012341234',
            'current_role' => 'admin',
            'password' => bcrypt(env('ADMIN_PASSWORD'))
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'editor@acce-abuja.com',
            'phone' => '08012340000',
            'current_role' => 'editor',
            'password' => bcrypt(env('EDITOR_PASSWORD'))
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'blogger@acce-abuja.com',
            'phone' => '08010001000',
            'current_role' => 'blogger',
            'password' => bcrypt(env('BLOGGER_PASSWORD'))
        ]);
        $this->call([
            CategorySeeder::class,
            PostSeeder::class
        ]);
    }
}
