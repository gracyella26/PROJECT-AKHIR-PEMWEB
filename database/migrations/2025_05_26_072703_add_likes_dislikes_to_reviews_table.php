<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('reviews', function (Blueprint $table) {
        $table->unsignedInteger('likes')->default(0);
        $table->unsignedInteger('dislikes')->default(0);
    });
}

public function down(): void
{
    Schema::table('reviews', function (Blueprint $table) {
        $table->dropColumn(['likes', 'dislikes']);
    });
}

};
