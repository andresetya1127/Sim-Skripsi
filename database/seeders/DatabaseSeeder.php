<?php

namespace Database\Seeders;

use App\Models\trx_mahasiswa;
use App\Models\trx_skripsi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\trx_skripsi::factory(20)->create();
        // $uuid = Str::uuid()->toString();
        // User::create([
        //     'name' => 'andre_user',
        //     'email' => 'andre72@gmail.com',
        //     'role' => 'akademik',
        //     'password' => 'admin',
        // ]);

        // trx_mahasiswa::create([
        //     'id' => Str::uuid()->toString(),
        //     'nim' => 'TI16190003',
        //     'nama' => 'Andrian Setya Lucmana',
        //     'prodi' => 'Teknik Informatika'
        // ]);
        // trx_mahasiswa::create([
        //     'id' => Str::uuid()->toString(),
        //     'nim' => 'TI16190011',
        //     'nama' => 'Saipul Bahri',
        //     'prodi' => 'Sistem Informasi'
        // ]);
        // trx_mahasiswa::create([
        //     'id' => Str::uuid()->toString(),
        //     'nim' => 'TI16190019',
        //     'nama' => 'Firman Haris',
        //     'prodi' => 'Teknik Informatika'
        // ]);
        // trx_mahasiswa::create([
        //     'id' => Str::uuid()->toString(),
        //     'nim' => 'TI16190023',
        //     'nama' => 'Murizal',
        //     'prodi' => 'Sistem Informasi'
        // ]);
        // trx_mahasiswa::create([
        //     'id' => Str::uuid()->toString(),
        //     'nim' => 'TI16190030',
        //     'nama' => 'Saep',
        //     'prodi' => 'Teknik Informatika'
        // ]);

        // trx_skripsi::create([
        //     'id_skripsi' => $uuid,
        //     'nim' => 'TI' . rand(10000000, 90000000),
        //     'judul' => 'minima minus aspernatur mollitia porro ',
        //     'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, voluptas modi optio quos animi esse unde magni adipisci
        //     sunt accusamus. Molestias aliquid iure quasi expedita libero. Quibusdam animi ex praesentium harum alias culpa ab
        //     commodi! Quaerat placeat quo ex accusamus eos nulla pariatur provident sequi et. Nobis dolorum libero ea sed voluptas
        //     eius, a officia! Possimus culpa cumque nulla repudiandae nihil. Ex dolore laborum quia tempore, cum perspiciatis vel
        //     amet suscipit mollitia facere adipisci, atque magni? Quos consequuntur molestiae a, molestias, cumque harum nostrum
        //     aperiam minima minus aspernatur mollitia porro quam dolores reiciendis itaque cum facilis consequatur repellendus. Nemo,
        //     placeat.',
        //     'nama' => 'andre',
        //     'dosen_1' => 'hairul fahmi',
        //     'dosen_2' => 'hairul fahmi',
        //     'keyword' => 'skripsi',
        //     'program_studi' => '55201',
        //     'dokumen' => 'contoh',
        //     'cover' => 'contoh.jpg',
        //     'tahun' => '2021',
        //     'tema' => 'Android',
        //     'refrensi' => 'eius, a officia! Possimus culpa cumque nulla repudiandae nihil. Ex dolore laborum quia tempore, cum perspiciatis vel
        //     amet suscipit mollitia facere adipisci, atque magni? Quos consequuntur molestiae a, molestias, cumque harum nostrum
        //     aperiam minima minus aspernatur mollitia porro quam dolores reiciendis itaque cum facilis consequatur repellendus. Nemo,
        //     placeat'

        // ]);
    }
}
