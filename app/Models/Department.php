<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'DepartmentID',
        'Name',
        'GroupName',
        'ModifiedDate'
    ];
    protected $primaryKey = 'DepartmentID';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

   
}
