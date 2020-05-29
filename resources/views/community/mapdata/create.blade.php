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
                      <h3 class="card-title">Add Map Data </h3>
                  </div>
                  <div class="col-6">
                    
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
                        <form class="row" method="post" action="{{ route('community.mapdata.store') }}"> 
                            @csrf  
                            <input type="hidden" name="center_id" value="{{ $id }}">   
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Enter Title">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control select2bs4 @error('category') is-invalid @enderror" name="category">
                                                <option value="">Select Category</option>
                                                <option value="Hospital" {{ (old('category') == 'Hospital') ? 'selected':'' }}>Hospital</option>
                                                <option value="Clinics" {{ (old('category') == 'Clinics') ? 'selected':'' }}>Clinics</option>
                                                <option value="Dispensaries" {{ (old('category') == 'Dispensaries') ? 'selected':'' }}>Dispensaries</option>
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description in English</label>
                                                    <textarea class="form-control @error('eng_description') is-invalid @enderror" name="eng_description" rows="5" placeholder="Enter English Description">{{ old('eng_description') }}</textarea>
                                                    @error('eng_description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description in Swahili</label>
                                                    <textarea class="form-control @error('swa_description') is-invalid @enderror" name="swa_description" rows="5" placeholder="Enter Swahili Description">{{ old('swa_description') }}</textarea>
                                                    @error('swa_description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Direction in English</label>
                                                    <textarea class="form-control @error('eng_directions') is-invalid @enderror" name="eng_directions" rows="2" placeholder="Enter English Direction">{{ old('eng_directions') }}</textarea>
                                                    @error('eng_directions')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Direction in Swahili</label>
                                                    <textarea class="form-control @error('swa_directions') is-invalid @enderror" name="swa_directions" rows="2" placeholder="Enter Swahili Direction">{{ old('swa_directions') }}</textarea>
                                                    @error('swa_directions')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label>Latitude</label>
                                                <input class="form-control form-control  @error('latitude') is-invalid @enderror" name="latitude" type="text" placeholder="Enter Latitude" value="{{ old('latitude') }}">
                                                @error('latitude')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div> 
                                            <div class="col-md-6">   
                                              <div class="form-group">
                                                <label>Longitude</label>
                                                <input class="form-control form-control  @error('longitude') is-invalid @enderror" name="longitude" type="text" placeholder="Enter Longitude" value="{{ old('longitude') }}">
                                                @error('longitude')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control form-control  @error('phone_number') is-invalid @enderror" name="phone_number" type="text" placeholder="Enter Phone Number" value="{{ old('phone_number') }}">
                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div> 
                                            <div class="col-md-6">
                                              <div class="form-group">   
                                                <label>URL</label>
                                                <input class="form-control form-control  @error('url') is-invalid @enderror" name="url" type="text" placeholder="Enter URL" value="{{ old('url') }}">
                                                @error('url')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>                

                                <div class="col-12 col-sm-12 col-lg-12 mt-3">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>               
                        </form>          
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
