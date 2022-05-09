<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable= [
        'student_id',
        'subject_grades_id',
        'type',
        'mark'
    ];

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function subjectsgrades()
    {
        return $this->belongsTo(SubjectsGrades::class, 'subject_grades_id');
    }
}
