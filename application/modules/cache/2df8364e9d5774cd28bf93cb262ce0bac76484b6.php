
<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i><strong>Tambahkan Hari Pelajaran</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table-perpus" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Hari</th>
                        <th>Nama Hari</th>
                        <th>Edit</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($id_hari as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?php echo $row->id_hari; ?></td>
                            <td><?php echo $row->nama_hari; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>siswa/delete/<?php echo $row->id_hari; ?>" class="btn btn-success" data-toggle="modal" data-target="#edit">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- create modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Hari Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Hari_pelajaran/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Judul Buku: </label>
                        <input type="text" class="form-control" id="judul-buku" name="judul_buku">
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Hari Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Hari_pelajaran/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" id="id-rpp" name="id_rpp">
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Judul Buku: </label>
                        <input type="text" class="form-control" id="judul-buku" name="judul_buku">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Kurikulum.views.kurikulum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kssi_kurikulum\application\modules/Kurikulum/views/hari_pelajaran.blade.php ENDPATH**/ ?>