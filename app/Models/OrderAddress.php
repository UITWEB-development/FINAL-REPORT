<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderAddress extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'order_id',
        'ward_id',
        'address',
        'phone_number',
    ];

    public function order() : BelongsTo {
        return $this->belongsTo(Order::class);
    }
    
    public function ward() : BelongsTo {
        return $this->belongsTo(Ward::class);
    }
}
