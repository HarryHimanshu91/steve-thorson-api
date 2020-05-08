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
                      <h3 class="card-title">Community Members</h3>
                  </div>
                
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @can('isAdmin')
                  @include('community.communityNavbar')
                @endcan
                <div class="row">
                   <div class="col-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" >
                                <thead>
                                    <tr>
                                        <th> ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Region</th>
                                        <th>Center </th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  @php $i=1 @endphp
                                  @foreach($users as $user)
                                      <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->region['region'] }}</td>
                                        <td>{{ $user->center['title']  }} </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        
                                      </tr>
                                  @endforeach
                                  </tbody>
                        </table> 
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.col12 -->
        </div>
    </section>    
  </div>  
@endsection
