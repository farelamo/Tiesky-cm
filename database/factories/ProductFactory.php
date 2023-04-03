<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'        => $this->faker->sentence(5),
            'short_desc'  => $this->faker->sentence(10),
            'desc'        => $this->faker->text(200),
            'category_id' => rand(1, 20),
            'brand_id'    => rand(1, 20),
        ];
    }
}