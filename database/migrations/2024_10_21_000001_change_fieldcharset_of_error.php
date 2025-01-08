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
        Schema::table('error', function (Blueprint $table) {
            $table->text('user_agent')->charset('utf8mb4')->nullable()->change(); // Set charset here
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
