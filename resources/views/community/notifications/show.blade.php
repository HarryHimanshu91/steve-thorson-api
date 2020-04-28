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
              <div class="row align-items-center mb-4">
                 
                  <div class="col-8">
                      <p class="text-muted text-left mb-0"><b> Community - {{ $notifications ->community->title }} </b></p>
                    </div>
                  <div class="col-4 text-right">
                      <a href="{{ route('admin.community.createnotification',['id'=>$communityId ]) }}" class="btn btn-primary btn-small">Back</a>
                  </div>
              </div>
              <div class="row">
                 <div class="col-md-6">    
                    <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ $notifications ->title_one }}
                                       
                                    </h3>
                                    <p class="text-muted text-right mb-0">  {{ $notifications ->date_one }} </p>
                                    <p class="text-muted text-right mb-0">  {{ $notifications ->time_one }} </p>
                                </div>
                           
                                <div class="card-body">
                                  {{ $notifications ->description_one }}
                                </div>
                          
                    </div>
                          
                </div>

                <div class="col-md-6">
                    <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    {{ $notifications ->title_second }}
                                    </h3>
                                    <p class="text-muted text-right mb-0">  {{ $notifications ->date_second }} </p>
                                    <p class="text-muted text-right mb-0">  {{ $notifications ->time_second }} </p>
                                </div>
                           
                                <div class="card-body">
                                  {{ $notifications ->description_second }}
                                </div>
                          
                    </div>
                          
                </div>
               
                
                
              </div> 
            </div>
           
          </div>
          <!-- /.card -->
        </div>
    </section>    
  </div>  

  
@endsection
