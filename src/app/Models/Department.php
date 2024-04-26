<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Department extends Model
{
    use HasFactory;

    protected $table='departments';
    protected $fillable=[
        'name'
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class,'dep_id','id');    
    }
}
