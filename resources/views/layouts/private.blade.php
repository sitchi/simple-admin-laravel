<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" action="/users" method="post">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" name="searchAccount" id="search"
                       placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ Gravatar::get(Auth::user()->email) }}" class="user-image img-circle elevation-2"
                         alt="img">
                    <span class="d-none d-md-inline"> {{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="{{ Gravatar::get(Auth::user()->email) }}" class="img-circle elevation-2" alt="img">
                        <p>
                            {{ Auth::user()->name }}
                            <small>
                            </small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="/profile" class="btn btn-default btn-flat">{{ __('Profile') }}</a>
                        <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form1').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/dashboard" class="brand-link">
            <img src="{{ asset('img/simple-admin.png') }}" alt="PS" class="brand-image">
            <span class="brand-text font-weight-light"> Simple Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ Gravatar::get(Auth::user()->email) }}" class="img-circle elevation-2" alt="img">
                </div>
                <div class="info">
                    <a href="/profile" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2 text-sm">
                <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview"
                    role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="fas fa-fw fa-tachometer-alt nav-icon"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/roles"
                           class="nav-link">
                            <i class="fas fa-layer-group nav-icon"></i>
                            <p>{{ __('Roles') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users"
                           class="nav-link">
                            <i class="fas fa-user-secret nav-icon"></i>
                            <p>{{ __('Users') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                            <i class="fas fa-sign-out-alt nav-icon"></i>
                            <p>{{ __('Logout') }}</p>
                        </a>

                        <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h2>{{ $title ?? null }}</h2>
                    </div>
                    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>v1.0.0</b>
        </div>
        <strong>&copy; 2022 - Simple Admin. </strong>
    </footer>

</div>
<!-- ./wrapper -->
</body>

<script src="{{ asset('js/app.js') }}"></script>

@stack('scripts')
</html>
