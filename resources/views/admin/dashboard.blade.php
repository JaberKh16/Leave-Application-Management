@extends('admin.layouts.admin-layout')

@section('user-content')
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Users</h4>
        </div>
        <div class="card-body">
          {{ $user_records }}
        </div>
      </div>
    </div>
  </div>
   <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Active Users</h4>
        </div>
        <div class="card-body">
          {{ $user_active_records }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Inctive Users</h4>
        </div>
        <div class="card-body">
          {{ $user_inactive_records }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="far fa-newspaper"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Leave Application</h4>
        </div>
        <div class="card-body">
          {{ $leave_records }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="far fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Leave Approved</h4>
        </div>
        <div class="card-body">
           {{ $leave_approve_records }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Rejected Approved</h4>
        </div>
        <div class="card-body">
         {{ $leave_reject_records }}
        </div>
      </div>
    </div>
  </div>                  
</div>
@endsection