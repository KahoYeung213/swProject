<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Module;

class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'module_name' => $this->faker->sentence,
            'credits' => $this->faker->numberBetween(40, 100),
            'module_image' => $this->faker->imageUrl,
            'created_at' => now(),
            'updated_at' => now(),
        ];

    }
}