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
        Schema::create('cpes', function (Blueprint $table) {
            $table->id();

            $table->string('cpe');
            $table->string('name');
            $table->string('nif', 20);
            $table->string('address')->nullable();
            $table->string('door')->nullable();
            $table->string('post_code')->nullable();
            $table->foreignId('parish_id')->nullable()->references('id')->on('parishes');
            $table->foreignId('municipality_id')->nullable()->references('id')->on('municipalities');
            $table->foreignId('district_id')->nullable()->references('id')->on('districts');
            $table->decimal('power', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpes');
    }
};
