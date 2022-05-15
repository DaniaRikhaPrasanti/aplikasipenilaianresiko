<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class C_celahPengendalian extends Controller
{
    public function index()
    {
        
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->get();
        // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        $daftar_resiko = DB::table('daftar_resiko')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $status_pengendalian = DB::table('status_pengendalian')->get();
        $keterangan = DB::table('keterangan')->get();
        $nama = Auth::user()->name;

    
        $data = array(
            'menu' => 'celah_pengendalian',
            'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            // 'tujuan_kegiatan' => $tujuan_kegiatan,
            'daftar_resiko' => $daftar_resiko,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'status_pengendalian' => $status_pengendalian,
            'keterangan' => $keterangan,
            'submenu' => '',
        );
        return view('/celahPengendalian/view_celahPengendalian',$data); 
    }

    public function edit_celahPengendalian($ID_DAFTARRESIKO) 
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $kegiatan = DB::table('kegiatan')->get();
        // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();
        $nama = Auth::user()->name;

        $data = array(
            'menu' => 'celah_pengendalian',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'kegiatan' => $kegiatan,
            // 'tujuan_kegiatan' => $tujuan_kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'keterangan' => $keterangan,
            'submenu' => '',
           
        );
        return view('celahPengendalian/edit_celahPengendalian',$data);
    }

    public function update_celahPengendalian(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_KEGIATAN' => $post->ID_KEGIATAN,
            'ID_DAFTARRESIKO' => $post->ID_DAFTARRESIKO,
            'PERNYATAAN_RESIKO' => $post->PERNYATAAN_RESIKO,
            // 'DAMPAK_RESIKO' => $post->DAMPAK_RESIKO,
            // 'ID_SKALA_KEMUNGKINAN' => $post->ID_SKALA_KEMUNGKINAN,
            // 'ID_SKALA_DAMPAK' => $post->ID_SKALA_DAMPAK,
            // 'SKOR_STATUS' => $post->SKOR_STATUS,
            'PENGENDALIAN_YANG_ADA' => $post->PENGENDALIAN_YANG_ADA,
            'YANG_MASIH_DIBUTUHKAN' => $post->YANG_MASIH_DIBUTUHKAN,
            'KETERANGAN' => $post->KETERANGAN,
            // 'URAIAN_RENCANA_TINDAK_PENGENDALIAN' => $post->URAIAN_RENCANA_TINDAK_PENGENDALIAN,
            // 'TARGET_WAKTU' => $post->TARGET_WAKTU,
            // 'PENANGGUNGJAWAB' => $post->PENANGGUNGJAWAB,
            // 'KETERANGAN2' => $post->KETERANGAN2,
            'id_ket' => $post->id_ket,
               
            ]);
    
            return redirect('/celahPengendalian');
    }
    public function konfirmasi_celahPengendalian($ID_DAFTARRESIKO) 
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $kegiatan = DB::table('kegiatan')->get();
        // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();
        $status_pengendalian = DB::table('status_pengendalian')->get();
        $nama = Auth::user()->name;


       
        $data = array(
            'menu' => 'celah_pengendalian',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'kegiatan' => $kegiatan,
            // 'tujuan_kegiatan' => $tujuan_kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'keterangan' => $keterangan,
            'status_pengendalian' => $status_pengendalian,
            'submenu' => '',
           
        );
        return view('celahPengendalian/konfirmasi_celahPengendalian',$data);
    }

    public function valid_celahPengendalian(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_STATUS_PENGENDALIAN' => 1,
            // 'CATATAN2' => $post->CATATAN2,
            // 'ID_DAFTARRESIKO' => $post->ID_DAFTARRESIKO,
            // 'PERNYATAAN_RESIKO' => $post->PERNYATAAN_RESIKO,
            // 'DAMPAK_RESIKO' => $post->DAMPAK_RESIKO,
            // 'ID_SKALA_KEMUNGKINAN' => $post->ID_SKALA_KEMUNGKINAN,
            // 'ID_SKALA_DAMPAK' => $post->ID_SKALA_DAMPAK,
            // 'SKOR_STATUS' => $post->SKOR_STATUS,
            // 'PENGENDALIAN_YANG_ADA' => $post->PENGENDALIAN_YANG_ADA,
            // 'YANG_MASIH_DIBUTUHKAN' => $post->YANG_MASIH_DIBUTUHKAN,
            // 'KETERANGAN' => $post->KETERANGAN,
            // 'URAIAN_RENCANA_TINDAK_PENGENDALIAN' => $post->URAIAN_RENCANA_TINDAK_PENGENDALIAN,
            // 'TARGET_WAKTU' => $post->TARGET_WAKTU,
            // 'PENANGGUNGJAWAB' => $post->PENANGGUNGJAWAB,
            // 'KETERANGAN2' => $post->KETERANGAN2,
            // 'id_ket' => $post->id_ket,
               
            ]);
    
            return redirect('/celahPengendalian');
    }

    public function konfirmasi2_celahPengendalian($ID_DAFTARRESIKO) 
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $kegiatan = DB::table('kegiatan')->get();
        // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();
        $status_pengendalian = DB::table('status_pengendalian')->get();
        // $status_analisis = DB::table('status_analisis')->get();
        // $status = DB::table('status')->get();
        $nama = Auth::user()->name;


       
        $data = array(
            'menu' => 'celah_pengendalian',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'kegiatan' => $kegiatan,
            // 'tujuan_kegiatan' => $tujuan_kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'keterangan' => $keterangan,
            'status_pengendalian' => $status_pengendalian,
            'submenu' => '',
           
        );
        return view('celahPengendalian/revisi_celahPengendalian',$data);
    }

    public function revisi_celahPengendalian(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_STATUS_PENGENDALIAN' => 2,
            'CATATAN3' => $post->CATATAN3,
            // 'ID_DAFTARRESIKO' => $post->ID_DAFTARRESIKO,
            // 'PERNYATAAN_RESIKO' => $post->PERNYATAAN_RESIKO,
            // 'DAMPAK_RESIKO' => $post->DAMPAK_RESIKO,
            // 'ID_SKALA_KEMUNGKINAN' => $post->ID_SKALA_KEMUNGKINAN,
            // 'ID_SKALA_DAMPAK' => $post->ID_SKALA_DAMPAK,
            // 'SKOR_STATUS' => $post->SKOR_STATUS,
            // 'PENGENDALIAN_YANG_ADA' => $post->PENGENDALIAN_YANG_ADA,
            // 'YANG_MASIH_DIBUTUHKAN' => $post->YANG_MASIH_DIBUTUHKAN,
            // 'KETERANGAN' => $post->KETERANGAN,
            // 'URAIAN_RENCANA_TINDAK_PENGENDALIAN' => $post->URAIAN_RENCANA_TINDAK_PENGENDALIAN,
            // 'TARGET_WAKTU' => $post->TARGET_WAKTU,
            // 'PENANGGUNGJAWAB' => $post->PENANGGUNGJAWAB,
            // 'KETERANGAN2' => $post->KETERANGAN2,
            // 'id_ket' => $post->id_ket,
               
            ]);
    
            return redirect('/celahPengendalian');
    }
}
