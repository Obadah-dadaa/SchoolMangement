<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable= [
        'first_name',
        'last_name',
        'parent_id',
        'section_id'
    ];


    public function exams()
    {
        return $this->hasMany(Exam::class, 'student_id', 'id');
    }
    public function absences()
    {
        return $this->hasMany(Absence::class, 'student_id', 'id');
    }
    public function parents()
    {
        return $this->belongsTo(TheParent::class, 'parent_id');
    }
    public function sections()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}

