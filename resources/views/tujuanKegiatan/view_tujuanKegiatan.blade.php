@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Data Tujuan Kegiatan")

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
						<th style="text-align:center">Nama Kegiatan</th>
						<th style="text-align:center">Tujuan Kegiatan</th>
						<th style="text-align:center" width="37%">Aksi</th>
					</tr>
					</thead>
					<tbody>
                    @foreach($tujuan_kegiatan as $data)
					<tr>
					<td>
						@foreach($nama_kegiatan as $nama)
						@if ($nama->ID_NAMAKEGIATAN === $data->ID_NAMAKEGIATAN)
						{{$nama->URAIAN_NAMAKEGIATAN}}
						@endif
						@endforeach
						</td>
                    <td>{{ $data->URAIAN_TUJUANKEGIATAN }}</td>
                    <td>
                    <a href='/tujuanKegiatan_hapus_{{ $data->ID_TUJUANKEGIATAN }}&{{ $data->ID_NAMAKEGIATAN }}'>
					<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					<a href='/tujuanKegiatan_edit_view_tujuanKegiatan_{{ $data->ID_TUJUANKEGIATAN }}'>
					<button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> Edit</button>
					</a>
					<a href='/tujuanKegiatan_view_keseluruhan'>
					<button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> Lihat</button>
					</a>
					<a href='/daftarResiko_tambah_daftarResiko_{{ $data->ID_TUJUANKEGIATAN }}'>
					<button type="button" class="btn btn-info"><i class="fas fa-trash"></i> Tambah Daftar Resiko</button>
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