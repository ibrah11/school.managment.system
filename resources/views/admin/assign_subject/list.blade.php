@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Subject List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/assign_subject/add') }}" class="btn btn-primary">Add New Assign Subject</a>
        </div>
      </div>
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">

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
                        <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-success" type="submit" style="margin-top: 30px;">Resert</a>
                    </div>
                </div>
                </form>

            </div>



    <div class="col-md-12">

    @include('-message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Assign Subject list</h3>
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

                  </tbody>
                </table>

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
