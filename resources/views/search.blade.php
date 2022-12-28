@extends('layouts-2.header')

@section('content-2')
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading">Search : {{ $search }}</h2>

                  @foreach ($post as $item)
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href='{{ url("single-post/".$item->id) }}'><img src="{{ asset('images/'.$item->post_img) }}" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='{{ url("single-post/".$item->id) }}'>{{ $item->title }}</a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <form class="search-post admin-name-on-post" action="{{ url('search') }}" method ="GET">
                                                @csrf
                                                    <input type="hidden" name="search" class="form-control" placeholder="Search ....." value="{{ $item->category }}">
                                                    <input type="submit" class="admin-name-on-post" value="{{ $item->category }}">
                                                </form>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <form class="search-post admin-name-on-post" action="{{ url('search') }}" method ="GET">
                                                @csrf
                                                    <input type="hidden" name="search" class="form-control" placeholder="Search ....." value="{{ $item->admin }}">
                                                    <input type="submit" class="admin-name-on-post" value="{{ $item->admin }}">
                                                </form>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                {{ $item->date }}
                                            </span>
                                        </div>
                                        <p class="description">
                                            {{ $truncated = Str::of($item->description)->limit(200) }}
                                        </p>
                                        <a class='read-more pull-right' href='{{ url("single-post/".$item->id) }}'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach 

                </div><!-- /post-container -->
            </div>
            <div id="sidebar" class="col-md-4">
                    <!-- search box -->
                    <div class="search-box-container">
                        <h4>Search</h4>
                        <form class="search-post" action="{{ url('search') }}" method ="GET">
                        @csrf
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search ....." value="">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-danger">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <!-- /search box -->
            </div>
        </div>
      </div>
    </div>
@endsection