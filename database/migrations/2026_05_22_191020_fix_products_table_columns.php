<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'name')) {
                $table->string('name');
            }
            if (! Schema::hasColumn('products', 'slug')) {
                $table->string('slug');
            }
            if (! Schema::hasColumn('products', 'cover')) {
                $table->string('cover');
            }
            if (! Schema::hasColumn('products', 'price')) {
                $table->unsignedBigInteger('price');
            }
            if (! Schema::hasColumn('products', 'about')) {
                $table->text('about');
            }
            if (! Schema::hasColumn('products', 'path_file')) {
                $table->string('path_file');
            }
            if (! Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
            }
            if (! Schema::hasColumn('products', 'creator_id')) {
                $table->unsignedBigInteger('creator_id');
                $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (! Schema::hasColumn('products', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
            foreach (['creator_id', 'category_id', 'path_file', 'about', 'price', 'cover', 'slug'] as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
