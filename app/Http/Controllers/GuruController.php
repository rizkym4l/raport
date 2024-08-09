<?php

namespace App\Http\Controllers;

use App\Models\GuruMapelKelas;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.dahshboardasli');
    }

    public function perbaikan()
    {
        $a = GuruMapelKelas::get();
        dd($a);


    }

}
