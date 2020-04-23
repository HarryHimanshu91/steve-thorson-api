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
                      <h3 class="card-title">Admin List</h3>
                  </div>
                  <div class="col-6 text-right">
                      <a href="{{ route('admin.admins.create') }}" class="btn btn-primary btn-small">Add Admin</a>
                  </div>
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable" >
                <thead>
                    <tr>
                        <th>Unique ID</th>
                        <th>Email ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->role['name'] }}</td>
                        <td class="{{ $admin->status ? 'text-success text-bold' : 'text-danger text-bold'}}">{{ $admin->status ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>{{ $admin->updated_at }}</td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a title="Edit" href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a title="Delete" href="javascript:void(0)" onclick="onDeleteAdmin({{ $admin->id }})" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
              </table> 
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </section>    
  </div>  
@endsection
@section('scripts')
<script>
  function onDeleteAdmin(adminId){
    $.confirm({
      title:"Are you sure?",
      content: 'Please be careful, Admin user will be deleted permanently from admin. <br> Do you really want to delete this user? ',
      buttons: {
        confirm: function () {
          $.ajax({
            url: 'admins/'+adminId,
            type:'DELETE',
            data:{"_token": "{{ csrf_token() }}"},
            success:function(data){
              if(data.status===200){
                sessionStorage.reloadAfterPageLoad = true;
                sessionStorage.setItem('message',data.message);
                window.location.reload();
              }else if(data.status===403){
                toastr.error(data.message);
              }
            }
          })
        },
        cancel: function () {
              
        }
      }
    })
  }
</script>
@endsection