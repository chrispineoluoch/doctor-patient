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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'System',
            'last_name' => 'Administrator',
            'email' => 'systemadmin@example.com',
            'role' => 'receptionist'
        ]);
    }
}
