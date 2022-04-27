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
                                <h4 class="card-title">Edit Tujuan Kegiatan</h4>
                            </div>
                        <form action="/tujuanKegiatan_update_tujuanKegiatan" method="post" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                        <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">

                                            
                                                <div class="col-md-4">
                                                    <!-- <label>Tujuan Kegiatan</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_TUJUANKEGIATAN" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="ID_TUJUANKEGIATAN" value="{{$tujuan_kegiatan[0]->ID_TUJUANKEGIATAN}}" hidden >
                                                </div>

                                                <div class="col-md-4">
                                                    <!-- <label>ID nama Kegiatan</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_NAMAKEGIATAN" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="ID_NAMAKEGIATAN" value="{{$tujuan_kegiatan[0]->ID_NAMAKEGIATAN}}" hidden>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Tujuan Kegiatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="URAIAN_TUJUANKEGIATAN" class="form-control"
                                                        name="URAIAN_TUJUANKEGIATAN"  value="{{$tujuan_kegiatan[0]->URAIAN_TUJUANKEGIATAN}}">
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