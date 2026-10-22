<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        if (! DB::table('users')->where('id', 1)->exists()) {
            DB::table('users')->insert([
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('products')->insert([
            [
                'name' => 'Ebook Starter',
                'slug' => 'ebook-starter',
                'cover' => 'images/ebook_starter.jpg',
                'price' => 99000,
                'about' => 'Panduan lengkap untuk pemula belajar ebook.',
                'path_file' => 'files/ebook_starter.pdf',
                'category_id' => 1,
                'creator_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Course Design',
                'slug' => 'course-design',
                'cover' => 'images/course_design.jpg',
                'price' => 150000,
                'about' => 'Kursus desain profesional untuk pemula.',
                'path_file' => 'files/course_design.zip',
                'category_id' => 2,
                'creator_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Template Kit',
                'slug' => 'template-kit',
                'cover' => 'images/template_kit.jpg',
                'price' => 120000,
                'about' => 'Kumpulan template premium siap pakai.',
                'path_file' => 'files/template_kit.zip',
                'category_id' => 3,
                'creator_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ]);
    }
}
