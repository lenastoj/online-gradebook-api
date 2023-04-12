<?php

namespace Database\Factories;

use App\Models\Gradebook;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->realText(180),
            'user_id' => User::all()->random()->id,
            'gradebook_id' => Gradebook::all()->random()->id,
            'first_name' => User::all()->random()->first_name,
            'last_name' => User::all()->random()->last_name,
        ];
    }
}
