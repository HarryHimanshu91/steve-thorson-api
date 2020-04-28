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
                      <h3 class="card-title">Community Map Data </h3>
                  </div>
                  <div class="col-6">
                    <form action="{{ route('admin.community.import', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                          <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                          <div class="input-group-append">
                            <button class="btn btn-primary btn-sm">Import Map Data</button>
                          </div>
                          @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    </form>
                  </div>
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('community.communityNavbar')

                <div class="row">
                    <div class="col-12">
                      <table id="example2" class="table table-bordered table-hover dataTable" >
                          <thead>
                              <tr>
                                  <th>Category</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Latitude </th>
                                  <th>Longitude</th>
                                  <th>Created At</th>
                                  <th>Updated At</th>            
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($mapData as $map)
                                <tr>
                                  <td>{{ $map->category }}</td>
                                  <td>{{ $map->name }}</td>
                                  <td>{{ $map->description }}</td>
                                  <td>{{ $map->latitude }}</td>
                                  <td>{{ $map->longitude }} </td>
                                  <td>{{ $map->created_at }}</td>
                                  <td>{{ $map->updated_at }}</td>                                 
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
