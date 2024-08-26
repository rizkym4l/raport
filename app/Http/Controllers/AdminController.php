<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexmapel()
    {
        return view('admin.mapel');
    }
}
