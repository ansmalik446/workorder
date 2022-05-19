<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_option;
use App\Models\prod_option;

use DB;

class optionController extends Controller
{
    function save_product_option(Request $request){
        if($request->name==null)
        {
            return response()->json(201);
        }
       
        $user=new product_option();

        $user->product_id=$request->product_id;
        
            $user->parent=$request->parent;
            $user->color=$request->color;
       
            $user->chalid=$request->chalid;

        
            $user->property=$request->name;
            $user->save();
            if($user->save()){
                return response()->json(200);
            }
            
            
           

    }
    function get_edit_product(Request $request){
        //dd($request->id,$request->id2);
        $products=product_option::where('parent',$request->id)->where('chalid',$request->id2)->where('product_id',$request->p_id)->get();
        $parent=$request->id;
        $chalid=$request->id2;
        $p_id=$request->p_id;
        //dd($products);
        $id=$request->id;
        return view('Admin_asstes.get_edit_product' ,compact('id','products','parent','chalid','p_id'));
    }
    function get_edit_product2(Request $request){
        //dd($request->id,$request->id2);
        $products=product_option::where('parent',$request->id)->where('chalid',$request->id2)->where('product_id',$request->p_id)->get();
        $parent=$request->id;
        $chalid=$request->id2;
        $p_id=$request->p_id;
        //dd($products);
        $id=$request->id;
        return view('Admin_asstes.get_edit_product2' ,compact('id','products','parent','chalid','p_id'));
    }
    function update_product_option(Request $request){
       //dd($request);
        DB::table('product_options')
            ->where('product_id', $request->product_id)
            ->where('parent', $request->parent)
            ->where('chalid', $request->chalid)
            ->delete();
           
            for($i=0; $i < count($request->name);  $i++)
            {
                  

                  $user=new product_option();
                  $user->product_id=$request->product_id;
        
                  $user->parent=$request->parent;
       
                  $user->chalid=$request->chalid;
                  $user->property=$request->name[$i];
                 
                  $user->save();



            }
        
            if($user->save()){
                return response()->json(200);
            }
            
       
           

    }

    function update_product_option2(Request $request){
        //dd($request);
         DB::table('product_options')
             ->where('product_id', $request->product_id)
             ->where('parent', $request->parent)
             ->where('chalid', $request->chalid)
             ->where('property', $request->name)
             ->delete();
            
             for($i=0; $i < count($request->name);  $i++)
             {
                   
 
                   $user=new product_option();
                   $user->product_id=$request->product_id;
         
                   $user->parent=$request->parent;
        
                   $user->chalid=$request->chalid;
                   $user->color=$request->color;
                   $user->property=$request->propert;
                  
                   $user->save();
 
 
 
             }
         
             if($user->save()){
                 return response()->json(200);
             }
             
        
            
 
     }

    
    function add_prod_option(Request $request){
        if($request->child==null)
        {
            return response()->json(201);
        }
       
        $user=new prod_option();

        $user->product_id=$request->product_id;
        if($request->color!=null)
        {
            $user->color=$request->color;
            
        }
        
            $user->parent=$request->parent;
       
            $user->child=$request->child;

        
            
            $user->save();
            if($user->save()){
                return response()->json(200);
            }
            
            
           

    } 
    
}
