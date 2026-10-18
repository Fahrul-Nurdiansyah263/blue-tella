<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smoked Vanilla Oat Latte',
                'slug' => 'smoked-vanilla-oat-latte',
                'sku' => 'AB-ESP-001',
                'description' => 'Espresso Gayo organik dengan sirup vanila asap racikan sendiri dan susu oat kental gurih.',
                'price' => 38000,
                'stock' => 45,
                'is_active' => true,
            ],
            [
                'name' => 'Hibiscus Berry Cold Brew',
                'slug' => 'hibiscus-berry-cold-brew',
                'sku' => 'AB-CBW-002',
                'description' => 'Kopi seduh dingin 18 jam diinfusi kelopak bunga kembang sepatu dan sari buah beri liar segar.',
                'price' => 35000,
                'stock' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Kyoto Ceremonial Matcha',
                'slug' => 'kyoto-ceremonial-matcha',
                'sku' => 'AB-MTC-003',
                'description' => 'Matcha murni gred upacara dari Uji Kyoto, diseduh tradisional dengan susu nabati lembut.',
                'price' => 42000,
                'stock' => 50,
                'is_active' => true,
            ],
            [
                'name' => 'Spiced Caramel Macchiato',
                'slug' => 'spiced-caramel-macchiato',
                'sku' => 'AB-ESP-004',
                'description' => 'Karamel bakar dengan sentuhan kayu manis ceylon, pala aromatik, dan double shot espresso.',
                'price' => 39000,
                'stock' => 35,
                'is_active' => true,
            ],
            [
                'name' => 'Blue Tella Signature Ocean Boba',
                'slug' => 'blue-tella-signature-ocean-boba',
                'sku' => 'AB-BOB-005',
                'description' => 'Teh bunga telang biru alami dipadu susu segar creamy organik, sirup madu hutan, dan boba kenyal manis.',
                'price' => 32000,
                'stock' => 60,
                'is_active' => true,
            ],
            [
                'name' => 'Velvet Taro Cheese Foam',
                'slug' => 'velvet-taro-cheese-foam',
                'sku' => 'AB-SPC-006',
                'description' => 'Taro ungu alami yang gurih manis lembut, disempurnakan dengan lapisan sea salt cheese foam tebal di atasnya.',
                'price' => 34000,
                'stock' => 25,
                'is_active' => true,
            ],
            [
                'name' => 'Sparkling Berry Lemonade',
                'slug' => 'sparkling-berry-lemonade',
                'sku' => 'AB-FRT-007',
                'description' => 'Minuman soda botani segar dengan perasan lemon murni, selai stroberi liar alami, dan daun mint segar.',
                'price' => 30000,
                'stock' => 40,
                'is_active' => true,
            ],
            [
                'name' => 'Brown Sugar Fresh Milk Boba',
                'slug' => 'brown-sugar-fresh-milk-boba',
                'sku' => 'AB-BOB-008',
                'description' => 'Susu murni dingin dengan sirup gula aren organik yang dibakar harum dan mutiara boba lembut.',
                'price' => 31000,
                'stock' => 55,
                'is_active' => true,
            ],
        ];

        Schema::disableForeignKeyConstraints();
        Product::query()->delete();
        Schema::enableForeignKeyConstraints();

        foreach ($products as $item) {
            Product::create($item);
        }
    }
}
