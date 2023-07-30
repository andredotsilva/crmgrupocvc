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
        Schema::create('contract_documentation_status', function (Blueprint $table) {
            $table->foreignUlid("contract_id")->references("id")->on("contracts")->onDelete("cascade");
            $table->foreignId("documentation_status_id")->references("id")->on("documentation_statuses")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_documentation_status');
    }
};
