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

            $table->foreignId('client_type_id')->nullable()->references('id')->on('client_types');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories');
            $table->foreignId('service_id')->nullable()->references('id')->on('services');

            $table->foreignUlid('client_id')->nullable()->references('id')->on('clients');

            $table->foreignId('provider_id')->nullable()->references('id')->on('providers');
            $table->foreignId('plan_id')->nullable()->references('id')->on('plans');
            $table->foreignId('documentation_status_id')->nullable()->references('id')->on('documentation_statuses');
            $table->string('archive')->nullable();

            $table->foreignUlid('meter_id')->nullable()->references('id')->on('meters');
            $table->foreignUlid('commission_id')->nullable()->references('id')->on('commissions');

            $table->date('inserted_at')->nullable();
            $table->date('signed_at')->nullable();
            $table->date('effective_at')->nullable();
            $table->date('renewal_at')->nullable();

            $table->string('nib')->nullable();
            $table->foreignId('invoice_type_id')->nullable()->references('id')->on('invoice_types');

            $table->string('signatory_email')->nullable();
            $table->string('signatory_phone')->nullable();

            $table->timestamp('deleted_at')->nullable();
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
