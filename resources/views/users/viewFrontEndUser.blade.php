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
                      <td><b> First Name </b> </td>
                      <td> {{ $data->firstname }}</td>
                     
                    </tr>
                    <tr>
                      <td><b> Last Name </b> </td>
                      <td> {{ $data->lastname }}</td>
                     
                    </tr>
                    <tr>
                      <td><b> Phone Number </b> </td>
                      <td> {{ $data->phone }}</td>
                     
                    </tr>
                    <tr>
                      <td><b> Region  </b> </td>
                      <td> {{ $data->region }}</td>
                     
                    </tr>
                    <tr>
                      <td><b> Center </b> </td>
                      <td> {{ $data->center }}</td>
                     
                    </tr>
                    <tr>
                      <td><b> Created At </b> </td>
                      <td> {{ $data->created_at }}</td>
                     
                    </tr>
                    <tr>
                      <td><b> Updated At </b> </td>
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
