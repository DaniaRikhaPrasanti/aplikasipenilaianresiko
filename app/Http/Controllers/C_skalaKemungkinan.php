<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use DB;

class C_skalaKemungkinan extends Controller
{
    public function index()
    {
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $data = array(
            'menu' => 'skala_kemungkinan',
            'skala_kemungkinan' => $skala_kemungkinan,
            'submenu' => '',
        );

        return view('/view_skala_kemungkinan',$data); 
    }
}
