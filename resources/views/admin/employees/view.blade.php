@extends('layouts.admin')

@section('title', 'View Employee Details')

@section('content')
<div class="container mt-5">
    <h1>Employee Details</h1>
    <div class="card mb-4">
        <div class="card-header">
            <h3>{{ $employee->BusinessEntityID }} - {{ $employee->JobTitle }}</h3>
        </div>
        <div class="card-body">
            <p><strong>National ID Number:</strong> {{ $employee->NationalIDNumber }}</p>
            <p><strong>Login ID:</strong> {{ $employee->LoginID }}</p>
            <p><strong>Organization Node:</strong> {{ $employee->OrganizationNode }}</p>
            <p><strong>Organization Level:</strong> {{ $employee->OrganizationLevel }}</p>
            <p><strong>Birth Date:</strong> {{ $employee->BirthDate }}</p>
            <p><strong>Marital Status:</strong> {{ $employee->MaritalStatus }}</p>
            <p><strong>Gender:</strong> {{ $employee->Gender }}</p>
            <p><strong>Hire Date:</strong> {{ $employee->HireDate }}</p>
            <p><strong>Vacation Hours:</strong> {{ $employee->VacationHours }}</p>
            <p><strong>Sick Leave Hours:</strong> {{ $employee->SickLeaveHours }}</p>
            <p><strong>Last Modified:</strong> {{ $employee->ModifiedDate }}</p>
            <a href="{{ route('admin.employees.index') }}" class="btn btn-primary">Back to Employee List</a>
        </div>
    </div>
</div>
@endsection
