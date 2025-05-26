<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('skin_type')->nullable();
            $table->string('texture')->nullable();
            $table->string('scent')->nullable();
            $table->string('color')->nullable();
            $table->float('rating')->default(0);
            $table->integer('rating_count')->default(0);
            $table->integer('review_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
