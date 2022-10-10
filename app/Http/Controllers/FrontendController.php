<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kerajinan;
use App\Models\Kesenian;
use App\Models\Makanan;
use App\Models\Pepatah;
use App\Models\Perhelatan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $berita  = Berita::where('berita_status', 'Y')->get();
        $makanan = Makanan::all();
        $pepatah = Pepatah::all();
        $kerajinan = Kerajinan::all();
        $kesenian = Kesenian::all();
        $perhelatan = Perhelatan::all();
        return view('frontend.index', [
            'berita'     => $berita,
            'makanan'    => $makanan,
            'kerajinan'  => $kerajinan,
            'kesenian'   => $kesenian,
            'pepatah'    => $pepatah,
            'upacara' => $perhelatan,
        ]);
    }
}
