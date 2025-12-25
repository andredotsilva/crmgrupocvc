<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('meters', function (Blueprint $table) {
            $table->integer('energy_price_standard')->nullable()->after('energy_price');
            $table->integer('energy_price_off_peak')->nullable()->after('energy_price_standard');
            $table->integer('energy_price_super_off_peak')->nullable()->after('energy_price_off_peak');
        });
    }

    public function down(): void
    {
        Schema::table('meters', function (Blueprint $table) {
            $table->dropColumn([
                'energy_price_standard',
                'energy_price_off_peak',
                'energy_price_super_off_peak',
            ]);
        });
    }
};
