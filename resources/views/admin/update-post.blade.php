@extends('layouts.header')

@section('content')
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="{{ $post->title }}">
                <span class="text-danger" id="basic-addon3">
                    @error('post_title')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="10">{{ $post->description }}</textarea>
                <span class="text-danger" id="basic-addon3">
                    @error('postdesc')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                @foreach ($catagory as $item)
                    <option value="{{ $item->category_name }}" @if($item->category_name == $post->category ) selected @endif>{{ $item->category_name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Post Images</label><br>
                <img class="admin-post-img" src="{{ asset('images/'.$post->post_img) }}" style="margin-bottom: 10px;">
                <input type="file" name="post_img" class="form-control" placeholder="Post Images">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
@endsection
