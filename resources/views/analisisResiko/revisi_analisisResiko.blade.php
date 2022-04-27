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
                                <h4 class="card-title">Revisi Data Daftar Resiko</h4>
                            </div>
                        <form action="/analisisResiko_revisi_analisisResiko" method="post" enctype="multipart/form-data">
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
                                                    <label>Skor Kemungkinan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="ID_SKALA_KEMUNGKINAN">
                                                @foreach ($skala_kemungkinan as $skor1)
                                                <option value="{{ $skor1->ID_SKALA_KEMUNGKINAN}}"readonly>{{ $skor1->DEFINISI_KEMUNGKINAN}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Skor Dampak</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="ID_SKALA_DAMPAK">
                                                @foreach ($skala_dampak as $skor2)
                                                <option value="{{ $skor2->ID_SKALA_DAMPAK}}" readonly>{{ $skor2->KRITERIA_DAMPAK}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Skor Status</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="SKOR_STATUS" class="form-control"
                                                        name="SKOR_STATUS" value="{{$daftar_resiko[0]->SKOR_STATUS}}"readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Revisi</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="CATATAN2" class="form-control"
                                                        name="CATATAN2" value="{{$daftar_resiko[0]->CATATAN2}}">
                                                </div>
                        

                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>

                                                

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