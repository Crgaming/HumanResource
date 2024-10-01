@extends('layouts.admin')

@section('content')
<div class="container">
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
                                <a href="{{ route('admin.shifts.edit', $shift->ShiftID) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.shifts.destroy', $shift->ShiftID) }}" method="POST" style="display:inline-block;">
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
