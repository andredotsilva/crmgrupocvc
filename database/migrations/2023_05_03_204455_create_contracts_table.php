<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('contador');
            $table->string('name');
            $table->string('nif');
            $table->string('email');
            $table->string('cod_freguesia');
            $table->string('freguesia');
            $table->string('concelho');
            $table->string('distrito');
            $table->string('morada');
            $table->string('postal');
            $table->string('tensao');
            $table->string('potencia');
            $table->string('andar');
            $table->foreignUuid('client_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contratos');
    }
};
