<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product_option extends Model
{
    use HasFactory;
    public function Product()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }

    
}
