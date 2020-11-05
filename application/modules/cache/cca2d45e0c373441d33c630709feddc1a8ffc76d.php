<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawsome/css/all.min.css'); ?>">
    <style>
        .section {
            position: relative;
            widows: 100%;
            min-height: 100vh;
            background: #f5f5f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
            background: white;
            clip-path: polygon(54% 0, 100% 0, 100% 100%, 84% 100%);
        }

        .section .content {
            position: relative;
            padding: 100px 50px 0px 150px;
            box-sizing: border-box;
            animation: left-in 0.5s ease-in forwards;
            animation-delay: 0.5s;
            opacity: 0;
        }

        .section .content h2 {
            color: #5d78ff;
            font-size: 3em;
            font-weight: 800;
        }

        .section .content p {
            color: #5d78ff;
            font-size: 1.2em;
        }

        .section .imgbox {
            position: relative;
            right: 60px;
        }

        .section .imgbox img {
            max-width: 500px;
            max-height: 500px;
            animation: fade-in 0.5s ease-in forwards;
            animation-delay: 1s;
            opacity: 0;
        }

        .nav {
            position: absolute;
            top: 15%;
            left: 150px;
            display: flex;
            color: #5d78ff;
            border-left: 5px solid #0032ff;
            padding-left: 20px;
            animation: left-in 0.5s ease-in forwards;
            animation-delay: 0s;
            opacity: 0;
        }

        .nav li {
            list-style: none;
            font-size: 20px;
        }

        .nav li a {
            text-decoration: none;
            color: #5d78ff;
            margin-right: 30px;
            font-size: 0, 9em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .nav li a .active,
        .nav li a:hover {
            color: #0032ff;
        }

        @keyframes  fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes  left-in {
            0% {
                transform: translateX(-200px);
                opacity: 0;
            }

            100% {
                transform: translateX(0px);
                opacity: 1;
            }
        }

        .menuicon {
            display: none;
        }

        @media (min-width: 991px) {
            .letak {
                margin-top: 10px;
            }
        }

        @media (max-width: 991px) {
            .menuicon {
                display: block !important;
                position: fixed;
                top: 5%;
                right: 1%;
                width: 60px;
                height: 60px;
                filter: invert(1);
                background-size: 30px;
                cursor: pointer;
                background-repeat: no-repeat;
                z-index: 1000;
            }

            .menuicon.active {
                display: block !important;
                position: fixed;
                top: 5%;
                right: 1%;
                width: 60px;
                height: 60px;
                filter: invert(1);
                background-size: 30px;
                cursor: pointer;
                background-repeat: no-repeat;
                z-index: 1000;
            }

            .nav {
                position: fixed;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                font-size: 1em;
                background-color: #f5f5f5;
                flex-direction: column;
                z-index: 11;
                border: none;
                padding: 50px;
            }

            .show {
                display: block !important;
                left: 0;
            }

            li {
                margin: 5px 0;
                margin-top: 40px;
            }

            .close {
                display: none;
            }

            .section {
                flex-direction: column-reverse;
                justify-content: space-between;
                align-items: center;
            }

            .section:before {
                clip-path: polygon(0 0, 100% 0, 100% 15%, 0 38%);
            }

            .section .content {
                margin-top: 45px;
                padding: 50px;
                bottom: 100px;
            }

            .section .content h2 {
                font-size: 1.5em;
            }

            .section .content p {
                font-size: 1.5em;
            }

            .section .imgbox {
                max-width: 100%;
                margin-left: 20%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding-right: 0;
                margin-top: 20px;
            }

            .section .imgbox img {
                max-width: 80%;
            }
        }
    </style>
    <script src="assets/plugins/jquery/jquery-3.4.1.min.js"></script>

</head>

<body>
    <div class="section">
        <div class="content">
            <h2>Sistem Informasi Kurikulum</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </div>
        <div class="imgbox">
            <img src="<?= base_url('assets/img/landing.png'); ?>">
        </div>
    </div>
    <ul class="nav close" id="nav">
        <li class="letak"><a href="">Beranda</a></li>
        <li class="letak"><a href="">Tentang Kami</a></li>
        <li><a href="<?= base_url('Auth') ?>" class="btn rounded-pill" style="background:#5d78ff;color:white;">Login</a></li>
    </ul>
    <span class="menuicon" onclick="menuToggle()"><i class="fas fa-list text-dark"></i></span>
    <script type="text/javascript">
        function menuToggle() {
            var nav = $("#nav");
            nav.toggleClass('show')
            var toggle = $("#toggle");
            toggle.toggleClass('show')
        }
    </script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\kssi_kurikulum\application\modules/Landing/views/v_landing.blade.php ENDPATH**/ ?>