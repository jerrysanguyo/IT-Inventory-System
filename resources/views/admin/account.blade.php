@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Manage Users</div>
        <div class="card-body">
            <table id="users-table" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role ID</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th> <!-- Add this header for the actions column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#users-table').DataTable({
        "processing": true,
        "serverSide": false,
        "pageLength": 10,
        "order": [[0, "asc"]],
    });
});
</script>
@endpush