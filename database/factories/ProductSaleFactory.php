<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Worker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSale>
 */
class ProductSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "product_id" => $this->faker->numberBetween(1, Product::max("id")),
            "sale_id" => $this->faker->numberBetween(1, Sale::max("id")),
        ];
    }
}