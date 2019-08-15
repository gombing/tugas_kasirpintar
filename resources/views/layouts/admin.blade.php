<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>{{ env('BUSINESS_NAME') }}</title>
    <meta content="Admin Dashboard of {{ env('BUSINESS_NAME') }}" name="description">
    <meta content="Gombing" name="Dwiky Bagas Regio Perkasa">
    <link rel="shortcut icon" href="/assets/images/favicon.png">
    @yield('head')
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="/" class="logo">
                <span>
                    <img src="/assets/images/logo-light.png" alt="" height="45">
                </span>
                <i>
                    <img src="/assets/images/logo-kotak.png" alt="" height="45">
                </i>
            </a>
        </div>
        <nav class="navbar-custom">
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button>
                </li>
            </ul>
            <ul class="navbar-right d-flex list-inline float-right mb-0">
                <li class="dropdown notification-list d-none d-md-block">
                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen"><i></i>
                        {{auth()->user()->name}}
                        @if(auth()->user()->role==0)
                            as a Staf
                        @elseif(auth()->user()->role==1)
                            as a Admin
                        @else
                            as a Owner
                        @endif
                    </a>
                </li>

                <li class="dropdown notification-list">
                    <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="/assets/images/users/user-4.jpg" alt="user" class="rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <!-- item-->
                            <a class="dropdown-item text-danger" href="#"
                            onclick="event.preventDefault(); document.getElementById('form-logout').submit()"
                            ><i class="mdi mdi-power text-danger"></i> Logout</a>
                            <form action="{{ route('logout') }}" method="POST" id="form-logout" style="display: none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>

        </nav>
    </div>
    <!-- Top Bar End --><!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Main menu</li>
                    <li><a href="{{ route('admin.product') }}" class="waves-effect"><i class="ti-package"></i><span>Product</span></a></li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End --><!-- ============================================================== --><!-- Start right Content here --><!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('notification')
        <footer class="footer">© {{ date('Y').' '.env('BUSINESS_NAME') }} <span class="d-none d-sm-inline-block">- Created with <i class="mdi mdi-heart text-danger"></i> by Gombing</span>.</footer>
    </div>
</div>
<!-- END wrapper -->

<!-- jQuery  -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/metisMenu.min.js"></script>
<script src="/assets/js/jquery.slimscroll.js"></script>
<script src="/assets/js/waves.min.js"></script>

@yield('script')
<!-- App js -->
<script src="/assets/js/app.js"></script>
</body>
</html>