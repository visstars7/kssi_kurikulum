@section('user-role')
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Hallo, Admin Kesiswaan</h3>
</div>
@endsection
@section('sidebar')
<li class="kt-menu__item my-1 <?= $activeSide == 'dashboard' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Kesiswaan') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-tachometer-alt"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'pelanggaran_siswa' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Kesiswaan/Pelanggaran-siswa') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-gavel"></i><span class="kt-menu__link-text">Pelanggaran Siswa</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'absensi_siswa' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Kesiswaan/Absensi-siswa') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-calendar-alt"></i><span class="kt-menu__link-text">Absensi Siswa</span></a></li>
<li class="kt-menu__item  kt-menu__item--submenu my-1 <?= $activeSide == 'pembagian_kelas' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent <?= $activeSide == 'pembagian_kelas' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Pembagian Kelas</span></span></li>
            <li class="kt-menu__item <?= $activeSide == 'siswa_belum_berkelas' ? 'kt-menu__item--open' : false ?>" aria-haspopup=" true"><a href="<?= base_url('Kesiswaan/Siswa-belum-berkelas') ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'siswa_sudah_berkelas' ? 'kt-menu__item--open' : false ?>" aria-haspopup=" true"><a href="<?= base_url('Kesiswaan/Siswa-sudah-berkelas') ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>
@endsection