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
<!-- 
            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div> -->
            <div class="page-content">
                <div class="row match-height">
                    <div class="col-md-20 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Data RTP</h4>
                            </div>
                        <form action="/RTP_update_RTP" method="post" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                        <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">

                                            <div class="col-md-4">
                                                    <!-- <label>ID daftar Resiko</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_DAFTARRESIKO" class="form-control"
                                                        name="ID_DAFTARRESIKO" value="{{ $daftar_resiko[0]->ID_DAFTARRESIKO }}" hidden>
                                                </div>

                                            <div class="col-md-4">
                                                    <!-- <label>ID daftar Resiko</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_TUJUANKEGIATAN" class="form-control"
                                                        name="ID_TUJUANKEGIATAN" value="{{ $daftar_resiko[0]->ID_TUJUANKEGIATAN }}" hidden>
                                                </div>

                                            
                                                <div class="col-md-4">
                                                    <label>Pernyataan Risiko</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="PERNYATAAN_RESIKO" class="form-control"
                                                        name="PERNYATAAN_RESIKO" value="{{$daftar_resiko[0]->PERNYATAAN_RESIKO}}" readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Uraian Tindak Pengendalian</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="URAIAN_RENCANA_TINDAK_PENGENDALIAN" class="form-control"
                                                        name="URAIAN_RENCANA_TINDAK_PENGENDALIAN" value="{{$daftar_resiko[0]->URAIAN_RENCANA_TINDAK_PENGENDALIAN}}">
                                                </div>
                                               
                                                <div class="col-md-4">
                                                    <label>Target Waktu</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="TARGET_WAKTU" class="form-control"
                                                        name="TARGET_WAKTU" value="{{$daftar_resiko[0]->TARGET_WAKTU}}">
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Penanggung Jawab</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="PENANGGUNGJAWAB" class="form-control"
                                                        name="PENANGGUNGJAWAB" value="{{$daftar_resiko[0]->PENANGGUNGJAWAB}}">
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Keterangan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="KETERANGAN2" class="form-control"
                                                        name="KETERANGAN2" value="{{$daftar_resiko[0]->KETERANGAN2}}">
                                                </div>

                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Update</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection


@section('custom_script')
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection