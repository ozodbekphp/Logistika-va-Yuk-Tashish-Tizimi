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
        Schema::create('shipment_kuryers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuryer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('shipment_id')->constrained('shipments')->onDelete('cascade');
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_kuryers');
    }
};
