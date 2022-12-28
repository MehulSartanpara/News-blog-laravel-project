@extends('layouts.header')

@section('content')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Admins</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="{{ url('admin/add-admin') }}">add user</a>
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
                          <th>User Profile</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>email</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                            @foreach ($admin as $item)
                                <tr>
                                    <td class='id'>{{ $item->id }}</td>
                                    <td class="user-profile-content">
                                        <a href="#" class="user-profile-link">
                                            <img class="admin-profile" src="{{ asset('images/'.$item->user_img) }}">
                                        </a>
                                    </td>
                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>
                                        @if($item->role =='1')         
                                            Admin 
                                        @else
                                            Normal
                                        @endif
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td class='edit'><a href='{{ url("admin/update-admin/".$item->id) }}'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='{{ url("admin/delete-admin/".$item->id) }}'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            @endforeach
                      </tbody>
                  </table>
                  {{ $admin->links() }}
              </div>
          </div>
      </div>
  </div>
@endsection