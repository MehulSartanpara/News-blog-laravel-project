<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News articles</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="{{ asset('images/me.png') }}">

    <link rel="stylesheet" href="{{ asset('css/custome.css') }}">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <!-- <a href="{{ url('/') }}" id="logo"><img src="{{ asset('images/logs.png') }}"></a> -->
                <a href="{{ url('/') }}" id="logo"><img src="{{ asset('images/news.jpg') }}"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                    <li><a href='/' class="">Home</a></li>
                    @foreach ($catagory as $item)
                    <li>
                        <form class="search-post admin-name-on-post" action="{{ url('search') }}" method ="GET">
                        @csrf
                            <input type="hidden" name="search" class="form-control" placeholder="Search ....." value="{{ $item->category_name }}">
                            <input type="submit" class="admin-name-on-post fontend-navBar" value="{{ $item->category_name }}">
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

    <div class="Marquee">
        <div class="Marquee-content">
            @foreach ($post_marque as $item)
                <a href='{{ url("single-post/".$item->id) }}'>
                    <div class="Marquee-tag">{{ $item->title }}</div>
                </a>
            @endforeach  
        </div>
    </div>

    @yield('content-2')

<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <span>© Copyright 2023 News | Powered by <a href="https://webunityinfotech.com/">WebUnity</a></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
