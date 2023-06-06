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
        Schema::create('biannual_commissions', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->integer('01_02_amount')->nullable();
            $table->date('01_02_date')->nullable();

            $table->integer('02_02_amount')->nullable();
            $table->date('02_02_date')->nullable();

            $table->foreignUlid('contract_id')->nullable()->references('id')->on('contracts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biannual_commissions');
    }
};
