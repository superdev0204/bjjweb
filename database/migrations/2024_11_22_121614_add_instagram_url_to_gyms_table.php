<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('gyms', function (Blueprint $table) {
            $table->string('instagram_url', 255)->nullable()->after('video_url');
        });

        Schema::table('gymlogs', function (Blueprint $table) {
            $table->string('instagram_url', 255)->nullable()->after('video_url');
        });
    }

    public function down()
    {
        Schema::table('gyms', function (Blueprint $table) {
            $table->dropColumn('instagram_url'); // Rollback the addition of the field
        });

        Schema::table('gymlogs', function (Blueprint $table) {
            $table->dropColumn('instagram_url'); // Rollback the addition of the field
        });
    }
};