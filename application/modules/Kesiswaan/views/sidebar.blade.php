@section('user-role')
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Hallo, Admin Kesiswaan</h3>
</div>
@endsection
@section('sidebar')
<li class="kt-menu__item my-1 <?= $activeSide == 'pelanggaran' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a target="_blank" href="https://keenthemes.com/keen/preview/demo1/builder.html" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-gavel"></i><span class="kt-menu__link-text">Pelanggaran Siswa</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'absensi_siswa' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a target="_blank" href="https://keenthemes.com/keen/preview/demo1/builder.html" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-calendar-with-a-clock-time-tools"></i><span class="kt-menu__link-text">Absensi Siswa</span></a></li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Pembagian Kelas</span></span></li>
            <li class="kt-menu__item <?= $activeSide == 'belum_berkelas' ? 'kt-menu__item--open' : false ?>" aria-haspopup=" true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item <?= $activeSide == 'sudah_berkelas' ? 'kt-menu__item--open' : false ?>" aria-haspopup=" true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>
@endsection