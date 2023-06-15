<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Anime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anime>
 */
class AnimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nome' => $this->faker->name(),
            'imagem' => null,
            'episodios' => $this->faker->numberBetween(1, 24),
            'status' => $this->faker->shuffleString(),
            'estreia' => $this->faker->monthName() . '/' . $this->faker->year(),
            'musicas' => json_encode([$this->faker->sentence()]),
           ];
    }
}