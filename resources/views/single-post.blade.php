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
                        @if (session('success'))
                            <div class="myAlert-top alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('success') }}
                            </div>
                        @endif
                        <h4>Comment Box :</h4><hr>
                        <form action="{{ url('save-comment') }}" method="POST">
                        @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}" class="form-control" required>
                            <div class="form-group">
                                <input type="text" name="user_name" class="form-control" autocomplete="off" required placeholder="Your Name" style="margin-bottom: 16px;">
                                <span class="text-danger" id="basic-addon3">
                                    @error('user_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="comment" class="form-control" autocomplete="off" required placeholder="Write your comment" style="height: 80px;"></textarea>
                                <span class="text-danger" id="basic-addon3">
                                    @error('comment')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="back-home-main">
                                <button class="read-more btn btn-primary">Post Comment</button>
                            </div>
                        </form>
                        <hr>
                        <h4>Recent Comments</h4><br>
                        @forelse($post->comments->reverse() as $comment)
                        <div class="user-comment-single">
                            <div class="form-group user-comment-info">
                                <div class="user-comment-name-main">
                                    <img class="comment-user-image" src="{{ asset('images/219983.png') }}"/>
                                    <span>{!! $comment->user_name !!}</span>
                                </div>
                                <div class="user-comment-date-main">
                                    <span><i style="font-size: 14px;" class="fa fa-clock-o" aria-hidden="true"></i>{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="form-group user-comment-content">
                            <span class="user-comment-text">
                                {!! $comment->comment !!}
                            </span>
                            </div>
                        </div>
                        <hr>
                        @empty
                            <h5>No Comment at</h5>
                        @endforelse
                        
                        
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
