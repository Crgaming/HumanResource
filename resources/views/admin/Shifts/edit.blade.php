@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Shift</h2>
            <form action="{{ route('admin.shifts.update', $shift->ShiftID) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="ShiftID" class="form-label">Shift ID</label>
                    <input type="text" class="form-control" id="ShiftID" name="ShiftID" value="{{ $shift->ShiftID }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" value="{{ old('Name', $shift->Name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="StartTime" class="form-label">Start Time</label>
                    <input type="time" class="form-control" id="StartTime" name="StartTime" value="{{ old('StartTime', $shift->StartTime) }}" required>
                </div>

                <div class="mb-3">
                    <label for="EndTime" class="form-label">End Time</label>
                    <input type="time" class="form-control" id="EndTime" name="EndTime" value="{{ old('EndTime', $shift->EndTime) }}" required>
                </div>

                <div class="mb-3">
                    <label for="ModifiedDate" class="form-label">Modified Date</label>
                    <input type="datetime-local" class="form-control" id="ModifiedDate" name="ModifiedDate" value="{{ old('ModifiedDate', $shift->ModifiedDate) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Shift</button>
                <a href="{{ route('admin.shifts.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
