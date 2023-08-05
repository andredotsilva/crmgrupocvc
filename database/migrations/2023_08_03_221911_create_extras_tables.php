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
        Schema::create('typologies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('contract_typology', function (Blueprint $table) {
            $table->foreignUlid("contract_id")->references("id")->on("contracts")->onDelete("cascade");
            $table->foreignId("typology_id")->references("id")->on("typologies")->onDelete("cascade");
        });

        Schema::create('appliances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('appliance_contract', function (Blueprint $table) {
            $table->foreignUlid("contract_id")->references("id")->on("contracts")->onDelete("cascade");
            $table->foreignId("appliance_id")->references("id")->on("appliances")->onDelete("cascade");
        });

        Schema::create('technical_appliances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('contract_technical_appliance', function (Blueprint $table) {
            $table->foreignUlid("contract_id")->references("id")->on("contracts")->onDelete("cascade");
            $table->foreignId("technical_appliance_id")->references("id")->on("technical_appliances")->onDelete("cascade");
        });

        Schema::create('range_appliances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('contract_range_appliance', function (Blueprint $table) {
            $table->foreignUlid("contract_id")->references("id")->on("contracts")->onDelete("cascade");
            $table->foreignId("range_appliance_id")->references("id")->on("range_appliances")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_typology');
        Schema::dropIfExists('typologies');

        Schema::dropIfExists('appliance_contract');
        Schema::dropIfExists('appliances');

        Schema::dropIfExists('contract_technical_appliance');
        Schema::dropIfExists('technical_appliances');

        Schema::dropIfExists('contract_range_appliance');
        Schema::dropIfExists('range_appliances');
    }
};
