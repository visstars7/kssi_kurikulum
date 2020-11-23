@section('user-role')
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Perpustakaan</h3>
</div>
@endsection
@section('sidebar')
<li class="kt-menu__item my-1 <?= $activeSide == 'dashboard' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Perpustakaan') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-tachometer-alt"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'e_book' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="e-book" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-book"></i><span class="kt-menu__link-text">E-book</span></a></li>
@endsection