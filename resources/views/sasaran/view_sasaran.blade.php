@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Data Sasaran SKPD")

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
						<th style="text-align:center" width="40%">Aksi</th>
					</tr>
					</thead>
					<tbody>
                    @foreach($sasaran as $data)
					<tr>
                    <td>
						@foreach($tujuan_skpd as $tujuan)
						@if ($tujuan->ID_TUJUANSKPD === $data->ID_TUJUANSKPD)
						{{$tujuan->URAIAN_TUJUANSKPD}}
						@endif
						@endforeach
						</td>
                    <td>{{ $data->URAIAN_SASARAN }}</td>
                    <td>
					@can('aksi-sasaran')
					<a href='/sasaran_hapus_{{ $data->ID_SASARAN }}&{{ $data->ID_TUJUANSKPD }}'>
					<button type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
					<a href='/sasaran_edit_view_sasaran_{{ $data->ID_SASARAN }}'>
					<button type="button" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></button>
					</a>
					<a href='/namaKegiatan_tambah_view_namaKegiatan_{{ $data->ID_SASARAN }}'>
					<button type="button" class="btn btn-sm btn-info"><i class="bi bi-plus-square"></i> Kegiatan</button>
					</a>
					@endcan
					<a href='/namaKegiatan_view_namaKegiatan_{{ $data->ID_SASARAN }}'>
					<button type="button" class="btn btn-sm btn-info"><i class="fas fa-trash"></i> lihat Kegiatan</button>
					</a>
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