@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Rencana Tindak Pengendalian")

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
        Tabel Rencana Tindak Pengendalian
    </div>
    

    <!-- <a href="/daftarResiko_insert_daftarResiko">
	<button type="button" class="btn btn-info float-right" style="float: right; margin-right: 35px"><i class="fas fa-plus"></i> Tambah Data Resiko </button>
	</a> -->

    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr> 
                    <th style="text-align:center">Nama SKPD</th>
                    <th style="text-align:center">Tahun Anggaran</th>   
                    <th style="text-align:center">Nama Kegiatan</th>
                    <th style="text-align:center">Tujuan Kegiatan</th>
                    <th style="text-align:center">Pernyataan Risiko</th>
                    <th style="text-align:center">Uraian Tidak Pengendalian</th>
                    <th style="text-align:center">Target Waktu</th>
                    <th style="text-align:center">Penanggung Jawab</th>
                    <th style="text-align:center">Keterangan</th>
                    <th style="text-align:center">Status</th>
                    <th style="text-align:center">Catatan</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($daftar_resiko as $data)
            <tr>
            <td>
                    @foreach($tujuan_kegiatan as $tujuan1)
                    @if ($tujuan1->ID_TUJUANKEGIATAN === $data->ID_TUJUANKEGIATAN)

                    @foreach($nama_kegiatan as $nama2)
					@if ($nama2->ID_NAMAKEGIATAN === $tujuan1->ID_NAMAKEGIATAN)
					
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
                    @endif
					@endforeach
                    </td>
            <td>
                    @foreach($tujuan_kegiatan as $tuj1)
                    @if ($tuj1->ID_TUJUANKEGIATAN === $data->ID_TUJUANKEGIATAN)

                    @foreach($nama_kegiatan as $nama1)
					@if ($nama1->ID_NAMAKEGIATAN === $tuj1->ID_NAMAKEGIATAN)
					
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
                    @endif
					@endforeach
                    </td>
            <td>
                    @foreach($tujuan_kegiatan as $tuj1)
                    @if ($tuj1->ID_TUJUANKEGIATAN === $data->ID_TUJUANKEGIATAN)

                    @foreach($nama_kegiatan as $nama1)
					@if ($nama1->ID_NAMAKEGIATAN === $tuj1->ID_NAMAKEGIATAN)
					{{$nama1->URAIAN_NAMAKEGIATAN}}
					@endif
					@endforeach 
                    @endif
					@endforeach
                    </td>

                    <td>
                    @foreach($tujuan_kegiatan as $tujuan)
					@if ($tujuan->ID_TUJUANKEGIATAN === $data->ID_TUJUANKEGIATAN)
					{{$tujuan->URAIAN_TUJUANKEGIATAN}}
					@endif
					@endforeach 
                    </td>
                    <td>{{ $data->PERNYATAAN_RESIKO }}</td>
                    <td>{{ $data->URAIAN_RENCANA_TINDAK_PENGENDALIAN }}</td>
                    <td>{{ $data->TARGET_WAKTU }}</td>
                    <td>{{ $data->PENANGGUNGJAWAB }}</td>
                    <td>{{ $data->KETERANGAN2 }}</td>
                    <td>
                        @foreach($status_rtp as $status)
                        @if ($status->ID_STATUS_RTP === $data->ID_STATUS_RTP)
                        {{$status->STATUS}}
                        @endif
                        @endforeach 
                    </td>
                    <td>{{ $data->CATATAN4 }}</td>
                    <td>
                    <a href='/RTP_edit_RTP_{{ $data->ID_DAFTARRESIKO }}'>
					<button type="button" class="btn btn-info"><i class="fas fa-trash"></i>Edit</button>
					</a>
                    @can('konfirmasi-RTP')
                    <a href='/RTP_konfirmasi_RTP_{{ $data->ID_DAFTARRESIKO }}'>
					<button type="button" class="btn btn-primary"><i class="fas fa-trash"></i>Konfirmasi</button>
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