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
        User::factory()->createMany([
            ['name' => 'Budi Santoso',      'email' => 'budi@gmail.com',      'role' => 1, 'password' => bcrypt('password1')],
            ['name' => 'Siti Aminah',       'email' => 'siti@gmail.com',      'role' => 1, 'password' => bcrypt('password2')],
            ['name' => 'Andi Wijaya',       'email' => 'andi@gmail.com',      'role' => 1, 'password' => bcrypt('password3')],
            ['name' => 'Dewi Lestari',      'email' => 'dewi@gmail.com',      'role' => 1, 'password' => bcrypt('password4')],
            ['name' => 'Agus Pratama',      'email' => 'agus@gmail.com',      'role' => 1, 'password' => bcrypt('password5')],
            ['name' => 'Fitri Handayani',   'email' => 'fitri@gmail.com',     'role' => 1, 'password' => bcrypt('password6')],
            ['name' => 'Rizky Kurniawan',   'email' => 'rizky@gmail.com',     'role' => 1, 'password' => bcrypt('password7')],
            ['name' => 'Nur Aisyah',        'email' => 'aisyah@gmail.com',    'role' => 1, 'password' => bcrypt('password8')],
            ['name' => 'Joko Susilo',       'email' => 'joko@gmail.com',      'role' => 1, 'password' => bcrypt('password9')],
            ['name' => 'Lina Marlina',      'email' => 'lina@gmail.com',      'role' => 1, 'password' => bcrypt('password10')],
            ['name' => 'Hendra Saputra',    'email' => 'hendra@gmail.com',    'role' => 1, 'password' => bcrypt('password11')],
            ['name' => 'Rina Kartika',      'email' => 'rina@gmail.com',      'role' => 1, 'password' => bcrypt('password12')],
            ['name' => 'Fajar Nugroho',     'email' => 'fajar@gmail.com',     'role' => 1, 'password' => bcrypt('password13')],
            ['name' => 'Maya Sari',         'email' => 'maya@gmail.com',      'role' => 1, 'password' => bcrypt('password14')],
            ['name' => 'Bayu Setiawan',     'email' => 'bayu@gmail.com',      'role' => 1, 'password' => bcrypt('password15')],
            ['name' => 'Intan Permata',     'email' => 'intan@gmail.com',     'role' => 1, 'password' => bcrypt('password16')],
            ['name' => 'Dedi Firmansyah',   'email' => 'dedi@gmail.com',      'role' => 1, 'password' => bcrypt('password17')],
            ['name' => 'Ani Susanti',       'email' => 'ani@gmail.com',       'role' => 1, 'password' => bcrypt('password18')],
            ['name' => 'Yudi Hartono',      'email' => 'yudi@gmail.com',      'role' => 1, 'password' => bcrypt('password19')],
            ['name' => 'Nia Safitri',       'email' => 'nia@gmail.com',       'role' => 1, 'password' => bcrypt('password20')],
        ]);
    }
}
