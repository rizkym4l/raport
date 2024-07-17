<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Step 1: Temporarily drop foreign key constraint in nilai table
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign(['nis_siswa']);
        });

        // Step 2: Modify the nis column type in siswa table
        Schema::table('siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('nis')->change();
        });

        // Step 3: Recreate foreign key constraint in nilai table
        Schema::table('nilai', function (Blueprint $table) {
            $table->foreign('nis_siswa')->references('nis')->on('siswa')->onDelete('cascade');
        });

        // Ensure that the existing referenced tables have the correct types
        Schema::table('kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->change();
        });

        Schema::table('tahun_ajaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->change();
        });

        // Now create the kelas_siswa table
        Schema::create('kelas_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nis');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->timestamps();

            // Define the foreign keys with the correct references
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas_siswa');

        // Revert changes in the nilai table
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign(['nis_siswa']);
        });

        // Revert changes in the siswa table
        Schema::table('siswa', function (Blueprint $table) {
            $table->integer('nis')->change();
        });

        // Recreate foreign key constraint in nilai table
        Schema::table('nilai', function (Blueprint $table) {
            $table->foreign('nis_siswa')->references('nis')->on('siswa')->onDelete('cascade');
        });

        Schema::dropIfExists('tahun_ajaran');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('siswa');
    }
};
