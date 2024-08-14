<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;

use App\Models\NilaiSiswa;
use App\Models\TahunAjaran;
use App\Exports\NilaiExport;
use App\Imports\NilaiImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index($tingkat, $semester)
    {
        $sap = Nilai::select('name', 'id')->get();
        $user = Auth::user()->id;
        $siswa = Siswa::where('akun_id', $user)->with('kelas')->first();
        $allMapels = Mapel::orderBy('id')->get();

        $data = [];
        $header = ['NO', 'Mata Pelajaran'];

        foreach ($sap as $n) {
            $header[] = $n->name;
        }
        $header[] = 'Keterangan';
        $data[] = $header;

        foreach ($allMapels as $mapel) {
            $nilaiData = NilaiSiswa::where('tingkat', $tingkat)
                ->where('semester', $semester)
                ->where('nis_siswa', $siswa->nis)
                ->where('mapel_id', $mapel->id)
                ->get();

            $mapelData = [
                'mapel_id' => $mapel->nama,
            ];

            foreach ($sap as $n) {
                $mapelData[$n->name] = null;
            }

            foreach ($nilaiData as $nilai) {
                $nilaiName = $sap->firstWhere('id', $nilai->nilai_id)->name;
                $mapelData[$nilaiName] = $nilai->nilai;
                if ($nilai->keterangan) {
                    $mapelData['keterangan'] = $nilai->keterangan;
                }
            }

            $data[] = $mapelData;
        }

        // dd($data);

        // die();
        return view('nilaisiswa', [
            'data' => $data,
            'siswa' => $siswa,
            'sap' => $sap,
            'nama_kelas' => $siswa->kelas->nama_kelas,
            'semester' => $semester,
            'tingkat' => $tingkat
        ]);
    }


    public function semester($tingkat, $kelas, $mapel)
    {

        return view('semester', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel]);

    }


    public function cetak($nis)
    {
        $semester = request()->input('semester');
        $tingkat = request()->input('tingkat');
        $siswa = Siswa::where('nis', $nis)->with('kelas')->first();
        $sap = Nilai::select('name', 'id')->get();
        $allMapels = Mapel::orderBy('id')->get();


        $data = [];
        $header = ['NO', 'Mata Pelajaran'];

        foreach ($sap as $n) {
            $header[] = $n->name;
        }
        $header[] = 'Keterangan';
        $data[] = $header;

        foreach ($allMapels as $mapel) {
            $nilaiData = NilaiSiswa::where('semester', $semester)
                ->where('tingkat', $tingkat)
                ->where('nis_siswa', $siswa->nis)
                ->where('mapel_id', $mapel->id)
                ->get();

            $mapelData = [
                'mapel_id' => $mapel->nama,
            ];

            foreach ($sap as $n) {
                $mapelData[$n->name] = null;
            }

            foreach ($nilaiData as $nilai) {
                $nilaiName = $sap->firstWhere('id', $nilai->nilai_id)->name;
                $mapelData[$nilaiName] = $nilai->nilai;
                if ($nilai->keterangan) {
                    $mapelData['keterangan'] = $nilai->keterangan;
                }
            }

            $data[] = $mapelData;
        }
        // dd($tingkat);

        $pdf = Pdf::loadView('cetak_nilai', [
            'data' => $data,
            'siswa' => $siswa,
            'sap' => $sap,
            'nama_kelas' => $siswa->kelas->nama_kelas,
            'semester' => $semester,
        ]);

        return $pdf->download('nilai_siswa_' . $siswa->nis . '.pdf');
    }

    public function nilai($tingkat, $kelas, $mapel, $semester)
    {
        $nilai = Nilai::select('name', 'id')->get();
        // dd($nilai);
        // die();
        return view('nilai', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel, 'semester' => $semester, 'data' => $nilai]);

    }
    public function create($tingkat, $kelas, $mapel, $semester, $nilai)
    {
        $class = Kelas::find($kelas);
        $Mapel = Mapel::find($mapel);
        $nilai1 = $nilai;

        switch ($nilai1) {
            case 1:
                $nilai = 'sumatif 1';
                break;
            case 2:
                $nilai = 'sumatif 2';
                break;
            case 3:
                $nilai = 'formatif 1';
                break;
            case 4:
                $nilai = 'formatif 2';
                break;
            case 5:
                $nilai = 'ulangan tengah semester';
                break;
            case 6:
                $nilai = 'ulangan akhir semester';
                break;
            default:
                $nilai = null;
                break;
        }

        return view('guru.dashboard', compact('tingkat', 'Mapel', 'class', 'kelas', 'mapel', 'semester', 'nilai', 'nilai1'));
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

    public function export(Request $request)
    {
        $data = $request->only(['tingkat', 'kelas', 'mapel', 'semester', 'nilai']);

        if (!isset($data['kelas'])) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan dalam request.');
        }

        return Excel::download(new NilaiExport($data), 'NilaiTemplate.xlsx');
    }
    public function edit($id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $mapel = Mapel::all();
        return view('guru.edit_nilai', compact('nilai', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|numeric',
            // 'keterangan' => 'nullable|string',
        ]);

        $nilai = NilaiSiswa::findOrFail($id);
        $nilai->nilai = $request->input('nilai');
        // $nilai->keterangan = $request->input('keterangan');
        $nilai->save();

        return redirect()->route('guru.tampilkan_nilai', $nilai->nis_siswa)->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $nilai->delete();

        return redirect()->route('guru.tampilkan_nilai', $nilai->nis_siswa)->with('success', 'Nilai berhasil dihapus');
    }

}
