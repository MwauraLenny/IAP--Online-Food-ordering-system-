<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;
use App\Models\Category;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $pizza = Category::where('name','Pizza')->first();
        $burger = Category::where('name','Burgers')->first();
        $drinks = Category::where('name','Drinks')->first();

        Food::updateOrCreate(['name'=>'Margherita Pizza'],[
            'description'=>'Classic cheese pizza','price'=>500,'stock'=>10,'category_id'=>$pizza->id
        ]);

        Food::updateOrCreate(['name'=>'Cheeseburger'],[
            'description'=>'Juicy beef burger','price'=>350,'stock'=>15,'category_id'=>$burger->id
        ]);

        Food::updateOrCreate(['name'=>'Cool Soda'],[
            'description'=>'Chilled soda can','price'=>70,'stock'=>30,'category_id'=>$drinks->id
        ]);
    }
}
