@extends('layouts.header')

@section('content')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Update Admin</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="{{ url('admin/edit-admin/'.$admin->id) }}" method ="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" value="{{ $admin->first_name }}" class="form-control" placeholder="First Name" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('fname')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" value="{{ $admin->last_name }}" class="form-control" placeholder="Last Name" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('lname')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" value="{{ $admin->username }}" class="form-control" placeholder="Username" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('username')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>

                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" value="{{ $admin->email }}" class="form-control" placeholder="Email" required>
                          <span class="text-danger" id="basic-addon3">
                            @error('email')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>

                      <div class="form-group">
                          <input type="hidden" name="password" value="{{ $admin->password }}" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role">
                              <option value="0" @if($admin->role =='0') selected @endif>Normal User</option>
                              <option value="1" @if($admin->role =='1') selected @endif>Admin</option>
                          </select>
                          <span class="text-danger" id="basic-addon3">
                            @error('role')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <div class="form-group">
                          <label>Profile Picture</label><br>
                          <img class="admin-profile" src="{{ asset('images/'.$admin->user_img) }}" style="margin-bottom: 10px;">
                          <input type="file" name="user_img" class="form-control" placeholder="Profile Picture">
                          <span class="text-danger" id="basic-addon3">
                            @error('user_img')
                                {{ $message }}
                            @enderror
                          </span>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Update" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
@endsection