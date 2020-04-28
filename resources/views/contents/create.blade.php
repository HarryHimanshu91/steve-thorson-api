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
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header languagess">
                        <h3 class="card-title">English Language</h3>
                    </div>
                    <div class="card-body">
                      <form method="post" action="{{ route('admin.saveContent1') }}">
                        @csrf
                         <input type="hidden" name="language_id" value="1">

                         <div class="form-group">
                            <label>Select Category </label>
                            <select class="form-control {{ $errors->language1->first('cat_name') ? 'is-invalid' : '' }}" placeholder="Select Category Name" name="cat_name">
                                <option value="">Select Category</option>
                                <option value="Economic"{{ (old('cat_name')=='Economic') ? 'selected' : '' }}>Economic</option>
                                <option value="Spiritual"{{ (old('cat_name')=='Spiritual') ? 'selected' : '' }}>Spiritual</option>
                                <option value="Health"{{ (old('cat_name')=='Health') ? 'selected' : '' }}>Health</option>
                                <option value="Emotional"{{ (old('cat_name')=='Emotional') ? 'selected' : '' }}>Emotional</option>
                            </select>
                            {!! $errors->language1->first('cat_name', '<span class="invalid-feedback" role="alert"> <strong>:message </strong></span>') !!}
                        </div>

                        <div class="form-group">
                            <label>Content Title </label>
                            <input type="text" name="title" class="form-control {{ $errors->language1->first('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" placeholder="Enter Category Title">
                            {!! $errors->language1->first('title', '<span class="invalid-feedback" role="alert"> <strong>:message </strong></span>') !!}
                        </div>
                        <div class="form-group">
                            <label>Content Description </label>
                            <textarea  rows="10" name="description" class="textarea form-control {{ $errors->language1->first('description') ? 'is-invalid' : '' }}"> {{ old('description') }}</textarea>
                            {!! $errors->language1->first('description', '<span class="invalid-feedback" role="alert"> <strong>:message </strong></span>') !!}
                        </div>

                        <div class="form-group">
                            <label>Content Status </label>
                            <select class="form-control {{ $errors->language1->first('status') ? 'is-invalid' : '' }}" data-placeholder="Select Status" name="status">
                                <option value="">Select Status</option>
                                <option value="1" {{ (old('status')=='1') ? "selected":"" }}>Active</option>
                                <option value="0" {{ (old('status')=='0') ? "selected":"" }}>Inactive</option>
                            </select>
                            {!! $errors->language1->first('status', '<span class="invalid-feedback"> <strong>:message </strong></span>') !!}
                        </div>
                        
                        
                       
                        <div class="col-12 col-sm-12 col-lg-12 mt-3">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>  
                      </form>
                </div>
                                <!-- /.card-body -->
                </div>
                            
            </div>


            <div class="col-md-6">
                <div class="card">
                    <div class="card-header languagess">
                        <h3 class="card-title">Swahili Language</h3>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{ route('admin.saveContent2') }}">
                        @csrf
                         <input type="hidden" name="language_id" value="2">

                         <div class="form-group">
                            <label>Select Category </label>
                            <select class="form-control {{ $errors->language2->first('cat_name') ? 'is-invalid' : '' }}" data-placeholder="Select Category Name" name="cat_name">
                                <option value="">Select Category</option>
                                <option value="Economic"{{ (old('cat_name')=='Economic') ? 'selected' : '' }}>Economic</option>
                                <option value="Spiritual"{{ (old('cat_name')=='Spiritual') ? 'selected' : '' }}>Spiritual</option>
                                <option value="Health"{{ (old('cat_name')=='Health') ? 'selected' : '' }}>Health</option>
                                <option value="Emotional"{{ (old('cat_name')=='Emotional') ? 'selected' : '' }}>Emotional</option>
                            </select>
                            {!! $errors->language2->first('cat_name', '<span class="invalid-feedback"> <strong>:message </strong></span>') !!}
                        </div>

                        <div class="form-group">
                            <label>Content Title </label>
                            <input type="text" name="title" class="form-control {{ $errors->language2->first('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" placeholder="Enter Category Title">
                            {!! $errors->language2->first('title', '<span class="invalid-feedback"> <strong>:message </strong></span>') !!}
                        </div>
                        <div class="form-group">
                            <label>Content Description </label>
                            <textarea  rows="10" name="description" class="textarea form-control {{ $errors->language2->first('description') ? 'is-invalid' : '' }}"> {{ old('description') }}</textarea>
                            {!! $errors->language2->first('description', '<span class="invalid-feedback"> <strong>:message </strong></span>') !!}
                        </div>

                        <div class="form-group">
                            <label>Content Status </label>
                            <select class="form-control {{ $errors->language2->first('status') ? 'is-invalid' : '' }}" data-placeholder="Select Status" name="status">
                                <option value="">Select Status</option>
                                <option value="1" {{ (old('status')=='1') ? "selected":"" }}>Active</option>
                                <option value="0" {{ (old('status')=='0') ? "selected":"" }}>Inactive</option>
                            </select>
                            {!! $errors->language2->first('status', '<span class="invalid-feedback"> <strong>:message </strong></span>') !!}
                        </div>
                        
                        
                       
                        <div class="col-12 col-sm-12 col-lg-12 mt-3">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>  
                      </form>
                </div>
                                <!-- /.card-body -->
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
