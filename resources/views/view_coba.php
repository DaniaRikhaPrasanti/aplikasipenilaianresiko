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
	<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data User</button>
	</a>

    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th style="text-align:center">ID User</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($user as $data)
            <tr>
                    <td>{{ $data->NAMA_COBA }}</td>
            </tr> 
            @endforeach 
            </tbody>
        </table>
    </div>
</div>

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