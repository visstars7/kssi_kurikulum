@extends('Perpustakaan.views.perpustakaan')
@section('content')
<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>Ini halaman dashboard</h2>
        </div>
    </div>
</div> -->
<div class="container-fluid">
    <div class="row">
        <form action="<?= base_url('Perpustakaan/testUpload') ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="test">
            <button type="submit">Kirim</button>
        </form>
    </div>
</div>
@endsection;