<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_orders', function (Blueprint $table) {
            if (! Schema::hasColumn('product_orders', 'creator_id')) {
                $table->unsignedBigInteger('creator_id')->after('id');
            }
            if (! Schema::hasColumn('product_orders', 'product_id')) {
                $table->foreignId('product_id')->constrained()->onDelete('cascade')->after('creator_id');
            }
            if (! Schema::hasColumn('product_orders', 'buyer_id')) {
                $table->unsignedBigInteger('buyer_id')->after('product_id');
            }
            if (! Schema::hasColumn('product_orders', 'total_price')) {
                $table->unsignedBigInteger('total_price')->after('buyer_id');
            }
            if (! Schema::hasColumn('product_orders', 'is_paid')) {
                $table->boolean('is_paid')->default(false)->after('total_price');
            }
            if (! Schema::hasColumn('product_orders', 'proof')) {
                $table->string('proof')->nullable()->after('is_paid');
            }
            if (! Schema::hasColumn('product_orders', 'deleted_at')) {
                $table->softDeletes()->after('proof');
            }
        });

    }

    public function down(): void
    {
        Schema::table('product_orders', function (Blueprint $table) {
            if (Schema::hasColumn('product_orders', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
            foreach (['proof', 'is_paid', 'total_price', 'buyer_id', 'product_id', 'creator_id'] as $column) {
                if (Schema::hasColumn('product_orders', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }

};
