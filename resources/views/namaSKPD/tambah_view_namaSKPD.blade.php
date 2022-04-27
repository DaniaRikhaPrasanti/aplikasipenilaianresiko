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
                                <h4 class="card-title">Input Data</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                            <form action="/namaSKPD_tambah_view_namaSKPD" method="post" enctype="multipart/form-data">
                                             <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                                                <div class="col-md-4">
                                                    <label>Tahun Anggaran</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="TAHUN_ANGGARAN" class="form-control"
                                                        name="TAHUN_ANGGARAN" placeholder="Tahun Anggaran">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Nama SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                <select class="form-control select2" name="id_user">
                                                @foreach ($user as $datauser)
                                                <option value="{{ $datauser->id_user}}">{{ $datauser->nama_skpd}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">simpan</button>
                                                        <a href='/tujuanSKPD_tambah_view_tujuanSKPD_{{$daftar_tujuan_kegiatan[0]->ID_DAFTAR}}'>
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