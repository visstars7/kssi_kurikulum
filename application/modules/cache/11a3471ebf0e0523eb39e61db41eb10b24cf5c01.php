;
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button onclick="read()" class="btn btn-success float-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> <strong>Tambah Sesi Pelajaran</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sesi</th>
                        <th>Hari</th>
                        <th>Waktu mulai</th>
                        <th>Waktu selesai</th>
                        <th>Detail</th>
                        <th>Update</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah sesi pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Sesi_pelajaran/insert') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Hari</label>
                        <select name="id_hari" id="hari" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="sesi">
                        <label>Sesi</label>
                        <select name="sesi" id="sesi" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="waktu_mulai">
                        <label>Waktu Mulai</label>
                        <select name="waktu_mulai" id="waktu_mulai" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Waktu Selesai</label>
                        <select name="waktu_selesai" id="waktu_selesai" class="custom-select"></select>
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

<!-- detail modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail sesi pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Sesi_pelajaran/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Hari</label>
                        <select name="hari" id="hari-detail" class="custom-select" disabled></select>
                    </div>
                    <div class="form-group" for="sesi">
                        <label>Sesi</label>
                        <select name="sesi" id="sesi-detail" class="custom-select" disabled></select>
                    </div>
                    <div class="form-group" for="waktu_mulai">
                        <label>Waktu Mulai</label>
                        <select name="waktu_mulai" id="waktu_mulai-detail" class="custom-select" disabled></select>
                    </div>
                    <div class="form-group" for="waktu_mulai">
                        <label>Waktu Mulai</label>
                        <select name="waktu_selesai" id="waktu_selesai-detail" class="custom-select" disabled></select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Tgl Dibuat</label>
                        <input class="form-control" type="text" id="dibuat-detail" readonly>
                    </div>
                    <div class="form-group" for="waktu_update">
                        <label>Tgl Diubah</label>
                        <input class="form-control" type="text" id="update-detail" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Detail sesi pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Sesi_pelajaran/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Hari</label>
                        <select name="id_hari" id="hari-update" class="custom-select"></select>
                        <input name="id_sesi" id="id-sesi-update" type="hidden"></input>
                    </div>
                    <div class="form-group" for="sesi">
                        <label>Sesi</label>
                        <select name="sesi" id="sesi-update" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="waktu_mulai">
                        <label>Waktu Mulai</label>
                        <select name="waktu_mulai" id="waktu_mulai-update" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Waktu Selesai</label>
                        <select name="waktu_selesai" id="waktu_selesai-update" class="custom-select"></select>
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
        // read hari 
        $.ajax({
            data: `tb=tb_hari_pelajaran`,
            type: `post`,
            url: `<?= base_url('Kurikulum/sesi_pelajaran/get') ?>`,
            dataType: `json`,
            success: (res) => {
                var optHari = [];
                $.each(res, (index, value) => {
                    optHari += `<option value="${value.id_hari}">${value.nama_hari}</option>`
                    $("#hari").html(optHari);
                });
            }
        });

        // read sesi
        for (let i = 1; i <= 11; i++) {
            var optSesi = [];
            optSesi += `<option value="${i}">${i}</option>`;
            $("#sesi").append(optSesi);
        }

        // time
        var startTime = [];
        for (let i = 700; i <= 1530; i += 5) {
            if (i.toString().length == 3) {
                date = "0" + i.toString();
                var time = date[0] + date[1] + ":" + date[2] + date[3];
                startTime += `<option value="${time}">${time}</option>`;
                $("#waktu_mulai").html(startTime);
                $("#waktu_selesai").html(startTime);
            } else {
                date = i.toString();
                var time = date[0] + date[1] + ":" + date[2] + date[3];
                startTime += `<option value="${time}">${time}</option>`;
                $("#waktu_mulai").html(startTime);
                $("#waktu_selesai").html(startTime);
            }
        }
        $("#waktu_mulai").select2();
        $("#waktu_selesai").select2();
        $("#hari").select2();
        $("#sesi").select2();
    });


    function detail(id) {
        $.ajax({
            data: `id=${id}&tb=tb_sesi_pelajaran&col=id_sesi&tipe=detail`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Sesi_pelajaran/get_where') ?>`,
            dataType: `json`,
            success: (res) => {
                var val = res[0];
                $("#hari-detail").html(`<option>${val.nama_hari}</option>`);
                $("#sesi-detail").html(`<option>${val.sesi}</option>`);
                $("#waktu_mulai-detail").html(`<option>${val.waktu_mulai}</option>`);
                $("#waktu_selesai-detail").html(`<option>${val.waktu_selesai}</option>`);
                $("#dibuat-detail").val(val.create_at);
                $("#update-detail").val(val.update_at);
            }
        });
    }

    function edit(id) {
        $.ajax({
            data: `id=${id}&tb=tb_sesi_pelajaran&col=id_sesi&tipe=update`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Sesi_pelajaran/get_where') ?>`,
            dataType: `json`,
            success: (res) => {
                var optHari = [];
                var sesi = res['sesi'][0];
                var hari = res['hari'];
                // hari
                $.each(hari, (idx, val) => {
                    if (val.id_hari == sesi.id_hari) {
                        optHari += `<option value="${val.id_hari}" selected>${val.nama_hari}</option>`;
                    } else {
                        optHari += `<option value="${val.id_hari}">${val.nama_hari}</option>`;
                    }
                });
                // read sesi
                for (let i = 1; i <= 11; i++) {
                    var optSesi = [];
                    if (i == sesi.sesi) {
                        optSesi += `<option value="${i}" selected>${i}</option>`;
                    } else {
                        optSesi += `<option value="${i}">${i}</option>`;
                    }
                    $("#sesi-update").append(optSesi);
                }

                // time
                var startTime = [];
                for (let i = 700; i <= 1530; i += 5) {
                    if (i.toString().length == 3) {
                        date = "0" + i.toString();
                        var time = date[0] + date[1] + ":" + date[2] + date[3];
                        if (time == sesi.waktu_mulai) {
                            startTime += `<option value="${time}" selected>${time}</option>`;
                        } else {
                            startTime += `<option value="${time}">${time}</option>`;
                        }
                        $("#waktu_mulai-update").html(startTime);
                        $("#waktu_selesai-update").html(startTime);
                    } else {
                        date = i.toString();
                        var time = date[0] + date[1] + ":" + date[2] + date[3];
                        if (time == sesi.waktu_mulai) {
                            startTime += `<option value="${time}" selected>${time}</option>`;
                        } else {
                            startTime += `<option value="${time}">${time}</option>`;
                        }
                        $("#waktu_mulai-update").html(startTime);
                        $("#waktu_selesai-update").html(startTime);
                    }
                }
                $("#hari-update").html(optHari);
                $("#id-sesi-update").val(id);
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
            "url": "<?= base_url('Kurikulum/Sesi_pelajaran/sesi_datatables') ?>",
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
<?php echo $__env->make('Kurikulum.views.kurikulum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kssi_kurikulum/application/modules/Kurikulum/views/sesi_pelajaran.blade.php ENDPATH**/ ?>