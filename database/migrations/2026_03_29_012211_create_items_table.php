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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            // 出品者
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // 商品情報
            $table->string('name'); // 商品名
            $table->text('description'); // 商品説明
            $table->integer('price'); // 価格
            $table->string('brand')->nullable(); // ブランド名（任意）

            // 状態
            $table->string('condition'); // 商品の状態（新品など）

            // 画像
            $table->string('image'); // 画像パス

            // 購入状態
            $table->boolean('is_sold')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
