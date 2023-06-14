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
        Schema::create('meters', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('cpe')->nullable();
            $table->string('nif')->nullable();
            $table->decimal('power', 8, 2)->nullable();
            $table->foreignId('tariff_id')->nullable()->references('id')->on('tariffs');
            $table->float('flat')->nullable();
            $table->float('peak')->nullable();
            $table->float('standard')->nullable();
            $table->float('off_peak')->nullable();
            $table->float('super_off_peak')->nullable();
            $table->smallInteger('gas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meters');
    }
};
