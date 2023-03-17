<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function Shipping()
    {
        return $this->belongsTo(Shipping::class, 'user_id', 'user_id');
    }
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
   
}
