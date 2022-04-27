<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class C_daftarKegiatan extends Controller
{
    public function index()
    {
        $ID_USER = Auth::user()->ID_USER;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->where('ID_USER',$ID_USER)->get();
        $user = DB::table('user')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();    

        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            // 'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            'submenu' => '',
        );

        return view('/daftarKegiatan/view_daftarKegiatan', $data); 
    }

    public function index1()
    {
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
      
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan_admin',
            'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            'submenu' => '',
        );

        return view('/daftarKegiatan/view_daftarKegiatan_Admin',$data); 
    }

    public function view_keseluruhan($ID_DAFTAR) 
    {
        $user = DB::table('user')->get();
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->where('ID_DAFTAR',$ID_DAFTAR)->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->where('ID_DAFTAR',$ID_DAFTAR)->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')->join('sasaran', 'sasaran.ID_SASARAN', '=', 'kegiatan.ID_SASARAN')->join('tujuan_skpd', 'tujuan_skpd.ID_TUJUANSKPD', '=', 'sasaran.ID_TUJUANSKPD')->join('daftar_tujuan_kegiatan', 'daftar_tujuan_kegiatan.ID_DAFTAR', '=', 'tujuan_skpd.ID_DAFTAR')->join('user', 'user.ID_USER', '=', 'daftar_tujuan_kegiatan.ID_USER')-> get();
        // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->join('kegiatan', 'kegiatan.ID_KEGIATAN', '=', 'tujuan_kegiatan.ID_KEGIATAN')->join('sasaran', 'sasaran.ID_SASARAN', '=', 'kegiatan.ID_SASARAN')->join('tujuan_skpd', 'tujuan_skpd.ID_TUJUANSKPD', '=', 'sasaran.ID_TUJUANSKPD')->join('daftar_tujuan_kegiatan', 'daftar_tujuan_kegiatan.ID_DAFTAR', '=', 'tujuan_skpd.ID_DAFTAR')->join('user', 'user.ID_USER', '=', 'daftar_tujuan_kegiatan.ID_USER')->get();
      
        $data = array(
            'menu' => 'view_keseluruhan',
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            // 'tujuan_kegiatan' => $tujuan_kegiatan,
            
        );

        return view('/daftarKegiatan/view_keseluruhan',$data);
    }


    public function insert_daftarKegiatan() 
    { 
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $user = DB::table('user')->get();
       
        // $tujuan_skpd = DB::table('tujuan_skpd')->get();
        // $sasaran = DB::table('sasaran')->get();
        // $kegiatan = DB::table('kegiatan')->get();
        // $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();

        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'nama' => $nama,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'user' => $user,
            // 'tujuan_skpd' => $tujuan_skpd,
            // 'sasaran' => $sasaran,
            // 'kegiatan' => $kegiatan,
            // 'tujuan_kegiatan' => $tujuan_kegiatan,
            'submenu' => '',
           
        );
        return view('/daftarKegiatan/tambah_daftarKegiatan',$data);
    }


    public function tambah_daftarKegiatan(Request $post)
    {  
        DB::table('daftar_tujuan_kegiatan')->insert([
            'ID_DAFTAR' => $post->ID_DAFTAR,
            'ID_USER' => $post->ID_USER,
            'TAHUN_ANGGARAN' => $post->TAHUN_ANGGARAN,   
            'CATATAN' => $post->CATATAN,   
        ]);
        
        return redirect('/daftarKegiatan');
    }

    public function edit_daftarKegiatan($ID_DAFTAR) 
    {
        $nama = Auth::user()->name;
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->where('ID_DAFTAR', $ID_DAFTAR)->get();
        $user = DB::table('user')->get();
    
        $data = array(
            'menu' => 'daftar_tujuan_kegiatan',
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'nama' => $nama,
            'user' => $user,
            'submenu' => ''          
        );
        return view('daftarKegiatan/edit_daftarKegiatan',$data);
    }

    public function update_daftarKegiatan(Request $post)
    {
        DB::table('daftar_tujuan_kegiatan')->where('ID_DAFTAR', $post->ID_DAFTAR)->update([     
            'ID_DAFTAR' => $post->ID_DAFTAR,
            'ID_USER' => $post->ID_USER,
            'TAHUN_ANGGARAN' => $post->TAHUN_ANGGARAN,   
            'CATATAN' => $post->CATATAN,   
        ]);

        return redirect('/daftarKegiatan');
    }


    public function hapus($ID_DAFTAR)
    {
    	DB::table('daftar_tujuan_kegiatan')->where('ID_DAFTAR',$ID_DAFTAR)->delete();
	    return redirect('/daftarKegiatan');
    }

    
    // public function generateDocx($ID_DAFTAR)
    // {

    //     $user = DB::table('user')->get();
    //     $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->join('user', 'user.ID_USER', '=', 'daftar_tujuan_kegiatan.ID_USER')->where('ID_DAFTAR',$ID_DAFTAR)->get();
    //     $tujuan_skpd = DB::table('tujuan_skpd')->get();
    //     $sasaran = DB::table('sasaran')->get();
    //     $kegiatan = DB::table('kegiatan')-> get();
    //     $tujuan_kegiatan = DB::table('tujuan_kegiatan')->get();
    //     $data = array(
    //         'user' => $user,
    //         'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
    //         'tujuan_skpd' => $tujuan_skpd,
    //         'sasaran' => $sasaran,
    //         'kegiatan' => $kegiatan,
    //         'tujuan_kegiatan' => $tujuan_kegiatan,
          
    //     );

       // $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('Templateform1.docx'));
       
      //$templateProcessor->setValue('NAMA_SKPD', $daftar_tujuan_kegiatan[0]->NAMA_SKPD);
        // $templateProcessor->setValue('URAIAN_NAMAKEGIATAN', $tujuan_kegiatan[0]->URAIAN_NAMAKEGIATAN);
        // $templateProcessor->setValue('URAIAN_TUJUANKEGIATAN', $tujuan_kegiatan[0]->URAIAN_TUJUANKEGIATAN);
       // $templateProcessor->setValue('TAHUN_ANGGARAN', $daftar_tujuan_kegiatan[0]->TAHUN_ANGGARAN);
        // $templateProcessor->setValue('URAIAN_TUJUANSKPD', $daftar_tujuan_kegiatan[0]->URAIAN_TUJUANSKPD);
        // $templateProcessor->setValue('URAIAN_SASARAN', $daftar_tujuan_kegiatan[0]->URAIAN_SASARAN);
        // $templateProcessor->setValue('URAIAN_NAMAKEGIATAN', $daftar_tujuan_kegiatan[0]->URAIAN_NAMAKEGIATAN);
        // $templateProcessor->setValue('URAIAN_TUJUANKEGIATAN', $daftar_tujuan_kegiatan[0]->URAIAN_TUJUANKEGIATAN);         
        // $templateProcessor->setValue('NO_KARTU_SUAMI_ISTRI', $pegawai[0]->NO_KARTU_SUAMI_ISTRI);
        // $templateProcessor->setValue('NO_TASPEN', $pegawai[0]->NO_TASPEN);
        // $templateProcessor->setValue('NO_HP', $pegawai[0]->NO_HP);       
        // $templateProcessor->setValue('UNIT_KERJA_PEGAWAI', $pegawai[0]->UNIT_KERJA_PEGAWAI);

       //  $templateProcessor->setValue('ID_RIWAYAT', $pegawai[0]->ID_RIWAYAT);         

        // $replacements = array(
        //     array('nama' => 'Batman', 'customer_address' => 'Gotham City'),
        //     array('customer_name' => 'Superman', 'customer_address' => 'Metropolis'),
        // );
        // $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);
        
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

        // $i =0;
        // $rows1 = [];
      
        // foreach($daftar_resiko as $value1){
            
        //     $i = $i+1;
        //     $row1=(array) $value1;
        //     $row1['i']=$i;
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
        //     array_push($rows1, $row1);
        // }
       

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
       // $templateProcessor->cloneRowAndSetValues('i', $rows1);
        // $templateProcessor->cloneRowAndSetValues('j', $rows2);
        // $templateProcessor->cloneRowAndSetValues('k', $rows3);
        // $templateProcessor->cloneRowAndSetValues('l', $rows4);
        // $templateProcessor->cloneRowAndSetValues('m', $rows5);
        // $templateProcessor->cloneRowAndSetValues('n', $rows6);





       //  setlocale(LC_ALL, 'id_ID');

        // $templateProcessor->setValue('tanggal', strftime("%e %B %Y"));

        // $templateProcessor->saveAs(storage_path('form1.docx'));

        // return response()->download(storage_path('form1.docx'));
    //}

    public function generateDocx($ID_TUJUANKEGIATAN)
    {
        // $pegawai = DB::table('pegawai')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $keluarga = DB::table('keluarga')->leftJoin('status_keluarga', 'status_keluarga.ID_STATUS_KELUARGA', '=', 'keluarga.ID_STATUS_KELUARGA')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $pangkat = DB::table('pangkat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $jabatan = DB::table('jabatan')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $pendidikan = DB::table('pendidikan')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $diklat = DB::table('diklat')->where('NIK_PEGAWAI',$NIK_PEGAWAI)->get();
        // $kenaikan_gaji = DB::table('kenaikan_gaji')->leftJoin('pangkat', 'pangkat.ID_PANGKAT', '=', 'kenaikan_gaji.ID_PANGKAT')->where('kenaikan_gaji.NIK_PEGAWAI',$NIK_PEGAWAI)->get();

        // $spt[0]->NOMOR_SPT
        $user = DB::table('user')->get();
        $daftar_tujuan_kegiatan = DB::table('daftar_tujuan_kegiatan')->get();
        $tujuan_skpd = DB::table('tujuan_skpd')->get();
        $sasaran = DB::table('sasaran')->get();
        $kegiatan = DB::table('kegiatan')-> get();
        $tujuan_kegiatan = DB::table('tujuan_kegiatan')->join('kegiatan', 'kegiatan.ID_KEGIATAN', '=', 'tujuan_kegiatan.ID_KEGIATAN')->join('sasaran', 'sasaran.ID_SASARAN', '=', 'kegiatan.ID_SASARAN')->join('tujuan_skpd', 'tujuan_skpd.ID_TUJUANSKPD', '=', 'sasaran.ID_TUJUANSKPD')->join('daftar_tujuan_kegiatan', 'daftar_tujuan_kegiatan.ID_DAFTAR', '=', 'tujuan_skpd.ID_DAFTAR')->join('user', 'user.ID_USER', '=', 'daftar_tujuan_kegiatan.ID_USER')->where('ID_TUJUANKEGIATAN',$ID_TUJUANKEGIATAN)->get();
        // $daftar_resiko = DB::table('daftar_resiko')->where('ID_TUJUANKEGIATAN',$ID_TUJUANKEGIATAN)->get();
        $data = array(
            'user' => $user,
            'daftar_tujuan_kegiatan' => $daftar_tujuan_kegiatan,
            'tujuan_skpd' => $tujuan_skpd,
            'sasaran' => $sasaran,
            'kegiatan' => $kegiatan,
            'tujuan_kegiatan' => $tujuan_kegiatan,
            // 'daftar_resiko' => $daftar_resiko,
        );

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('Templateform1.docx'));

        $templateProcessor->setValue('TAHUN_ANGGARAN', $tujuan_kegiatan[0]->TAHUN_ANGGARAN);
        $templateProcessor->setValue('NAMA_SKPD', $tujuan_kegiatan[0]->NAMA_SKPD);
        $templateProcessor->setValue('URAIAN_NAMAKEGIATAN', $tujuan_kegiatan[0]->URAIAN_NAMAKEGIATAN);
        $templateProcessor->setValue('URAIAN_TUJUANKEGIATAN', $tujuan_kegiatan[0]->URAIAN_TUJUANKEGIATAN);
        $templateProcessor->setValue('URAIAN_TUJUANSKPD', $tujuan_kegiatan[0]->URAIAN_TUJUANSKPD);
        $templateProcessor->setValue('URAIAN_SASARAN', $tujuan_kegiatan[0]->URAIAN_SASARAN);
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

        // $i =0;
        // $rows1 = [];
      
        // foreach($daftar_resiko as $value1){
            
        //     $i = $i+1;
        //     $row1=(array) $value1;
        //     $row1['i']=$i;
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
            // array_push($rows1, $row1);
        // }
       

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
        // $templateProcessor->cloneRowAndSetValues('i', $rows1);
        // $templateProcessor->cloneRowAndSetValues('j', $rows2);
        // $templateProcessor->cloneRowAndSetValues('k', $rows3);
        // $templateProcessor->cloneRowAndSetValues('l', $rows4);
        // $templateProcessor->cloneRowAndSetValues('m', $rows5);
        // $templateProcessor->cloneRowAndSetValues('n', $rows6);





       //  setlocale(LC_ALL, 'id_ID');

        // $templateProcessor->setValue('tanggal', strftime("%e %B %Y"));

        $templateProcessor->saveAs(storage_path('form1.docx'));

        return response()->download(storage_path('form1.docx'));
    }

}
