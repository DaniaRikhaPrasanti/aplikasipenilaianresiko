<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class C_namaSKPD extends Controller
{
    
    public function insert_namaSKPD() 
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;



        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'submenu' => '',
           
        );
        return view('namaSKPD/tambah_view_namaSKPD',$data);
    }

    public function tambah_namaSKPD(Request $post)
    {
        DB::table('daftar_tujuan_kegiatan')->insert([
            'TAHUN_ANGGARAN' => $post->TAHUN_ANGGARAN,
            'ID_USER' => $post->ID_USER,     
        ]);

        return redirect('tujuanSKPD/tambah_view_tujuanSKPD');
    }
}
