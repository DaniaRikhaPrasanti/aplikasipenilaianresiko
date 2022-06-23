<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_dashboard;
use App\Http\Controllers\C_user;
use App\Http\Controllers\C_skalaKemungkinan;
use App\Http\Controllers\C_skalaDampak;
use App\Http\Controllers\C_daftarKegiatan;
use App\Http\Controllers\C_namaSKPD;
use App\Http\Controllers\C_tujuanSKPD;
use App\Http\Controllers\C_sasaran;
use App\Http\Controllers\C_namaKegiatan;
use App\Http\Controllers\C_tujuanKegiatan;
use App\Http\Controllers\C_daftarResiko;
use App\Http\Controllers\C_analisisResiko;
use App\Http\Controllers\C_RTP;
use App\Http\Controllers\C_realisasiRTP;
use App\Http\Controllers\C_celahPengendalian;
use App\Http\Controllers\C_login;
use Illuminate\Support\Facades\Auth;



;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = array(
        'menu' => 'dashboard',
        // 'nama' => $nama,
        'submenu' => ''
    );

    return view('dashboard',$data);
});

Route::get('/viewlogin', [C_login::class, 'index'])->name('login');
Route::get('/login', [C_login::class, 'getLogin']);
Route::post('/postlogin', [C_login::class, 'postLogin']);
Route::post('/loginSubmit', [C_login::class, 'authenticate']);
Route::get('/logout',function(){
    Auth::logout();
    return  redirect ('/viewlogin');
});


//User
Route::get('/user', [C_user::class, 'index'])->middleware('auth');
Route::get('/user_insert_user', [C_user::class, 'insert_user'])->middleware('auth');
Route::post('/user_tambah_user', [C_user::class, 'tambah_user'])->middleware('auth');
Route::get('/user_edit_user_{ID_USER}', [C_user::class, 'edit_user'])->middleware('auth');
Route::post('/user_update_user', [C_user::class, 'update_user'])->middleware('auth');
Route::get('/user_hapus_{ID_USER}', [C_user::class, 'hapus'])->middleware('auth');

//Skala
Route::get('/view_skala_kemungkinan', [C_skalaKemungkinan::class, 'index'])->middleware('auth');
Route::get('/view_skala_dampak', [C_skalaDampak::class, 'index'])->middleware('auth');

//Daftar Kegiatan (Tabel keseluruhan)
Route::get('/daftarKegiatan', [C_daftarKegiatan::class, 'index'])->middleware('auth');
Route::get('/daftarKegiatan_view_keseluruhan_{ID_DAFTAR}', [C_daftarKegiatan::class, 'view_keseluruhan'])->middleware('auth');
Route::get('/daftarKegiatanadmin', [C_daftarKegiatan::class, 'index1'])->middleware('auth');
Route::get('/daftarKegiatan_insert_daftarKegiatan', [C_daftarKegiatan::class, 'insert_daftarKegiatan'])->middleware('auth');
Route::post('/daftarKegiatan_tambah_daftarKegiatan', [C_daftarKegiatan::class, 'tambah_daftarKegiatan'])->middleware('auth');
Route::get('/daftarKegiatan_edit_daftarKegiatan_{ID_DAFTAR}', [C_daftarKegiatan::class, 'edit_daftarKegiatan'])->middleware('auth');
Route::post('/daftarKegiatan_update_daftarKegiatan', [C_daftarKegiatan::class, 'update_daftarKegiatan'])->middleware('auth');
Route::get('/daftarKegiatan_hapus_{ID_DAFTAR}', [C_daftarKegiatan::class, 'hapus'])->middleware('auth');
Route::get('/daftarKegiatan_generate-docx_{ID_TUJUANKEGIATAN}', [C_daftarKegiatan::class, 'generateDocx'])->middleware('auth');


//Tujuan SKPD
Route::get('/tujuanSKPD', [C_tujuanSKPD::class, 'index'])->middleware('auth');
// Route::get('/tujuanSKPDadmin', [C_tujuanSKPD::class, 'indexAdmin'])->middleware('auth');
Route::get('/tujuanSKPD_tambah_view_tujuanSKPD_{ID_DAFTAR}', [C_tujuanSKPD::class, 'insert_tujuanSKPD'])->middleware('auth');
Route::post('/tujuanSKPD_tambah_view_tujuanSKPD', [C_tujuanSKPD::class, 'tambah_tujuanSKPD'])->middleware('auth');
Route::get('/tujuanSKPD_view_tujuanSKPD_{ID_DAFTAR}', [C_tujuanSKPD::class, 'view_tujuanSKPD'])->middleware('auth');
Route::get('/tujuanSKPD_view_tujuanSKPD_Admin_{ID_DAFTAR}', [C_tujuanSKPD::class, 'view_tujuanSKPD_Admin'])->middleware('auth');
Route::get('/tujuanSKPD_edit_view_tujuanSKPD_{ID_DAFTAR}', [C_tujuanSKPD::class, 'edit_tujuanSKPD'])->middleware('auth');
Route::post('/tujuanSKPD_update_tujuanSKPD', [C_tujuanSKPD::class, 'update_tujuanSKPD'])->middleware('auth');
Route::get('/tujuanSKPD_hapus_{ID_TUJUANSKPD}&{ID_DAFTAR}', [C_tujuanSKPD::class, 'hapus'])->middleware('auth');

//sasaran
Route::get('/sasaran_tambah_view_sasaran_{ID_DAFTAR}', [C_sasaran::class, 'insert_sasaran'])->middleware('auth');
Route::post('/sasaran_tambah_view_sasaran', [C_sasaran::class, 'tambah_sasaran'])->middleware('auth');
Route::get('/sasaran_view_sasaran_{ID_TUJUANSKPD}', [C_sasaran::class, 'view_sasaran'])->middleware('auth');
Route::get('/sasaran_view_sasaranAdmin_{ID_SASARAN}', [C_sasaran::class, 'view_sasaranAdmin'])->middleware('auth');
Route::get('/sasaran_edit_view_sasaran_{ID_SASARAN}', [C_sasaran::class, 'edit_sasaran'])->middleware('auth');
Route::post('/sasaran_update_sasaran', [C_sasaran::class, 'update_sasaran'])->middleware('auth');
Route::get('/sasaran_hapus_{ID_SASARAN}&{ID_TUJUANSKPD}', [C_sasaran::class, 'hapus'])->middleware('auth');

//namaKegiatan
Route::get('/namaKegiatan_tambah_view_namaKegiatan_{ID_DAFTAR}', [C_namaKegiatan::class, 'insert_namaKegiatan'])->middleware('auth');
Route::post('/namaKegiatan_tambah_view_namaKegiatan', [C_namaKegiatan::class, 'tambah_namaKegiatan'])->middleware('auth');
Route::get('/namaKegiatan_view_namaKegiatan_{ID_SASARAN}', [C_namaKegiatan::class, 'view_namaKegiatan'])->middleware('auth');
Route::get('/namaKegiatan_edit_view_namaKegiatan_{ID_KEGIATAN}', [C_namaKegiatan::class, 'edit_namaKegiatan'])->middleware('auth');
Route::post('/namaKegiatan_update_namaKegiatan', [C_namaKegiatan::class, 'update_namaKegiatan'])->middleware('auth');
Route::get('/namaKegiatan_hapus_{ID_KEGIATAN}&{ID_SASARAN}', [C_namaKegiatan::class, 'hapus'])->middleware('auth');

//tujuanKegiatan
Route::get('/tujuanKegiatan_tambah_view_tujuanKegiatan_{ID_DAFTAR}', [C_tujuanKegiatan::class, 'insert_tujuanKegiatan'])->middleware('auth');
Route::post('/tujuanKegiatan_tambah_view_tujuanKegiatan', [C_tujuanKegiatan::class, 'tambah_tujuanKegiatan'])->middleware('auth');
Route::get('/tujuanKegiatan_view_keseluruhan', [C_tujuanKegiatan::class, 'view_keseluruhan'])->middleware('auth');
Route::get('/tujuanKegiatan_view_tujuanKegiatan_{ID_NAMAKEGIATAN}', [C_tujuanKegiatan::class, 'view_tujuanKegiatan'])->middleware('auth');
Route::get('/tujuanKegiatan_edit_view_tujuanKegiatan_{ID_TUJUANKEGIATAN}', [C_tujuanKegiatan::class, 'edit_tujuanKegiatan'])->middleware('auth');
Route::post('/tujuanKegiatan_update_tujuanKegiatan', [C_tujuanKegiatan::class, 'update_tujuanKegiatan'])->middleware('auth');
Route::get('/tujuanKegiatan_hapus_{ID_TUJUANKEGIATAN}&{ID_NAMAKEGIATAN}', [C_tujuanKegiatan::class, 'hapus'])->middleware('auth');


Route::get('/daftarResiko', [C_daftarResiko::class, 'index'])->middleware('auth');
Route::get('/daftarResikoAdmin', [C_daftarResiko::class, 'index1'])->middleware('auth');
Route::get('/daftarResiko_tambah_daftarResiko_{ID_KEGIATAN}', [C_daftarResiko::class, 'insert_daftarResiko'])->middleware('auth');
Route::post('/daftarResiko_tambah_daftarResiko', [C_daftarResiko::class, 'tambah_daftarResiko'])->middleware('auth');
Route::get('/daftarResiko_view_tambah_daftarResiko_{ID_KEGIATAN}', [C_daftarResiko::class, 'view_tambah_daftarResiko'])->middleware('auth');
Route::get('/daftarResiko_edit_daftarResiko_{ID_DAFTARRESIKO}', [C_daftarResiko::class, 'edit_daftarResiko'])->middleware('auth');
Route::post('/daftarResiko_update_daftarResiko', [C_daftarResiko::class, 'update_daftarResiko'])->middleware('auth');
Route::get('/daftarResiko_konfirmasi_daftarResiko_{ID_DAFTARRESIKO}', [C_daftarResiko::class, 'konfirmasi_daftarResiko'])->middleware('auth');
Route::post('/daftarResiko_valid_daftarResiko', [C_daftarResiko::class, 'valid_daftarResiko'])->middleware('auth');
Route::get('/daftarResiko_konfirmasi2_daftarResiko_{ID_DAFTARRESIKO}', [C_daftarResiko::class, 'konfirmasi2_daftarResiko'])->middleware('auth');
Route::post('/daftarResiko_revisi_daftarResiko', [C_daftarResiko::class, 'revisi_daftarResiko'])->middleware('auth');
Route::get('/daftarResiko_generate-docx_{ID_KEGIATAN}', [C_daftarResiko::class, 'generateDocx'])->middleware('auth');

Route::get('/analisisResiko', [C_analisisResiko::class, 'index'])->middleware('auth');
Route::get('/analisisResikoAdmin', [C_analisisResiko::class, 'index1'])->middleware('auth');
Route::get('/analisisResiko_tambah_analisisResiko_{ID_DAFTARRESIKO}', [C_analisisResiko::class, 'insert_analisisResiko'])->middleware('auth');
Route::post('/analisisResiko_tambah_analisisResiko', [C_analisisResiko::class, 'tambah_analisisResiko'])->middleware('auth');
Route::get('/analisisResiko_edit_analisisResiko_{ID_DAFTARRESIKO}', [C_analisisResiko::class, 'edit_analisisResiko'])->middleware('auth');
Route::post('/analisisResiko_update_analisisResiko', [C_analisisResiko::class, 'update_analisisResiko'])->middleware('auth');
Route::get('/analisisResiko_konfirmasi_analisisResiko_{ID_DAFTARRESIKO}', [C_analisisResiko::class, 'konfirmasi_analisisResiko'])->middleware('auth');
Route::post('/analisisResiko_valid_analisisResiko', [C_analisisResiko::class, 'valid_analisisResiko'])->middleware('auth');
Route::get('/analisisResiko_konfirmasi2_analisisResiko_{ID_DAFTARRESIKO}', [C_analisisResiko::class, 'konfirmasi2_analisisResiko'])->middleware('auth');
Route::post('/analisisResiko_revisi_analisisResiko', [C_analisisResiko::class, 'revisi_analisisResiko'])->middleware('auth');
Route::get('/analisisResiko_generate-docx_{ID_KEGIATAN}', [C_analisisResiko::class, 'generateDocx'])->middleware('auth');

Route::get('/RTP', [C_RTP::class, 'index'])->middleware('auth');
Route::get('/RTPAdmin', [C_RTP::class, 'index1'])->middleware('auth');
Route::get('RTP_insert_RTP', [C_RTP::class, 'insert_RTP'])->middleware('auth');
Route::get('/RTP_edit_RTP_{ID_DAFTARRESIKO}', [C_RTP::class, 'edit_RTP'])->middleware('auth');
Route::post('/RTP_update_RTP', [C_RTP::class, 'update_RTP'])->middleware('auth');
Route::get('/RTP_konfirmasi_RTP_{ID_DAFTARRESIKO}', [C_RTP::class, 'konfirmasi_RTP'])->middleware('auth');
Route::post('/RTP_valid_RTP', [C_RTP::class, 'valid_RTP'])->middleware('auth');
Route::get('/RTP_konfirmasi2_RTP_{ID_DAFTARRESIKO}', [C_RTP::class, 'konfirmasi2_RTP'])->middleware('auth');
Route::post('/RTP_revisi_RTP', [C_RTP::class, 'revisi_RTP'])->middleware('auth');


Route::get('/realisasiRTP', [C_realisasiRTP::class, 'index']);
Route::get('realisasiRTP_insert_realisasiRTP', [C_realisasiRTP::class, 'insert_realisasiRTP']);

Route::get('/celahPengendalian', [C_celahPengendalian::class, 'index'])->middleware('auth');
Route::get('/celahPengendalianAdmin', [C_celahPengendalian::class, 'index1'])->middleware('auth');
Route::get('celahPengendalian_insert_celahPengendalian', [C_celahPengendalian::class, 'insert_celahPengendalian'])->middleware('auth');
Route::get('/celahPengendalian_edit_celahPengendalian_{ID_DAFTARRESIKO}', [C_celahPengendalian::class, 'edit_celahPengendalian'])->middleware('auth');
Route::post('/celahPengendalian_update_celahPengendalian', [C_celahPengendalian::class, 'update_celahPengendalian'])->middleware('auth');
Route::get('/celahPengendalian_konfirmasi_celahPengendalian_{ID_DAFTARRESIKO}', [C_celahPengendalian::class, 'konfirmasi_celahPengendalian'])->middleware('auth');
Route::post('/celahPengendalian_valid_celahPengendalian', [C_celahPengendalian::class, 'valid_celahPengendalian'])->middleware('auth');
Route::get('/celahPengendalian_konfirmasi2_celahPengendalian_{ID_DAFTARRESIKO}', [C_celahPengendalian::class, 'konfirmasi2_celahPengendalian'])->middleware('auth');
Route::post('/celahPengendalian_revisi_celahPengendalian', [C_celahPengendalian::class, 'revisi_celahPengendalian'])->middleware('auth');


