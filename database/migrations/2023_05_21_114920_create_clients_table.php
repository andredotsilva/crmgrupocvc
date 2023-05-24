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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('cae')->nullable();
            $table->string('administrator_name')->nullable();
            $table->string('condominium_administrator')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('door')->nullable();
            $table->string('floor')->nullable();
            $table->string('post_code')->nullable();

            $table->integer('dmp_code')->nullable();
            $table->foreignId('parish_id')->nullable()->references('id')->on('parishes');
            $table->foreignId('municipality_id')->nullable()->references('id')->on('municipalities');
            $table->foreignId('district_id')->nullable()->references('id')->on('districts');

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
