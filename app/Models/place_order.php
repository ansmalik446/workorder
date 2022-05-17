<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product_option;

class place_order extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Product()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
    public function order_letter()
    {
        return $this->hasMany(order_lettering::class,'order_id','id');
    }
    public function lettering()
    {
        return $this->hasMany(order_lettering::class,'order_id','id');
    }
    public function roaster()
    {
        return $this->hasMany(roaster::class,'order_id','id');
    }
    public function getPo1Attribute($val)
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
    public function getPo2Attribute($val)
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
    public function getPo3Attribute($val)
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
    public function getPo4Attribute($val)
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
    public function getCo1Attribute($val)
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
    public function getCo2Attribute($val)
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
    public function getCo3Attribute($val)
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
    public function getCo4Attribute($val)
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

    public function getSize1Attribute($val)
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
    public function getSize2Attribute($val)
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
    public function getSize3Attribute($val)
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
