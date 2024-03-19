@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card">
            <form action="{{ route('admin.accounts.change.pw', $acc->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-header d-flex justify-content-between ">
                    <h1>Account details of {{ $acc->name }}</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $acc->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" name="email" id="name" class="form-control" value="{{ $acc->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="newpw" class="form-label">New password:</label>
                            <input type="password" name="password" id="newpw" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-12">
                        <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection