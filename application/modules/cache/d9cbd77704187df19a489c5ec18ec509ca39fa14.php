<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawsome/css/all.min.css'); ?>">


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


    @keyframes  fade-in {
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
            <form class="kt-login-v2__form kt-form" action="" autocomplete="off">
                <div class="form-group mx-4 color-text">
                    <input class="form-control" type="text" placeholder="Username" name="username" autocomplete="off">
                </div>
                <div class="form-group mx-4">
                    <input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off">
                </div>

                <!--begin::Action-->
                <div class="kt-login-v2__actions d-flex flex-row-reverse bd-highlight mx-4 my-3">
                    <button type="submit" class="btn btn-brand btn-elevate btn-pill" style="background-color: #5d78ff;">Login</button>
                </div>

                <!--end::Action-->
            </form>

            <!--end::Form-->
        </div>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\kssi_kurikulum\application\modules/Auth/views/v_auth.blade.php ENDPATH**/ ?>