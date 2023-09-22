@extends('layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Subject</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            @include('-message')

              <!-- form start -->
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card card-body">
                  <div class="form-group">
                    <label>Subject Name</label>
                    <input type="text" class="form-control" name="name" required placeholder="Subject name">
                  </div>

                  <div class="form-group">
                    <label>Subject Type</label>
                    <select name="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="theory">Theory</option>
                        <option value="practical">Practical</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="0">Active</option>
                        <option value="1">Inctive</option>
                    </select>
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

@endsection
