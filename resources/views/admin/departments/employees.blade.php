@extends('layouts.admin')

@section('title', 'Employees in ' . $department->Name)

@section('content')
    <div class="container mt-5">
        <h1>Employees in Department: {{ $department->Name }}</h1>

        @if($employees->isEmpty())
            <p>No employees found in this department.</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>BusinessEntity ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->BusinessEntityID }}</td>
                            <td>{{ $employee->StartDate }}</td>
                            <td>{{ $employee->EndDate ?? 'Currently Employed' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
