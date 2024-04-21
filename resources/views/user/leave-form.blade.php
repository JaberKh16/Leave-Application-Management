@extends('layouts.app')
@section('content')
    

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
                    </div>
                </div>
                @if ($errors->has('leave_type'))
                    <span class="text-danger font-weight-bolder d-block mb-2">{{ $errors->first('leave_type')}}</span>
                @endif
            
                {{-- Start Date --}}
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Date</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="form-group">
                            <label>Date Time Picker</label>
                            <input type="text" class="form-control datetimepicker" name="start_date">
                        </div>
                    </div>
                </div>
                @if ($errors->has('start_date'))
                    <span class="text-danger font-weight-bolder d-block mb-2">{{ $errors->first('start_date')}}</span>
                @endif
                {{-- End Date --}}
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="form-group">
                            <label>Date Time Picker</label>
                            <input type="text" class="form-control datetimepicker" name="end_date">
                        </div>
                    </div>
                </div>
                @if ($errors->has('end_date'))
                    <span class="text-danger font-weight-bolder d-block mb-2">{{ $errors->first('end_date')}}</span>
                @endif
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reason</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" style="display: none;" name="reason_leave"></textarea>
                    </div>
                </div>
                @if ($errors->has('reason_leave'))
                    <span class="text-danger font-weight-bolder d-block mb-2">{{ $errors->first('reason_leave')}}</span>
                @endif

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