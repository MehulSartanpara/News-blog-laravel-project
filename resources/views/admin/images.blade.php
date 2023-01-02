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
              @foreach($images as $image)   
                <div class="data-images" data-images="{{ $image->name }}"></div>
              @endforeach
                <div class="container">
                    <div class="images-content">
                        
                    </div>
                </div>
          </div>
      </div> 
  </div>
<style>
.images-content {
    display: flex;
    flex-wrap: wrap;
}
.main-img {
    flex: 0 0 25%;
    max-width: calc(25% - 20px);
    margin: 10px;
}
.container {
    max-width: 1500px;
    margin: 0 auto;
}
</style>
<script>
    $(document).ready(function() {
        $('.data-images').each(function(){
            let ImageArray = $(this).attr('data-images');
            ImageArray = JSON.parse(ImageArray);
            ImageArray.forEach(element => {
                console.log(element);
                var Image =  $('<img class="main-img" src="http://127.0.0.1:8000/uploads/'+element+'">');
                $('.images-content').prepend(Image);
            });
        }); 
    });
</script>
@endsection