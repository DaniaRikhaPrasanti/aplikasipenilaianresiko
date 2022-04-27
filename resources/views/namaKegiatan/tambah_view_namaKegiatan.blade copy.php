@extends('layout.mainlayout')

@section('page_title', 'Aplikasi Penilaian Risiko')

@section('custom_css')

@endsection

@section('content')

            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-content">
                <div class="row match-height">
                    <div class="col-md-20 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Data Nama Kegiatan</h4>
                            </div>
                            <form action="/namaKegiatan_tambah_view_namaKegiatan" method="post" enctype="multipart/form-data">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Tahun Anggaran</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="TAHUN_ANGGARAN" class="form-control"
                                                        name="TAHUN_ANGGARAN" value="{{$daftar_tujuan_kegiatan[0]->TAHUN_ANGGARAN}}" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Nama SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="NAMA_SKPD" class="form-control"
                                                        name="NAMA_SKPD" value="{{$user[0]->NAMA_SKPD}}" readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Tujuan SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="URAIAN_TUJUANSKPD" class="form-control"
                                                        name="URAIAN_TUJUANSKPD" value="{{$tujuan_skpd[0]->URAIAN_TUJUANSKPD}}" readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Sasaran</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="URAIAN_SASARAN" class="form-control"
                                                        name="URAIAN_SASARAN" value="{{$sasaran[0]->URAIAN_SASARAN}}" readonly>
                                                </div>

                                                <!-- <div class="col-md-4">
                                                    <label>Tujuan SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="ID_TUJUANSKPD">
                                                @foreach ($tujuan_skpd as $tujuan)
                                                <option value="{{ $tujuan->ID_TUJUANSKPD}}">{{ $tujuan->URAIAN_TUJUANSKPD}}</option>
                                                @endforeach
                                                </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Sasaran SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="ID_SASARAN">
                                                @foreach ($sasaran as $sas)
                                                <option value="{{ $sas->ID_SASARAN}}">{{ $sas->URAIAN_SASARAN}}</option>
                                                @endforeach
                                                </select>
                                                </div> -->

                                                <div class="col-md-4">
                                                    <label>Nama Kegiatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="URAIAN_NAMAKEGIATAN" class="form-control"
                                                        name="URAIAN_NAMAKEGIATAN" placeholder="Kegiatan yang mendukung capaian sasaran SKPD">
                                                </div>
                                            
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Simpan</button>
                                                    <a href='/namaKegiatan_view_namaKegiatan_{{$daftar_tujuan_kegiatan[0]->ID_DAFTAR}}'>
					                                <button type="button" class="btn btn-info">Selesai</button>
				                                    </a>

                                                    <!-- <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

        <div class="card">
            <div class="table-responsive">  
                <div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<!-- <th style="text-align:center">ID SPT</th> -->
						<!-- <th style="text-align:center">Tujuan SKPD</th>
						<th style="text-align:center">Sasaran</th> -->
						<th style="text-align:center">Nama Kegiatan</th>
						<th style="text-align:center" width="15%">Aksi</th>
					</tr>
					</thead>
					<tbody>
                    @foreach($kegiatan as $data)
					<tr>
                    <!-- <td>
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
						</td> -->
                    <td>{{ $data->URAIAN_NAMAKEGIATAN }}</td>
                    <td>
					<a href='/namaKegiatan_hapus_{{ $data->ID_NAMAKEGIATAN }}&{{ $data->ID_SASARAN }}&{{ $sas1->ID_TUJUANSKPD }}'>
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


@section('custom_script')
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection