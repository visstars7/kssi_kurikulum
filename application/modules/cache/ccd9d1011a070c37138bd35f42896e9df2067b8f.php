
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> <strong>Tambah E-book</strong></button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah E-book</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?=base_url('Perpustakaan/store') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="mapel" class="col-form-label">Mapel: </label>
                <select name="mapel" id="mapel" class="custom-select">
                    <?php foreach($mapel as $item): ?>
                    <option value="<?= $item['id_mapel'] ?>"><?= $item['nama_mapel'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kelas" class="col-form-label">Kelas: </label>
                <select name="kelas" id="kelas" class="custom-select">
                    <?php foreach($kelas as $item): ?>
                    <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="judul-buku" class="col-form-label">Judul Buku: </label>
                <input type="text" class="form-control" id="judul-buku" name="judul_buku">
            </div>
            <div class="form-group">
                <label for="semester" class="col-form-label">Semester: </label>
                <select name="semester" id="semester" class="custom-select" name="semester">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <label class="col-form-label">Upload cover buku: </label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="cover_buku">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
        </div>    
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success" ><i class="fas fa-paper-plane"></i>Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    $('#kelas').select2();
    $('#table-perpus').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Perpustakaan/ebook_datatable') ?>",
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
<?php echo $__env->make('Perpustakaan.views.perpustakaan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\KKSI\kssi_kurikulum\application\modules/Perpustakaan/views/e_book.blade.php ENDPATH**/ ?>