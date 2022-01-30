<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Club;
use \App\Models\User;

class PlayerFactory extends Factory
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
            'date_of_birth' => $this->faker->dateTime(),
            'euro_net_worth' => $this->faker->numberBetween(10000,100000000),
            'club_id' => Club::factory(),
            'user_id' => User::factory(),
        ];
    }
}
