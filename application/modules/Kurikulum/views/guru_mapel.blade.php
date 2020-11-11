@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button onclick="read()" class="btn btn-success float-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> <strong>Tambah guru mapel</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Nama guru</th>
                        <th>Nama mapel</th>
                        <th>Tgl dibuat</th>
                        <th>Tgl diubah</th>
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

<!-- create modal -->
<div class="modal fade" id="create" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Guru Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Guru_mapel/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama Mapel</label>
                        <select name="id_mapel" id="mapel"></select>
                    </div>
                    <div class="form-group" for="nip">
                        <label>Nama Guru</label>
                        <select name="nip" id="nip" class="custom-select"></select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- update modal -->
<div class="modal fade" id="edit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Guru Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Guru_mapel/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama Mapel</label>
                        <select name="id_mapel" id="mapel-update"></select>
                        <input type="hidden" name="id_guru_mapel" id="id-guru-mapel">
                    </div>
                    <div class="form-group" for="nip">
                        <label>Nama Guru</label>
                        <select name="nip" id="nip-update" class="custom-select"></select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        // mapel
        $.ajax({
            data: `tb=tb_mapel&db=db`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Guru_mapel/get') ?>`,
            dataType: `json`,
            success: (res) => {
                $.each(res, (idx, val) => {
                    $("#mapel").append(`<option value="${val.id_mapel}">${val.nama_mapel}</option>`);
                });
            }
        });

        // Nama guru
        $.ajax({
            data: `tb=guru&db=master`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Guru_mapel/get') ?>`,
            dataType: `json`,
            success: (res) => {
                $.each(res, (idx, val) => {
                    $("#nip").append(`<option value="${val.nip}">${val.nama}</option>`);
                });
            }
        });
        $("#mapel").select2();
        $("#nip").select2();
    });


    function edit(id) {
        $.ajax({
            data: `id=${id}`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Guru_mapel/get_where') ?>`,
            dataType: `json`,
            success: (res) => {
                var mapel = res.mapel;
                var guru = res.guru;
                var guruMapel = res.guru_mapel;
                var optMapel = [];
                var optGuru = [];

                // mapel
                $.each(mapel, (idx, val) => {
                    if (val.id_mapel == guruMapel.id_mapel) {
                        optMapel += `<option value="${val.id_mapel}" selected>${val.nama_mapel}</option>`
                        $("#mapel-update").html(optMapel);
                    } else {
                        optMapel += `<option value="${val.id_mapel}">${val.nama_mapel}</option>`
                        $("#mapel-update").html(optMapel);
                    }
                });

                // guru
                $.each(guru, (idx, val) => {
                    if (val.nip === guruMapel.nip) {
                        optGuru += `<option value="${val.nip}" selected>${val.nama}</option>`;
                        $("#nip-update").html(optGuru);
                    } else {
                        optGuru += `<option value="${val.nip}">${val.nama}</option>`;
                        $("#nip-update").html(optGuru);
                    }
                });

                $("#mapel-update").select2();
                $("#nip-update").select2();
                $("#id-guru-mapel").val(id);

            }
        });
    }

    $('#table').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Kurikulum/Guru_mapel/guru_mapel_datatables') ?>",
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