@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button onclick="read()" class="btn btn-success float-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> <strong>Tambah hari aktif</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Hari</th>
                        <th>Tgl Dibuat</th>
                        <th>Tgl Dirubah</th>
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
                <form action="<?= base_url('Kurikulum/Hari_pelajaran/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama hari</label>
                        <select name="nama_hari" id="nama_hari"></select>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Hari Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Hari_pelajaran/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama hari</label>
                        <select name="nama_hari" id="nama_hari-update"></select>
                        <input type="hidden" name="id_hari" id="id_hari">
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
    function read() {
        var hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        var optHari = [];
        $.each(hari, (idx, val) => {
            optHari += `<option value="${val}">${val}</option>`;
        });
        $("#nama_hari").html(optHari);
        $("#nama_hari").select2();
    }


    function edit(id) {
        $.ajax({
            data: `id=${id}`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Hari_pelajaran/get_where') ?>`,
            dataType: 'json',
            success: (res) => {
                console.log(res);
                res = res[0];
                var hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
                var optHari = [];
                $.each(hari, (idx, val) => {
                    if (val === res.nama_hari) {
                        optHari += `<option value="${val}" selected>${val}</option>`;
                    } else {
                        optHari += `<option value="${val}">${val}</option>`;
                    }
                });
                $("#nama_hari-update").html(optHari);
                $("#nama_hari-update").select2();
                $("#id_hari").val(res.id_hari);
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
            "url": "<?= base_url('Kurikulum/Hari_pelajaran/hari_datatables') ?>",
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