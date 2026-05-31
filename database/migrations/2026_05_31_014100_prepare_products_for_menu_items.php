<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('products')) {
            return;
        }

        DB::table('products')->where('status', 'activo')->update(['status' => 'available']);
        DB::table('products')->where('status', 'inactivo')->update(['status' => 'unavailable']);

        if (Schema::hasColumn('products', 'stock')) {
            DB::statement('ALTER TABLE products MODIFY stock INT NOT NULL DEFAULT 0');
        }

        if (Schema::hasColumn('products', 'status')) {
            DB::statement("ALTER TABLE products MODIFY status VARCHAR(255) NOT NULL DEFAULT 'available'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('products')) {
            return;
        }

        DB::table('products')->where('status', 'available')->update(['status' => 'activo']);
        DB::table('products')->where('status', 'unavailable')->update(['status' => 'inactivo']);
    }
};
