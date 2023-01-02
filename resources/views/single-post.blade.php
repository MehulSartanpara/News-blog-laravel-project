@extends('layouts-2.header')

@section('content-2')
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3>{{ $post->title }}</h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <form class="search-post admin-name-on-post" action="{{ url('search') }}" method ="GET">
                                    @csrf
                                        <input type="hidden" name="search" class="form-control" placeholder="Search ....." value="{{ $post->category }}">
                                        <input type="submit" class="admin-name-on-post" value="{{ $post->category }}">
                                    </form>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <form class="search-post admin-name-on-post" action="{{ url('search') }}" method ="GET">
                                    @csrf
                                        <input type="hidden" name="search" class="form-control" placeholder="Search ....." value="{{ $post->admin }}">
                                        <input type="submit" class="admin-name-on-post" value="{{ $post->admin }}">
                                    </form>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{ $post->date }}
                                </span>
                            </div>
                            <img class="single-feature-image" src="{{ asset('images/'.$post->post_img) }}" alt=""/>
                            <p class="description">
                                {{ $post->description }}
                            </p>
                            <div class="back-home-main">
                                <a href="/" class="read-more">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /post-container -->

                    <div class="post-container comment-section">
                        <h4>Comment Box :</h4><hr>
                        <form action="" method="POST">
                        @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}" class="form-control" required>
                            <input type="hidden" name="post_status" value="0" class="form-control" required>
                            <div class="form-group">
                                <input type="text" name="user_name" class="form-control" autocomplete="off" required placeholder="Your Name" style="margin-bottom: 16px;">
                                <span class="text-danger" id="basic-addon3"></span>
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="comment" class="form-control" autocomplete="off" required placeholder="Write your comment" style="height: 80px;"></textarea>
                                <span class="text-danger" id="basic-addon3"></span>
                            </div>
                            <div class="back-home-main">
                                <button class="read-more btn btn-primary">Post Comment</button>
                            </div>
                        </form>
                        <hr>
                        <h4>Recent Comments</h4><br>
                        <div class="user-comment-single">
                            <div class="form-group user-comment-info">
                                <img class="comment-user-image" src="{{ asset('images/219983.png') }}"/>
                                <span>Mehul Sartanpara</span>
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>27 Dec, 2022</span>
                            </div>
                            <div class="form-group user-comment-content">
                            <span class="user-comment-text">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry
                            </span>
                            </div>
                        </div>
                        <hr>
                        <div class="user-comment-single">
                            <div class="form-group user-comment-info">
                                <img class="comment-user-image" src="{{ asset('images/219983.png') }}"/>
                                <span>Jenish Patel</span>
                            </div>
                            <div class="form-group user-comment-content">
                            <span class="user-comment-text">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </span>
                            </div>
                        </div>
                    </div>

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
                    <!-- recent posts box -->
                    <div class="recent-post-container">
                        <h4>Recent Posts</h4>
                        @foreach ($re_post as $item)
                        <div class="recent-post">
                            <a class="post-img" href='{{ url("single-post/".$item->id) }}'>
                                <img src="{{ asset('images/'.$item->post_img) }}" alt=""/>
                            </a>
                            <div class="post-content">
                                <h5>
                                    <a href='{{ url("single-post/".$item->id) }}'>
                                    {{ $truncated = Str::of($item->title)->limit(26) }}
                                    </a>
                                </h5>
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <form class="search-post admin-name-on-post" action="{{ url('search') }}" method ="GET">
                                    @csrf
                                        <input type="hidden" name="search" class="form-control" placeholder="Search ....." value="{{ $item->category }}">
                                        <input type="submit" class="admin-name-on-post" value="{{ $item->category }}">
                                    </form>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{ $item->date }}
                                </span>
                                <a class="read-more" href='{{ url("single-post/".$item->id) }}'>read more</a>
                            </div>
                        </div>
                        @endforeach    
                    </div>
                    <!-- /recent posts box -->
                </div>


            </div>
        </div>
    </div>
@endsection
