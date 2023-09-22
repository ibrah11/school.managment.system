@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject list</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/subject/add') }}" class="btn btn-primary">Add New Subject</a>
        </div>
      </div>
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">

                <div class="card-header">
                    <h3 class="card-title">Search Subject</h3>
                      </div>
                <form method="get" action="">
                  <div class="card card-body">
                    <div class="row">

                    <div class="form-group col-md-2">
                      <label>Name</label>
                      <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name" placeholder="name">
                    </div>

                    <div class="form-group col-md-2">
                        <label>Subject Type</label>
                        <select name="type" class="form-control" required>
                           <option value="">Select Type</option>
                           <option {{ (Request::get('type') == 'Theory') ? 'selected' : '' }} value="theory">Theory</option>
                           <option {{ (Request::get('type') == 'Practical') ? 'selected' : '' }} value="practical">Practical</option>
                        </select>
                      </div>

                    <div class="form-group col-md-2">
                        <label>date</label>
                        <input type="date" class="form-control" value=" {{ Request::get('date') }} " name="date">
                      </div>

                    <div class="form-group col-md-2">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                        <a href="{{ url('admin/subject/list') }}" class="btn btn-success" type="submit" style="margin-top: 30px;">Resert</a>
                    </div>
                </div>
                </form>

            </div>



    <div class="col-md-12">

    @include('-message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subject list</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-1">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
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
                            <td>{{ $value->type }}</td>
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
                                <a href="{{ url('admin/subject/edit'.$value->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('admin/subject/delete'.$value->id) }}" class="btn btn-danger">Delete</a>
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
