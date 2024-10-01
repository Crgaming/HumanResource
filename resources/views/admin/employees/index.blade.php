@extends('layouts.admin')
@section('title', 'Admin - Employees')
@section('content')
    <div class="container-fluid mt-5">
        <h1>Employee List</h1>


        <!-- Add New Employee Form (Card) -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Add New Employee</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.employees.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="BusinessEntityID" class="form-label">Business Entity ID</label>
                            <input type="text" class="form-control" id="BusinessEntityID" name="BusinessEntityID"
                                required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="NationalIDNumber" class="form-label">National ID Number</label>
                            <input type="text" class="form-control" id="NationalIDNumber" name="NationalIDNumber"
                                required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="LoginID" class="form-label">Login ID</label>
                            <input type="text" class="form-control" id="LoginID" name="LoginID" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="OrganizationNode" class="form-label">Organization Node</label>
                            <textarea class="form-control" id="OrganizationNode" name="OrganizationNode" required></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="OrganizationLevel" class="form-label">Organization Level</label>
                            <input type="number" class="form-control" id="OrganizationLevel" name="OrganizationLevel"
                                required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="JobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="JobTitle" name="JobTitle" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="BirthDate" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="BirthDate" name="BirthDate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="MaritalStatus" class="form-label">Marital Status</label>
                            <select class="form-control" id="MaritalStatus" name="MaritalStatus" required>
                                <option value="M">Married</option>
                                <option value="S">Single</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Gender" class="form-label">Gender</label>
                            <select class="form-control" id="Gender" name="Gender" required>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="HireDate" class="form-label">Hire Date</label>
                            <input type="date" class="form-control" id="HireDate" name="HireDate" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="VacationHours" class="form-label">Vacation Hours</label>
                            <input type="number" class="form-control" id="VacationHours" name="VacationHours" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="SickLeaveHours" class="form-label">Sick Leave Hours</label>
                            <input type="number" class="form-control" id="SickLeaveHours" name="SickLeaveHours" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ModifiedDate" class="form-label">Modified Date</label>
                        <input type="datetime-local" class="form-control" id="ModifiedDate" name="ModifiedDate" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Employee</button>
                </form>
            </div>
        </div>
        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.employees.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by BusinessEntityID"
                    value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Employee List -->
        @if ($employees->isEmpty())
            <p>No employees found.</p>
        @else
            <div style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>NationalIDNumber</th>
                            <th>JobTitle</th>
                            <th>BirthDate</th>
                            <th>Gender</th>
                            <th>Hire Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->BusinessEntityID }}</td>
                                <td>{{ $employee->NationalIDNumber }}</td>
                                <td>{{ $employee->JobTitle }}</td>
                                <td>{{ $employee->BirthDate }}</td>
                                <td>{{ $employee->Gender }}</td>
                                <td>{{ $employee->HireDate }}</td>
                                <td>
                                    <a href="{{ route('admin.employees.view', $employee->BusinessEntityID) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.employees.edit', $employee->BusinessEntityID) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form method="POST"
                                        action="{{ route('admin.employees.destroy', $employee->BusinessEntityID) }}"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
