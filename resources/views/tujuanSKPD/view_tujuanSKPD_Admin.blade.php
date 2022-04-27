@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Daftar Tujuan SKPD")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Data Tujuan SKPD</li>
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
						<th style="text-align:center" width="37%">Aksi</th>
					</tr>
					</thead>
					<tbody>
                    @foreach($tujuan_skpd as $data)
					<tr>
                    <td>{{ $data->URAIAN_TUJUANSKPD }}</td>
                    <td>
					<!-- <a href='/tujuanSKPD_hapus_{{ $data->ID_TUJUANSKPD }}&{{ $data->ID_DAFTAR }}'>
					<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					</a> -->
					<!-- <a href='/tujuanSKPD_edit_view_tujuanSKPD_{{ $data->ID_DAFTAR }}'>
					<button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> Edit</button>
					</a> -->
					<a href='/sasaran_view_sasaran_{{ $data->ID_TUJUANSKPD }}'>
					<button type="button" class="btn btn-info"><i class="fas fa-trash"></i> Lihat sasaran</button>
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