@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("sub_title","Data Skala Nilai Dampak Terjadinya Risiko")

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
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>Kriteria Dampak</th>
                    <th>Kriteria Definisi Dampak</th>
                    <th>Skala Nilai</th>
                    @can('aksi-dampak')
                    <th>Aksi</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
            @foreach($skala_dampak as $data)
            <tr>
                    <td>{{ $data->KRITERIA_DAMPAK }}</td>
                    <td>{{ $data->DEFINISI_KRITERIA }}</td>
                    <td>{{ $data->SKALA_NILAI_DAMPAK }}</td>
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
</script>
@endsection   