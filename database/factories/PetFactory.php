<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['Dog', 'Cat']);
        if($type === 'Dog'){
            $breed = $this->faker->randomElement(['Labrador', 'Chihuahua']);
        } else {
            $breed = $this->faker->randomElement(['Persian', 'Siamese']);
        }

        return [
            'name' => $this->faker->name,
            'type' => $type,
            'breed' => $breed,
            'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
