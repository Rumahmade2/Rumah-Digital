<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_orders', function (Blueprint $table) {
            if (Schema::hasColumn('product_orders', 'creator_id')) {
                $table->unsignedBigInteger('creator_id')->change();
                $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            }

            if (Schema::hasColumn('product_orders', 'buyer_id')) {
                $table->unsignedBigInteger('buyer_id')->change();
                $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('product_orders', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['buyer_id']);
        });
    }
};
