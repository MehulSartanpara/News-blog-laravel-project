@extends('layouts.header')

@section('content')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="{{ url('admin/add-post') }}">add post</a>
              </div>
              @if (session('success'))
                <div class="myAlert-top alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('success') }}
                </div>
              @endif
              @if (session('delete'))
                <div class="myAlert-bottom alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('delete') }}
                </div>
              @endif
              @if (session('update'))
                <div class="myAlert-top alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('update') }}
                </div>
              @endif
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      @foreach ($post as $item)
                          <tr>
                              <td class='id'>{{ $item->id }}</td>
                              <td>{{ $item->title }}</td>
                              <td>{{ $item->category }}</td>
                              <td>{{ $item->date }}</td>
                              <td>{{ $item->admin }}</td>
                              <td class='edit'><a href='{{ url("admin/edit-post/".$item->id) }}'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='{{ url("admin/delete-post/".$item->id) }}'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                  {{ $post->links() }}
              </div>
          </div>
      </div>
  </div>
@endsection