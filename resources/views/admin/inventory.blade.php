@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between ">
                <h1>Manage Items</h1>
                <!-- modal account registration -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Item
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="exampleModalLabel">Item insertion</h1>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.add.inventory') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="eqn" class="form-label">Equipment name:</label>
                                            <input type="text" name="equipment_name" id="eqn" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="eqt" class="form-label">Equipment Type</label>
                                                <select name="equipment_id" id="eqt" class="form-select">
                                                    @foreach ($listOfEquipment as $equipment)
                                                        <option value="{{ $equipment->id }}">{{ $equipment->equipment_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="unit" class="form-label">Unit</label>
                                                <select name="unit_id" id="unit" class="form-select">
                                                    @foreach ($listOfUnit as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="qty" class="form-label">Quantity</label>
                                                <input type="number" name="quantity" id="qty" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="sernum" class="form-label">Serial Number</label>
                                            <input type="text" name="serial_number" id="sernum" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="user" class="form-label">Issued to</label>
                                            <input type="text" name="user" id="user" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="dept" class="form-label">Department</label>
                                                <select name="department_id" id="dept" class="form-select">
                                                    @foreach ($listOfDepartment as $department)
                                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="dissu" class="form-label">Date issued</label>
                                                <input type="date" name="date_issued" id="dissu" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="issuby" class="form-label">Issued by</label>
                                                <select name="issued_by" id="issuby" class="form-select">
                                                    @foreach ($listOfUser as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="recby" class="form-label">Received by</label>
                                                <input type="text" name="received_by" id="recby" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <input type="text" name="remarks" id="remarks" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Add Item">
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
                <table class="table" id="inventory-table">
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
                        @foreach ($listOfInventory as $inventory)
                            <td>{{ $inventory->id }}</td>
                            <td>{{ $inventory->quantity }}</td>
                            <td>{{ $inventory->unit->unit_name }}</td>
                            <td>{{ $inventory->equipment_name }}</td>
                            <td>{{ $inventory->serial_number }}</td>
                            <td>{{ $inventory->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View details</a></li>
                                        <hr>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
        $(document).ready(function() {
            $('#inventory-table').DataTable({
                "processing": true,
                "serverSide": false,
                "pageLength": 10,
                "order": [[0, "asc"]],
            });
        });
        </script>
    @endpush
@endsection