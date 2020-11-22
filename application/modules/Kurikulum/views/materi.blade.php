@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button onclick="read()" class="btn btn-success float-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> <strong>Tambah Ruangan</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruang</th>
                        <th>Qr Ruang</th>
                        <th>Tgl Dibuat</th>
                        <th>Tgl Dirubah</th>
                        <th>Download</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Hari Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Ruang/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama Ruangan</label>
                        <input class="form-control" type="text" name="nama_ruang" id="nama_ruang" maxlength="7" minlength="3"></input>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Ruang/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama Ruangan</label>
                        <input class="form-control" type="text" name="nama_ruang" id="nama_ruang-update" maxlength="7" minlength="3"></input>
                        <input class="form-control" type="hidden" name="id_ruang" id="id-update" readonly></input>
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
    function edit(id) {
        $.ajax({
            data: `id=${id}`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Ruang/edit') ?>`,
            dataType: `json`,
            success: (res) => {
                $.each(res, (idx, val) => {
                    $("#nama_ruang-update").val(val.nama_ruang);
                    $("#id-update").val(val.id_ruang);
                });
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
            "url": "<?= base_url('Kurikulum/Ruang/ruang_datatables') ?>",
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