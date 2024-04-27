@extends('admin.layouts.admin-layout')

@section('user-content')

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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Register Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_records as $record)
                            <tr role="row" class="odd">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $record->fullname }}</td>
                                <td>{{ $record->email }}</td>
                                <td>
                                    @if ($record->register_status === 'approved')
                                        <span class="badge badge-success pt-2 pb-2 ps-4 pe-4">{{ $record->register_status }}</span>
                                    @else
                                    <span class="badge badge-danger pt-2 pb-2 ps-4 pe-4">{{ $record->register_status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($record->register_status === 'approved')
                                        <a href="{{ route('update-user-status', ['users', $record->id, 'pending']) }}" type="button" class="btn btn-warning text-white">Reject</a>
                                    @else
                                        <a href="{{ route('update-user-status', ['users', $record->id, 'approved']) }}" type="button" class="btn btn-primary text-white">Approve</a>
                                    @endif
                                </td>
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