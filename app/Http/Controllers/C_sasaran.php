<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;

use DB;

class C_sasaran extends Controller
{
    public function insert_sasaran($ID_TUJUANSKPD) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->where('ID_TUJUANSKPD',$ID_TUJUANSKPD)->get();
        // $sasaran = DB::table('sasaran')->where('ID_TUJUANSKPD',$ID_TUJUANSKPD)->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            // 'sasaran' => $sasaran,
            'submenu' => '',
           
        );
        return view('/sasaran/tambah_view_sasaran',$data);
    }

    public function tambah_sasaran(Request $post)
    {
        DB::table('sasaran')->insert([
            'ID_SASARAN' => $post->ID_SASARAN,     
            'ID_TUJUANSKPD' => $post->ID_TUJUANSKPD,     
            'URAIAN_SASARAN' => $post->URAIAN_SASARAN,     
        ]);

        return redirect('/sasaran_tambah_view_sasaran_'. $post->ID_TUJUANSKPD); // awalnya post id_tujuan
    }

    public function view_sasaran($ID_TUJUANSKPD) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->where('ID_TUJUANSKPD',$ID_TUJUANSKPD)->get();

        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'submenu' => '',
           
        );
        return view('sasaran/view_sasaran',$data);
    }

    public function view_sasaranAdmin($ID_SASARAN) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->rightjoin('tujuan_skpd','tujuan_skpd.ID_TUJUANSKPD', '=', 'sasaran.ID_ID_TUJUANSKPD')->where('ID_SASARAN',$ID_SASARAN)->get();

        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'submenu' => '',
           
        );
        return view('sasaran/view_sasaranAdmin',$data);
    }

    public function edit_sasaran($ID_SASARAN) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->where('ID_SASARAN',$ID_SASARAN)->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'submenu' => '',
           
        );
        return view('sasaran/edit_view_sasaran',$data);

    }

    public function update_sasaran(Request $post)
    {   
            DB::table('sasaran')->where('ID_SASARAN', $post->ID_SASARAN)->update([    
                'ID_SASARAN' => $post->ID_SASARAN,     
                'ID_TUJUANSKPD' => $post->ID_TUJUANSKPD,     
                'URAIAN_SASARAN' => $post->URAIAN_SASARAN,     
            ]);
    
            return redirect('/sasaran_view_sasaran_'.$post->ID_TUJUANSKPD);
    }

    public function hapus($ID_SASARAN, $ID_TUJUANSKPD)
    {
    	DB::table('sasaran')->where('ID_SASARAN',$ID_SASARAN)->delete();
	    return redirect('/sasaran_view_sasaran_'.$ID_TUJUANSKPD);
    }

}
