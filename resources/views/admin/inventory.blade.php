@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between ">
                <h1>Manage Department</h1>
                <!-- modal account registration -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Department
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="exampleModalLabel">Department insertion</h1>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="#" method="post">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="forName" class="form-label">Department name:</label>
                                            <input type="text" name="department_name" id="forName" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Add department">
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
                <table class="table" id="department-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Equipment name</th>
                            <th>Serial Number</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- @push('scripts')
        <script>
        $(document).ready(function() {
            $('#department-table').DataTable({
                "processing": true,
                "serverSide": false,
                "pageLength": 10,
                "order": [[0, "asc"]],
            });
        });
        </script>
    @endpush -->
@endsection