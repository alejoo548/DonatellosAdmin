<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('products') || ! Schema::hasColumn('products', 'description')) {
            return;
        }

        DB::statement('ALTER TABLE products MODIFY description TEXT NOT NULL');
    }

    public function down(): void
    {
        if (! Schema::hasTable('products') || ! Schema::hasColumn('products', 'description')) {
            return;
        }

        DB::statement('ALTER TABLE products MODIFY description VARCHAR(191) NOT NULL');
    }
};
