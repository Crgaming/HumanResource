@extends('layouts.admin')

@section('title', 'Edit Department')

@section('content')
    <div class="container mt-5">
        <h1>Edit Department</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.departments.update', $department->DepartmentID) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="department_id" class="form-label">Department ID</label>
                    <input type="text" class="form-control" id="department_id" name="department_id" 
                           value="{{ old('department_id', $department->DepartmentID) }}"required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', $department->Name) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="group_name" class="form-label">Group Name</label>
                    <input type="text" class="form-control" id="group_name" name="group_name" 
                           value="{{ old('group_name', $department->GroupName) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="modified_date" class="form-label">Modified Date</label>
                    <input type="datetime-local" class="form-control" id="modified_date" name="modified_date" 
                           value="{{ old('modified_date', $department->ModifiedDate) }}">
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update Department</button>
        </form>
    </div>
@endsection