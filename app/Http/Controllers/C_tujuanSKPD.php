<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;


class C_tujuanSKPD extends Controller
{
    public function index()
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        // $sasaran = DB::table('sasaran')->get();
        // $nama_kegiatan = DB::table('nama_kegiatan')->get();
        // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        

        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'tujuan_skpd' => $tujuan_skpd,
            // 'sasaran' => $sasaran,
            // 'nama_kegiatan' => $nama_kegiatan,
            // 'tujuan_kegiatan' => $tujuan_kegiatan,
            'submenu' => '',
        );

        return view('/tujuanSKPD/tambah_view_tujuanSKPD',$data); 
    }

    // public function indexAdmin()
    // {
    //     $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
    //     $user = DB::table('user')->get();
    //     $nama = Auth::user()->name;
    //     $tujuan_skpd = DB::table('tujuan_skpd')->get();
    //     // $sasaran = DB::table('sasaran')->get();
    //     // $nama_kegiatan = DB::table('nama_kegiatan')->get();
    //     // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        

    //     $data = array(
    //         'menu' => 'daftar_tujuan_kegiatan',
    //         'nama' => $nama,
    //         'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
    //         'user' => $user,
    //         'tujuan_skpd' => $tujuan_skpd,
    //         // 'sasaran' => $sasaran,
    //         // 'nama_kegiatan' => $nama_kegiatan,
    //         // 'tujuan_kegiatan' => $tujuan_kegiatan,
    //         'submenu' => '',
    //     );

    //     return view('/tujuanSKPD/view_tujuanSKPD_Admin',$data); 
    // }
    public function insert_tujuanSKPD($ID_DAFTAR) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->where('ID_DAFTAR',$ID_DAFTAR)->get();
        // $tujuan_skpd = DB::table('tujuan_skpd')->where('ID_DAFTAR',$ID_DAFTAR)->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            // 'tujuan_skpd' => $tujuan_skpd,
            'submenu' => '',
           
        );
        return view('tujuanSKPD/tambah_view_tujuanSKPD',$data);
    }

    public function tambah_tujuanSKPD(Request $post)
    {
        DB::table('tujuan_skpd')->insert([    
            'ID_TUJUANSKPD' => $post->ID_TUJUANSKPD,     
            'ID_DAFTAR' => $post->ID_DAFTAR,     
            'URAIAN_TUJUANSKPD' => $post->URAIAN_TUJUANSKPD,     
        ]);

        return redirect('/tujuanSKPD_tambah_view_tujuanSKPD_'.$post->ID_DAFTAR);
    }

    public function view_tujuanSKPD($ID_DAFTAR) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->where('ID_DAFTAR',$ID_DAFTAR)->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->where('ID_DAFTAR',$ID_DAFTAR)->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'submenu' => '',
           
        );
        return view('tujuanSKPD/view_tujuanSKPD',$data);

    }

    public function view_tujuanSKPD_Admin($ID_DAFTAR) 
    {      
        
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->where('ID_DAFTAR',$ID_DAFTAR)->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->where('ID_DAFTAR',$ID_DAFTAR)->get();

        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'submenu' => '',
           
        );
        return view('tujuanSKPD/view_tujuanSKPD_Admin',$data);

    }

    public function edit_tujuanSKPD($ID_DAFTAR) 
    {
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->where('ID_DAFTAR',$ID_DAFTAR)->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->where('ID_DAFTAR',$ID_DAFTAR)->get();

       
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'submenu' => '',
           
        );
        return view('tujuanSKPD/edit_view_tujuanSKPD',$data);
    }

    public function update_tujuanSKPD(Request $post)
    {   
            DB::table('tujuan_skpd')->where('ID_TUJUANSKPD', $post->ID_TUJUANSKPD)->update([    
                'ID_TUJUANSKPD' => $post->ID_TUJUANSKPD,     
                'ID_DAFTAR' => $post->ID_DAFTAR,     
                'URAIAN_TUJUANSKPD' => $post->URAIAN_TUJUANSKPD,     
            ]);
    
            return redirect('/tujuanSKPD_view_tujuanSKPD_'.$post->ID_DAFTAR);
    }


    public function hapus($ID_TUJUANSKPD, $ID_DAFTAR)
        {
            // menghapus data detail_peminjaman berdasarkan id yang dipilih
            DB::table('tujuan_skpd')->where('ID_TUJUANSKPD',$ID_TUJUANSKPD)->delete();
                
            // alihkan halaman ke halaman detail_peminjaman
            return redirect('/tujuanSKPD_view_tujuanSKPD_'.$ID_DAFTAR);
        }

}
