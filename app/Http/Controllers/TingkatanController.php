<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TingkatanController extends Controller
{
    public function index()
    {
        return view('tingkatan');
    }

    public function kelas()
    {
        return view('kelas');
    }

    public function inputNilai()
    {
        return view('input-nilai'); // Pastikan Anda sudah punya view untuk halaman input nilai
    }
}
