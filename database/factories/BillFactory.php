<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bills_title' => $this->faker->sentence(5),
            'bills_amount' => $this->faker->randomDigit,
            'bills_date' => $this->faker->date('Y-m-d'),
            'user_id' => User::all()->random()->id,
        ];
    }
}