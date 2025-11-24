<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Food;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::where('role','customer')->first();
        if (!$customer) return;

        $pizza = Food::where('name','Margherita Pizza')->first();
        $burger = Food::where('name','Cheeseburger')->first();

        $order = Order::create(['user_id'=>$customer->id,'total'=>($pizza->price + $burger->price),'status'=>'pending']);

        OrderItem::create(['order_id'=>$order->id,'food_id'=>$pizza->id,'quantity'=>1,'price'=>$pizza->price]);
        OrderItem::create(['order_id'=>$order->id,'food_id'=>$burger->id,'quantity'=>1,'price'=>$burger->price]);
    }
}
