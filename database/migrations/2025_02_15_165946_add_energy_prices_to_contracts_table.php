<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnergyPricesToContractsTable extends Migration
{
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->decimal('energy_price_standard', 8, 2)->nullable();
            $table->decimal('energy_price_off_peak', 8, 2)->nullable();
            $table->decimal('energy_price_super_off_peak', 8, 2)->nullable();
            $table->decimal('energy_price', 8, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('energy_price_standard');
            $table->dropColumn('energy_price_off_peak');
            $table->dropColumn('energy_price_super_off_peak');
            $table->dropColumn('energy_price');
        });
    }
}