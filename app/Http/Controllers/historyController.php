<?php

namespace App\Http\Controllers;

use App\Models\NilaiHistory;
use App\Models\NilaiSiswa;
use Illuminate\Http\Request;

class historyController extends Controller
{

    public function revertChange(Request $request, $id)
    {
        $history = NilaiHistory::findOrFail($id);
        $nilaiSiswa = NilaiSiswa::findOrFail($history->nilai_siswa_id);

        $nilaiSiswa->nilai = $history->nilai_before;
        $nilaiSiswa->save();

        return response()->json(['success' => true]);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $historyQuery = NilaiHistory::with([
            'nilaiSiswa.mapel',           // Relasi ke mata pelajaran
            'nilaiSiswa.tahunAjaran',     // Relasi ke tahun ajaran
            'siswa',
            'user'                        // Relasi ke user yang mengubah data
        ])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('siswa', function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', '%' . $search . '%');
                })->orWhereHas('nilaiSiswa.mapel', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
            });

        if ($request->input('sort') === 'latest') {
            $historyQuery->orderBy('created_at', 'desc');
        }


        $history = $historyQuery->paginate(10);

        // dd($history);

        // Return ke view dengan data yang sudah difilter
        return view('admin.history.index', compact('history'));
    }



}
