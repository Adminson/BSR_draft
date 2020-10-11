<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#0061da">
    <meta name="theme-color" content="#1643a3">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Boardroom - @yield('headTitle')</title>

@include('layouts.style')
@yield('style')
</head>

<body>
    <div class="page">
        <div class="page-main">
            <div class="vobilet-navbar" id="headerMenuCollapse">
                <div class="container">
                    <ul class="nav">
                        <li class="nav-item with-sub">
                            <a class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}" href="/home">
                                <i class="fa fa-home"></i>
                                <span> DASHBOARD</span>
                            </a>
                            <div class="sub-item">
                                <ul>
                                    <li>
                                        <a href="index.html">Dashboard 1</a>
                                    </li>
                                </ul>
                            </div><!-- sub-item -->
                        </li>
                        <li class="nav-item">
                                <a class="nav-link {{ (request()->is('counter*')) ? 'active' : '' }}" href="/counter">
                                <i class="fa fa-window-restore"></i>
                                <span>Counter</span>
                            </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link {{ (request()->is('rod*')) ? 'active' : '' }}" href="/rod">
                                <i class="fa fa-window-restore"></i>
                                <span>ROD</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('meeting*')) ? 'active' : '' }}" href="/meeting">
                                <i class="fa fa-picture-o"></i> 
                                <span>Meeting</span>
                                <span class="square-8"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="vote">
                                <i class="fa fa-picture-o"></i> 
                                <span>Vote</span>
                                <span class="square-8"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    
            <div id="app">
                <main class="">
                    @yield('content')
                </main>
            </div>
        </div>

        <!--footer-->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                        Copyright © 2018 <a href="#">Vobilet</a>. Designed by <a href="#">Spruko</a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer-->
    </div>
    

@include('layouts.script')
@yield('script')
</body>
</html>
