<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialFees extends Model
{
    use HasFactory;
    protected $fillable= [
        'parent_id',
        'full_amount',
        'amount_received',
        'discount'
    ];
    public function parents()
    {
        return $this->belongsTo(TheParent::class, 'parent_id', 'id');
    }
}
