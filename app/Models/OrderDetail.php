<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'qty',
    ];

    public function order() : BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function product() : BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
