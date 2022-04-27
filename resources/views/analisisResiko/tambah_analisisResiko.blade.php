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
                                <h4 class="card-title">Input Data Analisis Risiko</h4>
                            </div>
                            <form action="/analisisResiko_tambah_analisisResiko" method="post" enctype="multipart/form-data">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">   
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <!-- <div class="col-md-4">
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
                                                </div> -->

                                                <!-- <div class="col-md-4">
                                                    <label>ID USER</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="ID_ANALISISRESIKO" class="form-control"
                                                        name="ID_ANALISISRESIKO" placeholder="ID User" hidden>
                                                </div> -->

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
                                                <option value="{{ $skor1->ID_SKALA_KEMUNGKINAN}}">{{ $skor1->DEFINISI_KEMUNGKINAN}}</option>
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
                                                <option value="{{ $skor2->ID_SKALA_DAMPAK}}">{{ $skor2->KRITERIA_DAMPAK}}</option>
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

                                <div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<!-- <th style="text-align:center">ID SPT</th> -->
						<th style="text-align:center">Pernyataan Resiko</th>
						<th style="text-align:center">Skor Kemungkinan</th>
						<th style="text-align:center">Skor Dampak </th>
						<th style="text-align:center">Skor Status </th>
						<!-- @can('edit-hapus-pegawai') -->
						<th style="text-align:center" width="15%">Aksi</th>
						<!-- @endcan -->
					</tr>
					</thead>
					<tbody>
					@foreach($analisis_resiko as $data)
					<tr>
					<td>
                        @foreach ($daftar_resiko as $resiko)
                        @if ($resiko->ID_DAFTARRESIKO === $data->ID_DAFTARRESIKO)
                        {{ $resiko->PERNYATAAN_RESIKO }}
                        @endif
						@endforeach
                    </td>

					<td>
                        @foreach ($skala_kemungkinan as $skala)
                        @if ($skala->ID_SKALA_KEMUNGKINAN === $data->ID_SKALA_KEMUNGKINAN)
                        {{ $skala->SKALA_NILAI }}
                        @endif
						@endforeach
                    </td>

					<td>
                        @foreach ($skala_dampak as $skala1)
                        @if ($skala1->ID_SKALA_DAMPAK === $data->ID_SKALA_DAMPAK)
                        {{ $skala1->SKALA_NILAI_DAMPAK }}
                        @endif
						@endforeach
                    </td>

					<td>{{ $data->SKOR_STATUS }}</td>
					<td>
					<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					</a>
					</td>          
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