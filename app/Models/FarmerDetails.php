<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerDetails extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'product_name', 'price', 'qty','address','photo'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
    
}
