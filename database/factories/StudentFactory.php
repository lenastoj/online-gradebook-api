<?php

namespace Database\Factories;

use App\Models\Gradebook;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'image_url' => 'https://static-cse.canva.com/blob/558554/studyingtips1.7e9721e8.jpg',
            // 'gradebook_id' => Gradebook::all()->random()->id,
            // 'user_id' => User::all()->random()->id,
            // 'gradebook_id' => $this->faker->randomElement([ 56, 57, 58]),
            // 'user_id' => $this->faker->randomElement([2, 5]),
            'gradebook_id' => 23,
            'user_id' => 6,
        ];
    }
}
