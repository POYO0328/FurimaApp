<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('items')->insert([
            [
                'user_id' => 1,
                'item_name' => '腕時計',
                'price' => 15000,
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'brand' => 'Armani',
                'condition' => '良好',
                'image_path' => '/images/armani_watch.jpg',
                'category_id' => 1,
            ],
            [
                'user_id' => 1,
                'item_name' => 'HDD',
                'price' => 5000,
                'description' => '高速で信頼性の高いハードディスク',
                'brand' => null,
                'condition' => '目立った傷や汚れなし',
                'image_path' => '/images/hdd.jpg',
                'category_id' => 1,
            ],
            [
                'user_id' => 1,
                'item_name' => '玉ねぎ3束',
                'price' => 300,
                'description' => '新鮮な玉ねぎ3束のセット',
                'brand' => null,
                'condition' => 'やや傷や汚れあり',
                'image_path' => '/images/onions.jpg',
                'category_id' => 2,
            ],
            [
                'user_id' => 1,
                'item_name' => '革靴',
                'price' => 4000,
                'description' => 'クラシックなデザインの革靴',
                'brand' => null,
                'condition' => '状態が悪い',
                'image_path' => '/images/leather_shoes.jpg',
                'category_id' => 3,
            ],
            [
                'user_id' => 1,
                'item_name' => 'ノートPC',
                'price' => 45000,
                'description' => '高性能なノートパソコン',
                'brand' => null,
                'condition' => '良好',
                'image_path' => '/images/laptop.jpg',
                'category_id' => 1,
            ],
            [
                'user_id' => 1,
                'item_name' => 'マイク',
                'price' => 8000,
                'description' => '高音質のレコーディング用マイク',
                'brand' => null,
                'condition' => '目立った傷や汚れなし',
                'image_path' => '/images/mic.jpg',
                'category_id' => 1,
            ],
            [
                'user_id' => 1,
                'item_name' => 'ショルダーバッグ',
                'price' => 3500,
                'description' => 'おしゃれなショルダーバッグ',
                'brand' => null,
                'condition' => 'やや傷や汚れあり',
                'image_path' => '/images/shoulder_bag.jpg',
                'category_id' => 3,
            ],
            [
                'user_id' => 1,
                'item_name' => 'タンブラー',
                'price' => 500,
                'description' => '使いやすいタンブラー',
                'brand' => null,
                'condition' => '状態が悪い',
                'image_path' => '/images/tumbler.jpg',
                'category_id' => 2,
            ],
            [
                'user_id' => 1,
                'item_name' => 'コーヒーミル',
                'price' => 4000,
                'description' => '手動のコーヒーミル',
                'brand' => null,
                'condition' => '良好',
                'image_path' => '/images/coffee_mill.jpg',
                'category_id' => 2,
            ],
            [
                'user_id' => 1,
                'item_name' => 'メイクセット',
                'price' => 2500,
                'description' => '便利なメイクアップセット',
                'brand' => null,
                'condition' => '目立った傷や汚れなし',
                'image_path' => '/images/makeup_set.jpg',
                'category_id' => 3,
            ],
        ]);
    }
}
