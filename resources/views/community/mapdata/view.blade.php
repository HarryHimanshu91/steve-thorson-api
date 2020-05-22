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
                    <form action="{{ route('community.import', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                          <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                          <div class="input-group-append">
                            <button class="btn btn-primary btn-sm">Import Map Data</button>
                          </div>
                          <div class="input-group-append ml-1">
                            @can('isAdmin')
                              <a href="{{ asset('admin/community/mapdata/'.$id.'/create') }}" class="btn btn-primary">Add Mapdata</a>
                            @endcan
                            @can('isCommunity')
                              <a href="{{ asset('community/mapdata/'.$id.'/create') }}" class="btn btn-primary">Add Mapdata</a>
                            @endcan
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
                @can('isAdmin')
                @include('community.communityNavbar')
                @endcan
                <div class="row">
                    <div class="col-12">
                      <table id="example2" class="table table-bordered table-hover dataTable" >
                          <thead>
                              <tr>
                                  <th>Category</th>
                                  <th>Name</th>
                                  <th>English/Swahili Description</th>
                                  <th>English/Swahili Directions</th>
                                  <th>Lat/Long Coordinates </th>
                                  <th>Phone Number/URL</th>
                                  <th>Created/Updated At</th>      
                                  <th>Action</th>      
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($mapData as $map)
                                <tr>
                                  <td>{{ $map->category }}</td>
                                  <td>{{ $map->name }}</td>
                                  <td>{{ $map->eng_description }}
                                      <hr>
                                      {{ $map->swa_description }}</td>
                                  <td>{{ $map->eng_directions }}
                                      <hr>
                                      {{ $map->swa_directions }}</td>
                                  <td>{{ "Lat: ".$map->latitude }}
                                      <hr>
                                      {{ "Long: ".$map->longitude }}</td>
                                  <td>{{ $map->phone_number }}
                                      <hr>
                                      {{ $map->url }}</td>
                                  <td>{{ $map->created_at }}</td>  
                                  <td>
                                    @can('isAdmin')
                                      <a href="{{ asset('/admin/community/mapdata/'.$map->id.'/edit') }}" class="btn btn-primary"><i class='fa fa-edit'></i></a>
                                    @endcan
                                    @can('isCommunity')
                                      <a href="{{ asset('/community/mapdata/'.$map->id.'/edit') }}" class="btn btn-primary"><i class='fa fa-edit'></i></a>
                                    @endcan
                                  </td>                               
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
