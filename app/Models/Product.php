<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

    public function Commpletedorder()
    {
        # code...
        return $this->belongsTo(Commpletedorder::class);
    }
}
