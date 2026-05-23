<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Worker;

class EnterpriseFactory extends Factory
{
    public function definition(): array
    {
        return array(
			"name" => $this->faker->regexify("[A-Z]{16}"),
			"worker_amount" => $this->faker->randomNumber(1, 60),
			"worker_id" => $this->faker->randomNumber(1, Worker::max("id"))
        );
    }
}
