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
        Schema::create('contracts', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUuid('back_officer_id')->nullable()->references('id')->on('users');
            $table->foreignUuid('commercial_id')->nullable()->references('id')->on('users');

            $table->foreignId('client_type_id')->references('id')->on('client_types');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('service_id')->references('id')->on('services');

            $table->foreignUuid('client_id')->references('id')->on('users');

            $table->foreignUuid('provider_id')->nullable()->references('id')->on('providers');
            $table->foreignUuid('plan_id')->nullable()->references('id')->on('plans');
            $table->foreignUuid('documentation_status')->nullable()->references('id')->on('documentation_statuses');

            $table->string('archive')->nullable();

            $table->foreignUuid('meter_id')->nullable()->references('id')->on('meters');
            $table->foreignUuid('comission_id')->nullable()->references('id')->on('comissions');


            $table->date('inserted_at')->nullable();
            $table->date('signed_at')->nullable();
            $table->date('effective_at')->nullable();
            $table->date('renewal_at')->nullable();

            $table->string('nib')->nullable();
            $table->foreignId('invoice_type')->nullable()->references('id')->on('invoice_types');

            $table->string('signatory_email')->nullable();
            $table->string('signatory_phone')->nullable();

            // $table->string('comission_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
