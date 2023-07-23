<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_skripsis', function (Blueprint $table) {
            $table->uuid('id_skripsi')->unique();
            $table->char('nim', 10)->index();
            $table->string('nama', 50);
            $table->string('judul');
            $table->text('abstract');
            $table->char('dosen_1', 15);
            $table->char('dosen_2', 15);
            $table->string('keyword', 100);
            $table->string('dokumen');
            $table->string('cover');
            $table->year('tahun');
            $table->enum('program_studi', ['55201', '57201']);
            $table->enum('tema', [
                'Android',
                'Internet Of Think (IOT)',
                'Web',
                'SPK',
                'Tata Kelola Tehnologi Informasi',
                'Audit Tehkhnologi Informasi',
                'Web GIS', 'Jaringan Komputer',
                'Sistem Enterprice',
                'Sistem Informasi Management (SIM)'
            ]);
            $table->text('refrensi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_skripsis');
    }
};
