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
            $table->integer('category_id')->default(0);
            $table->integer('item_id')->default(0);
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->integer('normal_price');
            $table->integer('discount_price')->nullable();
            $table->string('des1')->nullable();
            $table->string('des2')->nullable();
            $table->string('des3')->nullable();
            $table->string('des4')->nullable();
            $table->string('des5')->nullable();
            $table->string('des6')->nullable();
            $table->longText('long_des');
            $table->integer('view_count')->default(0);
            $table->integer('order_count')->default(0);
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
