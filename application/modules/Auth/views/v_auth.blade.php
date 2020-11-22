<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawsome/css/all.min.css'); ?>">

    <link rel="shortcut icon" href="<?= base_url('assets/img/logo_kurikulum.png') ?>">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="assets/keen/css/pages/login/login-v2.css" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="assets/keen/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/keen/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="assets/keen/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/keen/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/keen/css/skins/brand/navy.css" rel="stylesheet" type="text/css" />
    <link href="assets/keen/css/skins/aside/navy.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    .background-view {
        position: relative;
        widows: 100%;
        min-height: 100vh;
        background: #f5f5f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .background-view:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        background: white;
        clip-path: polygon(40% 0, 100% 0, 100% 100%, 70% 100%);
    }

    .form-control {
        border: none;
        border-bottom: 3px solid white;
    }

    .card {
        position: absolute;
        left: 20%;
        right: 20%;
        max-width: 500px;
        max-height: 500px;
        animation: fade-in 0.5s ease-in forwards;
        animation-delay: 1s;
        opacity: 0;
    }

    .color-text {
        color: #5d78ff;
    }

    @media (min-width: 768px) {
        .card {
            left: 30%;
            right: 20%;
        }
    }


    @media (min-width: 992px) {
        .card {
            left: 35%;
            right: 20%;
        }
    }


    @keyframes fade-in {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>

<body>
    <div class="background-view">
        <!--begin::Wrapper-->
        <div class="card">
            <div class="kt-login-v2__title">
                <br>
                <h3 class="mx-4 color-text">Login</h3>
                <hr class="mx-4">
            </div>

            <!--begin::Form-->
            <form id="form">
                <div class="form-group mx-4 color-text">
                    <input id="username" class="form-control" type="text" placeholder="Username" name="username" autocomplete="off">
                </div>
                <div class="form-group mx-4">
                    <input class="form-control" type="password" placeholder="Password" name="password" id="password" autocomplete="off">
                </div>


                <!--end::Action-->
            </form>
            <!--begin::Action-->
            <div class="kt-login-v2__actions d-flex flex-row-reverse bd-highlight mx-4 my-3">
                <button type="button" onclick="submit()" class="btn btn-brand btn-elevate btn-pill" style="background-color: #5d78ff;">Login</button>
            </div>

            <!--end::Form-->
        </div>
    </div>
    <script>
        function submit() {
            var form = $("#form").serialize();
            $.ajax({
                data: form,
                type: 'post',
                url: `<?= base_url('Auth/check') ?>`,
                dataType: `json`,
                success: (res) => {

                    if (res.guru.length > 0) {
                        if (res.akun !== undefined) {
                            var akun = res.akun[0];
                            localStorage.setItem('nip', akun['nip']);
                            localStorage.setItem('nama', akun['nama']);
                            localStorage.setItem('role', res[0]['role']);
                        } else {
                            localStorage.setItem('nip', res.guru[0]['nip']);
                            localStorage.setItem('nama', res.guru[0]['nama']);
                            localStorage.setItem('role', 'guru');
                        }
                    } else {
                        localStorage.setItem('nip', res['role'][0]['username']);
                        localStorage.setItem('nama', res['role'][0]['username']);
                        localStorage.setItem('role', res[0]['role']);
                    }

                    if (res.status == 404) {
                        alert('Data tidak ditemukan');
                        $("#username").val('');
                        $("#password").val('');
                    } else if (res.guru.length > 0) {
                        location.href = `<?= base_url('Kurikulum') ?>`;
                    } else {
                        console.log(res[0]);
                        switch (res[0].role) {
                            case 'kurikulum_admin':
                                location.href = `<?= base_url('Kurikulum') ?>`;
                                break;
                            case 'kepala_sekolah':
                                location.href = `<?= base_url('Superadmin') ?>`;
                                break;
                            case 'perpus_admin':
                                location.href = `<?= base_url('Perpustakaan') ?>`;
                                break;
                            case 'kesiswaan':
                                location.href = `<?= base_url('Kesiswaan') ?>`;
                                break;
                            case 'guru':
                                location.href = `<?= base_url('Kurikulum') ?>`;
                                break;
                            default:
                                alert('Data tidak ditemukan');
                                $("#username").val('');
                                $("#password").val('');
                                break;
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>