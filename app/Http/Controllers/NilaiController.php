<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Exports\NilaiExport;
use App\Imports\NilaiImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index($tingkat, $semester)
    {
        $user = Auth::user()->id;
        $siswa = Siswa::where('akun_id', $user)->first();
        $nilai = Nilai::where('tingkat', $tingkat)->where('semester', $semester)->where('siswa_id', $siswa->id)->get();

        return view('nilaisiswa', ['nilai' => $nilai]);

    }

    public function semester($tingkat, $kelas, $mapel)
    {

        return view('semester', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel]);

    }
    public function nilai($tingkat, $kelas, $mapel, $semester)
    {

        return view('nilai', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel, 'semester' => $semester]);

    }
    public function create($tingkat, $kelas, $mapel, $semester, $nilai)
    {


        return view('guru.dashboard', compact('tingkat', 'kelas', 'mapel', 'semester', 'nilai'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mapel,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
            'nama' => 'required|string|max:100',
            'nilai' => 'required|numeric|min:0|max:100',
            'keterangan' => 'nullable|string|max:255',
        ]);


        $nilai = new Nilai;
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->mapel_id = $request->input('mapel_id');
        $nilai->tahun_ajaran_id = $request->input('tahun_ajaran_id');
        $nilai->nama = $request->input('nama');
        $nilai->nilai = $request->input('nilai');
        $nilai->keterangan = $request->input('keterangan');
        $nilai->tingkat = $request->input('tingkat');
        $nilai->semester = $request->input('semester');

        $nilai->save();

        return redirect()->route('nilai.create')->with('success', 'Nilai berhasil disimpan');
    }

    public function import(Request $request)
    {
        $data = $request->only(['tingkat', 'kelas', 'mapel', 'semester', 'nilai']);

        try {
            Excel::import(new NilaiImport($data), $request->file('file'));
            return redirect()->back()->with('success', 'Data berhasil diimpor!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new NilaiExport, 'NilaiTemplate.xlsx');
    }
}
