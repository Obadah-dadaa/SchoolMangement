<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsGrades extends Model
{
    use HasFactory;
    protected $fillable= [
        'subject_id',
        'grade_id'
        ];
    public function exams()
    {
        return $this->hasMany(Exam::class, 'subjects_guard_id', 'id');
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_id');
    }
    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'grade_id');
    }
}
