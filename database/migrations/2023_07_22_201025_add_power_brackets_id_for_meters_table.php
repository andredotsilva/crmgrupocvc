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
        Schema::table('meters', function (Blueprint $table) {
            $table->foreignId('power_bracket_id')->nullable()->constrained();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meters', function (Blueprint $table) {
            $table->dropForeign('meters_power_bracket_id_foreign');
            $table->dropColumn('power_bracket_id');
        });
    }
};
