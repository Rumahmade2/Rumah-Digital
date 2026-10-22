<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ProductOrderSeeder extends Seeder
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

        if (! DB::table('users')->where('id', 2)->exists()) {
            DB::table('users')->insert([
                'id' => 2,
                'name' => 'Buyer',
                'email' => 'buyer@example.com',
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        if (! DB::table('products')->where('id', 1)->exists()) {
            DB::table('products')->insert([
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
            ]);
        }

        DB::table('product_orders')->insert([
            [
                'creator_id' => 1,
                'product_id' => 1,
                'buyer_id' => 2,
                'total_price' => 99000,
                'is_paid' => true,
                'proof' => 'images/proof_1.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
