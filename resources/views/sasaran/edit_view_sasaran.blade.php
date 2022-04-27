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
                                <h4 class="card-title">Edit Data Sasaran</h4>
                            </div>
                        <form action="/sasaran_update_sasaran" method="post" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                        <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">

                                            <div class="col-md-4">
                                                    <!-- <label>Id Tujuan SKPD</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_TUJUANSKPD" class="form-control"
                                                        name="ID_TUJUANSKPD" value="{{$sasaran[0]->ID_TUJUANSKPD}}" hidden>
                                                </div>

                                                <div class="col-md-4">
                                                    <!-- <label>ID sasaran</label> -->
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_SASARAN" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="ID_SASARAN" value="{{$sasaran[0]->ID_SASARAN}}" hidden>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Sasaran SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="URAIAN_SASARAN" class="form-control" class="bi bi-file-earmark-text" rows="4"
                                                        name="URAIAN_SASARAN" value="{{$sasaran[0]->URAIAN_SASARAN}}">
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