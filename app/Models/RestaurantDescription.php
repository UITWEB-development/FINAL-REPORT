<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RestaurantDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'user_id',
        'address',
        'phone_number',
        'opening_time',
        'closing_time',
        'longitude',
        'latitude',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
