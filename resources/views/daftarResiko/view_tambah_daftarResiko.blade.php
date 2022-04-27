@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Daftar Resiko")

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

			<!-- <a href="/analisisResiko_tambah_analisisResiko_{ID_TUJUANKEGIATAN}">
            <button type="button" class="btn btn-info float-right" style="float: right; margin-right: 35px"><i class="fas fa-plus"></i>  Analisi Resiko </button>
			<br>    
		</a> -->
			

				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<!-- <th style="text-align:center">ID SPT</th> -->
						<th style="text-align:center">Pernyataan Resiko</th>
						<th style="text-align:center">Dampak</th>
						<th style="text-align:center">Skor Kemungkinan</th>
						<th style="text-align:center">Skor Dampak </th>
						<th style="text-align:center">Skor Status </th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($daftar_resiko as $data)
					<tr>
					<td>{{ $data->PERNYATAAN_RESIKO }}</td>
					<td>{{ $data->DAMPAK_RESIKO }}</td>
					<td>
                        @foreach ($skala_kemungkinan as $skala)
                        @if ($skala->ID_SKALA_KEMUNGKINAN === $data->ID_SKALA_KEMUNGKINAN)
                        {{ $skala->SKALA_NILAI }}
                        @endif
						@endforeach
                    </td>
					<td>
                        @foreach ($skala_dampak as $skala1)
                        @if ($skala1->ID_SKALA_DAMPAK === $data->ID_SKALA_DAMPAK)
                        {{ $skala1->SKALA_NILAI_DAMPAK }}
                        @endif
						@endforeach
                    </td>
					<td>{{ $data->SKOR_STATUS }}</td>
					<td>
					<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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