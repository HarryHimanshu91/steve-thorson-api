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
                      <h3 class="card-title">Member Details</h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td style="vertical-align:middle"><b>Profile</b></td>
                            <td><img src="{{ $data->profile_path ? $data->profile_path : asset('img/no-image.png') }}" width="80" height="80" style="border-radius:10px"/></td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle"><b> First Name </b> </td>
                            <td> {{ $data->firstname }}</td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle"><b> Last Name </b> </td>
                            <td> {{ $data->lastname }}</td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle"><b> Phone Number </b> </td>
                            <td> {{ $data->phone }}</td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle"><b> Region  </b> </td>
                            <td> {{ $data->region['region']  }}</td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle"><b> Center </b> </td>
                            <td> {{ $data->center['title'] }}</td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle"><b> Created At </b> </td>
                            <td> {{ $data->created_at }}</td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle"><b> Updated At </b> </td>
                            <td> {{ $data->updated_at }}</td>
                          </tr>
                        </tbody>
                      </table>
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
