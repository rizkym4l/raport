<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 100);
            $table->string('nama_lengkap', 100);
            $table->unsignedBigInteger('akun_id');
            $table->string('photo', 255);
            $table->timestamps();

            $table->foreign('akun_id')->references('id')->on('users');
        });
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('kode_mapel');

        });
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->integer('tingkat');
            $table->integer('semester');
            $table->unsignedBigInteger('mapel_id');

            $table->foreign('mapel_id')->references('id')->on('mapel');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('mapel');
        Schema::dropIfExists('nilai');
    }
};
