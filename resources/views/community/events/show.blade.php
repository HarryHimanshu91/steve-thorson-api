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
                      <p class="text-muted text-left mb-0"> <b> {{ $events ->contents->title }} </b> </p>
                      <p class="text-muted text-left mb-0"><b> Community - {{ $events ->community->title }} </b></p>
                    </div>
                  <div class="col-4 text-right">
                      <a href="{{ route('admin.community.createevent',['id'=>$communityId ]) }}" class="btn btn-primary btn-small">Back</a>
                  </div>
                </div>

                <div class="row align-items-center">
                 <div class="col-md-6">    
                    <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ $events ->title_one }}
                                       
                                    </h3>
                                    <p class="text-muted text-right mb-0">  {{ $events ->date_one }} </p>
                                    <p class="text-muted text-right mb-0">  {{ $events ->time_one }} </p>
                                </div>
                           
                                <div class="card-body">
                                  {{ $events ->description_one }}
                                </div>
                          
                    </div>
                          
                </div>

                <div class="col-md-6">
                    <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    {{ $events ->title_second }}
                                    </h3>
                                    <p class="text-muted text-right mb-0">  {{ $events ->date_second }} </p>
                                    <p class="text-muted text-right mb-0">  {{ $events ->time_second }} </p>
                                </div>
                           
                                <div class="card-body">
                                  {{ $events ->description_second }}
                                </div>
                          
                    </div>
                          
                </div>
                <div class="col-md-12">
                <p class="text-muted text-right"><b> Tracking Code: </b>{{ $events-> tracking_code}} </p>
                <p class="text-muted text-right"><b> Unlock Code: </b>{{ $events-> unlock_content? 'Yes' : 'No'}} </p>
                </div>
                
                
              </div> 
            </div>
           
          </div>
          <!-- /.card -->
        </div>
    </section>    
  </div>  

  
@endsection
