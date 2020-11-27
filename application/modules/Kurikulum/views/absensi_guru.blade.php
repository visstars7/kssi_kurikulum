@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Kelas</th>
                        <th>Nama Ruang</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Status kedatangan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#table').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Kurikulum/Absensi_guru/absensi_guru_datatables') ?>",
            "type": "POST"
        },


        "columnDefs": [{
            "targets": [0],
            "orderable": false,
            "width": 5
        }],

    });
</script>
@endsection