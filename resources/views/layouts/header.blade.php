<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="{{ asset('images/me.png') }}">

    <link rel="stylesheet" href="{{ asset('css/custome.css') }}">

    <title>Admin</title>
  </head>
  <body>
    <!-- HEADER -->
    <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row admin-header-inner">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="{{ url('admin/index') }}"><img class="logo" src="{{ asset('images/news.jpg') }}"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="admin-login-info">
                        <img class="login-admin-profile" src="{{ asset('images/'.session('user_img')) }}" style="margin-bottom: 10px;">
                        <span class="admin-logout" style="text-decoration: none;">{{session('username')}}</span>
                        <a href="/admin/logout" class="admin-logout">logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a @if(url()->current() == url('admin/index')) style="color: #fff; background-color: #1E90FF;" @endif href="{{ url('admin/index') }}">
                                    Post
                                </a>
                            </li>
                            <li>
                                <a @if(url()->current() == url('admin/category')) style="color: #fff; background-color: #1E90FF;" @endif href="{{ url('admin/category') }}">
                                    Category
                                </a>
                            </li>
                            <li>
                                <a @if(url()->current() == url('admin/admins')) style="color: #fff; background-color: #1E90FF;" @endif href="{{ url('admin/admins') }}">
                                    Users
                                </a>
                            </li>
                            <li>
                                <a @if(url()->current() == url('admin/images')) style="color: #fff; background-color: #1E90FF;" @endif href="{{ url('admin/images') }}">
                                    Images
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->

        <!-- Main Content -->
        @yield('content')
        <!-- /Main Content -->

        <!-- Footer -->
        <div id ="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span>© Copyright 2023 News | Powered by <a href="https://webunityinfotech.com/">WebUnity</a></span>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function() {
            $(document).on("click",".myAlert-bottom .close, .myAlert-top .close",function(e){
                e.preventDefault();
                $('.alert').hide();
            });
        });
    </script>
    </body>
</html>
    