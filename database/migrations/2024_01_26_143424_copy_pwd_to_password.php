<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password', 255)->after('pwd');
            // $table->string('password')->virtualAs('pwd');
        });

        // Get all users
        $users = DB::table('users')->get();

        // Update each user's password with bcrypt
        foreach ($users as $user) {
            $user->password = bcrypt($user->pwd);
            DB::table('users')->where('id', $user->id)->update(['password' => $user->password]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->string('pwd')->after('email');
        });
    }
};
