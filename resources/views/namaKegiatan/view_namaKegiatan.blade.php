@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Data Nama Kegiatan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Tambah Data Sasaran SKPD</li>
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
            <div class="table-responsive">  
                <div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<!-- <th style="text-align:center">ID SPT</th> -->
						<th style="text-align:center">Tujuan SKPD</th>
						<th style="text-align:center">Sasaran</th>
						<th style="text-align:center">Nama Kegiatan</th>
						<th style="text-align:center">Tujuan Kegiatan</th>
						<th style="text-align:center" width="20%">Aksi</th>
					</tr>
					</thead>
					<tbody>
                    @foreach($kegiatan as $data)
					<tr>
                    <td>
                    @foreach($sasaran as $sas1)
                    @if ($sas1->ID_SASARAN === $data->ID_SASARAN)

						@foreach($tujuan_skpd as $tujuan)
						@if ($tujuan->ID_TUJUANSKPD === $sas1->ID_TUJUANSKPD)
						{{$tujuan->URAIAN_TUJUANSKPD}}
						@endif
						@endforeach
                        @endif
						@endforeach
						</td>
                    <td>
						@foreach($sasaran as $sas)
						@if ($sas->ID_SASARAN === $data->ID_SASARAN)
						{{$sas->URAIAN_SASARAN}}
						@endif
						@endforeach
						</td>
                    <td>{{ $data->URAIAN_NAMAKEGIATAN }}</td>
                    <td>{{ $data->URAIAN_TUJUANKEGIATAN }}</td>
                    <td>
					@can('aksi-namakegiatan')
					<a href='/namaKegiatan_hapus_{{ $data->ID_KEGIATAN }}&{{ $data->ID_SASARAN }}'>
					<button type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>

					<a href='/namaKegiatan_edit_view_namaKegiatan_{{ $data->ID_KEGIATAN }}'>
					<button type="button" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></button>
					</a>

					<a href='/daftarResiko_tambah_daftarResiko_{{ $data->ID_KEGIATAN  }}'>
					<button type="button" class="btn btn-sm btn-info"><i class="bi bi-plus-square"></i> Daftar Resiko</button>
                    </a>

                    <!-- <a href='/tujuanKegiatan_tambah_view_tujuanKegiatan_{{ $data->ID_KEGIATAN }}'>
					<button type="button" class="btn btn-sm btn-info"><i class="bi bi-plus-square"></i> Tambah Tujuan Kegiatan</button>
					</a> -->
					@endcan
					<!-- <a href='/tujuanKegiatan_view_tujuanKegiatan_{{ $data->ID_KEGIATAN }}'>
					<button type="button" class="btn btn-sm btn-info"><i class="fas fa-trash"></i> lihat Tujuan Kegiatan</button>
					</a> -->
					</td>  
					</tr>
                    @endforeach
					</tbody>
					<tfoot>
					</tfoot>
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