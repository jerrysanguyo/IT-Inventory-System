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
                            <form action="{{ route('admin-register') }}" method="post">
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
            {{ $usersDataTable->table() }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
{{ $usersDataTable->scripts() }}
@endpush