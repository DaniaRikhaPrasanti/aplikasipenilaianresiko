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
                                <h4 class="card-title">Input Data User</h4>
                            </div>
                        <form action="/user_tambah_user" method="post" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                        <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <!-- <div class="col-md-4">
                                                    <label>ID USER</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_USER" class="form-control"
                                                        name="ID_USER" placeholder="ID User">
                                                </div>  -->

                                    
                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="NAMA_SKPD">Nama SKPD</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"  name="NAMA_SKPD"
                                                                    placeholder="Input Nama SKPD"
                                                                    id="NAMA_SKPD">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="USERNAME">Username</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"  name="USERNAME"
                                                                    placeholder="Input Username"
                                                                    id="USERNAME">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-file-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="email">Email</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="email"
                                                                    placeholder="Email" id="email">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="password">Password</label>
                                                            <div class="position-relative">
                                                                <input type="password" class="form-control" name="password"
                                                                    placeholder="Password" id="password">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="KEPALA_SKPD">Kepala SKPD</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="KEPALA_SKPD"
                                                                    placeholder="Input nama kepala SKPD yang menjabat saat ini" id="KEPALA_SKPD">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person-circle"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="NIP_KEPALA">NIP Kepala SKPD</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="NIP_KEPALA"
                                                                    placeholder="Input NIK kepala SKPD yang menjabat saat ini" id="NIP_KEPALA">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person-badge"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                        <label for="ID_ROLE">ROLE</label>
                                                         <div class="position-relative">
                                                <select class="form-control select2" name="ID_ROLE">
                                                @foreach ($role as $datarole)
                                                <option value="{{ $datarole->ID_ROLE}}">{{ $datarole->NAMA_ROLE}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                </div>
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