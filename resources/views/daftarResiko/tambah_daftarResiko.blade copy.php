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
                                                    <label>Nama Kegiatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="NAMA_KEGIATAN" class="form-control"
                                                        name="NAMA_KEGIATAN" placeholder="Kegiatan yang mendukung capaian Sasaran SKPD">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Tujuan Kegiatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="TUJUAN_KEGIATAN" class="form-control"
                                                        name="TUJUAN_KEGIATAN" placeholder="Tujuan Kegiatan">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Pernyataan Risiko</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="PERNYATAAN_RESIKO" class="form-control"
                                                        name="PERNYATAAN_RESIKO" placeholder="Uraian risiko yang dapat terjadi">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Dampak</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="DAMPAK" class="form-control"
                                                        name="DAMPAK" placeholder="Uraian dampak yang diakibatkan oleh kemunculan risiko">
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

                <div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<!-- <th style="text-align:center">ID SPT</th> -->
						<th style="text-align:center">Tahun Pendidikan</th>
						<th style="text-align:center">Strata Pendidikan</th>
						<th style="text-align:center">Instansi Pendidikan</th>
						<!-- @can('edit-hapus-pegawai') -->
						<th style="text-align:center" width="15%">Aksi</th>
						<!-- @endcan -->
					</tr>
					</thead>
					<tbody>
					@foreach($daftar_resiko as $data)
					<tr>
					<td>{{ $data->TAHUN_PENDIDIKAN }}</td>
					<td>{{ $data->STRATA_PENDIDIKAN }}</td>
					<td>{{ $data->INSTANSI_PENDIDIKAN }}</td>
					@can('edit-hapus-pegawai')
					<td>
					<a href='/pendidikan/hapus/{{ $data->ID_PENDIDIKAN }}&{{ $data->NIK_PEGAWAI }}'>
					<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					</a>
					</td>  
					@endcan           
					</tr>
					@endforeach
					</tbody>
					<tfoot>
					</tfoot>
				</table>
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