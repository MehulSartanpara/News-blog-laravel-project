@extends('layouts.header')

@section('content')
    <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="{{ url('admin/update-category/'.$category->cat_id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" value="{{ $category->category_name }}" class="form-control" placeholder="Category Name" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('cat')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <div class="form-group">
                          <input type="hidden" name="no_post" value="{{ $category->no_post }}" class="form-control" placeholder="Category Name" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('no_post')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
@endsection