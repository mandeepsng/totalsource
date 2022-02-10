<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'location' => $this->faker->locale() ,
            'type' => $this->faker->randomElement(['Part Time', 'Full Time' ]),
            'salary' => $this->faker->randomElement(['55k', '60k', '70k', '88k']) ,
            'hiring_client_id' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8']),
            'description' => $this->faker->text(250) ,
            'expected_duration' => $this->faker->randomElement(['3 Months', '5 Months', '6 Months', '1 Year' ]),
            'skill_ids' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8']),
        ];
    }
}
