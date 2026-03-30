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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            // 外部キー
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // 購入者
            $table->foreignId('item_id')->constrained()->onDelete('cascade'); // 商品
            $table->foreignId('address_id')->constrained()->onDelete('cascade'); // 配送先

            $table->timestamps();

            // 1商品1回しか購入できない（超重要🔥）
            $table->unique('item_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
