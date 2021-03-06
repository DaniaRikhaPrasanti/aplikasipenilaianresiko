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
                                <h4 class="card-title">Edit Data User</h4>
                            </div>
                        <form action="/user_update_user" method="post" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                        <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4" hidden>
                                                    <label>ID USER</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_USER" class="form-control"
                                                        name="ID_USER" value="{{$user[0]->ID_USER}}" hidden>
                                                </div>

                                                <!-- <div class="col-md-4">
                                                    <label>NAMA SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="NAMA_SKPD" class="form-control"
                                                        name="NAMA_SKPD" value="{{$user[0]->NAMA_SKPD}}">
                                                </div> -->

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="NAMA_SKPD">Nama SKPD</label>
                                                            <div class="position-relative">
                                                                <input type="text"  id="NAMA_SKPD" class="form-control"  name="NAMA_SKPD"
                                                                    value="{{$user[0]->NAMA_SKPD}}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <!-- <div class="col-md-4">
                                                    <label>USERNAME</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="USERNAME" class="form-control"
                                                        name="USERNAME" value="{{$user[0]->USERNAME}}">
                                                </div> -->

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="USERNAME">Username</label>
                                                            <div class="position-relative">
                                                                <input type="text" id="USERNAME" class="form-control"  name="USERNAME"
                                                                value="{{$user[0]->USERNAME}}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-file-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <!-- <div class="col-md-4">
                                                    <label>EMAIL</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="email" class="form-control"
                                                        name="email" value="{{$user[0]->email}}">
                                                </div> -->

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="email">Email</label>
                                                            <div class="position-relative">
                                                                <input type="text" id="email" class="form-control" name="email"
                                                                value="{{$user[0]->email}}" >
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <!-- <div class="col-md-4">
                                                    <label>PASSWORD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="password" id="password" class="form-control"
                                                        name="password" value="{{$user[0]->password}}">
                                                </div> -->

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="password">Password</label>
                                                            <div class="position-relative">
                                                                <input type="password" id="password" class="form-control" name="password"
                                                                value="{{$user[0]->password}}" >
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <!-- <div class="col-md-4">
                                                    <label>Kepala SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="KEPALA_SKPD" class="form-control"
                                                        name="KEPALA_SKPD" value="{{$user[0]->KEPALA_SKPD}}">
                                                </div> -->

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="KEPALA_SKPD">Kepala SKPD</label>
                                                            <div class="position-relative">
                                                                <input type="text" id="KEPALA_SKPD" class="form-control" name="KEPALA_SKPD"
                                                                value="{{$user[0]->KEPALA_SKPD}}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person-circle"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <!-- <div class="col-md-4">
                                                    <label>NIP Kepala SKPD</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="NIP_KEPALA" class="form-control"
                                                        name="NIP_KEPALA" value="{{$user[0]->NIP_KEPALA}}">
                                                </div> -->

                                                <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="NIP_KEPALA">NIP Kepala SKPD</label>
                                                            <div class="position-relative">
                                                                <input type="text" id="NIP_KEPALA" class="form-control" name="NIP_KEPALA"
                                                                value="{{$user[0]->NIP_KEPALA}}">
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