@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Data Form Analisis Daftar Resiko")

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
        Tabel Analisis Daftar Resiko Kegiatan
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
                    <th style="text-align:center">Skor Kemungkinan</th>
                    <th style="text-align:center">Skor Dampak</th>
                    <th style="text-align:center">Skor Status</th> 
                    <th style="text-align:center">Status</th>
                    <th style="text-align:center">Catatan</th>
                    <th style="text-align:center">Aksi</th>
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

                    <td>
                    @foreach($kegiatan as $tujuan4)
					@if ($tujuan4->ID_KEGIATAN === $data->ID_KEGIATAN)
					{{$tujuan4->URAIAN_TUJUANKEGIATAN}}
					@endif
					@endforeach 
                    </td>

                    <td>{{ $data->PERNYATAAN_RESIKO }}</td>
                    <td>
                        @foreach($skala_kemungkinan as $skala1)
						@if ($skala1->ID_SKALA_KEMUNGKINAN === $data->ID_SKALA_KEMUNGKINAN)
								{{$skala1->SKALA_NILAI}}<br>
						@endif
						@endforeach
                    </td>
                    <td>
                        @foreach($skala_dampak as $skala2)
						@if ($skala2->ID_SKALA_DAMPAK === $data->ID_SKALA_DAMPAK)
								{{$skala2->SKALA_NILAI_DAMPAK}}<br>
						@endif
						@endforeach
                    </td>
                    <td>{{ $data->SKOR_STATUS }}</td>
                    <td>
                        @foreach($status_analisis as $status)
                        @if ($status->ID_STATUS_ANALISIS === $data->ID_STATUS_ANALISIS)
                        @if ($status->ID_STATUS_ANALISIS == 1) <span class="badge bg-success">  valid
                        @elseif ($status->ID_STATUS_ANALISIS == 2) <span class="badge bg-warning"> revisi
                        <!-- {{$status->STATUS}} -->
                        @endif
                        @endif
                        @endforeach 
                    </td>
                    <td>{{ $data->CATATAN2 }}</td>
                    <td>
                    <a href='/analisisResiko_edit_analisisResiko_{{ $data->ID_DAFTARRESIKO }}'>
					<button type="button" class="btn btn-sm btn-info"><i class="bi bi-pencil-square"></i></button>
                    </a>
                    <a href='/analisisResiko_generate-docx_{{ $data->ID_KEGIATAN }}'>
					<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i> Cetak</button>
					</a>
                    @can('konfirmasi-analsisisResiko')
                    <a href='/analisisResiko_konfirmasi_analisisResiko_{{ $data->ID_DAFTARRESIKO }}'>
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