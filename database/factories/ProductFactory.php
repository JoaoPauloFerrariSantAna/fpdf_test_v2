<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
	protected $fillable = array("name", "stock", "price", "created_at", "updated_at");
    public function definition(): array
    {
		$faker = $this->faker;
        return [
			"name" => $faker->word,
			"stock" => $faker->numberBetween(1, 100),
			"price" => $faker->randomFloat(2, 5, 2)
        ];
    }
}
