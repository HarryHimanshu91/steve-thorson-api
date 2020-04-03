@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-small">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('admin.users.update',$user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" placeholder="Enter Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="Enter Email Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Assign Role</label>
                            <select class="form-control select2bs4 @error('role') is-invalid @enderror" data-placeholder="Select Role" name="role">
                                <option value=""></option>
                                @foreach($roles as $role){
                                    <option value="{{ $role->id }}" {{ ($user->role_id == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" data-placeholder="Select Status" name="status">
                                <option value="">Select Status</option>
                                <option value="1" {{ ($user->status == 1) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ ($user->status == 0) ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </section>    
  </div>  
@endsection