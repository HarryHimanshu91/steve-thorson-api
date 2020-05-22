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
                      <h3 class="card-title">Member List</h3>
                  </div>
                
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable" >
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Region</th>
                        <th>Center</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($users as $user)
                    <tr>
                        <td><img src="{{ $user->profile_path ? $user->profile_path : asset('img/no-image.png') }}" style="border-radius:10px" width="80" height="80" alt="{{ $user->firstname.' '.$user->lastname }}"/></td>                   
                        <td>{{ $user->region['region']  }} </td>
                        <td>{{ $user->center['title']  }} </td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a title="View User" href="{{ route('admin.members.show', $user->id) }}" class="btn btn-primary"><i style="color:#fff;" class="fa fa-eye"></i></a>
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
