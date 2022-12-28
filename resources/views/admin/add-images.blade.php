@extends('layouts.header')

@section('content')
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Images</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="{{ url('admin/add-images') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                          <input type="hidden" name="id" class="form-control" placeholder="">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="image" multiple class="form-control" placeholder="Profile Picture">
                          <span class="text-danger" id="basic-addon3">
                            @error('fileToUpload')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Upload Images" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
@endsection