<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class TingkatanController extends Controller
{
    public function index()
    {
        return view('tingkatan');
    }

    public function kelas($tingkat)
    {
        $kelas = Kelas::where('tingkat', $tingkat)->get();
        return view('kelas', ['kelas' => $kelas]);
    }

    public function inputNilai()
    {
        return view('input-nilai'); // Pastikan Anda sudah punya view untuk halaman input nilai
    }
}
