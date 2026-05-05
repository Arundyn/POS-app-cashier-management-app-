<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Don't forget to import the models
use App\Models\Category;
use App\Models\Item;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Minuman', 'created_at' => now()],
            ['name' => 'Makanan', 'created_at' => now()],
        ]);

        Item::insert([
            ['category_id' => 1, 'name' => 'Es Teh', 'price' => 5000, 'stock' => 50, 'created_at' => now()],
            ['category_id' => 1, 'name' => 'Kopi',  'price' => 8000, 'stock' => 30, 'created_at' => now()],
            ['category_id' => 2, 'name' => 'Nasi Goreng', 'price' => 15000, 'stock' => 20, 'created_at' => now()],
        ]);
    }
}
