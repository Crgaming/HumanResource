@extends('layouts.admin')

@section('content')

<div class="container">

    <h1>Shifts Management</h1>

    <!-- Create Shift Form -->
    <div class="mb-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h3>Add New Shift</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.shifts.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="ShiftID">Shift ID</label>
                            <input type="number" name="ShiftID" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Name">Name</label>
                            <input type="text" name="Name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="StartTime">Start Time (H:mm:ss)</label>
                            <input type="text" name="StartTime" class="form-control" placeholder="HH:mm:ss" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="EndTime">End Time (H:mm:ss)</label>
                            <input type="text" name="EndTime" class="form-control" placeholder="HH:mm:ss" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ModifiedDate">Modified Date</label>
                            <input type="date" name="ModifiedDate" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Create Shift</button>
                </form>
            </div>
        </div>
    </div>
    
    

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Modified Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shifts as $shift)
                        <tr>
                            <td>{{ $shift->ShiftID }}</td>
                            <td>{{ $shift->Name }}</td>
                            <td>{{ $shift->StartTime }}</td>
                            <td>{{ $shift->EndTime }}</td>
                            <td>{{ $shift->ModifiedDate }}</td>
                            <td>
                                <a href="{{ route('admin.shifts.edit', $shift->ShiftID) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.shifts.destroy', $shift->ShiftID) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
