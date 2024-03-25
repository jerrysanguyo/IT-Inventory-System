@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between ">
                <h1>Manage Equipment</h1>
                <!-- modal account registration -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Equipment
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="exampleModalLabel">Equipment insertion</h1>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.add.equipment') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="forName" class="form-label">Equipment name:</label>
                                            <input type="text" name="equipment_name" id="forName" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Add Equipment">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal admin registration -->
            </div>
            <div class="card-body">
                <table class="table" id="equipmentTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Equipment Name</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listOfEquipments as $equipment)
                        <tr>
                            <td>{{ $equipment->id }}</td>
                            <td>{{ $equipment->equipment_name }}</td>
                            <td>{{ $equipment->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>{{ $equipment->updated_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <!-- Dropdown for actions like edit and delete -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
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

    @push('scripts')
    <script>
    $('#equipmentTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('admin.equipment') }}",
        "columns": [
            { "data": "id" },
            { "data": "equipment_name" },
            { "data": "created_at" },
            { "data": "updated_at" },
            { "data": "action", "orderable": false, "searchable": false }
        ]
    });
    </script>
    @endpush
@endsection