<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FixUserNullFieldsSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('users')
            ->whereNull('avatar')
            ->update(['avatar' => 'images/default-avatar.svg', 'updated_at' => $now]);

        DB::table('users')
            ->whereNull('occupation')
            ->update(['occupation' => '', 'updated_at' => $now]);

        DB::table('users')
            ->whereNull('bank_name')
            ->update(['bank_name' => '', 'updated_at' => $now]);

        DB::table('users')
            ->whereNull('bank_account')
            ->update(['bank_account' => '', 'updated_at' => $now]);

        DB::table('users')
            ->whereNull('bank_account_number')
            ->update(['bank_account_number' => '', 'updated_at' => $now]);
    }
}
