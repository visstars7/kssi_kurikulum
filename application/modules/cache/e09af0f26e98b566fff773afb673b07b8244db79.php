<?php $__env->startSection('user-role'); ?>
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Hallo, Admin Perpustakaan</h3>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<li class="kt-menu__item my-1 <?= $activeSide == 'dashboard' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Perpustakaan') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-tachometer-alt"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'e_book' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="e-book" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-book"></i><span class="kt-menu__link-text">E-book</span></a></li>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\kssi_kurikulum\application\modules/Perpustakaan/views/sidebar.blade.php ENDPATH**/ ?>