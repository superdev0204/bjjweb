<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('gyms', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('updated_at');
        });

        Schema::table('gymlogs', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('created_at');
        });
    }

    public function down()
    {
        Schema::table('gyms', function (Blueprint $table) {
            $table->dropColumn('user_id'); // Rollback the addition of the field
        });

        Schema::table('gymlogs', function (Blueprint $table) {
            $table->dropColumn('user_id'); // Rollback the addition of the field
        });
    }
};