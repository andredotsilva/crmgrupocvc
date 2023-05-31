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
        Schema::create('mailing_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('door')->nullable();
            $table->string('floor')->nullable();
            $table->string('post_code')->nullable();
            $table->foreignId('parish_id')->nullable()->references('id')->on('parishes');
            $table->foreignId('municipality_id')->nullable()->references('id')->on('municipalities');
            $table->foreignId('district_id')->nullable()->references('id')->on('districts');
            $table->string('email')->nullable();
            $table->string('nif')->nullable();
            $table->foreignUlid('client_id')->nullable()->references('id')->on('clients');
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mailing_addresses');
    }
};
