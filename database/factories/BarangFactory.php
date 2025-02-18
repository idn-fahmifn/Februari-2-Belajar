<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->name(),
            'qty' => random_int(10, 20),
            'kategori' => 'elektronik',
            'size' => 'large',
            'merk' => fake()->word(),
            'deskripsi' => fake()->realText()
        ];
    }
}
