@extends('layouts.header')
@section('content')
<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Images</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="{{ url('admin/add-images') }}">add images</a>
              </div>
              @if (session('success'))
                <div class="myAlert-top alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('success') }}
                </div>
              @endif
              <div class="col-md-12">
                <div class="admin-images-container">
                    @foreach ($images as $item)
                        <div class="admin-images-inner">
                            <img class="" src="{{ asset('images/'.$item->images) }}">
                        </div>
                    @endforeach
                </div> 
              </div>
          </div>
      </div> 
  </div>
@endsection