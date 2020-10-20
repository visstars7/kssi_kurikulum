<!DOCTYPE html>

<!--
Theme: Keen - The Ultimate Bootstrap Admin Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: You must have a valid license purchased only from https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/ in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="assets/keen/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="assets/keen/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/keen/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="assets/keen/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/keen/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/keen/css/skins/brand/navy.css" rel="stylesheet" type="text/css" />
    <link href="assets/keen/css/skins/aside/navy.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="assets/keen/media/logos/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="index.html">
                <img alt="Logo" src="assets/keen/media/logos/logo-6.png" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->

    <!-- begin:: Root -->
    <div class="kt-grid kt-grid--hor kt-grid--root">

        <!-- begin:: Page -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                <!-- begin::Aside Brand -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="index.html">
                            <img alt="Logo" src="assets/keen/media/logos/logo-6.png" />
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
                    </div>
                </div>

                <!-- end:: Aside Brand -->
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu kt-scroll ps ps--active-y" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" style="height: 193px; overflow: hidden;">
                        <ul class="kt-menu__nav ">
                            @yield('sidebar')
                        </ul>
                    </div>
                </div>
            </div>

            <!-- end:: Aside -->

            <!-- begin:: Wrapper -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                    </div>
                    <!-- begin:: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>

                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">

                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">

                                <!--use "kt-rounded" class for rounded avatar style-->
                                <div class="kt-header__topbar-user kt-rounded-">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                                    <span class="kt-header__topbar-username kt-hidden-mobile">Sean</span>
                                    <img alt="Pic" src="assets/keen/media/users/300_25.jpg" class="kt-rounded-" />

                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <span class="kt-badge kt-badge--username kt-badge--lg kt-badge--brand kt-hidden kt-badge--bold">S</span>
                                </div>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-sm">
                                <div class="kt-user-card kt-margin-b-40 kt-margin-b-30-tablet-and-mobile" style="background-image: url(assets/keen/media/misc/head_bg_sm.jpg)">
                                    <div class="kt-user-card__wrapper">
                                        <div class="kt-user-card__pic">

                                            <!--use "kt-rounded" class for rounded avatar style-->
                                            <img alt="Pic" src="assets/keen/media/users/300_21.jpg" class="kt-rounded-" />
                                        </div>
                                        <div class="kt-user-card__details">
                                            <div class="kt-user-card__name">Alex Stone</div>
                                            <div class="kt-user-card__position">CTO, Loop Inc.</div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="kt-nav kt-margin-b-10">
                                    <li class="kt-nav__item">
                                        <a href="custom/profile/personal-information.html" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
                                            <span class="kt-nav__link-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="custom/profile/overview-1.html" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><i class="flaticon2-browser-2"></i></span>
                                            <span class="kt-nav__link-text">My Tasks</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="custom/profile/overview-2.html" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><i class="flaticon2-mail"></i></span>
                                            <span class="kt-nav__link-text">Messages</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="custom/profile/account-settings.html" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><i class="flaticon2-gear"></i></span>
                                            <span class="kt-nav__link-text">Settings</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__separator kt-nav__separator--fit"></li>
                                    <li class="kt-nav__custom kt-space-between">
                                        <a href="custom/login/login-v1.html" target="_blank" class="btn btn-label-brand btn-upper btn-sm btn-bold">Sign Out</a>
                                        <i class="flaticon2-information kt-label-font-color-2" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--end: User Bar -->

                    </div>

                    <!-- end:: Header Topbar -->
                </div>

                <!-- end:: Header -->
                <!-- begin:content -->
                @yield('content')
                <!-- end:content -->
                <!-- begin::Global Config(global config for global JS sciprts) -->
                <script>
                    var KTAppOptions = {
                        "colors": {
                            "state": {
                                "brand": "#5d78ff",
                                "metal": "#c4c5d6",
                                "light": "#ffffff",
                                "accent": "#00c5dc",
                                "primary": "#5867dd",
                                "success": "#34bfa3",
                                "info": "#36a3f7",
                                "warning": "#ffb822",
                                "danger": "#fd3995",
                                "focus": "#9816f4"
                            },
                            "base": {
                                "label": [
                                    "#c5cbe3",
                                    "#a1a8c3",
                                    "#3d4465",
                                    "#3e4466"
                                ],
                                "shape": [
                                    "#f0f3ff",
                                    "#d9dffa",
                                    "#afb4d4",
                                    "#646c9a"
                                ]
                            }
                        }
                    };
                </script>

                <!-- end::Global Config -->

                <!--begin::Global Theme Bundle(used by all pages) -->
                <script src="assets/keen/plugins/global/plugins.bundle.js" type="text/javascript"></script>
                <script src="assets/keen/js/scripts.bundle.js" type="text/javascript"></script>

                <!--end::Global Theme Bundle -->

                <!--begin::Page Vendors(used by this page) -->
                <script src="assets/keen/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

                <!--end::Page Vendors -->

                <!--begin::Page Scripts(used by this page) -->
                <script src="assets/keen/js/pages/dashboard.js" type="text/javascript"></script>

                <!--end::Page Scripts -->
</body>

<!-- end::Body -->

</html>