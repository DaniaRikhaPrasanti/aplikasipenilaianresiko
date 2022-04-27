@extends('layout/mainlayout')

@section("page_title","Aplikasi Penilaian Resiko")

@section("sub_title","Data Skala Nilai Kemungkinan Terjadinya Risiko")

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
                    <th>Kriteria Kemungkinan</th>
                    <th>Definisi Kriteria Kemungkinan</th>
                    <th>Skala Nilai</th>
                    @can('aksi-kemungkinan')
                    <th>Aksi</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
            @foreach($skala_kemungkinan as $data)
            <tr>
                    <td>{{ $data->KRITERIA_KEMUNGKINAN }}</td>
                    <td>{{ $data->DEFINISI_KEMUNGKINAN }}</td>
                    <td>{{ $data->SKALA_NILAI }}</td>
                    <td style="text-align:center">
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