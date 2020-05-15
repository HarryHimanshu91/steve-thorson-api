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
                      <h3 class="card-title">Add Content </h3>
                  </div>               
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">        
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ route('admin.content.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Category </label>
                                        <select class="form-control @error('cat_name') is-invalid @enderror" placeholder="Select Category Name" name="cat_name">
                                            <option value="">Select Category</option>
                                            <option value="Economic"{{ (old('cat_name')=='Economic') ? 'selected' : '' }}>Economic</option>
                                            <option value="Spiritual"{{ (old('cat_name')=='Spiritual') ? 'selected' : '' }}>Spiritual</option>
                                            <option value="Health"{{ (old('cat_name')=='Health') ? 'selected' : '' }}>Health</option>
                                            <option value="Emotional"{{ (old('cat_name')=='Emotional') ? 'selected' : '' }}>Emotional</option>
                                        </select>
                                        @error('cat_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Content Title in English</label>
                                                <input type="text" name="english_title" class="form-control @error('english_title') is-invalid @enderror" value="{{ old('english_title') }}" placeholder="Enter Category Title in English">
                                                @error('english_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Content Title in Swahili</label>
                                                <input type="text" name="swahili_title" class="form-control @error('swahili_title') is-invalid @enderror" value="{{ old('swahili_title') }}" placeholder="Enter Category Title in Swahili">
                                                @error('swahili_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>                     
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Content Description in English</label>
                                                <textarea  rows="10" name="english_description" class="textarea form-control @error('english_description') is-invalid @enderror"> {{ old('english_description') }}</textarea>
                                                @error('english_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Content Description in Swahili</label>
                                                <textarea  rows="10" name="swahili_description" class="textarea form-control @error('swahili_description') is-invalid @enderror"> {{ old('swahili_description') }}</textarea>
                                                @error('swahili_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Content Status </label>
                                        <select class="form-control @error('status') is-invalid @enderror" data-placeholder="Select Status" name="status">
                                            <option value="">Select Status</option>
                                            <option value="1" {{ (old('status')=='1') ? "selected":"" }}>Active</option>
                                            <option value="0" {{ (old('status')=='0') ? "selected":"" }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Upload Audio for English</label>
                                                <input type="file" name="audio_english_file" class="form-control @error('audio_english_file') is-invalid @enderror">
                                                @error('audio_english_file')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Upload Audio for Swahili</label>
                                                <input type="file" name="audio_swahili_file" class="form-control @error('audio_swahili_file') is-invalid @enderror">
                                                @error('audio_swahili_file')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-12 col-sm-12 col-lg-12 mt-3">
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>  
                                </form>
                            </div>                                    <!-- /.card-body -->
                        </div>                            
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
