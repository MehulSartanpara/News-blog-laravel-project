@extends('layouts.header')

@section('content')
    <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>


              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="{{ url('admin/add-category') }}" method="POST" autocomplete="off">
                    @csrf
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('cat')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <div class="form-group">
                          <input type="hidden" name="no_post" class="form-control" placeholder="Category Name" value="1" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('no_post')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
@endsection