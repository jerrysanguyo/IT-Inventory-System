@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card">
            <form action="{{ route('admin.accounts.change.pw', $inventory->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-header d-flex justify-content-between ">
                    <h1>Item Details</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="isTo" class="form-label">Issued to</label>
                                <input type="text" name="user" id="isTo" class="form-control" value="{{ $inventory->user }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="eqName" class="form-label">Equipment Name</label>
                                <input type="text" name="equipment_name" id="eqName" class="form-control" value="{{ $inventory->equipment_name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="eqId" class="form-label">Equipment Type</label>
                                <input type="text" name="equipment_id" id="eqId" class="form-control" value="{{ $inventory->equipment->equipment_name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ser" class="form-label">Serial Number</label>
                                <input type="text" name="serial_number" id="ser" class="form-control" value="{{ $inventory->serial_number }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                <input type="text" name="unit_id" id="unit" class="form-control" value="{{ $inventory->unit->unit_name ?? 'N/A' }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="qty" class="form-control" value="{{ $inventory->quantity }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="dep" class="form-label">Departent</label>
                                <input type="text" name="department_id" id="dep" class="form-control" value="{{ $inventory->department->department_name ?? 'N/A' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="isBy" class="form-label">Issued by</label>
                                <input type="text" name="issued_by" id="isBy" class="form-control" value="{{ $inventory->user->name ?? $inventory->issued_by }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="daIs" class="form-label">Date issued</label>
                                <input type="date" name="date_issued" id="daIs" class="form-control" value="{{ $inventory->date_issued }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="remk" class="form-label">Remarks</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $inventory->remarks }}">
                            </div>
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