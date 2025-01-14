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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->dateTime('appointment_datetime');
            $table->foreignId('outlet_id')->constrained('outlets')->onDelete('cascade'); // Relasi ke outlet
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');

            // Relasi opsional ke produk
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('set null');
            $table->string('product_name')->nullable(); // Untuk menangani produk yang diisi manual (misalnya 'Other')

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
