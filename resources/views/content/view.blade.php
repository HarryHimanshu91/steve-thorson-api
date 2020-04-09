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
                      <a href="{{ route('admin.content.create') }}" class="btn btn-primary btn-small">Add Content </a>
                  </div>
              </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Content Title </th>
                        <th>Content Description </th>
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
                        <td>{{ $i++  }}</td>
                        <td>{{ $content->title }}</td>
                        <td> {!! Str::limit($content->description,250) !!} </td>
                        <td>{{ $content->cat_name }}</td>
                        <td class="{{ $content->status ? 'text-danger text-bold' : 'text-success text-bold'}}">{{ $content->status? "Inactive" : "Active" }}</td>
                        <td>{{ $content->created_at }}</td>
                        <td>{{ $content->updated_at }}</td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a title="Edit" href="{{ route('admin.content.edit', $content->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                          &nbsp;
                          <a title="View" href="{{ route('admin.content.show', $content->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                          &nbsp;
                            <form method="post" class="delete_form" action="{{ route('admin.content.destroy', $content->id )}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </form>

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
