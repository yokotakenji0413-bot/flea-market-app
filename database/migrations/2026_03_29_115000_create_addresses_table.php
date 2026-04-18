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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            // 外部キー（ユーザー）
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // 住所情報
            $table->string('postal_code'); // 郵便番号
            $table->string('address');     // 住所
            $table->string('building')->nullable(); // 建物名（任意）

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
