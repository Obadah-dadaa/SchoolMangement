<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory;
    protected $table=['teacher_subjects'];
    protected $fillable= [
        'teacher_id',
        'subject_id',
    ];

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
