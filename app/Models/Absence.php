<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable= [
        'student_id',
        'day_id',
        'date'
    ];

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function days()
    {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }
}
