<?php

namespace App\Models;

use App\Traits\FileStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerDetails extends Model
{
    use HasFactory, FileStorage;
    protected $fillable =
    ['product_name', 'price', 'category', 'qty', 'photo'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function getphotoAttribute($value)
    {
        return $this->getFile('images/products', $value);
    }
}
