<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Worker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$faker = $this->faker;
        return [
			"worker_id" => $faker->randomNumber(1, Worker::max("id")),
			"product_id" => $faker->randomNumber(1, Product::max("id")),
			"amount_sold" => $faker->randomNumber(1, Product::max("stock"))
        ];
    }
}
