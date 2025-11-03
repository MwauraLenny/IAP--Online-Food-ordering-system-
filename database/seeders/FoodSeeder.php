<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    public function run()
    {
        $foods = [
            [
                'category_id' => 1,
                'name' => 'Cheeseburger',
                'description' => 'Beef burger with cheese',
                'price' => 550,
                'image' => 'cheeseburger.jpg'
            ],
            [
                'category_id' => 1,
                'name' => 'Veggie Burger',
                'description' => 'Delicious vegetarian burger',
                'price' => 450,
                'image' => 'veggie_burger.jpg'
            ],
            [
                'category_id' => 2,
                'name' => 'Pizza Margherita',
                'description' => 'Classic Italian pizza with cheese and tomato',
                'price' => 800,
                'image' => 'pizza_margherita.jpg'
            ],
            [
                'category_id' => 3,
                'name' => 'Chocolate Cake',
                'description' => 'Rich chocolate dessert',
                'price' => 400,
                'image' => 'chocolate_cake.jpg'
            ],
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
