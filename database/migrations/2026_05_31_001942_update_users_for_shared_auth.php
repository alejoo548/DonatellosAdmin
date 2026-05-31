<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('users', 'id') && ! Schema::hasColumn('users', 'id_user')) {
            DB::statement('ALTER TABLE users CHANGE id id_user BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
        }

        if (! Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('role', ['client', 'admin'])->default('client')->after('password');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }

        if (Schema::hasColumn('users', 'id_user') && ! Schema::hasColumn('users', 'id')) {
            DB::statement('ALTER TABLE users CHANGE id_user id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
        }
    }
};
