<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kelas = Kelas::query();

        if ($search) {
            $kelas->where('nama_kelas', 'like', "%{$search}%")
                ->orWhere('tingkat', 'like', "%{$search}%");
        }

        return view('admin.kelas.index', [
            'kelas' => $kelas->paginate(8),
        ]);
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|integer',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $kelas = Kelas::where('nama_kelas', 'like', "%{$search}%")
            ->orWhere('tingkat', 'like', "%{$search}%")
            ->get();

        return response()->json($kelas);
    }


    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|integer',
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus');
    }
}
