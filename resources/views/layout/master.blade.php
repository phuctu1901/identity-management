
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>Trang chủ | Hệ thống quản lý định danh số Thành phố Hà Nội</title>

    <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="/assets/css/site.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="/global/vendor/flag-icon-css/flag-icon.css">
{{--    <link rel="stylesheet" href="/global/vendor/morris/morris.css">--}}
{{--    <link rel="stylesheet" href="/global/vendor/chartist/chartist.css">--}}
    <link rel="stylesheet" href="/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
@section('header-content')
@show

    <!-- Fonts -->
    <link rel="stylesheet" href="/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="/global/fonts/brand-icons/brand-icons.min.css">
    <link rel="stylesheet" href="/global/fonts/font-awesome/font-awesome.css">

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="/global/vendor/media-match/media.match.min.js"></script>
    <script src="/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="animsition dashboard">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <img class="navbar-brand-logo" src="/assets/images/Hanoi_Logo.png" title="Hệ thống Quản lý định danh Thành phố Hà Nội">
            <span class="navbar-brand-text hidden-xs-down">Hanoi DID System</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon wb-search" aria-hidden="true"></i>
        </button>
    </div>

    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                    <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
                <li class="nav-item hidden-sm-down">
                    <span class="nav-link">Tổng quan hệ thống</span>
                </li>


            </ul>
            <!-- End Navbar Toolbar -->


        </div>
        <!-- End Navbar Collapse -->


        <!-- End Site Navbar Seach -->
    </div>
</nav>    <div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
{{--                    <li class="site-menu-category">General</li>--}}
{{--                    <li class="site-menu-item  active">--}}
{{--                        <a href="/">--}}
{{--                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>--}}
{{--                            <span class="site-menu-title">Dashboard</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="site-menu-category">I. Tổng quan</li>
                    <li class="site-menu-item ">
                        <a href="/bots/list">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">1. Dashboard</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a href="/bots/list">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">2. Các sự kiện</span>
                        </a>
                    </li>

                    <li class="site-menu-category">II. Quản lý định danh số</li>
                    <li class="site-menu-item ">
                        <a href="/did/add">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">1. Cấp định danh</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a href="/did/list">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">2. Danh sách định danh</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a href="/did/revoke">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">3. Thu hồi định danh</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a href="/connection/list">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">4. Quản lý kết nối</span>
                        </a>
                    </li>


{{--                    <li class="site-menu-category">REVENUE</li>--}}
{{--                    <li class="site-menu-item">--}}
{{--                        <a href="/revenue">--}}
{{--                            <i class="site-menu-icon wb-eye" aria-hidden="true"></i>--}}
{{--                            <span class="site-menu-title ">Overview</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="site-menu-item">--}}
{{--                        <a href="javascript:void(0)">--}}
{{--                            <i class="site-menu-icon fas fa-info" aria-hidden="true"></i>--}}
{{--                            <span class="site-menu-title ">Detail</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="site-menu-category">III. Quản lý người dùng</li>

                    <li class="site-menu-item">
                        <a href="/users/all">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">1. Danh sách người dùng</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="/users/role">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">2. Phân quyền</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="/users/online">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">3. Đang trực tuyến</span>
                        </a>
                    </li>


                    <li class="site-menu-category">IV. Quản lý mẫu</li>

{{--                    <li class="site-menu-item">--}}
{{--                        <a href="/schema/all">--}}
{{--                            <i class="site-menu-icon" aria-hidden="true"></i>--}}
{{--                            <span class="site-menu-title">Schema</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="site-menu-item">
                        <a href="/claim/all">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">1. Claim defination</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="/creddef/all">
                            <i class="site-menu-icon" aria-hidden="true"></i>
                            <span class="site-menu-title">2. Credential defination</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>

    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Info">
            <span class="icon fas fa-info-circle" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Support">
            <span class="icon fas fa-support" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Github">
            <span class="icon fas fa-github" aria-hidden="true"></span>
        </a>
    </div></div>

<!-- Page -->
@section('page')
@show
<!-- End Page -->


<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© 2020 <a href="https://tungong.tech">Nhóm nghiên cứu khoa học </a></div>
    <div class="site-footer-right">
        Thiết kế bởi <a href="http://www.lqdtu.edu.vn/">Nguyễn Phúc Tú</a>
    </div>
</footer>
<!-- Core  -->
<script src="/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
<script src="/global/vendor/jquery/jquery.js"></script>
<script src="/global/vendor/popper-js/umd/popper.min.js"></script>
<script src="/global/vendor/bootstrap/bootstrap.js"></script>
<script src="/global/vendor/animsition/animsition.js"></script>
{{--<script src="/global/vendor/mousewheel/jquery.mormousewheel.js"></script>--}}
<script src="/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
<script src="/global/vendor/asscrollable/jquery-asScrollable.js"></script>
<script src="/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

<!-- Plugins -->
<script src="/global/vendor/switchery/switchery.js"></script>
<script src="/global/vendor/intro-js/intro.js"></script>
<script src="/global/vendor/screenfull/screenfull.js"></script>
<script src="/global/vendor/slidepanel/jquery-slidePanel.js"></script>
{{--<script src="/global/vendor/chartist/chartist.js"></script>--}}
<script src="/global/vendor/raphael/raphael.min.js"></script>
{{--<script src="/global/vendor/morris/morris.min.js"></script>--}}
<script src="/global/vendor/matchheight/jquery.matchHeight-min.js"></script>
{{--<script src="/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>--}}

<!-- Scripts -->
<script src="/global/js/Component.js"></script>
<script src="/global/js/Plugin.js"></script>
<script src="/global/js/Base.js"></script>
<script src="/global/js/Config.js"></script>

<script src="/assets/js/Section/Menubar.js"></script>
<script src="/assets/js/Section/GridMenu.js"></script>
<script src="/assets/js/Section/Sidebar.js"></script>
<script src="/assets/js/Section/PageAside.js"></script>
<script src="/assets/js/Plugin/menu.js"></script>

<script src="/global/js/config/colors.js"></script>
<script src="/assets/js/config/tour.js"></script>
{{--<script>Config.set('assets', '../../assets');</script>--}}

<!-- Page -->
<script src="/assets/js/Site.js"></script>
<script src="/global/js/Plugin/asscrollable.js"></script>
<script src="/global/js/Plugin/slidepanel.js"></script>
<script src="/global/js/Plugin/switchery.js"></script>
<script src="/global/js/Plugin/matchheight.js"></script>

@section('scripts-content')

@show
</body>
</html>
