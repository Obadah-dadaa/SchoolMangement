<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table=['subjects'];
    protected $fillable= [
        'name'
        ];
    public function subjectsgrades()
    {
        return $this->hasMany(SubjectsGrades::class, 'subject_id', 'id');
    }
}
