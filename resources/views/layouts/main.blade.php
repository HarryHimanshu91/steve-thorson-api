<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/enlarge.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }} ">
    <style>
      ul.custom-navbar {
        display: inline-block;
        width: 100%; padding-left: 0;
        background-color: #f8f8f8;
        border-color: #e7e7e7;
      }
      ul.custom-navbar li {
        display: block;
        float: left;
        margin: 10px;
        padding: 10px;
      }
    li.custom-link.active { background: #007bff;}
    li.custom-link.active a { color: #fff; }
    span.languagestyles { margin-left: 20px; font-weight: bold; color: #007bff; }
    .card-header.languagess {background-color: #007bff; color: #fff; }
    span.err-block { color: #dc3545; }
    .card-header.customstyle {
        background-color: #fff;
        color: #000;
        border: 1px solid #ccc;
    }
    </style>
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('admin') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('admin/change-password') }}" class="nav-link">Change Password</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->email }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('admin') }}" class="brand-link pl-4">
          <span class="brand-text font-weight-light">{{ config('app.name', 'Care For AIDS') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->

          @include('partials.menu')
        </div>
        <!-- /.sidebar -->
      </aside>
      @yield('content')
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 Care For AIDS.</strong> All rights reserved.
      </footer>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    
	 
    	<script>
		  $(function () {
			// Summernote
		   	$('.textarea').summernote({
          height: 200,
          focus: true
         });
         
		  })
		</script>

    <script>

        $(function () {
              if ( sessionStorage.reloadAfterPageLoad ) {
                  toastr.success(sessionStorage.getItem('message'));
                  sessionStorage.clear();
              }
        });

        $(document).ready(function() { 
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4',
          });

         // $('#notification_date').daterangepicker()

        })

        
        $(document).ready(function() {
            $('#example2').DataTable({
              "order": [[ 0, "desc" ]]
            });
        });

        $(document).ready(function() {
            $('#example').DataTable({
              "order": [[ 1, "asc" ]],
              stateSave: true
            });
        });

        $(document).ready(function () {
          bsCustomFileInput.init();
        });


        $(document).ready(function(){
             $('.delete_form').on('submit', function(){
                if(confirm("Are you sure you want to delete it?"))
                  {
                      return true;
                  }
                  else
                  {
                    return false;
                  }
            });
        });
        
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{!! Session::get('message') !!}");
                    break;
            }
        @endif

        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#preview').attr('src', e.target.result);
              $('#preview').css('display','block');
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#exampleInputFile").change(function() {
          readURL(this);
        });

       


    </script>

   

    @yield('scripts')
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
  </body>
</html>
