<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Enterprise;
use App\Enums\WorkerType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			"name" => $this->faker->firstName,
			"email" => $this->faker->email(),
			"sector" => $this->faker->randomElement(array_column(WorkerType::cases(), "value")),
			"enterprise_id" => $this->faker->randomNumber(1, Enterprise::max("id")),
        ];
    }
}
