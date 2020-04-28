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
                      <h3 class="card-title">Community Notification </h3>
                  </div>
                
              </div> 
            </div>
            <!-- /.card-header -->
<div class="card-body">
                  @include('community.communityNavbar')

<div class="container">
    <form  method="post" action="{{ route('admin.community.notification.store') }}">
       @csrf    
       <input type="hidden" name="center_id" value="{{ $id }}">  
        <div class="row">     
          <div class="col-md-6">
            <div class="card">
                <div class="card-header languagess">
                     <h3 class="card-title">English Language</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control @error('title_one') is-invalid @enderror" type="text" name="title_one" value="{{ old('title_one') }}" placeholder="Enter Title">
                        @error('title_one')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control date @error('date_one') is-invalid @enderror"  data-provide="datepicker" name="date_one" value="{{ old('date_one') }}" placeholder="Choose Date">
                        @error('date_one')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" class="form-control  @error('time_one') is-invalid @enderror datetimepicker-input" data-target="#timepicker" placeholder="Choose Time" name="time_one" value="{{ old('time_one') }}">
                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
                        @error('time_one')
                            <span class="invalid-feedback" role="alert" style="display:block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('description_one') is-invalid @enderror" name="description_one" rows="5" placeholder="Enter Description">{{ old('description_one') }}</textarea>
                        @error('description_one')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                                         
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
                <div class="card-header languagess">
                     <h3 class="card-title">Swahili Language</h3>
                </div>
                 <div class="card-body">
                    <div class="form-group">
                        <input class="form-control @error('title_second') is-invalid @enderror" type="text" name="title_second" value="{{ old('title_second') }}" placeholder="Enter Title">
                        @error('title_second')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control date @error('date_second') is-invalid @enderror"  data-provide="datepicker" name="date_second" value="{{ old('date_second') }}" placeholder="Choose Date">
                        @error('date_second')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                            <input type="text" class="form-control  @error('time_second') is-invalid @enderror datetimepicker-input" data-target="#timepicker1" placeholder="Choose Time" name="time_second" value="{{ old('time_second') }}">
                            <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
                        @error('time_second')
                            <span class="invalid-feedback" role="alert" style="display:block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('description_second') is-invalid @enderror" name="description_second" rows="5" placeholder="Enter Description">{{ old('description_second') }}</textarea>
                        @error('description_second')
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

    <hr class="topborderline">
<!--Events Listing-->
    <div class="row"> 
            <div class="col-12">
                <h5 class="mt-4 mb-4" >  Notification Listing </h5>
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
                           
                        </tr>
                    </thead>
                    <tbody>
                       @php $i=1; @endphp
                       @foreach($notifications as $notification) 
                         <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $notification->title_one }}</td>
                            <td>{{ $notification->date_one }} - {{ $notification->time_one }} </td>
                            <td>{{ $notification->description_one }}</td>
                            <td>{{ $notification->title_second }}</td>
                            <td>{{ $notification->date_second }} - {{ $notification->time_second }} </td>
                            <td>{{ $notification->description_second }}</td>
                           
                         </tr>
                       @endforeach         
                    </tbody>
                </table> 
            </div>
    
    </div>
<!--Events End------>
</div>             
</div>
            <!-- /.card-body -->
          </div>
          <!-- /.col12 -->
        </div>
    </section>    
  </div>  
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#timepicker').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('#timepicker1').datetimepicker({
            format: 'LT'
        });
    });
</script>
@endsection
