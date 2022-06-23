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
                                <h4 class="card-title">Input Data Tujuan SKPD</h4>
                            </div>
                            <form action="/tujuanSKPD_tambah_view_tujuanSKPD" method="post" enctype="multipart/form-data">
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
                                                    <label>Tahun Anggaran</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="TAHUN_ANGGARAN" class="form-control"
                                                        name="TAHUN_ANGGARAN" value="{{$daftar_tujuan_kegiatan[0]->TAHUN_ANGGARAN}}" readonly>
                                                </div>
                                                <!-- <div class="col-md-4">
                                                    <label>Nama SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                @foreach($user as $user)
					                            @if ($user->ID_USER === $daftar_tujuan_kegiatan[0]->ID_USER)
                                                    <input type="text" id="NAMA_SKPD" class="form-control"
                                                        name="NAMA_SKPD" value="{{$user->NAMA_SKPD}}" readonly>
                                                @endif
						                        @endforeach 
                                                </div> -->

                                                <div class="col-md-4">
                                                    <label>Tujuan SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="URAIAN_TUJUANSKPD" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="URAIAN_TUJUANSKPD" placeholder="Tujuan SKPD"></textarea>
                                                </div>
                                            
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Simpan</button>

                                                    <a href='/tujuanSKPD_view_tujuanSKPD_{{ $daftar_tujuan_kegiatan[0]->ID_DAFTAR }}'>
						                            <button type="button" class="btn btn-info"><i class="fas fa-edit"></i> Selesai</button>
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