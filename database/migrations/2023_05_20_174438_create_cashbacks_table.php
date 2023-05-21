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
        Schema::create('cashbacks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('cvc_paid_amount')->nullable();
            $table->integer('administrator_paid_amount')->nullable();
            $table->integer('commercial_paid_amount')->nullable();
            $table->date('cvc_payment_date')->nullable();
            $table->date('administrator_payment_date')->nullable();
            $table->date('commercial_payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashbacks');
    }
};
