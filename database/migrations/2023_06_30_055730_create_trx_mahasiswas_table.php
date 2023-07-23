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
        Schema::create('trx_mahasiswas', function (Blueprint $table) {
            $table->string('id', 150)->primary()->unique();
            $table->char('nim', 10);
            $table->string('nama', 50);
            $table->enum('prodi', ['Teknik Informatika', 'Sistem Informasi']);
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
        Schema::dropIfExists('trx_mahasiswas');
    }
};
