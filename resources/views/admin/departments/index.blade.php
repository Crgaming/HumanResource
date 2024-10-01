@extends('layouts.admin') <!-- Assuming your layout file is named 'admin' -->

@section('title', 'Departments')

@section('content')
    <div class="container mt-4">
        <div style="max-height: 400px; overflow-y: auto;">
        <table class="table table-striped">
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
                            <a href="{{ route('admin.departments.edit', $department->DepartmentID) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.departments.destroy', $department->DepartmentID) }}" method="POST"
                                class="d-inline-block">
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
</div>
@endsection
