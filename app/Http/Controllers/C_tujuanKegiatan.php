<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class C_tujuanKegiatan extends Controller
{
    public function insert_tujuanKegiatan($ID_NAMAKEGIATAN) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $nama_kegiatan = DB::table('nama_kegiatan')->where('ID_NAMAKEGIATAN',$ID_NAMAKEGIATAN)->get();
        // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'nama_kegiatan' => $nama_kegiatan,
            // 'tujuan_kegiatan' => $tujuan_kegiatan,
            'submenu' => '',
           
        );
        return view('/tujuanKegiatan/tambah_view_tujuanKegiatan',$data);
    }

    public function tambah_tujuanKegiatan(Request $post)
    {
        DB::table('tujuan_kegiatan')->insert([ 
            'ID_TUJUANKEGIATAN' => $post->ID_TUJUANKEGIATAN,      
            'ID_NAMAKEGIATAN' => $post->ID_NAMAKEGIATAN,   
            'URAIAN_TUJUANKEGIATAN' => $post->URAIAN_TUJUANKEGIATAN,     
        ]);

        return redirect('/tujuanKegiatan_tambah_view_tujuanKegiatan_'. $post->ID_NAMAKEGIATAN);
    }

    public function view_tujuanKegiatan($ID_NAMAKEGIATAN) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $nama_kegiatan = DB::table('nama_kegiatan')->get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->where('ID_NAMAKEGIATAN',$ID_NAMAKEGIATAN)->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'nama_kegiatan' => $nama_kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            'submenu' => '',
           
        );
        return view('/tujuanKegiatan/view_tujuanKegiatan',$data);
    }

    public function view_keseluruhan() 
    {
        $user = DB::table('user')->get();
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $nama_kegiatan = DB::table('nama_kegiatan')-> get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->join('nama_kegiatan', 'nama_kegiatan.ID_NAMAKEGIATAN', '=', 'tujuan_kegiatan.ID_NAMAKEGIATAN')->join('sasaran', 'sasaran.ID_SASARAN', '=', 'nama_kegiatan.ID_SASARAN')->join('tujuan_skpd', 'tujuan_skpd.ID_TUJUANSKPD', '=', 'sasaran.ID_TUJUANSKPD')->join('daftar_tujuan_kegiatan', 'daftar_tujuan_kegiatan.ID_DAFTAR', '=', 'tujuan_skpd.ID_DAFTAR')->join('user', 'user.ID_USER', '=', 'daftar_tujuan_kegiatan.ID_USER')->get();
      
        $data = array(
            'menu' => 'view_keseluruhan',
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'nama_kegiatan' => $nama_kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            
        );

        return view('/tujuanKegiatan/view_keseluruhan',$data);
    }

    public function edit_tujuanKegiatan($ID_TUJUANKEGIATAN) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->where('ID_TUJUANKEGIATAN',$ID_TUJUANKEGIATAN)->get();
        $nama_kegiatan = DB::table('nama_kegiatan')->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            'nama_kegiatan' => $nama_kegiatan,
            'submenu' => '',
           
        );
        return view('tujuanKegiatan/edit_view_tujuanKegiatan',$data);
    }

    public function update_tujuanKegiatan(Request $post)
    {   
        DB::table('tujuan_kegiatan')->where('ID_TUJUANKEGIATAN', $post->ID_TUJUANKEGIATAN)->update([ 
            'ID_TUJUANKEGIATAN' => $post->ID_TUJUANKEGIATAN,      
            'ID_NAMAKEGIATAN' => $post->ID_NAMAKEGIATAN,   
            'URAIAN_TUJUANKEGIATAN' => $post->URAIAN_TUJUANKEGIATAN,  
            ]);
    
            return redirect('/tujuanKegiatan_view_tujuanKegiatan_'.$post->ID_NAMAKEGIATAN);
    }

    public function hapus($ID_TUJUANKEGIATAN, $ID_NAMAKEGIATAN)
    {
    	DB::table('tujuan_kegiatan')->where('ID_TUJUANKEGIATAN',$ID_TUJUANKEGIATAN)->delete();
	    return redirect('/tujuanKegiatan_view_tujuanKegiatan_'.$ID_NAMAKEGIATAN);
    }

    

}
