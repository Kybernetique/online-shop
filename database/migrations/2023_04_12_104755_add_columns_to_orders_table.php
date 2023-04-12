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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedSmallInteger('entrance')->after('shipping_address');
            $table->unsignedSmallInteger('door_password')->after('entrance');
            $table->unsignedSmallInteger('floor')->after('door_password');
            $table->unsignedSmallInteger('apartment')->after('floor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('entrance');
            $table->dropColumn('door_password');
            $table->dropColumn('floor');
            $table->dropColumn('apartment');
        });
    }
};
