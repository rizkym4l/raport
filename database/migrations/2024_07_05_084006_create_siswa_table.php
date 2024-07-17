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
            $table->integer('nis')->primary();
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
            $table->enum('nama', ['Harian', 'Ujian Tengah Semester', 'Ujian Akhir Semester', 'Ujian Harian']);
            $table->string('keterangan', 100);
            $table->integer('tingkat');
            $table->integer('semester');
            $table->unsignedBigInteger('mapel_id');
            $table->integer('nis_siswa'); // Changed from unsignedBigInteger to integer

            $table->foreign('mapel_id')->references('id')->on('mapel');
            $table->foreign('nis_siswa')->references('nis')->on('siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
        Schema::dropIfExists('mapel');
        Schema::dropIfExists('siswa');
    }
};
