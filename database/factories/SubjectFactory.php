<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lecturer = User::where('roles', 'dosen')->inRandomOrder()->first();
        return [
            'title' => $this->faker->word,
            'lecturer_id' => $lecturer->id,
            'semester' => $this->faker->randomDigit(1),
            'tahun_akademik' => '2023/2024',
            'sks' => $this->faker->randomElement([1, 2, 3, 4]),
            'kode_matakuliah' => $this->faker->word,
            'deskripsi' => $this->faker->word,
        ];
    }
}
