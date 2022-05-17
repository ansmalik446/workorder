<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_plac_color extends Model
{
    use HasFactory;
    public function option_porperty()
    {
        return $this->belongsTo(product_option::class,'poductid','id');
    }
}
