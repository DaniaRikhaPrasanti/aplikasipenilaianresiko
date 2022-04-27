<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class C_RTP extends Controller
{
    public function index()
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $nama_kegiatan = DB::table('nama_kegiatan')->get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        $daftar_resiko = DB::table('daftar_resiko')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $status_rtp = DB::table('status_rtp')->get();
        $keterangan = DB::table('keterangan')->get();
    
        $data = array(
            'menu' => 'rtp',
            'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'nama_kegiatan' => $nama_kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            'daftar_resiko' => $daftar_resiko,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'status_rtp' => $status_rtp,
            'keterangan' => $keterangan,
            'submenu' => '',
        );
        return view('/RTP/view_RTP',$data); 
    }

    public function edit_RTP($ID_DAFTARRESIKO) 
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $nama_kegiatan = DB::table('nama_kegiatan')->get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();

       
        $data = array(
            'menu' => 'rtp',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'nama_kegiatan' => $nama_kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'submenu' => '',
           
        );
        return view('RTP/edit_RTP',$data);
    }

    public function update_RTP(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_TUJUANKEGIATAN' => $post->ID_TUJUANKEGIATAN,
            'ID_DAFTARRESIKO' => $post->ID_DAFTARRESIKO,
            'PERNYATAAN_RESIKO' => $post->PERNYATAAN_RESIKO,
            // 'DAMPAK_RESIKO' => $post->DAMPAK_RESIKO,
            // 'ID_SKALA_KEMUNGKINAN' => $post->ID_SKALA_KEMUNGKINAN,
            // 'ID_SKALA_DAMPAK' => $post->ID_SKALA_DAMPAK,
            // 'SKOR_STATUS' => $post->SKOR_STATUS,
            // 'PENGENDALIAN_YANG_ADA' => $post->PENGENDALIAN_YANG_ADA,
            // 'YANG_MASIH_DIBUTUHKAN' => $post->YANG_MASIH_DIBUTUHKAN,
            // 'KETERANGAN' => $post->KETERANGAN,
            'URAIAN_RENCANA_TINDAK_PENGENDALIAN' => $post->URAIAN_RENCANA_TINDAK_PENGENDALIAN,
            'TARGET_WAKTU' => $post->TARGET_WAKTU,
            'PENANGGUNGJAWAB' => $post->PENANGGUNGJAWAB,
            'KETERANGAN2' => $post->KETERANGAN2,
            // 'id_ket' => $post->id_ket,
               
            ]);
    
            return redirect('/RTP');
    }

    public function konfirmasi_RTP($ID_DAFTARRESIKO) 
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $nama_kegiatan = DB::table('nama_kegiatan')->get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();
        $status_rtp = DB::table('status_rtp')->get();

       
        $data = array(
            'menu' => 'rtp',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'nama_kegiatan' => $nama_kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'keterangan' => $keterangan,
            'status_rtp' => $status_rtp,
            'submenu' => '',
           
        );
        return view('RTP/konfirmasi_RTP',$data);
    }

    public function valid_RTP(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_STATUS_RTP' => 1,
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
    
            return redirect('/RTP');
    }

    public function konfirmasi2_RTP($ID_DAFTARRESIKO) 
    {
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $nama = Auth::user()->name;
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $nama_kegiatan = DB::table('nama_kegiatan')->get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();
        $status_rtp = DB::table('status_rtp')->get();
        // $status_analisis = DB::table('status_analisis')->get();
        // $status = DB::table('status')->get();

       
        $data = array(
            'menu' => 'rtp',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'nama_kegiatan' => $nama_kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'keterangan' => $keterangan,
            'status_rtp' => $status_rtp,
            'submenu' => '',
           
        );
        return view('RTP/revisi_RTP',$data);
    }

    public function revisi_RTP(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_STATUS_RTP' => 2,
            'CATATAN4' => $post->CATATAN4,
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
    
            return redirect('/RTP');
    }
}
