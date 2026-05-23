<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Enterprise;
use App\Models\Worker;
use App\Models\Product;
use App\Models\Sale;
use App\Models\ProductSale;
use App\Models\WorkerSale;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
		Enterprise::factory(10)->create();
		Product::factory(10)->create();
		Worker::factory(10)->create();
		Sale::factory(10)->create();
		ProductSale::factory(10)->create();
		WorkerSale::factory(10)->create();
    }
}
