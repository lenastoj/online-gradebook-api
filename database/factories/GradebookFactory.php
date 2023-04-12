<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gradebook>
 */
class GradebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => $this->faker->word(),
            // 'user_id' => $this->faker->randomElement([0,0,0,0,0,0,0,1,2,3,4,5]),
            // 'user_id' => User::all()->random()->unique()->id,
            'user_id' => 6,
        ];
    }
}


// 'user_id' => $this->faker->randomElement([1,2, 3, 5])