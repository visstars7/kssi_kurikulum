<?php $__env->startSection('user-role'); ?>
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Hallo, Super Admin</h3>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<li class="kt-menu__item my-1 <?= $activeSide == 'dashboard' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-tachometer-alt"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'admin_kurikulum' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Kurikulum') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-user"></i><span class="kt-menu__link-text">Admin Kurikulum</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'admin_kesiswaan' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Kesiswaan') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-user"></i><span class="kt-menu__link-text">Admin Kesiswaan</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'admin_humas' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Humas') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-user"></i><span class="kt-menu__link-text">Admin Humas</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'admin_perpustakaan' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Perpustakaan') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-user"></i><span class="kt-menu__link-text">Admin Perpustakaan</span></a></li>
<?php $__env->stopSection(); ?><?php /**PATH /opt/lampp/htdocs/kssi_kurikulum/application/modules/Superadmin/views/sidebar.blade.php ENDPATH**/ ?>