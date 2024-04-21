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
                                    <td>{{ strip_tags($record->reason_leave) }}</td>
                                    {{-- <td><span class="badge badge-success">{{ $record->review_status }}</span></td> --}}
                                    <td>
                                        @if ($record->review_status === 'active')
                                            <span class="badge badge-success pt-2 pb-2 ps-4 pe-4">{{ $record->review_status }}</span>
                                        @else
                                            <span class="badge badge-danger pt-2 pb-2 ps-4 pe-4">{{ $record->review_status }}</span>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $record->comments }}</td> --}}
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