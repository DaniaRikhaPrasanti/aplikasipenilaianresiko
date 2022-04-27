@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("title","Data User")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Tambah Data Kegiatan</li>
@endsection

@section("custom_css")
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/vendors/iconly/bold.css">
<link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/app.css">
<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
@endsection

@section("content")
<div class="card">
    <div class="card-header">
        Tabel Daftar User
    </div>

    <a href="/user_insert_user">
	<button type="button" class="btn btn-info float-right" style="float: right; margin-right: 35px"><i class="fas fa-plus"></i>  Tambah Data User</button>
	</a>

    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th style="text-align:center">ID User</th>
                    <th style="text-align:center">Nama SKPD</th>
                    <th style="text-align:center">Username</th>
                    <th style="text-align:center">Email</th>
                    <th style="text-align:center">Password</th>
                    <th style="text-align:center">Nama Kepala SKPD</th>
                    <th style="text-align:center">NIP Kepala</th>
                    <th style="text-align:center">Role</th>
                    <th style="text-align:center" width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user as $data)
            <tr>
                    <td>{{ $data->ID_USER }}</td>
                    <td>{{ $data->NAMA_SKPD }}</td>
                    <td>{{ $data->USERNAME }}</td>
                    <td>{{ $data->email }}</td>
                    <!-- <td>{{ $data->password }}</td> -->
                    <td>{{ $data->KEPALA_SKPD }}</td>
                    <td>{{ $data->NIP_KEPALA }}</td>
                    <td>
			        @foreach($role as $datarole)
					@if ($datarole->ID_ROLE === $data->ID_ROLE)
					{{$datarole->NAMA_ROLE}}
					@endif
					@endforeach 
					</td>
                    <td>
					<a href='/user_edit_user_{{ $data->ID_USER }}'>
					<button type="button" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
					</a>

                    <a href='/user_hapus_{{ $data->ID_USER }}'>
					<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> hapus</button>
					</a>

					<!-- <button onclick="confirmDelete('{{ $data->ID_USER }}')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
					</td>           -->
            </tr> 
            @endforeach 
            </tbody>
        </table>
    </div>
</div>
<!-- <div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		<a id="deleteLink">
		<button type="button" class="btn btn-danger">Hapus</button>
		</a>
	</div>
    </div>
  </div>
</div> -->
@endsection 

@section("scripts")
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    // function confirmDelete(id)
	// {
	// 	var link = document.getElementById('deleteLink')
	// 	link.href="/user_hapus_" + id
	// 	$('#deleteUser').modal('show')
    // }

</script>
@endsection   