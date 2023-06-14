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
        Schema::create('monthly_commissions', function (Blueprint $table) {
            $table->ulid('id')->primary();

            for ($i = 1; $i <= 12; $i++) {
                $columnIndex = sprintf('%02d', $i);
                $table->integer('amount_' . $columnIndex . '_12')->nullable();
                $table->date('date_' . $columnIndex . '_12')->nullable();
            }

            $table->foreignUlid('contract_id')->nullable()->references('id')->on('contracts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_commissions');
    }
};
