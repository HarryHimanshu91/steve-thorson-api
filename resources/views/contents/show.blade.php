@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                  {{ $content->english_title }}
                </h3>
                <p class="text-muted text-right">{{ $content->cat_name }}</p>
            </div>
            <div class="card-body">
              {!! $content->english_description !!}
            </div>
         </div>   
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                  {{ $content->swahili_title }}
                </h3>
                <p class="text-muted text-right">{{ $content->cat_name }}</p>
            </div>
            <div class="card-body">
              {!! $content->swahili_description !!}
            </div>
          </div>
        </div>
      </div>        
    </section>    
  </div>  

  
@endsection
