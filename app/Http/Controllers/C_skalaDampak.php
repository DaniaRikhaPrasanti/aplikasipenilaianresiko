<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use DB;

class C_skalaDampak extends Controller
{
    public function index()
    {
        $skala_dampak = DB::table('skala_dampak')->get();
        $data = array(
            'menu' => 'skala_dampak',
            'skala_dampak' => $skala_dampak,
            'submenu' => '',
        );

        return view('/view_skala_dampak',$data); 
    }
}
