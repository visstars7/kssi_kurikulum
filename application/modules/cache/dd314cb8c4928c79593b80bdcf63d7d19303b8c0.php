<?php $__env->startSection('user-role'); ?>
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Hallo, Admin Kurikulum</h3>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<li class="kt-menu__item my-1 <?= $activeSide == 'dashboard' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="https://keenthemes.com/keen/preview/demo1/builder.html" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-tachometer-alt"></i><span class="kt-menu__link-text">Dashboard</span></a> </li>
<li class="kt-menu__item  kt-menu__item--submenu my-1 <?= $activeSide == 'absensi_kbm' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-clipboard-list" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Absensi KBM</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item kt-menu__item--parent <?= $activeSide == 'absensi_kbm' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Absensi KBM</span></span></li>
            <li class="kt-menu__item <?= $activeSide == 'absensi_siswa' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Absensi Siswa</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'absensi_guru' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Absensi Guru</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'jurnal' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Jurnal</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1 <?= $activeSide == 'rpp_silabus' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon far fa-edit" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">RPP / Silabus</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item kt-menu__item--parent <?= $activeSide == 'rpp_silabus' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">RPP / Silabus</span></span></li>
            <li class="kt-menu__item <?= $activeSide == 'rpp' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Kurikulum/rpp') ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">RPP</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'silabus' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Kurikulum/silabus') ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Silabus</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1 <?= $activeSide == 'pjj' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-laptop-code" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">PJJ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item kt-menu__item--parent <?= $activeSide == 'pjj' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">PJJ</span></span></li>
            <li class="kt-menu__item <?= $activeSide == 'materi' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Materi</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'penyerahan_materi' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Penyerahan Materi</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1 <?= $activeSide == 'jadwal' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon far fa-clock" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Jadwal</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item kt-menu__item--parent <?= $activeSide == 'jadwal' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Jadwal</span></span></li>
            <li class="kt-menu__item <?= $activeSide == 'jadwal_menu' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Jadwal</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'ruang' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Ruang</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'hari_pelajaran' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Hari Pelajaran</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'guru_mapel' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Guru Mapel</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'sesi_pelajaran' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Sesi Pelajaran</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'mapel' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Mapel</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item kt-menu__item--submenu my-1 <?= $activeSide == 'mengelola_nilai' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-poll-h" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Mengelola Nilai</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item kt-menu__item--parent <?= $activeSide == 'mengelola_nilai' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Mengelola Nilai</span></span></li>
            <li class="kt-menu__item <?= $activeSide == 'daftar_nilai' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Daftar Nilai</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'pengelola_nilai' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pengelola Nilai</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item my-1 <?= $activeSide == 'e_rapot' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="https://keenthemes.com/keen/preview/demo1/builder.html" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-award"></i><span class="kt-menu__link-text">E-rapot</span></a></li>

<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\kssi_kurikulum\application\modules/Kurikulum/views/sidebar.blade.php ENDPATH**/ ?>