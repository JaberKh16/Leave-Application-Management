@extends('admin.layouts.admin-layout')

@section('user-content')
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
                                        @if ($record->register_status === 'active')
                                            <span class="badge badge-success">{{ $record->register_status }}</span>
                                        @else
                                        <span class="badge badge-danger">{{ $record->register_status }}</span>
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