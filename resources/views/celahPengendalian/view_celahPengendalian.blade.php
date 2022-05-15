@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","IDENTIFIKASI CELAH PENGENDALIAN")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Tambah Data Daftar Resiko</li>
@endsection

@section("custom_css")
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
@endsection

@section("content")
<div class="card">
    <div class="card-header">
        Tabel Data IDENTIFIKASI CELAH PENGENDALIAN
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th rowspan="3" scope="rowgroup" style="text-align:center">Nama SKPD</th>
					<th rowspan="3" scope="rowgroup" style="text-align:center">Tahun Anggaran</th>
					<th rowspan="3" scope="rowgroup" style="text-align:center">Nama Kegiatan</th>
					<th rowspan="3" scope="rowgroup" style="text-align:center">Risiko</th>
					<th colspan="3" scope="colgroup" style="text-align:center">Pengendalian</th>
					<th rowspan="3" scope="rowgroup" style="text-align:center">Keterangan</th>
                    <th rowspan="3" scope="rowgroup" style="text-align:center">Status</th>
                    <th rowspan="3" scope="rowgroup" style="text-align:center">Catatan</th>
					<th rowspan="3" scope="rowgroup" style="text-align:center" width="15%">Aksi</th>
                </tr>    
                <tr>
					<th colspan="2" scope="colgroup" style="text-align:center">Yang sudah ada</th>
					<th rowspan="2" scope="rowgroup" style="text-align:center">Yang masih dibutuhkan</th>
                </tr>    

                <tr>
					<th style="text-align:center">Uraian</th>
					<th style="text-align:center">E/ KE/ TE</th>
					<!-- <th style="text-align:center">Penanggung Jawab</th>
					<th style="text-align:center">Uraian</th>
					<th style="text-align:center">Realisasi Waktu</th>
					<th style="text-align:center">Pelaksana</th> -->
				</tr>
            </thead>
            <tbody>
            @foreach($daftar_resiko as $data)
            <tr>
            <td>
            @foreach($kegiatan as $nama2)
					@if ($nama2->ID_KEGIATAN === $data->ID_KEGIATAN)
					
                    @foreach($sasaran as $sas2)
					@if ($sas2->ID_SASARAN === $nama2->ID_SASARAN)

                    @foreach($tujuan_skpd as $tujuan2)
					@if ($tujuan2->ID_TUJUANSKPD === $sas2->ID_TUJUANSKPD)

                    @foreach($daftar_tujuan_kegiatan as $daftar1)
					@if ($daftar1->ID_DAFTAR === $tujuan2->ID_DAFTAR)

                    @foreach($user as $us1)
					@if ($us1->ID_USER === $daftar1->ID_USER)
                    {{$us1->NAMA_SKPD}}
                   

					@endif
					@endforeach 
                    @endif
					@endforeach
					@endif
					@endforeach 
                    @endif
					@endforeach
                    @endif
					@endforeach
                </td>
                <td>
                @foreach($kegiatan as $nama1)
					@if ($nama1->ID_KEGIATAN === $data->ID_KEGIATAN)
					
                    @foreach($sasaran as $sas1)
					@if ($sas1->ID_SASARAN === $nama1->ID_SASARAN)

                    @foreach($tujuan_skpd as $tuj2)
					@if ($tuj2->ID_TUJUANSKPD === $sas1->ID_TUJUANSKPD)

                    @foreach($daftar_tujuan_kegiatan as $daftar)
					@if ($daftar->ID_DAFTAR === $tuj2->ID_DAFTAR)
                    {{$daftar->TAHUN_ANGGARAN}}

					@endif
					@endforeach 
                    @endif
					@endforeach
					@endif
					@endforeach 
                    @endif
					@endforeach
                </td>
                <td>
                    @foreach($kegiatan as $tujuan)
					@if ($tujuan->ID_KEGIATAN === $data->ID_KEGIATAN)
					{{$tujuan->URAIAN_NAMAKEGIATAN}}
					@endif
					@endforeach 
                    </td>
                    <td>{{ $data->PERNYATAAN_RESIKO }}</td>     
                    <td>{{ $data->PENGENDALIAN_YANG_ADA }}</td>
                    <td>

                    @foreach($keterangan as $ket)
					@if ($ket->id_ket === $data->id_ket)
					{{$ket->nama_ket}}
					@endif
					@endforeach 
                </td>
                    <td>{{ $data->YANG_MASIH_DIBUTUHKAN }}</td>
                    <td>{{ $data->KETERANGAN }}</td>
                    <td>
                        @foreach($status_pengendalian as $status)
                        @if ($status->ID_STATUS_PENGENDALIAN === $data->ID_STATUS_PENGENDALIAN)
                        {{$status->STATUS}}
                        @endif
                        @endforeach 
                    </td>
                    <td>{{ $data->CATATAN3 }}</td>
                   
                    <td>
                    <a href='/celahPengendalian_edit_celahPengendalian_{{ $data->ID_DAFTARRESIKO }}'>
					<button type="button" class="btn btn-sm btn-info"><i class="bi bi-pencil-square"></i></button>
					</a>
                    @can('konfirmasi-celahPengendalian')
                    <a href='/celahPengendalian_konfirmasi_celahPengendalian_{{ $data->ID_DAFTARRESIKO }}'>
					<button type="button" class="btn btn-sm btn-primary"><i class="fas fa-trash"></i>Konfirmasi</button>
                    @endcan
					</a>
                    </td>
            </tr> 
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 

@section("scripts")
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection   