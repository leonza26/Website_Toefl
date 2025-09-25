<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::factory()->create([
            'name' => 'Ridwan',
            'email' => 'ridwan@gmail.com',
            'password' => bcrypt('malik1235'),
            'role' => 1,
        ]);


        User::factory()->create([
            'name' => 'Malik',
            'email' => 'malik@gmail.com',
            'password' => bcrypt('malik1234'),
            'role' => 1,
        ]);
    }
}
