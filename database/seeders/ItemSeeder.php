<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::create([
            'user_id' => 1,
            'name' => 'メイクセット',
            'description' => '便利なメイクアップセット',
            'price' => 2500,
            'image' => 'makeup.jpg',
            'condition' => '良好',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'HDD',
            'description' => '高速で信頼性の高いハードディスク',
            'price' => 5000,
            'image' => 'hdd.jpg',
            'condition' => '目立った傷や汚れなし',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => '玉ねぎ3束',
            'description' => '新鮮な玉ねぎ3束のセット',
            'price' => 300,
            'image' => 'onion.jpg',
            'condition' => 'やや傷や汚れあり',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => '革靴',
            'description' => 'クラシックなデザインの革靴',
            'price' => 4000,
            'image' => 'shoes.jpg',
            'condition' => '状態が悪い',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'ノートPC',
            'description' => '高性能なノートパソコン',
            'price' => 45000,
            'image' => 'laptop.jpg',
            'condition' => '良好',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'マイク',
            'description' => '高音質のレコーディング用マイク',
            'price' => 8000,
            'image' => 'mic.jpg',
            'condition' => '目立った傷や汚れなし',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'ショルダーバッグ',
            'description' => 'おしゃれなショルダーバッグ',
            'price' => 3500,
            'image' => 'bag.jpg',
            'condition' => 'やや傷や汚れあり',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'タンブラー',
            'description' => '使いやすいタンブラー',
            'price' => 500,
            'image' => 'tumbler.jpg',
            'condition' => '状態が悪い',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'コーヒーミル',
            'description' => '手動のコーヒーミル',
            'price' => 4000,
            'image' => 'mill.jpg',
            'condition' => '良好',
        ]);

        Item::create([
            'user_id' => 1,
            'name' => '腕時計',
            'description' => 'スタイリッシュなメンズ腕時計',
            'price' => 15000,
            'image' => 'watch.jpg',
            'condition' => '良好',
        ]);
    }
}
