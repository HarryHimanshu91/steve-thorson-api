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
                      <h3 class="card-title">Community Event </h3>
                  </div>
                
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  @include('community.communityNavbar')

<div class="row">
    <div class="col-12">
        <form class="row" method="post" action="{{ route('admin.community.events.store') }}"> 
            @csrf  
            <input type="hidden" name="center_id" value="{{ $id }}">       
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header languagess">
                        <h3 class="card-title">Language 1</h3>
                    </div>
                    <div class="card-body">
                        <input class="form-control @error('title_one') is-invalid @enderror" type="text" name="title_one" value="{{ old('title_one') }}" placeholder="Enter Title">
                        @error('title_one')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <input class="form-control @error('date_one') is-invalid @enderror" type="date" name="date_one" value="{{ old('date_one') }}" placeholder="Choose Date">
                        @error('date_one')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <input class="form-control @error('time_one') is-invalid @enderror" type="time" name="time_one" value="{{ old('time_one') }}" placeholder="Choose Time">
                        @error('time_one')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <textarea class="form-control @error('description_one') is-invalid @enderror" name="description_one" rows="5" placeholder="Enter Description">{{ old('description_one') }}</textarea>
                        @error('description_one')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                                <!-- /.card-body -->
                </div>
                            
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header languagess">
                        <h3 class="card-title">Language 2 </h3>
                    </div>
                    <div class="card-body">
                        <input class="form-control @error('title_second') is-invalid @enderror" type="text" name="title_second" value="{{ old('title_second') }}" placeholder="Enter Title">
                        @error('title_second')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <input class="form-control @error('date_second') is-invalid @enderror" type="date" name="date_second" value="{{ old('date_second') }}" placeholder="Choose Date">
                        @error('date_second')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <input class="form-control @error('time_second') is-invalid @enderror" type="time" name="time_second" value="{{ old('time_second') }}" placeholder="Choose Time">
                        @error('time_second')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <textarea class="form-control @error('description_second') is-invalid @enderror" name="description_second" rows="5" placeholder="Enter Description"> {{ old('description_second') }} </textarea>
                        @error('description_second')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                                <!-- /.card-body -->
                </div>
                            
            </div>  
            
            <div class="col-md-6">
                <input class="form-control form-control-lg  @error('tracking_code') is-invalid @enderror" name="tracking_code" type="text" placeholder="Tracking Code" value="{{ old('tracking_code') }}">
                @error('tracking_code')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>  
            <div class="col-md-6">
            
                <select class="form-control form-control-lg @error('unlock_content') is-invalid @enderror" name="unlock_content">
                <option value=""> Select to Unlock Content  </option>
                <option value="1"{{ (old('unlock_content')=='1') ? 'selected' : '' }}> Yes </option>
                <option value="0"{{ (old('unlock_content')=='0') ? 'selected' : '' }}> No </option>
                
                </select>
                @error('unlock_content')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>                

            <div class="col-12 col-sm-12 col-lg-12 mt-3">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>               
        </form>          
     </div>             
</div>

<hr class="topborderline">
<!--Events Listing-->
    <div class="row"> 
            <div class="col-12">
                <h5 class="mt-4 mb-4" >  Events Listing </h5>
                <table id="example2" class="table table-bordered table-hover dataTable" >
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Title </th>
                            <th> Date/Time</th>
                            <th> Description</th>
                            <th> Title </th>
                            <th> Date/Time </th>
                            <th> Description</th>
                            <th> Tracking Code </th>
                            <th> Unlock Content </th>
                        </tr>
                    </thead>
                    <tbody>
                       @php $i=1; @endphp
                       @foreach($events as $event) 
                         <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $event->title_one }}</td>
                            <td>{{ $event->date_one }} - {{ $event->time_one }} </td>
                            <td>{{ $event->description_one }}</td>
                            <td>{{ $event->title_second }}</td>
                            <td>{{ $event->date_second }} - {{ $event->time_second }} </td>
                            <td>{{ $event->description_second }}</td>
                            <td>{{ $event->tracking_code }}</td>
                            <td class="{{ $event->unlock_content ? 'text-success text-bold' : 'text-danger text-bold'}}">
                            {{ $event->unlock_content? "Yes" : "No" }}
                            </td>
                         </tr>
                       @endforeach         
                    </tbody>
                </table> 
            </div>
    
    </div>
<!--Events End------>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.col12 -->
        </div>
    </section>    
  </div>  
@endsection
