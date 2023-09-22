@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class list</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/class/add') }}" class="btn btn-primary">Add New Class</a>
        </div>
      </div>
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              @include('-message')

                <div class="card-header">
                    <h3 class="card-title">Search Class</h3>
                      </div>
                <form method="get" action="">
                  <div class="card card-body">
                    <div class="row">

                    <div class="form-group col-md-2">
                      <label>Name</label>
                      <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name" placeholder="name">
                    </div>

                    <div class="form-group col-md-2">
                        <label>date</label>
                        <input type="date" class="form-control" value=" {{ Request::get('date') }} " name="date" placeholder="Enter email">
                      </div>

                    <div class="form-group col-md-2">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                        <a href="{{ url('admin/class/list') }}" class="btn btn-success" type="submit" style="margin-top: 30px;">Resert</a>
                    </div>
                </div>
                </form>

            </div>



    <div class="col-md-12">

    @include('-message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Class list</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-1">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                @if($value->status == 0)
                                    <a href="#" class="btn btn-success">Active</a>
                                    @else
                                    <a href="#" class="btn btn-danger">Inactive</a>
                                @endif
                             </td>
                            <td>{{ $value->created_by_name }}</td>
                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                            <td>
                                <a href="{{ url('admin/class/edit'.$value->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('admin/class/delete'.$value->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding:10px; float: right"> {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
  </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

@endsection
