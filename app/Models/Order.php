<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'order_date',
        'status',
        'total',
        'payment_method',
        'code'
    ];

    public function order_details() : HasMany {
        return $this->hasMany(OrderDetail::class);
    }

    public function order_address() : HasOne {
        return $this->hasOne(OrderAddress::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function restaurant() : BelongsTo {
        return $this->belongsTo(User::class, 'restaurant_id');
    }
}
