<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_lettering extends Model
{
    use HasFactory;
    public function getTrimColorAttribute($val)
    {
        if($val!=null)
        {
            $ex=explode(",",$val);
            foreach($ex as $key => $value) {
                $name=product_option::find($value);
                $pro_array[]=$name->property;



                
            }
            $all_pro=implode(",",$pro_array);
            return $all_pro;

        }
        else{
             return "Not Given";

        }

    }
    public function getSizeAttribute($val)
    {
        if($val!=null)
        {
            $ex=explode(",",$val);
            foreach($ex as $key => $value) {
                $name=product_option::find($value);
                $pro_array[]=$name->property;



                
            }
            $all_pro=implode(",",$pro_array);
            return $all_pro;

        }
        else{
             return "Not Given";

        }

    }
    public function getMainColorAttribute($val)
    {
        if($val!=null)
        {
            $ex=explode(",",$val);
            foreach($ex as $key => $value) {
                $name=product_option::find($value);
                $pro_array[]=$name->property;



                
            }
            $all_pro=implode(",",$pro_array);
            return $all_pro;

        }
        else{
             return "Not Given";

        }

    }
}
