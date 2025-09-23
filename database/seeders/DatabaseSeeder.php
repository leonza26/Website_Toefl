<?php

namespace Database\Seeders;

use App\Models\BankSoal;
use App\Models\Soal;
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

        User::factory()->count(15)->create([
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);

        BankSoal::create([
            'jenis_bahasa' => 'English',
            'jenis_materi' => 'Reading',
            'nama_banksoal' => 'Reading Part 1',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);

        Soal::create([
            'bank_soal_id' => '1',
            'pertanyaan' => 'The honeybee plays a crucial role in agriculture through the process of pollination. As bees collect nectar from flowers, they transfer pollen grains from one blossom to another, enabling plants to produce fruits and seeds. Without bees, many crops such as apples, almonds, and blueberries would see a significant decline in yield. In recent years, however, bee populations have been decreasing due to factors such as pesticide use, habitat loss, and disease. This decline raises concerns about global food security, as fewer bees could mean less pollination and reduced agricultural productivity. What is the main idea of the passage?',
            'file' => null,
            'a' => 'The nutritional benefits of honey in human diets',
            'b' => 'The reasons behind habitat loss in modern agriculture',
            'c' => 'The importance of bees in pollination and the threats they face',
            'd' => 'The process by which flowers produce nectar for bees',
            'jawaban_benar' => 'C',
        ]);
    }
}
