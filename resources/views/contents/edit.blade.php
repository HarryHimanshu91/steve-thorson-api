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
                        <h3 class="card-title">Edit Content </h3>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('admin.viewAllContent') }}" class="btn btn-primary btn-small">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <form role="form" method="POST" action="{{ route('admin.content.update', $content->id ) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Category </label>
                            <select class="form-control @error('cat_name') is-invalid @enderror" data-placeholder="Select Status" name="cat_name">
                                <option value="">Select Category</option>
                                <option value="Economic"{{ ($content->cat_name =='Economic') ? 'selected' : '' }}>Economic</option>
                                <option value="Spiritual"{{ ($content->cat_name =='Spiritual') ? 'selected' : '' }}>Spiritual</option>
                                <option value="Health"{{ ($content->cat_name =='Health') ? 'selected' : '' }}>Health</option>
                                <option value="Emotional"{{ ($content->cat_name =='Emotional') ? 'selected' : '' }}>Emotional</option>
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
                                    <label>Content Title </label>
                                    <input type="text" name="english_title" class="form-control @error('english_title') is-invalid @enderror" value="{{ $content->english_title }}" placeholder="Enter Category Title in English">
                                    @error('english_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Content Title </label>
                                    <input type="text" name="swahili_title" class="form-control @error('swahili_title') is-invalid @enderror" value="{{ $content->swahili_title }}" placeholder="Enter Category Title in Swahili">
                                    @error('swahili_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Content Description </label>
                                    <textarea rows="5" name="english_description" class="textarea form-control @error('english_description') is-invalid @enderror"> {{ $content->english_description }}</textarea>
                                    @error('english_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Content Description </label>
                                    <textarea rows="5" name="swahili_description" class="textarea form-control @error('swahili_description') is-invalid @enderror"> {{ $content->swahili_description }}</textarea>
                                    @error('swahili_description')
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
                                    <label>Upload Audio for English</label>
                                    <input type="file" name="audio_english_file" class="form-control @error('audio_english_file') is-invalid @enderror">
                                    <input type="hidden" name="hidden_english_file" value="{{ $content->audio_english_file }}" />
                                    @error('audio_english_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <audio controls><source src="{{ asset($content->audio_english_file) }}" /></audio>
            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Audio for Swahili</label>
                                    <input type="file" name="audio_swahili_file" class="form-control @error('audio_swahili_file') is-invalid @enderror">
                                    <input type="hidden" name="hidden_swahili_file" value="{{ $content->audio_swahili_file }}" />
                                    @error('audio_swahili_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <audio controls><source src="{{ asset($content->audio_swahili_file)  }}" /></audio>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Content Status </label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="">Select Status</option>
                                <option value="1"{{ ($content->status =='1') ? 'selected' : '' }}>Active</option>
                                <option value="0"{{ ($content->status =='0') ? 'selected' : '' }}>Inactive</option>
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </section>    
  </div>  
@endsection
