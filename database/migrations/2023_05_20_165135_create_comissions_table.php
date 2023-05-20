<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
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

    public function down()
    {
        Schema::dropIfExists('commissions');
    }
};
