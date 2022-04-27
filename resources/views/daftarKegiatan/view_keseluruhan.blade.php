@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Form 1")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Tujuan Kegiatan</li>
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
      <h4>  TUJUAN KEGIATAN </h4>
    </div>

<div class="card">
            <div class="table-responsive"> 
                <div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>

						<th rowspan="2" scope="rowgroup" style="text-align:center">Tahun Anggaran</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Nama SKPD</th>
						<th colspan="2" scope="colgroup" style="text-align:center">Tujuan SKPD</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Sasaran</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Nama Kegiatan</th>
						<th rowspan="2" scope="rowgroup" style="text-align:center">Tujuan Kegiatan</th>
						<!-- <th style="text-align:center" width="37%">Aksi</th> -->
					</tr>
					<tr>
						<th style="text-align:center; font-weight: bold; border: 1px solid black">Kode Tujuan</th>
						<th style="text-align:center; font-weight: bold; border: 1px solid black; width: 25px">Uraian</th>
					</tr>
					</thead>
					<tbody>
                    @foreach($daftar_tujuan_kegiatan as $data)
					<tr>
					<td>{{ $data->TAHUN_ANGGARAN }}</td>
					<td>
						<table>
							@foreach($user as $us)
							@if ($us->ID_USER === $data->ID_USER)
						<tr>
							<td>{{$us->NAMA_SKPD}}<br></td>
						</tr>
						@endif
						@endforeach
						</table>
                    </td>
	
					<td>	
						@foreach($tujuan_skpd as $tujuann)
						@if ($tujuann->ID_DAFTAR === $data->ID_DAFTAR)
						{{$tujuann->ID_TUJUANSKPD}}<br>
						@endif
						@endforeach
					</td>
	
					<td>
					
						<table>
							
							@foreach($tujuan_skpd as $tujuan)
							@if ($tujuan->ID_DAFTAR === $data->ID_DAFTAR)
						<tr>
							<td>{{$tujuan->URAIAN_TUJUANSKPD}}<br></td>
						</tr>
							@endif
							@endforeach
						</table>
					</td>
					
						<td>
						@foreach($tujuan_skpd as $tuj1)
						@if ($tuj1->ID_DAFTAR === $data->ID_DAFTAR)
                        
						@foreach($sasaran as $sas1)
						@if ($sas1->ID_TUJUANSKPD === $tuj1->ID_TUJUANSKPD)
						{{$sas1->URAIAN_SASARAN}}<br>
						@endif
						@endforeach
						@endif
						@endforeach
						</td>
                    <td >
						@foreach($tujuan_skpd as $tuj2)
						@if ($tuj2->ID_DAFTAR === $data->ID_DAFTAR)

                        @foreach($sasaran as $sas2)
						@if ($sas2->ID_TUJUANSKPD === $tuj2->ID_TUJUANSKPD)

                        @foreach($kegiatan as $nama1)
						@if ($nama1->ID_SASARAN === $sas2->ID_SASARAN)
                        {{$nama1->URAIAN_NAMAKEGIATAN}}<br>

						@endif
						@endforeach
						@endif
						@endforeach
						@endif
						@endforeach
						</td>
                    <td >
						@foreach($tujuan_skpd as $tuj3)
						@if ($tuj3->ID_DAFTAR === $data->ID_DAFTAR)

                        @foreach($sasaran as $sas3)
						@if ($sas3->ID_TUJUANSKPD === $tuj3->ID_TUJUANSKPD)

                        @foreach($kegiatan as $nama1)
						@if ($nama1->ID_SASARAN === $sas3->ID_SASARAN)
                        {{$nama1->URAIAN_TUJUANKEGIATAN}}<br>

						@endif
						@endforeach
						@endif
						@endforeach
						@endif
						@endforeach
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