<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable= [
        'first_name',
        'last_name',
        'phone_number',
        'role'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function teachersections()
    {
        return $this->hasMany(Teacher_section::class, 'teacher_id', 'id');
    }
    public function teachersubjects()
    {
        return $this->hasMany(TeacherSubject::class, 'teacher_id', 'id');
    }
}
