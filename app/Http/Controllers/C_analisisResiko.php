<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class C_analisisResiko extends Controller
{
    public function index()
    {
        $ID_USER = Auth::user()->ID_USER;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->get();   
        $daftar_resiko = DB::table('daftar_resiko')->join('kegiatan', 'kegiatan.ID_KEGIATAN', '=', 'daftar_resiko.ID_KEGIATAN')
        ->join('sasaran', 'sasaran.ID_SASARAN', '=', 'kegiatan.ID_SASARAN')
        ->join('tujuan_skpd', 'tujuan_skpd.ID_TUJUANSKPD', '=', 'sasaran.ID_TUJUANSKPD')
        ->join('daftar_tujuan_kegiatan', 'daftar_tujuan_kegiatan.ID_DAFTAR', '=', 'tujuan_skpd.ID_DAFTAR')
        ->join('user', 'user.ID_USER', '=', 'daftar_tujuan_kegiatan.ID_USER')->where('user.ID_USER',$ID_USER)->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $status_analisis = DB::table('status_analisis')->get();
       
        $data = array(
           
            'menu' => 'analisis_resiko',
            // 'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            'daftar_resiko' => $daftar_resiko,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'status_analisis' => $status_analisis,
            'submenu' => '',
        );

        return view('/analisisResiko/view_analisisResiko',$data); 
    }

    public function index1()
    {
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->get();   
        $daftar_resiko = DB::table('daftar_resiko')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $status_analisis = DB::table('status_analisis')->get();
       
        $data = array(
           
            'menu' => 'analisis_resiko_admin',
            'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            'daftar_resiko' => $daftar_resiko,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'status_analisis' => $status_analisis,
            'submenu' => '',
        );

        return view('/analisisResiko/view_analisisResikoAdmin',$data); 
    }

    public function edit_analisisResiko($ID_DAFTARRESIKO) 
    {
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $kegiatan = DB::table('kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();
        
        $data = array(
            'menu' => 'analisis_resiko',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'kegiatan' => $kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'submenu' => '',
           
        );
        return view('analisisResiko/edit_analisisResiko',$data);
    }

    public function update_analisisResiko(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_KEGIATAN' => $post->ID_KEGIATAN,
            'ID_DAFTARRESIKO' => $post->ID_DAFTARRESIKO,
            'PERNYATAAN_RESIKO' => $post->PERNYATAAN_RESIKO,
            'ID_SKALA_KEMUNGKINAN' => $post->ID_SKALA_KEMUNGKINAN,
            'ID_SKALA_DAMPAK' => $post->ID_SKALA_DAMPAK,
            'SKOR_STATUS' => $post->SKOR_STATUS,
            // 'PENGENDALIAN_YANG_ADA' => $post->PENGENDALIAN_YANG_ADA,
            // 'YANG_MASIH_DIBUTUHKAN' => $post->YANG_MASIH_DIBUTUHKAN,
            // 'KETERANGAN' => $post->KETERANGAN,
            // 'URAIAN_RENCANA_TINDAK_PENGENDALIAN' => $post->URAIAN_RENCANA_TINDAK_PENGENDALIAN,
            // 'TARGET_WAKTU' => $post->TARGET_WAKTU,
            // 'PENANGGUNGJAWAB' => $post->PENANGGUNGJAWAB,
            // 'KETERANGAN2' => $post->KETERANGAN2,
            // 'id_ket' => $post->id_ket,
               
            ]);
    
            return redirect('/analisisResiko');
    }
    
    public function konfirmasi_analisisResiko($ID_DAFTARRESIKO) 
    {
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $kegiatan = DB::table('kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();
        $status_analisis = DB::table('status_analisis')->get();
          
        $data = array(
            'menu' => 'analisis_resiko',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'kegiatan' => $kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'status_analisis' => $status_analisis,
            'submenu' => '',
           
        );
        return view('analisisResiko/konfirmasi_analisisResiko',$data);
    }

    public function valid_analisisResiko(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_STATUS_ANALISIS' => 1,
            ]);
    
            return redirect('/analisisResikoAdmin');
    }

    public function konfirmasi2_analisisResiko($ID_DAFTARRESIKO) 
    {
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $daftar_resiko = DB::table('daftar_resiko')->where('ID_DAFTARRESIKO',$ID_DAFTARRESIKO)->get();
        $kegiatan = DB::table('kegiatan')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $keterangan = DB::table('keterangan')->get();
        $status_analisis = DB::table('status_analisis')->get();
        
       
        $data = array(
            'menu' => 'analisis_resiko',
            'nama' => $nama,
            'daftar_resiko' => $daftar_resiko,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'kegiatan' => $kegiatan,
            'skala_kemungkinan' => $skala_kemungkinan,
            'skala_dampak' => $skala_dampak,
            'status_analisis' => $status_analisis,
            'submenu' => '',
           
        );
        return view('analisisResiko/revisi_analisisResiko',$data);
    }

    public function revisi_analisisResiko(Request $post)
    {   
        DB::table('daftar_resiko')->where('ID_DAFTARRESIKO', $post->ID_DAFTARRESIKO)->update([
            'ID_STATUS_ANALISIS' => 2,
            'CATATAN2' => $post->CATATAN2,
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
    
            return redirect('/analisisResikoAdmin');
    }

    public function generateDocx($ID_KEGIATAN)
    {
        // $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $keluarga = DB::table('keluarga')->leftJoin('status_keluarga', 'status_keluarga.ID_STATUS_KELUARGA', '=', 'keluarga.ID_STATUS_KELUARGA')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $pangkat = DB::table('pangkat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $jabatan = DB::table('jabatan')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $pendidikan = DB::table('pendidikan')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $diklat = DB::table('diklat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $kenaikan_gaji = DB::table('kenaikan_gaji')->leftJoin('pangkat', 'pangkat.ID_PANGKAT', '=', 'kenaikan_gaji.ID_PANGKAT')->where('kenaikan_gaji.NIK_PEGAWAI',$NIK_PEGAWAI)->get();

        $user = DB::table('user')->get();
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->join('sasaran', 'sasaran.ID_SASARAN', '=', 'kegiatan.ID_SASARAN')->join('tujuan_skpd', 'tujuan_skpd.ID_TUJUANSKPD', '=', 'sasaran.ID_TUJUANSKPD')->join('daftar_tujuan_kegiatan', 'daftar_tujuan_kegiatan.ID_DAFTAR', '=', 'tujuan_skpd.ID_DAFTAR')->join('user', 'user.ID_USER', '=', 'daftar_tujuan_kegiatan.ID_USER')->where('ID_KEGIATAN',$ID_KEGIATAN)->get();
        $daftar_resiko = DB::table('daftar_resiko')->join('skala_dampak', 'skala_dampak.ID_SKALA_DAMPAK', '=', 'daftar_resiko.ID_SKALA_DAMPAK')->join('skala_kemungkinan', 'skala_kemungkinan.ID_SKALA_KEMUNGKINAN', '=', 'daftar_resiko.ID_SKALA_KEMUNGKINAN')->where('ID_KEGIATAN',$ID_KEGIATAN)->get();
        $skala_dampak = DB::table('skala_dampak')->get();
        $skala_kemungkinan = DB::table('skala_kemungkinan')->get();
        $data = array(
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'skala_dampak' => $skala_dampak,
            'skala_kemungkinan' => $skala_kemungkinan,
            'daftar_resiko' => $daftar_resiko,
        );

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('Templateform3.docx'));

        $templateProcessor->setValue('NAMA_SKPD', $kegiatan[0]->NAMA_SKPD);
        $templateProcessor->setValue('URAIAN_NAMAKEGIATAN', $kegiatan[0]->URAIAN_NAMAKEGIATAN);
        $templateProcessor->setValue('URAIAN_TUJUANKEGIATAN', $kegiatan[0]->URAIAN_TUJUANKEGIATAN);
        // $templateProcessor->setValue('DAMPAK_RESIKO', $daftar_resiko[0]->DAMPAK_RESIKO);
        // $templateProcessor->setValue('TTL_PEGAWAI', $pegawai[0]->TTL_PEGAWAI);
        // $templateProcessor->setValue('NIP_PEGAWAI', $pegawai[0]->NIP_PEGAWAI);
        // $templateProcessor->setValue('NO_KARTU_PEGAWAI', $pegawai[0]->NO_KARTU_PEGAWAI);         
        // $templateProcessor->setValue('NO_KARTU_SUAMI_ISTRI', $pegawai[0]->NO_KARTU_SUAMI_ISTRI);
        // $templateProcessor->setValue('NO_TASPEN', $pegawai[0]->NO_TASPEN);
        // $templateProcessor->setValue('NO_HP', $pegawai[0]->NO_HP);       
        // $templateProcessor->setValue('UNIT_KERJA_PEGAWAI', $pegawai[0]->UNIT_KERJA_PEGAWAI);

       //  $templateProcessor->setValue('ID_RIWAYAT', $pegawai[0]->ID_RIWAYAT);         

        $replacements = array(
            array('nama' => 'Batman', 'customer_address' => 'Gotham City'),
            array('customer_name' => 'Superman', 'customer_address' => 'Metropolis'),
        );
        $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);
        
        // $replacements = array(
        //     array('kepada' => 'kepada', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
        //     array('kepada' => '', 'i' => '1','nama' => 'sun', 'tugas' => 'penaggunga jawab'),
            
        // );
        // $templateProcessor->cloneRowAndSetValues('nama', $replacements);



        // $n =0;
        // $rows = [];
        // foreach($daftar_resiko as $value){
        //     // echo "$value->uraian_daftar_resiko <br>";
        //     $n = $n+1;
        //     $row=(array) $value;
        //     $row['n']=$n;
        //     $row['daftar_resiko']='';
        //     // var_dump($row);
        //     array_push($rows, $row);
        // }
        // $rows[0]['daftar_resiko']='';

        $i =0;
        $rows1 = [];
      
        foreach($daftar_resiko as $value1){
            
            $i = $i+1;
            $row1=(array) $value1;
            $row1['i']=$i;
           //  $row1['kepada']='';



           //  var_dump($row1);
           //  foreach($pegawai as $peg){
           //      if($peg->NIK_PEGAWAI === $value1->NIK_PEGAWAI){
           //          $row1['nama']=$peg->NAMA_PEGAWAI;
           //          // var_dump($row1);
           //      }
           //  }
           //  foreach($tugas as $tug){
           //      if($tug->ID_TUGAS === $value1->ID_TUGAS){
           //          $row1['PENUGASAN']=$tug->NAMA_TUGAS;
           //          // var_dump($row1);
           //      }
           //  }
            array_push($rows1, $row1);
        }
       

    //     $j =0;
    //     $rows2 = [];
      
    //     foreach($pangkat as $value2){
            
    //         $j = $j+1;
    //         $row2=(array) $value2;
    //         $row2['j']=$j;
    //    array_push($rows2, $row2);
    //     }
    //    //  var_dump($rows2);
    //    //  return;

    //     $k =0;
    //     $rows3 = [];
    //     foreach($jabatan as $value3){
            
    //        $k = $k+1;
    //        $row3=(array) $value3;
    //        $row3['k']=$k;
    //   array_push($rows3, $row3);
    //    }
     
    //    $l =0;
    //     $rows4 = [];
    //     foreach($pendidikan as $value4){
            
    //        $l = $l+1;
    //        $row4=(array) $value4;
    //        $row4['l']=$l;
    //   array_push($rows4, $row4);
    //    }

    //    $m =0;
    //     $rows5 = [];
    //     foreach($diklat as $value5){
            
    //        $m = $m+1;
    //        $row5=(array) $value5;
    //        $row5['m']=$m;
    //   array_push($rows5, $row5);
    //    }
      
    //    $n =0;
    //     $rows6 = [];
    //     foreach($kenaikan_gaji as $value6){
            
    //        $n = $n+1;
    //        $row6=(array) $value6;
    //        $row6['n']=$n;
    //   array_push($rows6, $row6);
    //    }
        
       //  $rows1[0]['kepada']='Kepada :';



        // $das = array(
        //     array('dasar' => 'Dasar', 'n' => $n, 'isiDasar' => $value->uraian_dasar),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Pemerintah Republik Indonesia Nomor 12 Tahun 2017'),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Peraturan Menteri Dalam Negeri Nomor 23 Tahun 2020 tentang'),
            // array('dasar' => '', 'n' => '1', 'isiDasar' => 'Program Kerja Pengawasan Tahunan (PKPT) Inspektorat Daerah'), 
        // );
        // dd($das);
        


       //  $templateProcessor->cloneRowAndSetValues('dasar', $rows);
        $templateProcessor->cloneRowAndSetValues('i', $rows1);
        // $templateProcessor->cloneRowAndSetValues('j', $rows2);
        // $templateProcessor->cloneRowAndSetValues('k', $rows3);
        // $templateProcessor->cloneRowAndSetValues('l', $rows4);
        // $templateProcessor->cloneRowAndSetValues('m', $rows5);
        // $templateProcessor->cloneRowAndSetValues('n', $rows6);





       //  setlocale(LC_ALL, 'id_ID');

        // $templateProcessor->setValue('tanggal', strftime("%e %B %Y"));

        $templateProcessor->saveAs(storage_path('form3.docx'));

        return response()->download(storage_path('form3.docx'));
    }


}

