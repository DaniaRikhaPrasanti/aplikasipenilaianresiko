@extends('layout.mainlayout')

@section('page_title', 'Aplikasi Penilaian Resiko')

@section('custom_css')

@endsection

@section('content')

            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <!-- <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div> -->
            <div class="page-content">
                <div class="row match-height">
                    <div class="col-md-20 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Analisis Risiko</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_ANALISISRESIKO" class="form-control"
                                                        name="ID_ANALISISRESIKO" placeholder="ID User" hidden>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Pernyataan Risiko</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="ID_DAFTARRESIKO">
                                                @foreach ($daftar_resiko as $resiko)
                                                <option value="{{ $resiko->ID_DAFTARRESIKO}}">{{ $resiko->PERNYATAAN_RESIKO}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Skor Kemungkinan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="ID_SKALA_KEMUNGKINAN">
                                                @foreach ($skala_kemungkinan as $skor1)
                                                <option value="{{ $skala_kemungkinan->ID_SKALA_KEMUNGKINAN}}">{{ $skor1->DEFINISI_KEMUNGKINAN}}</option>
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
                                                <option value="{{ $skala_dampak->ID_SKALA_DAMPAK}}">{{ $skor2->DEFINISI_KRITERIA}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <label>Skor Status</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="SKOR_STATUS" class="form-control"
                                                        name="SKOR_STATUS" placeholder="berisi perkalian antara kolom (3) dan kolom (4)">
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
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