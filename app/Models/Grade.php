<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table=['grades'];
    protected $fillable= [
        'name'
    ];
    public function sections()
    {
        return $this->hasMany(Section::class, 'grade_id', 'id');
    }
    public function subjectsgrades()
    {
        return $this->hasMany(SubjectsGrades::class, 'subject_id', 'id');
    }
}
