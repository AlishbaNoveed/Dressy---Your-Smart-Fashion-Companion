<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'mode',       // e.g. 'cod', 'stripe', 'card'
        'status',     // e.g. 'pending', 'completed'
        'transaction_id', 
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
