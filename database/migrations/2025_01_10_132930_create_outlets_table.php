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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('pic')->nullable(); // PIC (Person In Charge)
            $table->decimal('lat', 10, 7)->nullable(); // Latitude
            $table->decimal('long', 10, 7)->nullable(); // Longitude
            $table->json('operational_hours')->nullable(); // Operational Hours (JSON format)
            $table->boolean('is_open')->default(true); // Open/Close Status
            $table->string('thumbnail')->nullable(); // Thumbnail URL
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
