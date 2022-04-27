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
                <h3>Input Daftar Resiko</h3>
            </div> -->
            <div class="page-content">
                <div class="row match-height">
                    <div class="col-md-20 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Data Daftar Resiko</h4>
                            </div>
                            <form action="/daftarResiko_tambah_daftarResiko" method="post" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">


                                                <div class="col-md-4">
                                                    <label>Tujuan Kegiatan</label>
                                                </div>
                                                
                                                <div class="col-md-8 form-group">
                                                    @foreach($kegiatan as $kegiatan)
                                                    @if ($kegiatan->ID_KEGIATAN === $kegiatan->ID_KEGIATAN)
                                                    <input type="text" id="URAIAN_TUJUANKEGIATAN" class="form-control"
                                                        name="URAIAN_TUJUANKEGIATAN" value="{{$kegiatan->URAIAN_TUJUANKEGIATAN}}" readonly>
                                                <div style="margin-left:-320px; margin-top:15px;">
                                                    <label>Nama Kegiatan</label>
                                                </div>
                                                    <input type="text" id="URAIAN_NAMAKEGIATAN" class="form-control" style="margin-top:-25px;"
                                                        name="URAIAN_NAMAKEGIATAN" value="{{$kegiatan->URAIAN_NAMAKEGIATAN}}" readonly>
                                                    @endif
                                                    @endforeach 
                                                </div>

                                                <!-- <div class="col-md-4">
                                                    <label>Nama Kegiatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    
                                                </div> -->

                        
                                                <div class="col-md-4">
                                                    <!-- <label>Id Tujuan Kegiatan</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_KEGIATAN" class="form-control"
                                                        name="ID_KEGIATAN" value="{{$kegiatan->ID_KEGIATAN}}" hidden>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Pernyataan Risiko</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="PERNYATAAN_RESIKO" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="PERNYATAAN_RESIKO" placeholder="Uraian risiko yang dapat terjadi"></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Dampak</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="DAMPAK_RESIKO" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="DAMPAK_RESIKO" placeholder="Uraian dampak yang diakibatkan oleh kemunculan risiko"></textarea>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Skor Kemungkinan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="ID_SKALA_KEMUNGKINAN">
                                                @foreach ($skala_kemungkinan as $skor1)
                                                <option value="{{ $skor1->ID_SKALA_KEMUNGKINAN}}"> [{{ $skor1->SKALA_NILAI }}] {{ $skor1->DEFINISI_KEMUNGKINAN}} </option>
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
                                                <option value="{{ $skor2->ID_SKALA_DAMPAK}}">[{{ $skor2->SKALA_NILAI_DAMPAK }}]  {{ $skor2->KRITERIA_DAMPAK}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Skor Status</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="SKOR_STATUS" class="form-control"
                                                        name="SKOR_STATUS" placeholder="Berisi perkalian antara kolom (3) dan kolom (4)">
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Pengendalian Yang Sudah Ada</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="PENGENDALIAN_YANG_ADA" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="PENGENDALIAN_YANG_ADA" placeholder="Berisi uraian pengendalian yang sudah ada "></textarea>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Keterangan Pengendalian</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="id_ket">
                                                @foreach ($keterangan as $ket)
                                                <option value="{{ $ket->id_ket}}">{{ $ket->nama_ket}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Pengendalian Yang Masih Dibutuhkan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="YANG_MASIH_DIBUTUHKAN" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="YANG_MASIH_DIBUTUHKAN" placeholder="Berisi uraian pengendalian yang masih dibutuhkan "></textarea>
                                                </div>


                                                <div class="col-md-4">
                                                    <label>Keterangan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="KETERANGAN" class="form-control"
                                                        name="KETERANGAN" placeholder="Opsional"></textarea>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Uraian Tindak Pengendalian</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="URAIAN_RENCANA_TINDAK_PENGENDALIAN" class="form-control"
                                                        name="URAIAN_RENCANA_TINDAK_PENGENDALIAN" ></textarea>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Target Waktu</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="TARGET_WAKTU" class="form-control"
                                                        name="TARGET_WAKTU"></textarea>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Penanggung Jawab</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea type="text" id="PENANGGUNGJAWAB" class="form-control"
                                                        name="PENANGGUNGJAWAB"></textarea>
                                                </div>

                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <a href='/'>
						                            <button type="button" class="btn btn-info"><i class="fas fa-edit"></i> Selesai</button>
						                            </a>
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