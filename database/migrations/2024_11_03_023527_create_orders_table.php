<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id')->autoIncrement(); // Primary key
            $table->bigInteger('order_group');
            $table->unsignedBigInteger('product_id'); // Foreign key ke tabel Products
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel Products
            $table->bigInteger('quantity');
            $table->decimal('price', 10, 2); // Harga satuan
            $table->decimal('subtotal', 10, 2); // Total harga untuk produk ini
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
