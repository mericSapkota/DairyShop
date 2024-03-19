<?php

namespace App\Models;

use App\Traits\FileStorage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, FileStorage;
    protected $fillable = [
        'ss', 'name', 'status', 'payment_method', 'amount', 'remarks', 'order_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getSsAttribute($value)
    {
        return $this->getFile("images/payments", $value);
    }
}
