<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class C_namaKegiatan extends Controller
{
    public function insert_namaKegiatan($ID_SASARAN) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->where('ID_SASARAN',$ID_SASARAN)->get();
        // $nama_kegiatan = DB::table('nama_kegiatan')->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            // 'nama_kegiatan' => $nama_kegiatan,
            'submenu' => '',
           
        );
        return view('/namaKegiatan/tambah_view_namaKegiatan',$data);
    }

    public function tambah_namaKegiatan(Request $post)
    {
        DB::table('kegiatan')->insert([ 
            'ID_KEGIATAN' => $post->ID_KEGIATAN,  
            'ID_SASARAN' => $post->ID_SASARAN,       
            'URAIAN_NAMAKEGIATAN' => $post->URAIAN_NAMAKEGIATAN,     
            'URAIAN_TUJUANKEGIATAN' => $post->URAIAN_TUJUANKEGIATAN,     
          
        ]);

        return redirect('/namaKegiatan_tambah_view_namaKegiatan_'.$post->ID_SASARAN );
    }

    public function view_namaKegiatan($ID_SASARAN) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->where('ID_SASARAN',$ID_SASARAN)->get();


        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            'submenu' => '',
           
        );
        return view('namaKegiatan/view_namaKegiatan',$data);
    }

    public function edit_namaKegiatan($ID_KEGIATAN) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->where('ID_KEGIATAN',$ID_KEGIATAN)->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            'submenu' => '',
           
        );
        return view('namaKegiatan/edit_view_namaKegiatan',$data);
    }

    public function update_namaKegiatan(Request $post)
    {   
        DB::table('kegiatan')->where('ID_KEGIATAN', $post->ID_KEGIATAN)->update([ 
            'ID_KEGIATAN' => $post->ID_KEGIATAN,  
            'ID_SASARAN' => $post->ID_SASARAN,       
            'URAIAN_NAMAKEGIATAN' => $post->URAIAN_NAMAKEGIATAN,     
            'URAIAN_TUJUANKEGIATAN' => $post->URAIAN_TUJUANKEGIATAN,     
              
            ]);
    
            return redirect('/namaKegiatan_view_namaKegiatan_'.$post->ID_SASARAN);
    }

    public function hapus($ID_KEGIATAN, $ID_SASARAN)
    {
    	DB::table('kegiatan')->where('ID_KEGIATAN',$ID_KEGIATAN)->delete();
	    return redirect('/namaKegiatan_view_namaKegiatan_'.$ID_SASARAN);
    }
}
