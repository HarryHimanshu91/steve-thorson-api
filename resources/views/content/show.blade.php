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
                 <div class="col-md-12">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                               
                               Title- {{ $content-> title }}
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <dl>
                                <dt> Category - {{ $content->cat_name }}</dt>
                                <dd><b> Description- </b>{!! $content->description !!}</dd>
                               
                                </dl>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
        
                
              </div> 
            </div>
           
          </div>
          <!-- /.card -->
        </div>
    </section>    
  </div>  

  
@endsection
