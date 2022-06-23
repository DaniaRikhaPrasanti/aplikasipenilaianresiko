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
    <!-- <div class="card-header">
        Tabel Daftar Kegiatan SKPD Kabupaten Sidoarjo
    </div> -->
    <a href="/daftarKegiatan_insert_daftarKegiatan">
	<button type="button" class="btn btn-info float-right" style="float: right; margin-right: 35px; margin-top: 20px "><i class="fas fa-plus"></i>  Tambah Data </button>
	</a>

    <div class="card-body">
        <table rules="all" class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th style="text-align:center">Tahun Anggaran</th>
                    <!-- <th style="text-align:center">Nama SKPD</th> -->
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
                    <!-- <td>
                        @foreach($user as $us)
						@if ($us->ID_USER === $data->ID_USER)
								{{$us->NAMA_SKPD}}<br>
						@endif
						@endforeach
                    </td> -->
                    <td>
						<a href='/tujuanSKPD_tambah_view_tujuanSKPD_{{ $data->ID_DAFTAR }}'>
                        Input Detail Tujuan
                        </a>
						</td>
                    <!-- <td>
                        @foreach($tujuan_skpd as $tujuan)
						@if ($tujuan->ID_DAFTAR === $data->ID_DAFTAR)
						<a href='/sasaran_tambah_view_sasaran_{{ $tujuan->ID_TUJUANSKPD }}'>
                        Input sasaran
                        </a>
                        @endif
						@endforeach
						</td>
                    <td>
                        @foreach($tujuan_skpd as $tuj1)
						@if ($tuj1->ID_DAFTAR === $data->ID_DAFTAR)

                        @foreach($sasaran as $sas1)
						@if ($sas1->ID_TUJUANSKPD === $tuj1->ID_TUJUANSKPD)
						<a href='/namaKegiatan_view_namaKegiatan_{{ $sas1->ID_SASARAN }}'>
                        Input Nama Kegiatan
                        </a>
                        @endif
						@endforeach
                        @endif
						@endforeach
						</td>
                    <td>
                        @foreach($tujuan_skpd as $tuj2)
						@if ($tuj2->ID_DAFTAR === $data->ID_DAFTAR)

                        @foreach($sasaran as $sas2)
						@if ($sas2->ID_TUJUANSKPD === $tuj2->ID_TUJUANSKPD)

                        @foreach($kegiatan as $nama1)
						@if ($nama1->ID_SASARAN === $sas2->ID_SASARAN)
						<a href='/tujuanKegiatan_tambah_view_tujuanKegiatan_{{ $nama1->ID_KEGIATAN }}'>
                        Input Tujuan Kegiatan
                        </a>
                        @endif
						@endforeach
                        @endif
						@endforeach
                        @endif
						@endforeach
						</td> -->
                    <td>{{ $data->CATATAN }}</td>

                    <td>
						<a href='/daftarKegiatan_edit_daftarKegiatan_{{ $data->ID_DAFTAR }}'>
						<button type="button" class="btn btn-sm btn-info"><i class="bi bi-pencil-square"></i></button>
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