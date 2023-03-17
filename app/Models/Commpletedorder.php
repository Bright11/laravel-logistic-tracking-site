<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commpletedorder extends Model
{
    use HasFactory;
    public function Product()
    {
        # code...
        return $this->belongsTo(Product::class);
    }
}
