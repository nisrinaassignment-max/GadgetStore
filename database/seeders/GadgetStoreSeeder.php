<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class GadgetStoreSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat 7 kategori
        $categories = [
            'Smartphone' => 'Berbagai jenis handphone dan smartphone.',
            'Laptop' => 'Laptop untuk kerja, sekolah, dan gaming.',
            'Tablet' => 'Tablet untuk belajar dan hiburan.',
            'Audio' => 'Headphone, headset, dan speaker.',
            'Aksesoris' => 'Aksesoris pendukung perangkat gadget.',
            'Komponen' => 'Komponen dan perangkat komputer.',
            'Smart Home' => 'Perangkat elektronik rumah pintar.',
        ];

        $categoryIds = [];

        foreach ($categories as $name => $description) {
            $category = Category::updateOrCreate(
                ['name' => $name],
                ['description' => $description]
            );

            $categoryIds[] = $category->id;
        }

        // 2. Daftar merek produk
        $brands = [
            'Samsung',
            'Apple',
            'Xiaomi',
            'Lenovo',
            'Asus',
            'HP',
            'Logitech',
            'Sony',
            'JBL',
            'Anker',
        ];

        // 3. Nama-nama produk
        $productNames = [
            'Smartphone',
            'Laptop',
            'Tablet',
            'Headphone',
            'Speaker Bluetooth',
            'Mouse Wireless',
            'Keyboard Mechanical',
            'Monitor LED',
            'Smartwatch',
            'Power Bank',
        ];

        // 4. Membuat 200 produk
        for ($i = 1; $i <= 200; $i++) {

            // Membagi produk ke 7 kategori
            $categoryId = $categoryIds[($i - 1) % 7];

            // Kode produk
            $code = 'GDT-' . str_pad($i, 4, '0', STR_PAD_LEFT);

            // 20 produk pertama memiliki stok menipis
            if ($i <= 20) {
                $stock = (($i - 1) % 5) + 1;
            } else {
                $stock = 60;
            }

            // Merek produk
            $brand = $brands[($i - 1) % count($brands)];

            // Harga produk
            $price = 100000 + (($i * 37500) % 5000000);

            // Nama produk
            $name = $productNames[($i - 1) % count($productNames)]
                . ' Gadget ' . str_pad($i, 3, '0', STR_PAD_LEFT);

            // Simpan atau perbarui produk
            Product::updateOrCreate(
                ['product_code' => $code],
                [
                    'category_id' => $categoryId,
                    'name' => $name,
                    'brand' => $brand,
                    'price' => $price,
                    'stock' => $stock,
                    'description' => 'Produk gadget ' . $name
                        . ' dengan merek ' . $brand . '.',
                ]
            );
        }
    }
}
