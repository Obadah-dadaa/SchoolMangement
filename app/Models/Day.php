<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $fillable= [
        'name'
    ];
    public function absences()
    {
        return $this->hasMany(Absence::class, 'student_id', 'id');
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'student_id', 'id');
    }
}
