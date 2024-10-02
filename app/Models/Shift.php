<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'ShiftID',
        'Name',
        'StartTime',
        'EndTime',
        'ModifiedDate'
    ];
    protected $primaryKey = 'ShiftID';

    // If the primary key is not an incrementing integer
    public $incrementing = false;

   
}