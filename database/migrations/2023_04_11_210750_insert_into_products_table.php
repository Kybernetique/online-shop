<?php

use Database\Seeders\ProductSeeder;
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
        (new ProductSeeder())->run();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('products')->delete();
        DB::statement('ALTER TABLE `products` AUTO_INCREMENT = 1;');
    }
};
