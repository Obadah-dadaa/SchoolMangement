<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheParent extends Model
{
    use HasFactory;
    protected $table=['parents'];
    protected $fillable= [
        'first_name',
        'last_name',
        'phone_number',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'parent_id', 'id');
    }
    public function consults()
    {
        return $this->hasMany(Consult::class, 'parent_id', 'id');
    }
    public function financialfees()
    {
        return $this->hasMany(FinancialFees::class, 'parent_id', 'id');
    }
}
