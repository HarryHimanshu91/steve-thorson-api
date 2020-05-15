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
                      <h3 class="card-title">Content List</h3>
                  </div>
                  <div class="col-6 text-right">
                      <a href="{{ route('admin.createContent') }}" class="btn btn-primary btn-small">Add Content </a>
                  </div>
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>English/Swahili Content Title </th>
                        <th>English/Swahili Audio </th>
                        <th>Category  </th>
                        <th>Status  </th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                 @php  $i=1; @endphp
                 @foreach($contents as $content)
              
                 <tr>
                        <td>{{ $content->id  }}</td>
                        <td>{{ $content->english_title }}
                            <hr>
                            {{ $content->swahili_title }}</td>
                        <td> 
                            <audio controls><source src="{{ asset($content->audio_english_file) }}" /></audio>
                            <hr>
                            <audio controls><source src="{{ asset($content->audio_swahili_file) }}" /></audio>                           
                        </td>
                        <td>{{ $content->cat_name }}</td>
                        <td class="{{ $content->status ? 'text-success' : 'text-danger'}}">{{ $content->status ? "Active" : "Inactive" }}</td>
                        <td>{{ $content->created_at }}</td>
                        <td>{{ $content->updated_at }}</td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a title="Edit" href="{{ route('admin.editContent', $content->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a title="View" href="{{ route('admin.showContent', $content->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                            <a title="Delete" href="javascript:void(0)" onclick="onDeleteContent({{ $content->id }})" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
  function onDeleteContent(contentId){
    $.confirm({
      title:"Are you sure?",
      content: 'Please be careful, Content will be deleted permanently from admin. <br> Do you really want to delete this content? ',
      buttons: {
        confirm: function () {
          $.ajax({
            url: 'content/delete/'+contentId,
            type:'POST',
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
