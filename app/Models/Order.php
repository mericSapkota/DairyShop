<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'qty',
        'product_name',
        'price',
        'user_id',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }

    public function farmerDetail()
    {
        return $this->belongsTo(FarmerDetails::class);
    }
}
