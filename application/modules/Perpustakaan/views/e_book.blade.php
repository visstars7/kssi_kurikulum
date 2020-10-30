@extends('Perpustakaan.views.perpustakaan')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> <strong>Tambah E-book</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table-perpus" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul buku</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $("#table-perpus").DataTable();
</script>
@endsection