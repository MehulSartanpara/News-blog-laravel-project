@extends('layouts.header')

@section('content')
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('post_title')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                          <span class="text-danger" id="basic-addon3">
                            @error('postdesc')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                            @foreach ($catagory as $item)
                              <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                            @endforeach
                          </select>
                          <span class="text-danger" id="basic-addon3">
                            @error('category')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <input type="hidden" name="username" class="form-control" value="{{ $LogIn->username }}" placeholder="Profile Picture" required>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" class="form-control" placeholder="Profile Picture" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('fileToUpload')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
@endsection