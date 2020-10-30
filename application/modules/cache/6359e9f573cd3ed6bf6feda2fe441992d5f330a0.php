<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>;
<?php echo $__env->make('Perpustakaan.views.perpustakaan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kssi_kurikulum/application/modules/Perpustakaan/views/dashboard.blade.php ENDPATH**/ ?>