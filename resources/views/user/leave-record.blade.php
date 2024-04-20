@extends('layouts.app')

@section('content')

  @if (session()->has('success'))
        @php
            $msg = session()->get('success', 'default');
        @endphp
        <div class="alert alert-primary p-3">{{ $msg }}</div>
    @elseif (session()->has('error'))
        @php
            $msg = session()->get('error', 'default');
        @endphp
        <div class="alert alert-primary p-3">{{ $msg }}</div>
    @endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Leave Records</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped dataTable no-footer" id="table-1" role="grid">
                        <thead>
                            <tr role="row">
                                <th>#</th>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Leave Reason</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       <tbody>
                            @foreach ($all_records as $record)
                                <tr role="row" class="odd">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $record->leave_type }}</td>
                                    <td>{{ $record->start_date }}</td>
                                    <td>{{ $record->end_date }}</td>
                                    <td>{{ $record->reason_leave }}</td>
                                    <td><span class="badge badge-success">{{ $record->review_status }}</span></td>
                                    <td>{{ $record->comments }}</td>
                                    {{-- <td><a href="#" class="btn btn-secondary">Detail</a></td> --}}
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection