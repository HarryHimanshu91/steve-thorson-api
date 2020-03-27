@extends('layouts.dashboard_app')

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
                                <h3 class="card-title">Edit Role</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('roles.index') }}" class="btn btn-primary btn-small">Back</a>
                            </div>
                        </div> 
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('roles.update',$role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role Name</label>
                                    <input type="text" name="role" class="form-control  @error('role') is-invalid @enderror" id="exampleInputEmail1" value="{{ $role->name }}" placeholder="Enter Role Name">
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Role Status</label>
                                    <select class="form-control select2bs4 @error('status') is-invalid @enderror" name="status">
                                        <option value="">Select Status</option>
                                        <option value="1" {{ ($role->status == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ ($role->status == 0) ? 'selected' : '' }}>Inactive</option>
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
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>    
  </div>  
@endsection
