<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class InformasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_id' => 1,
            'bidang_id' => 1,
            'judul' => $this->faker->sentence,
            'konten' => $this->faker->paragraph,
            'foto' => $this->faker->imageUrl(),
        ];
    }
}
