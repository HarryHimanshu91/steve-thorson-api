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
                      <h3 class="card-title">Role List</h3>
                  </div>
                  <div class="col-6 text-right">
                      <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-small">Add Role</a>
                  </div>
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable" >
                <thead>
                    <tr>
                        <th>Unique ID</th>
                        <th>Role Name</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td class="{{ $role->status ? 'text-success text-bold' : 'text-danger text-bold'}}">{{ $role->status ? "Active" : "Inactive" }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>{{ $role->updated_at }}</td>
                        <td>  
                          <div class="btn-group btn-group-sm">
                            <a title="Edit" href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                          </div>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </section>    
  </div>  
@endsection
