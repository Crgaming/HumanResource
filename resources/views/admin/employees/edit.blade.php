@extends('layouts.admin')

@section('title', 'Edit Employee')

@section('content')
    <div class="container mt-5">
        <h1>Edit Employee</h1>

        <form method="POST" action="{{ route('admin.employees.update', $employee->BusinessEntityID) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="NationalIDNumber" class="form-label">National ID Number</label>
                    <input type="text" class="form-control" id="NationalIDNumber" name="NationalIDNumber" value="{{ $employee->NationalIDNumber }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="LoginID" class="form-label">Login ID</label>
                    <input type="text" class="form-control" id="LoginID" name="LoginID" value="{{ $employee->LoginID }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="OrganizationNode" class="form-label">Organization Node</label>
                    <textarea class="form-control" id="OrganizationNode" name="OrganizationNode" required>{{ $employee->OrganizationNode }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="OrganizationLevel" class="form-label">Organization Level</label>
                    <input type="number" class="form-control" id="OrganizationLevel" name="OrganizationLevel" value="{{ $employee->OrganizationLevel }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="JobTitle" class="form-label">Job Title</label>
                    <input type="text" class="form-control" id="JobTitle" name="JobTitle" value="{{ $employee->JobTitle }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="BirthDate" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="BirthDate" name="BirthDate" value="{{ $employee->BirthDate }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="MaritalStatus" class="form-label">Marital Status</label>
                    <select class="form-control" id="MaritalStatus" name="MaritalStatus" required>
                        <option value="M" {{ $employee->MaritalStatus == 'M' ? 'selected' : '' }}>Married</option>
                        <option value="S" {{ $employee->MaritalStatus == 'S' ? 'selected' : '' }}>Single</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Gender" class="form-label">Gender</label>
                    <select class="form-control" id="Gender" name="Gender" required>
                        <option value="M" {{ $employee->Gender == 'M' ? 'selected' : '' }}>Male</option>
                        <option value="F" {{ $employee->Gender == 'F' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="HireDate" class="form-label">Hire Date</label>
                    <input type="date" class="form-control" id="HireDate" name="HireDate" value="{{ $employee->HireDate }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="VacationHours" class="form-label">Vacation Hours</label>
                    <input type="number" class="form-control" id="VacationHours" name="VacationHours" value="{{ $employee->VacationHours }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="SickLeaveHours" class="form-label">Sick Leave Hours</label>
                    <input type="number" class="form-control" id="SickLeaveHours" name="SickLeaveHours" value="{{ $employee->SickLeaveHours }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="ModifiedDate" class="form-label">Modified Date</label>
                    <input type="datetime-local" class="form-control" id="ModifiedDate" name="ModifiedDate" value="{{ $employee->ModifiedDate }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Employee</button>
        </form>
    </div>
@endsection
