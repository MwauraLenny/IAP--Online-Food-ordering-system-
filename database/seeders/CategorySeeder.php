<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    public function run(): void {
        $categories = [
            ['name' => 'Fast Food', 'description' => 'Burgers, fries, and snacks'],
            ['name' => 'Drinks', 'description' => 'Juices, sodas, and water'],
            ['name' => 'Desserts', 'description' => 'Cakes and sweets']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
