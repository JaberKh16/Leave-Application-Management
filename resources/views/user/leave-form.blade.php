@extends('layouts.app')
@section('content')
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    </script>
@elseif (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
        });
    </script>
@endif
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h4>Leave Application Form</h4>
        </div>
        <form action="{{ route('user.leave-submit') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Leave Type</label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="leave_type">
                            <option value="" selected disabled>Please select leave option</option>
                            <option value="Casual">Casual Leave</option>
                            <option value="Sick">Sick Leave</option>
                            <option value="Emergency">Emergency Leave</option>
                        </select>
                        @if ($errors->has('leave_type'))
                            <div class="text-danger font-weight-bolder d-block mb-2">{{ $errors->first('leave_type')}}</div>
                        @endif
                    </div>
                </div>
               
            
                {{-- Start Date --}}
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Date</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="form-group">
                            <input type="text" class="form-control datetimepicker" name="start_date">
                        </div>
                        @if ($errors->has('start_date'))
                            <div class="text-danger font-weight-bolder d-block mb-2">{{ $errors->first('start_date')}}</div>
                        @endif
                    </div>
                </div>
               
                {{-- End Date --}}
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="form-group">
                            <input type="text" class="form-control datetimepicker" name="end_date">
                        </div>
                        @if ($errors->has('end_date'))
                            <div class="text-danger font-weight-bolder d-block mb-2">{{ $errors->first('end_date')}}</div>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reason</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" style="display: none;" name="reason_leave"></textarea>
                        @if ($errors->has('reason_leave'))
                            <div class="text-danger font-weight-bolder d-block mb-2">{{ $errors->first('reason_leave')}}</div>
                        @endif
                    </div>
                </div>
                

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <input type="text" style="display: none; " name="user_id" value="{{ Auth::id() }}">

            </div>
        </form>
    </div>
    </div>
</div>

@endsection