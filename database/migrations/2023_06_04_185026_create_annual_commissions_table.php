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
        Schema::create('annual_commissions', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->integer('01_01_amount')->nullable();
            $table->date('01_01_date')->nullable();

            $table->foreignUlid('contract_id')->nullable()->references('id')->on('contracts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual_commissions');
    }
};
