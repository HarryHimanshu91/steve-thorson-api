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
                                  <th>English/Swahili Description</th>
                                  <th>English/Swahili Directions</th>
                                  <th>Lat/Long Coordinates </th>
                                  <th>Phone Number/URL</th>
                                  <th>Created/Updated At</th>            
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($mapData as $map)
                                <tr>
                                  <td rowspan="2">{{ $map->category }}</td>
                                  <td rowspan="2">{{ $map->name }}</td>
                                  <td>{{ $map->eng_description }}</td>
                                  <td>{{ $map->eng_directions }}</td>
                                  <td>{{ "Lat: ".$map->latitude }}</td>
                                  <td>{{ $map->phone_number }}</td>
                                  <td>{{ $map->created_at }}</td>                                 
                                </tr>
                                <tr>
                                  <td>{{ $map->swa_description }}</td>      
                                  <td>{{ $map->swa_directions }}</td>     
                                  <td>{{ "Long: ".$map->longitude }} </td> 
                                  <td>{{ $map->url }}</td>       
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
