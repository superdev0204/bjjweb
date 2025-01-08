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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('gym_id');
            $table->integer('overall_rating')->nullable();
            $table->integer('facilities_rating')->nullable();
            $table->integer('curriculum_rating')->nullable();
            $table->integer('teachers_rating')->nullable();
            $table->integer('safety_rating')->nullable();
            $table->text('comment')->nullable();
            $table->integer('user_id')->nullable();
            $table->enum('approved', ['1', '0', '-1'])->default('0');
            $table->string('email', 100)->nullable();
            $table->string('review_by', 100)->nullable();
            $table->string('experience', 100)->nullable();
            $table->string('ip_address', 100)->nullable();
            $table->text('owner_comment')->nullable();
            $table->datetime('owner_comment_date')->nullable();
            $table->enum('owner_comment_approved', ['1', '0', '-1'])->default('0');
            $table->integer('helpful')->nullable();
            $table->integer('nohelp')->nullable();
            $table->enum('email_verified', ['1', '0'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
