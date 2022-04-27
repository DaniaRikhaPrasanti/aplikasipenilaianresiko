<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use DB;

class C_realisasiRTP extends Controller
{
    public function index()
    {
        $realisasi_pelaksanaan_rtp = DB::table('realisasi_pelaksanaan_rtp')->get();
        $data = array(
            'menu' => 'realisasi_pelaksanaan_rtp',
            'realisasi_pelaksanaan_rtp' => $realisasi_pelaksanaan_rtp,
            'submenu' => '',
        );

        return view('/realisasiRTP/view_realisasiRTP',$data); 
    }
}

