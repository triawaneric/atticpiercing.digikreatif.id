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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama produk
            $table->text('description')->nullable(); // Deskripsi produk
            $table->decimal('original_price', 10, 2); // Harga original
            $table->decimal('discount_price', 10, 2)->nullable(); // Harga diskon
            $table->decimal('discount_percentage', 5, 2)->nullable(); // Persentase diskon
            $table->json('images')->nullable(); // Gambar produk lebih dari satu
            $table->json('types')->nullable(); // Jenis produk seperti silver, gold, dll.
            $table->string('sku')->unique(); // SKU untuk identifikasi unik produk
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->json('collection_ids')->nullable(); // Untuk menyimpan banyak koleksi
            $table->integer('stock')->default(0); // Stok produk
            $table->boolean('is_active')->default(true); // Status aktif produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
