<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // ALTER langsung via raw SQL untuk mengubah ENUM -> VARCHAR
        // sehingga nilai 'penjual' dan 'pembeli' keduanya valid
        DB::statement("ALTER TABLE users MODIFY COLUMN role VARCHAR(20) NOT NULL DEFAULT 'penjual'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('penjual') NOT NULL DEFAULT 'penjual'");
    }
};
