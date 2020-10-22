@extends('template.master')
@section('title','Kurikulum')
@section('user-role')
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Hallo, Admin Kurikulum</h3>
</div>
@endsection
@section('sidebar')
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Absensi KBM</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Absensi KBM</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Absensi Siswa</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Absensi Guru</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">RPP / Silabus</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">RPP / Silabus</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">RPP</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Silabus</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">PJJ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">PJJ</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Materi</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Penyerahan Materi</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Jadwal</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Jadwal</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Jadwal</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Generate Jadwal</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Dashboards</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Dashboards</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Dashboards</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Dashboards</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Dashboards</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Dashboards</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu my-1" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-chalkboard-teacher" style="margin-left:-3px;"></i><span class="kt-menu__link-text" style="margin-left:3px;">Pembagian Kelas</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Dashboards</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa belum berkelas</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Siswa sudah berkelas</span></a></li>
        </ul>
    </div>
</li>

@endsection
@section('content')
<div style="margin-left:30px;margin-top:30px">
    <h2>Ini adalah view dari kurikulum </h2>
</div>
@endsection