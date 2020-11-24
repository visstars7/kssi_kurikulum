
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button onclick="read()" class="btn btn-success float-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> <strong>Tambah Materi</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mapel</th>
                        <th>Nama Guru</th>
                        <th>Penugasan Kelas</th>
                        <th>ID Materi</th>
                        <th>Deadline</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Materi/store') ?>" method="post" enctype="multipart/form-data">
                    <!-- nip -->
                    <input type="hidden" name="nip" id="nip">
                    <!-- close nip -->
                    <label for="kelas"><strong>Kelas</strong></label>
                    <div class="form-group">
                        <select name="id_kelas" id="kelas"></select>
                    </div>
                    <div class="form-group mt-4">
                        <label for="keterangan"><strong>Keterangan<strong></label>
                        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <label for="deadline"><strong>Deadline<strong></label>
                        <input type="datetime-local" name="waktu_penyerahan" id="deadline" class="form-control">
                    </div>
                    <label for=""><strong>Tipe materi</strong></label>
                    <div class="form-group" id="materi"></div>
                    <div class="form-group" for="hari">
                        <label>Upload File</label>
                        <input type="radio" name="tipe_file" id="radio1" value="1">
                        <label for="">Links</label>
                        <input type="radio" name="tipe_file" id="radio2" value="2">
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
    $(document).ready(() => {
        $("[name=tipe_file]").on('change', () => {
            if ($("#radio1").prop('checked')) {
                $file = `<div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
                </div>`;
                $("#materi").html($file);
            } else {
                $links = `<input type="text" class="form-control" name="file" placeholder="Link materi anda" required>`
                $("#materi").html($links);
            }
        });
    });

    function read() {
        $.ajax({
            data: `db=master&tb=kelas`,
            url: `<?= base_url('Kurikulum/Materi/get') ?>`,
            type: `post`,
            dataType: `json`,
            success: (res) => {
                var optKelas = [];
                $.each(res, (idx, val) => {
                    optKelas += `<option value="${val.id}">${val.nama}</option>`;
                });
                $("#kelas").html(optKelas);
            }
        });
        $("#kelas").select2();

        // nip from localstorage
        var nip = localStorage.getItem('nip');
        $("#nip").val(nip);
    }

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
            "url": "<?= base_url('Kurikulum/Materi/materi_datatables') ?>",
            "type": "POST"
        },


        "columnDefs": [{
            "targets": [0],
            "orderable": false,
            "width": 5
        }],

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Kurikulum.views.kurikulum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kssi_kurikulum\application\modules/Kurikulum/views/materi.blade.php ENDPATH**/ ?>