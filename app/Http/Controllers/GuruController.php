<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\NilaiSiswa;
use Illuminate\Http\Request;
use App\Models\GuruMapelKelas;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.dahshboardasli');
    }

    public function pilihKelas(Request $request)
    {
        $guru = auth()->user()->guru;
        $classes = $guru->kelas;

        return view('guru.pilih_kelas', compact('classes'));
    }
    public function pilihSiswa($kelas_id)
    {
        $siswa = Siswa::where('kelas_id', $kelas_id)->get();

        return view('guru.pilih_siswa', compact('siswa', 'kelas_id'));
    }
    public function tampilkanNilai($siswa_id)
    {
        $guru = auth()->user()->guru;
        $mapel_id = $guru->mapel_id;

        $nilaiSiswa = NilaiSiswa::where('nis_siswa', $siswa_id)
            ->where('mapel_id', $mapel_id)
            ->get();

        $siswa = Siswa::where('nis', $siswa_id)->first();

        $jenisNilai = [
            1 => 'Sumatif 1',
            2 => 'Sumatif 2',
            3 => 'Sumatif 3',
        ];

        foreach ($nilaiSiswa as $nilai) {
            $nilai->jenis_nilai = $jenisNilai[$nilai->nilai_id] ?? 'Unknown';
        }

        $nilaiSiswa = $nilaiSiswa->sortBy('semester');
        $mapel = Mapel::select('nama')->where('id', $mapel_id)->first();

        return view('guru.tampilkan_nilai', compact('nilaiSiswa', 'siswa', 'mapel'));
    }



}
