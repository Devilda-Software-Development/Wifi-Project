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
        Schema::create('custmoer_devices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('customer_id')->constrained('customers')->restrictOnDelete();
            $table->foreignUuid('router_id')->constrained('routers')->restrictOnDelete();
            $table->string('username');
            $table->string('password');
            $table->string('ip_address');
            $table->string('mac_address');
            $table->enum('status_tagihan', ['aktif', 'nonaktif',]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custmoer_devices');
    }
};
