<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        Order::factory(30)->create()
            ->each(fn (Order $order) => OrderItem::factory(random_int(1, 2))
                ->create(['order_id' => $order->id]));
    }
}
