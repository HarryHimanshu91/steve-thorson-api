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
                      <h3 class="card-title">Community List</h3>
                  </div>
                
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Community Title </th>
                        <th>Community Description </th>
                        <th>Region</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach($communities as $community)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $community->title }}</td>
                      <td>{{ $community->description }}</td>
                      <td>{{ $community->region['region'] }}</td>
                      <td>{{ $community->created_at }}</td>
                      <td>{{ $community->updated_at }}</td>
                      <td>
                      <div class="btn-group btn-group-sm">
                          <a title="View Community" href="{{ route('admin.community.dashboard', $community->id ) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
