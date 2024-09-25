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
        Schema::create('comment_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')->constrained();
            $table->foreignId('comment_user_id')->constrained('users');
            $table->foreignId('reviw_user_id')->constrained('users');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_scores');
    }
};
