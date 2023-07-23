<?php

namespace Database\Factories;

use \App\Models\trx_skripsi;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\trx_skripsi>
 */
class trx_skripsiFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_skripsi' => Str::uuid()->toString(),
            'nim' => Str::random(10),
            'nama' => $this->faker->unique()->name(),
            'judul' => $this->faker->sentence,
            'abstract' => $this->faker->sentence,
            'dosen_1' => Str::random(10),
            'dosen_2' => Str::random(10),
            'keyword' => $this->faker->randomElement(['aplikasi', 'akademik', 'android', 'web']),
            'dokumen' => Str::random(30),
            'cover' => Str::random(30),
            'tahun' => $this->faker->year(),
            'program_studi' => $this->faker->randomElement(['55201', '57201']),
            'tema' => $this->faker->randomElement(['Android', 'Internet Of Think (IOT)', 'Web', 'SPK', 'Tata Kelola Tehnologi Informasi', 'Audit Tehkhnologi Informasi', 'Web GIS', 'Jaringan Komputer', 'Sistem Enterprice', 'Sistem Informasi Management (SIM)']),
            'refrensi' => $this->faker->sentence,
        ];
    }
}
