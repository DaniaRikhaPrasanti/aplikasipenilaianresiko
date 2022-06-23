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
                                <h4 class="card-title">Input Data Kegiatan dan Tujuan Kegiatan</h4>
                            </div>
                            <form action="/namaKegiatan_tambah_view_namaKegiatan" method="post" enctype="multipart/form-data">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <!-- <label>Id Daftar Tujuan</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_DAFTAR" class="form-control"
                                                        name="ID_DAFTAR" value="{{$daftar_tujuan_kegiatan[0]->ID_DAFTAR}}" hidden>
                                                </div>

                                                <div class="col-md-4">
                                                    <!-- <label>Tahun Anggaran</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="TAHUN_ANGGARAN" class="form-control"
                                                        name="TAHUN_ANGGARAN" value="{{$daftar_tujuan_kegiatan[0]->TAHUN_ANGGARAN}}" hidden>
                                                </div>

                                               <div class="col-md-4">
                                                    <!-- <label>Nama SKPD</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                @foreach($user as $user)
					                            @if ($user->ID_USER === $daftar_tujuan_kegiatan[0]->ID_USER)
                                                    <input type="text" id="NAMA_SKPD" class="form-control"
                                                        name="NAMA_SKPD" value="{{$user->NAMA_SKPD}}" hidden>
                                                @endif
						                        @endforeach 
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <!-- <label>Id Tujuan SKPD</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_TUJUANSKPD" class="form-control"
                                                        name="ID_TUJUANSKPD" value="{{$tujuan_skpd[0]->ID_TUJUANSKPD}}" hidden>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Tujuan SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                @foreach($tujuan_skpd as $tujuan_skpd)
					                            @if ($tujuan_skpd->ID_TUJUANSKPD === $sasaran[0]->ID_TUJUANSKPD)
                                                    <textarea type="text" id="URAIAN_TUJUANSKPD" class="form-control"
                                                        name="URAIAN_TUJUANSKPD" rows="2" readonly>{{$tujuan_skpd->URAIAN_TUJUANSKPD}} </textarea>
                                                @endif
						                        @endforeach 
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Sasaran</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                @foreach($sasaran as $sasaran)
					                            @if ($sasaran->ID_SASARAN === $sasaran->ID_SASARAN)
                                                    <textarea type="text" id="URAIAN_SASARAN" class="form-control"
                                                        name="URAIAN_SASARAN" rows="2" readonly>{{$sasaran->URAIAN_SASARAN}}</textarea>
                                                @endif
						                        @endforeach 
                                                </div>

                                                <div class="col-md-4">
                                                    <!-- <label>Id Sasaran </label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_SASARAN" class="form-control"
                                                        name="ID_SASARAN" value="{{$sasaran->ID_SASARAN}}" hidden>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Nama Kegiatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="URAIAN_NAMAKEGIATAN" class="form-control"
                                                        name="URAIAN_NAMAKEGIATAN" placeholder="Kegiatan yang mendukung capaian sasaran SKPD"></textarea>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Tujuan Kegiatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="URAIAN_TUJUANKEGIATAN" class="form-control"
                                                        name="URAIAN_TUJUANKEGIATAN" placeholder="Tujuan Kegiatan"></textarea>
                                                </div>
                                            
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Simpan</button>
                                                    <a href='/namaKegiatan_view_namaKegiatan_{{$sasaran->ID_SASARAN}}'>
					                                <button type="button" class="btn btn-info">Selesai</button>
				                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

@endsection


@section('custom_script')
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection