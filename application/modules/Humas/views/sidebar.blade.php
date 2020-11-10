@section('user-role')
<div class="d-flex justify-content-start mx-5">
    <h3 style="font-size: 20px;color:#777d9b;margin-top:13%;">Hallo, Admin Humas</h3>
</div>
@endsection
@section('sidebar')
<li class="kt-menu__item my-1 <?= $activeSide == 'dashboard' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Humas') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-tachometer-alt"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
<li class="kt-menu__item my-1 <?= $activeSide == 'dudi_prakerin' ? 'kt-menu__item--open' : false ?>" aria-haspopup="true"><a href="<?= base_url('Humas/dudi-prakerin') ?>" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-user-tie"></i><span class="kt-menu__link-text">DUDI / Prakerin</span></a></li>
@endsection