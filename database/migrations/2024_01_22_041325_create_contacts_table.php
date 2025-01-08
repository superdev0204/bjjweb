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
        Schema::create('contacts', function (Blueprint $table) {
            $table->index('from_email');
            $table->id();
            $table->string('from_name', 100)->nullable();
            $table->string('from_email', 100);
            $table->integer('from_userid')->nullable();
            $table->string('to_name', 100)->nullable();
            $table->string('to_email', 100)->nullable();
            $table->integer('to_userid')->nullable();
            $table->string('type', 100)->nullable();
            $table->string('subject', 255);
            $table->text('message')->nullable();
            $table->timestamps();
            $table->integer('previous_id')->nullable();
            $table->datetime('readdate')->nullable();
            $table->datetime('responsedate')->nullable();
            $table->string('ip_sent', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
