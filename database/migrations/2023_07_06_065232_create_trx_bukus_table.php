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
        Schema::create('trx_bukus', function (Blueprint $table) {
            $table->uuid('id_buku');
            $table->char('nim', 10)->index();
            $table->string('nama', 50);
            $table->string('judul_buku');
            $table->string('keyword', 100);
            $table->string('cover');
            $table->string('dokumen');
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
        Schema::dropIfExists('trx_bukus');
    }
};
