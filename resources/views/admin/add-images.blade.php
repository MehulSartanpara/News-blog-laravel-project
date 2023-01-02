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
                  <form action="{{ url('admin/add-images') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif           
                        <div class="custom-file">
                            <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Upload Images
                        </button>
                    </form>
                  <!--/Form -->
                  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
              </div>
          </div>
      </div>
  </div>
@endsection