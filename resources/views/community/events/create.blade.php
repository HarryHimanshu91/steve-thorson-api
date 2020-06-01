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
                @can('isAdmin')
                  @include('community.communityNavbar')
                @endcan
                <div class="row">
                    <div class="col-12">
                        <form class="row" method="post" action="{{ route('community.events.store') }}"> 
                            @csrf  
                            <input type="hidden" name="center_id" value="{{ $id }}">   
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>English/Swahili Content Title</label>
                                            <select class="form-control select2bs4 @error('content_id') is-invalid @enderror" name="content_id">
                                                <option value="" style="display:none">Select content title...</option>
                                                @foreach($contents as $content)
                                                <option value="{{ $content->id }}" {{ (old('content_id')== $content->id ) ? 'selected' : '' }}> {{ $content->english_title.' | '.$content->swahili_title  }} </option>
                                                @endforeach
                                            </select>
                                            @error('content_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Event Title in English</label>
                                                    <input class="form-control @error('title_one') is-invalid @enderror" type="text" name="title_one" value="{{ old('title_one') }}" placeholder="Enter Event Title in English">
                                                    @error('title_one')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Event Title in Swahili</label>
                                                    <input class="form-control @error('title_second') is-invalid @enderror" type="text" name="title_second" value="{{ old('title_second') }}" placeholder="Enter Event Title in Swahili">
                                                    @error('title_second')
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
                                                    <label>Choose Event Date</label>
                                                    <input class="form-control date @error('date') is-invalid @enderror"  data-provide="datepicker" name="date" value="{{ old('date') }}" placeholder="Choose Event Date">
                                                    @error('date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Choose Event Time</label>
                                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                        <input type="text" class="form-control  @error('time') is-invalid @enderror datetimepicker-input" data-target="#timepicker" placeholder="Choose Event Time" name="time" value="{{ old('time') }}">
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Event Description in English</label>
                                                    <textarea class="form-control @error('description_one') is-invalid @enderror" name="description_one" rows="5" placeholder="Enter English Description">{{ old('description_one') }}</textarea>
                                                    @error('description_one')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Event Description in Swahili</label>
                                                    <textarea class="form-control @error('description_second') is-invalid @enderror" name="description_second" rows="5" placeholder="Enter Swahili Description">{{ old('description_second') }}</textarea>
                                                    @error('description_second')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Tracking Code</label>
                                                <input class="form-control form-control  @error('tracking_code') is-invalid @enderror" name="tracking_code" type="text" placeholder="Tracking Code" value="{{ old('tracking_code') }}">
                                                @error('tracking_code')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> 
                                            <div class="col-md-6">   
                                                <label>Unlock Content</label>         
                                                <select class="form-control form-control @error('unlock_content') is-invalid @enderror" name="unlock_content">
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
                                        </div>
                                        
                                    </div>                                
                                </div>                

                                <div class="col-12 col-sm-12 col-lg-12 mt-3">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>               
                        </form>          
                    </div> 
                    <hr class="topborderline">
                    <div class="row"> 
                            <div class="col-12">
                                <h5 class="mt-4 mb-4" >  Events Listing </h5>
                                <table id="example2" class="table table-bordered table-hover dataTable" >
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> English/Swahili Title </th>
                                            <th> Date/Time</th>
                                            <th> Tracking Code </th>
                                            <th> Unlock Content </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($events as $event) 
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $event->title_one }}
                                                <hr>
                                                {{ $event->title_second }}</td>
                                            <td>{{ $event->datetime }}</td>                            
                                            <td>{{ $event->tracking_code }}</td>
                                            <td class="{{ $event->unlock_content ? 'text-success text-bold' : 'text-danger text-bold'}}">
                                                {{ $event->unlock_content? "Yes" : "No" }}
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    @can('isAdmin')
                                                    <a title="View" href="{{ route('admin.community.listEvent', ['id'=>$event->id ,'cId'=> $event->center_id ]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    @endcan
                                                    @can('isCommunity')
                                                    <a title="View" href="{{ route('community.events.show', ['id'=>$event->id ,'cId'=> $event->center_id ]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
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