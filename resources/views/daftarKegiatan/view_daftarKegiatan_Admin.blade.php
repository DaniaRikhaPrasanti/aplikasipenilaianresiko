@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Data Tujuan Kegiatan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Tambah Data Kegiatan</li>
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
        Tabel Daftar Kegiatan SKPD Kabupaten Sidoarjo
    </div>

    <a href="/daftarKegiatan_insert_daftarKegiatan">
	<button type="button" class="btn btn-info float-right" style="float: right; margin-right: 35px"><i class="fas fa-plus"></i>  Tambah Data </button>
	</a>

    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th style="text-align:center">Tahun Anggaran</th>
                    <th style="text-align:center">Nama SKPD</th>
                    <th style="text-align:center">Detail Tujuan</th>
                    <!-- <th style="text-align:center">Sasaran SKPD</th>
                    <th style="text-align:center">Kegiatan yang mendukung capaian Sasaran SKPD</th>
                    <th style="text-align:center">Tujuan Kegiatan</th> -->
                    <th style="text-align:center">Catatan</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($daftar_tujuan_kegiatan as $data)
            <tr>
                    <td>{{ $data->TAHUN_ANGGARAN }}</td>
                    <td>
                        @foreach($user as $us)
						@if ($us->ID_USER === $data->ID_USER)
								{{$us->NAMA_SKPD}}<br>
						@endif
						@endforeach
                    </td>
                    <td>
						<a href='/tujuanSKPD_view_tujuanSKPD_{{ $data->ID_DAFTAR }}'>
                        Lihat Detail Tujuan
                        </a>
						</td>
                  
                    <td>{{ $data->CATATAN }}</td>

                    <td>
						<a href='/daftarKegiatan_edit_daftarKegiatan_{{ $data->ID_DAFTAR }}'>
						<button type="button" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
						</a>

                        <!-- <a href='/daftarKegiatan_hapus_{{ $data->ID_DAFTAR }}'>
					    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					    </a> -->

                        <a href='/daftarKegiatan_view_keseluruhan_{{ $data->ID_DAFTAR }}'>
						<button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i> Cetak</button>
						</a>
                       
                       
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