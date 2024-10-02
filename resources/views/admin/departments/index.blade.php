@extends('layouts.admin')

@section('title', 'Admin - Departments')

@section('content')
    <div class="container-fluid mt-5">
        <h1>Department List</h1>

        <!-- Add New Department Form (Card) -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Add New Department</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.departments.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="DepartmentID" class="form-label">Department ID</label>
                            <input type="text" class="form-control" id="DepartmentID" name="DepartmentID" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="GroupName" class="form-label">Group Name</label>
                            <input type="text" class="form-control" id="GroupName" name="GroupName" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ModifiedDate" class="form-label">Modified Date</label>
                        <input type="datetime-local" class="form-control" id="ModifiedDate" name="ModifiedDate" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Department</button>
                </form>
            </div>
        </div>

     

        <!-- Department List -->
        @if ($departments->isEmpty())
            <p>No departments found.</p>
        @else
            <div style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Group Name</th>
                            <th>Modified Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->DepartmentID }}</td>
                                <td>{{ $department->Name }}</td>
                                <td>{{ $department->GroupName }}</td>
                                <td>{{ $department->ModifiedDate }}</td>
                                <td>
                                    <a href="{{ route('admin.departments.employees', $department->DepartmentID) }}" class="btn btn-info btn-sm">View Employees</a>
                                    <a href="{{ route('admin.departments.edit', $department->DepartmentID) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form method="POST"
                                        action="{{ route('admin.departments.destroy', $department->DepartmentID) }}"
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
