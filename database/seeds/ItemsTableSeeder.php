<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
        DB::table('items')->insert([
            [
                'name' => 'ベッド',
                'price' => '12000',
                'src' => 'images/image_bed_001.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'テーブル',
                'price' => '5000',
                'src' => 'images/image_table_001.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'ソファ',
                'price' => '7800',
                'src' => 'images/image_sofa_001.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => '椅子',
                'price' => '5800',
                'src' => 'images/image_chair_001.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'カーテン',
                'price' => '3800',
                'src' => 'images/image_curtain_001.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'ハンカチ',
                'price' => '500',
                'src' => 'images/image_handkerchief_001.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'ベッド2',
                'price' => '32000',
                'src' => 'images/image_bed_002.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'テーブル2',
                'price' => '6000',
                'src' => 'images/image_table_002.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'ソファ2',
                'price' => '13800',
                'src' => 'images/image_sofa_002.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => '椅子2',
                'price' => '3800',
                'src' => 'images/image_chair_002.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'カーテン2',
                'price' => '4800',
                'src' => 'images/image_curtain_002.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
            [
                'name' => 'ハンカチ2',
                'price' => '1500',
                'src' => 'images/image_handkerchief_002.jpg',
                'description' => '当店で人気の、どなたにもお勧めの商品です。',
            ],
        ]);
    }
}
