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
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary btn-small">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" method="POST" action="{{ route('admin.category.update', $category->id ) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Category </label>
                            <select class="form-control @error('cat_name') is-invalid @enderror" data-placeholder="Select Status" name="cat_name">
                                <option value="">Select Category</option>
                                <option value="Category A"{{ ($category->cat_name =='Category A') ? 'selected' : '' }}> Category A </option>
                                <option value="Category B"{{ ($category->cat_name =='Category B') ? 'selected' : '' }}> Category B </option>
                                <option value="Category C"{{ ($category->cat_name =='Category C') ? 'selected' : '' }}> Category C </option>

                            </select>
                            @error('cat_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Content Title </label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $category->title }}" placeholder="Enter Category Title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Content Description </label>
                            <textarea rows="5" name="description" class="textarea form-control @error('description') is-invalid @enderror"> {{ $category->description }}</textarea>
                            @error('description')
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
