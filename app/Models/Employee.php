<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'BusinessEntityID',
        'NationalIDNumber',
        'LoginID',
        'OrganizationNode',
        'OrganizationLevel',
        'JobTitle',
        'BirthDate',
        'MaritalStatus',
        'Gender',
        'HireDate',
        'VacationHours',
        'SickLeaveHours',
        'ModifiedDate'
    ];
    protected $table = 'employees'; // Specify the table name
    protected $primaryKey = 'BusinessEntityID'; // Set your custom primary key
    public $incrementing = false; // Set this to true if the primary key is auto-incrementing
    protected $keyType = 'string'; // Use 'int' if your primary key is an integer
}
