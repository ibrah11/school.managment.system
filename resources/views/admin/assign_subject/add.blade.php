@extends('layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Subject Add</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">

              <!-- form start -->
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card card-body">
                  <div class="form-group">
                    <label>Class Name</label>
                    <select name="status" class="form-control" name="class_id" required>
                        <option value="">Select Class</option>
                        @foreach ($getClass as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Subject Name</label>

                        @foreach ($getSubject as $subject)
                        <div>
                            <label for="" style="font-weight: normal;">
                                <input type="checkbox" value="{{ $subject->id }}" name="subject_id[]"> {{ $subject->name }}
                            </label>
                        </div>
                        @endforeach

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
