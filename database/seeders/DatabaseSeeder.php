<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Leonza',
            'email' => 'leonza@gmail.com',
            'role' => 0,
            'password' => 'leonza123',
        ]);

        User::factory()->create([
            'name' => 'Ibad',
            'email' => 'ibad@gmail.com',
            'role' => 1,
            'password' => 'ibad123',
        ]);
    }
}
