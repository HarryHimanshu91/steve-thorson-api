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
                        @can('isAdmin')
                        @include('community.communityNavbar')
                        @endcan
                        <form  method="post" action="{{ route('community.notifications.store') }}">
                                @csrf    
                                <input type="hidden" name="center_id" value="{{ $id }}">    
                                <div class="row">     
                                    <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Notification Title in English</label>
                                                        <input class="form-control @error('title_one') is-invalid @enderror" type="text" name="title_one" value="{{ old('title_one') }}" placeholder="Enter Notification Title for English">
                                                        @error('title_one')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Notification Title in Swahili</label>
                                                        <input class="form-control @error('title_second') is-invalid @enderror" type="text" name="title_second" value="{{ old('title_second') }}" placeholder="Enter Notification Title for Swahili">
                                                        @error('title_second')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Notification Date</label>
                                                        <input class="form-control date @error('date') is-invalid @enderror"  data-provide="datepicker" name="date" value="{{ old('date') }}" placeholder="Choose Notification Date">
                                                        @error('date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Notification Time</label>
                                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                            <input type="text" class="form-control  @error('time') is-invalid @enderror datetimepicker-input" data-target="#timepicker" placeholder="Choose Notification Time" name="time" value="{{ old('time') }}">
                                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                            </div>
                                                        </div>
                                                        @error('time')
                                                            <span class="invalid-feedback" role="alert" style="display:block">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Notification Description in English</label>    
                                                        <textarea class="form-control @error('description_one') is-invalid @enderror" name="description_one" rows="5" placeholder="Enter Notification Description for English">{{ old('description_one') }}</textarea>
                                                        @error('description_one')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Notification Description in Swahili</label>
                                                        <textarea class="form-control @error('description_second') is-invalid @enderror" name="description_second" rows="5" placeholder="Enter Notification Description for Swahili">{{ old('description_second') }}</textarea>
                                                        @error('description_second')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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

                        </div>   

                        <div class="row"> 
                            <div class="col-12">
                                <h5 class="mt-4 mb-4" >  Notification Listing </h5>
                                <table id="example2" class="table table-bordered table-hover dataTable" >
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> English/Swahili Title </th>
                                            <th> Date/Time</th>
                                            <th> Created At </th>
                                            <th> Action </th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($notifications as $notification) 
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $notification->title_one }}
                                                <hr>
                                                {{ $notification->title_second }}</td>
                                            <td>{{ $notification->date }} - {{ $notification->time }}</td>
                                            <td>{{ $notification->created_at }}</td>
                                        <td>
                                        <div class="btn-group btn-group-sm">
                                            @can('isAdmin')
                                            <a href="{{ route('admin.community.listNotification', ['id'=>$notification->id ,'cId'=> $notification->center_id ] ) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                            @endcan
                                            @can('isCommunity')
                                            <a href="{{ route('community.notifications.show', ['id'=>$notification->id ,'cId'=> $notification->center_id ] ) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                            @endcan
                                        </div>
                                        </td>
                                        
                                        </tr>
                                    @endforeach         
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
