<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachersection extends Model
{
    use HasFactory;
    protected $table=['teacher_sections'];
    protected $fillable= [
        'teacher_id',
        'section_id'
    ];

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function secyions()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
