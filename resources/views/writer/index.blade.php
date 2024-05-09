@extends ('layouts.app')

@section('title', 'Writer')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header ">
              <h3 class="card-title">DataTable with default features</h3><br>
              <div>
                <a href="{{route('writer.create')}}" class="btn btn-success"> Add Writer</a>
              </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#SL</th>
                    <th>Picture</th>
                    <th>Writer Name</th>
                    <th>Short Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $writers as $key=>$item )
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->image}}</td>
                    <td>{{$item->writer_name}}</td>
                    <td>{{$item->short_description}}</td>
                    <td>
                      <a class="btn btn-secondary" href="{{route('employee.edit', $item->id)}}"><i class="bi bi-pencil-square">Edit</i></a>

                      <a class="btn btn-danger" href="{{route('employee.destroy', $item->id)}}" onclick="return confirm('Are you sure to delete')"><i class="bi bi-trash">Delete</i></a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
                <tfoot>
                  <tr>
                    <th>#SL</th>
                    <th>Picture</th>
                    <th>Writer Name</th>
                    <th>Short Description</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection