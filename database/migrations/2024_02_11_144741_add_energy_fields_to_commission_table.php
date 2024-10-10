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
        Schema::table('commissions', function (Blueprint $table) {
            $table->integer('energy_cvc_paid_amount')->nullable();
            $table->date('energy_cvc_payment_date')->nullable();
            $table->integer('refund_energy_cvc_paid_amount')->nullable();
            $table->date('refund_energy_cvc_payment_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commissions', function (Blueprint $table) {
            $table->dropColumn('energy_cvc_paid_amount');
            $table->dropColumn('energy_cvc_payment_date');
            $table->dropColumn('refund_energy_cvc_paid_amount');
            $table->dropColumn('refund_energy_cvc_payment_date');
        });
    }
};
