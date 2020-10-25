<?php $__env->startSection('title','Humas'); ?>
<?php $__env->startSection('user-role'); ?>
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Hallo, Admin Humas</h3>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<li class="kt-menu__item my-1" aria-haspopup="true"><a target="_blank" href="https://keenthemes.com/keen/preview/demo1/builder.html" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-book"></i><span class="kt-menu__link-text">E-book</span></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div style="margin-left:30px;margin-top:30px">
    <h2>Ini adalah view dari kesiswaan </h2>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kssi_kurikulum/application/modules/Perpustakaan/views/v_perpustakaan.blade.php ENDPATH**/ ?>