@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between ">
                <h1>Manage Users</h1>
                <!-- modal account registration -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add account
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="exampleModalLabel">Account registration</h1>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.accounts.register') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="forName" class="form-label">Name:</label>
                                            <input type="text" name="name" id="forName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="forEmail" class="form-label">Email:</label>
                                            <input type="text" name="email" id="forEmail" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="forPassword" class="form-label">Password:</label>
                                            <input type="password" name="password" id="forPassword" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="forRole" class="form-label">Role:</label>
                                            <select name="role_Id" id="forRole" class="form-select">
                                                @foreach($listRoles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Add account">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal admin registration -->
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table id="users-table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_Id }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.accounts.details', ['acc' => $user->id]) }}">View details</a></li>
                                        <li><a class="dropdown-item" href="# ">Assign to Admin</a></li>
                                        <li><a class="dropdown-item" href="#">Assign to User</a></li>
                                        <hr>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
@endsection