<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_option;


class Prod_option extends Model
{
    use HasFactory;

    public function childddd()
    {
        return $this->hasMany(Product_option::class,'chalid','child');
    }
}
