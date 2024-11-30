<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
    // protected $fillable = ['name', 'salary', 'department_id'];

    function employee(){
        return $this->hasMany(Employee::class);
    }

}
