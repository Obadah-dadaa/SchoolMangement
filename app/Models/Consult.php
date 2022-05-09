<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;
    protected $fillable= [
        'parent_id',
        'title',
        'description',
        'rating'
    ];

    public function parents()
    {
        return $this->belongsTo(TheParent::class, 'parent_id', 'id');
    }
}
