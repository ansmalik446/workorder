<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sport;
use App\Models\roaster;
use App\Models\Product_option;
use App\Models\place_order;
use App\Models\Order_plac;
use App\Models\order_lettering;
use App\Models\Prod_option;


use App\Models\roaster_detail;
use Illuminate\Http\Request;
use Auth;
use DB;
use PDF;
use Storage;
use URL;
use Mail;


class UserController extends Controller
{
    function index(){
        $sports=Sport::all();
        return view('user.home',compact('sports'));
    }
    function product($id){
        $products=Product::where('sports_id',$id)->get();
        return view('user.product',compact('products'));

    }
    function option($id){
        $rand=rand(11111, 99999);  
        
        $product_option=Product_option::where('product_id',$id)->where('parent', 'Product Option')->get()->groupBy('chalid');
        $color_version=Product_option::where('product_id',$id)->where('parent', 'Color Version')->get()->groupBy('chalid');
        $data=Product_option::where('product_id',$id)->get();

// dd($product_option);
//  dd($color_version);
// dd($data);
        
        return view('user.option',compact('product_option','color_version','data','id'));
    }
    function save($id){
        $data=place_order::find($id);
         

       
        //return view('user.home2', compact('data'));
        $pdf = PDF::loadView('user.home2', compact('data'));
    
        Storage::put('public/invoice.pdf', $pdf->output());
        $url=env('APP_URL');
        $dat["email"] = Auth::user()->email;
        $dat["title"] = "Sports Wear";
        $dat["body"] = "This is Demo";
  
        
  
        Mail::send('myTestMail', $dat, function($message)use($dat, $pdf) {
            $message->to('demo2.browntech@gmail.com', 'demo2.browntech@gmail.com')
                    ->subject($dat["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
  
        return redirect('user/');


    }
    function save_print($id){
        $data=place_order::find($id);
         

       
        //
        
        $pdf = PDF::loadView('user.home2', compact('data'));
    
        Storage::put('public/invoice.pdf', $pdf->output());
        $url=env('APP_URL');
        $dat["email"] = Auth::user()->email;
        $dat["title"] = "Sports Wear";
        $dat["body"] = "This is Demo";
  
        
  
        Mail::send('myTestMail', $dat, function($message)use($dat, $pdf) {
            $message->to(Auth::user()->email)
                    ->subject($dat["title"])
                    ->attachData($pdf->output(), "order.pdf");
        });
        return $pdf->stream();
  
        //return view('user.home2', compact('data'));


    }
    
    function add_roaster(Request $request){


    
//    dd($request->all());
        DB::table('roasters')
            ->where('order_id', $request->or_id)
            ->delete();
        $data2 = [];
        $roaster_data=[];
        $fileName=[];
        if($request->name !=null)
        {

            foreach ($request->name as $item => $v) 
            {
       
          
                if(isset($request->file[$item]))
                {
                    foreach($request->file[$item] as $file => $g) {
                      
                        $extension = $g->extension();
                        $fileName= rand(11111, 99999) . "_." . $extension;
                        $g->move('upload/roaster/', $fileName);
                    }

                
             
                 

                    
                        $roaster=roaster::create([
                        'name'=>$request->name[$item][0],
                        'image'=>$fileName,
                        'order_id'=>$request->or_id,



                         ]);

                }
                elseif(isset($request->file2[$item]))
                {
                    
                    $roaster=roaster::create([
                    'name'=>$request->name[$item][0],
                    'image'=>$request->file2[$item][0],
                    'order_id'=>$request->or_id,
                    ]);
                }
                else{
                    $roaster=roaster::create([
                    'name'=>$request->name[$item][0],
                    'order_id'=>$request->or_id,
                    ]);
                    
                }
                
                if($request->number !=null)
                {
                         
                    foreach ($request->number[$item] as $key => $value) {
                        $roaster_data[$item][$key]['roaster_id']=$roaster->id;
                        $roaster_data[$item][$key]['number']=$value;
                       
                      
                    }

                    foreach ($request->sname[$item] as $key => $value) {
                        $roaster_data[$item][$key]['name']=$value;
                    }

                    foreach ($request->top_size[$item] as $key => $value) {
                        $roaster_data[$item][$key]['top_size']=$value;
                    }
                    foreach ($request->bottom_size[$item] as $key => $value) {
                        $roaster_data[$item][$key]['bottom_size']=$value;
                    }
                    foreach ($request->notes[$item] as $key => $value) {
                        $roaster_data[$item][$key]['notes']=$value;
                    }
                }    
                else
                {
                    return back()->with("error","Please  Add Atleast One Roster");

                }    
                        
                    
            }


                foreach ($roaster_data as $key => $value) {
                    roaster_detail::insert($value);
                }
        }
        else
        {
            return back()->with("error","Please  Add Atleast One Roster");;

        }
        
        if($request->btn_val =='Print And Save')
        {
            return redirect()->route('save_print', ['id' => $request->or_id]);
        }
        else
        {
            return redirect()->route('save', ['id' => $request->or_id]);

        }
        
        
        
    }

    
    function add_order(Request $request){
        
        
        if(isset($request->size3))
        {
            $logo3;
            for($k=0; $k< count($request->size3); $k++ )
            {
                if ($request->file3[$k]!=null) {
                               
                    $file = $request->file('file3')[$k];
                    $extension = $request->file3[$k]->extension();
                    $fileName1 = time().$k. "_." .$extension;
                    $request->file3[$k]->move('upload/', $fileName1);
                    
                $logo3[] = $fileName1;
                }

            }
            $logo3=implode(",",$logo3);
            $size3=implode(",",$request->size3);
        }
        else{
            $logo3 =null;
            $size3 =null;

        }
        if(isset($request->loc3))
        {
            $loc3=implode(",",$request->loc3);
        }
        else{
            $loc3 =null;

        }

        
        if(isset($request->po2))
        {
            $po2 =$request->po2;
            $po2=implode(",",$po2);

        }
        else{
            $po2 =null;

        }
        if(isset($request->po3))
        {
            $po3 =$request->po3;
            $po3=implode(",",$po3);

        }
        else{
            $po3 =null;

        }
        if(isset($request->po4))
        {
            $po4 =$request->po4;
            $po4=implode(",",$po4);

        }
        else{
            $po4 =null;

        }
        
        if(isset($request->co2))
        {
            $co2 =$request->co2;
            $co2=implode(",",$co2);

        }
        else{
            $co2 =null;

        }
        if(isset($request->co3))
        {
            $co3 =$request->co3;
            $co3=implode(",",$co3);

        }
        else{
            $co3 =null;

        }
        if(isset($request->co4))
        {
            $co4 =$request->co4;
            $co4=implode(",",$co4);

        }
        else{
            $co4 =null;

        }
        


           //dd($request,$po1,$po3,$po2,$po4);

            
            //$table->text('wo_id')->nullable();
            //$table->text('file')->nullable();
            
            //$table->text('logo1')->nullable();

        $rand=rand(11111, 99999); 
        $use=new place_order();
        $use->team_name=$request->team_name;
        $use->order_id=$request->order_id;
        $use->wo_id=$request->wo_id;

        $use->po2=$po2;
        $use->po3=$po3;
        $use->po4=$po4;
        $use->co2=$co2;
        $use->co3=$co3;
        $use->co4=$co4;
        $use->notes=$request->notes;
        $use->prod_id=$request->pro_id;
        
        $use->colo1=$request->colo1;
        $use->colo2=$request->colo2;
        $use->colo3=$request->colo3;
        $use->loc3=$loc3;
        
        $use->size3=$size3;
        $use->logo3 =$logo3;
        if(isset($request->file))
        {    
            if ($request->hasFile('file')) {
                      
    
                $file = $request->file('file');
                $extension = $request->file->extension();
                $fileName2 = time(). "1_." .$extension;
                $request->file->move('upload/', $fileName2);
                $use->file = $fileName2;
            }
        }        
        
       
        
        $use->user_id=Auth::user()->id;
        $use->save();
        $cont=count($request->type);
        for($i=0; $i< $cont; $i++ )

            {
                if(isset($request->type[$i]))
                {
                
                    $quite=new order_lettering();

                    $quite->type=$request->type[$i];
                    if(isset($request->location[$i]))
                    {

                        $quite->location=$request->location[$i];
                    }
                    if(isset($request->font_name[$i]))
                    {
                        $quite->font_name=$request->font_name[$i];
                    }
                    if(isset($request->main_color[$i]))
                    {

                        $main_color =$request->main_color[$i];
                        $main_color=implode(",",$main_color);

            
                        $quite->main_color=$main_color;
                    }
                    if(isset($request->trim_color[$i]))
                    {
                        $trim_color =$request->trim_color[$i];
                        $trim_color=implode(",",$trim_color);

            
                        $quite->trim_color=$trim_color;
                        
                    } 
                    if(isset($request->size[$i]))
                    {
                        $size =$request->size[$i];
                        $size=implode(",",$size);

            
                        $quite->size=$size;
                        
                    } 
                    
                    if(isset($request->text[$i]))
                    {
                        $quite->text=$request->text[$i];
                    }
                    $quite->order_id=$use->id;
                    
                    
                    $quite->save();
                } 
                else{
                    $cont++;
                }
            }



// 

$cont1=count($request->key);

for($i=0; $i< $cont1; $i++ )
{
    // echo "<pre>";

    if(isset($request->po1[$i]))
    {
        // var_dump($request->key[$i]);
        
        
        $count2 = count($request->po1[$i]);
        
        for($j=0; $j< $count2; $j++ )
        {
            $ordr = new Order_plac;

            $ordr->place_order_id = $use->id;
            $ordr->product_option = $request->key[$i];
            $ordr->poductid = $request->po1[$i][$j];
            $ordr->save();
            // var_dump($request->po1[$i][$j]);
            

        }
    
    }
}

// die();

// 
// 

$cont3=count($request->key2);

for($i=0; $i< $cont3; $i++ )
{
    // echo "<pre>";

    if(isset($request->co1[$i]))
    {
        // var_dump($request->key2[$i]);
        
        
        $count4 = count($request->co1[$i]);
        
        for($j=0; $j< $count4; $j++ )
        {
            $ordr = new Order_plac;

            $ordr->place_order_id = $use->id;
            $ordr->product_option = $request->key2[$i];
            $ordr->poductid = $request->co1[$i][$j];
            $ordr->save();
            // var_dump($request->po1[$i][$j]);
            

        }
    
    }
}
//  die();

// 
            
            return redirect()->route('roster', ['id' => $use->id]);

           



    }
    
    function rosters($id)
    {

         return view('user.roasters',compact('id'));

    }
    
    function roster_dub($id,$prev_id)
    {
        $prev_ros=roaster::where('order_id',$prev_id)->get();
        return view('user.roasters_dub',compact('id','prev_ros'));

    }
    function edit_roster_dub($id,$prev_id)
    {
        $prev_ros=roaster::where('order_id',$id)->get();
        return view('user.roasters_dub',compact('id','prev_ros'));

    }
    
    
    function get_previous(Request $request){
        $id=$request->pro_id;
        $pre_data=place_order::where('order_id',$request->id)->where('prod_id',$id)->first();
        $data=product_option::where('product_id',$request->pro_id)->get();

        
        return view('user.get_previous' ,compact('data','pre_data','id'));


    }
    function pre_option($idd){
        
        $pre_data=place_order::find($idd);
        $id=$pre_data->prod_id;

        $data=product_option::where('product_id',$id)->get();

        
        return view('user.pre_option' ,compact('data','pre_data','id'));


    }
    function edit_option($idd){
        
        $pre_data=place_order::find($idd);
        $id=$pre_data->prod_id;

        //  $prev_id=$idd;

        //       $prev_ros=roaster::where('order_id',$prev_id)->get();
        // dd($prev_ros);

        $data=product_option::where('product_id',$id)->get();

        
        return view('user.edit_option' ,compact('data','pre_data','id'));


    }
    function updat_order(Request $request,$id){
       

        DB::table('place_orders')
            ->where('id', $id)->delete();
        if(isset($request->size3))
        {    
        $logo3;
            for($k=0; $k< count($request->size3); $k++ )
            {
                if(isset($request->file3[$k]))
                {
                    if ($request->file3[$k]!=null) {
                                   
                        $file = $request->file('file3')[$k];
                        $extension = $request->file3[$k]->extension();
                        $fileName1 = time().$k. "_." .$extension;
                        $request->file3[$k]->move('upload/', $fileName1);
                        
                        $logo3[] = $fileName1;
                    }

                }    
                else{
                    $logo3[] = $request->prev_file3[$k];
                }

            }
            $logo3=implode(",",$logo3);
            $size3=implode(",",$request->size3);
        }
        else{
            $logo3 =null;
            $size3 =null;

        }
        if(isset($request->loc3))
        {
            $loc3=implode(",",$request->loc3);
        }
        else{
            $loc3 =null;

        }    
       
        if(isset($request->po1))
        {
            $po1 =$request->po1;
            $po1=implode(",",$po1);

        }
        else{
            $po1 =null;

        }
        if(isset($request->po2))
        {
            $po2 =$request->po2;
            $po2=implode(",",$po2);

        }
        else{
            $po2 =null;

        }
        if(isset($request->po3))
        {
            $po3 =$request->po3;
            $po3=implode(",",$po3);

        }
        else{
            $po3 =null;

        }
        if(isset($request->po4))
        {
            $po4 =$request->po4;
            $po4=implode(",",$po4);

        }
        else{
            $po4 =null;

        }
        if(isset($request->co1))
        {
            $co1 =$request->co1;
            $co1=implode(",",$co1);

        }
        else{
            $co1 =null;

        }
        if(isset($request->co2))
        {
            $co2 =$request->co2;
            $co2=implode(",",$co2);

        }
        else{
            $co2 =null;

        }
        if(isset($request->co3))
        {
            $co3 =$request->co3;
            $co3=implode(",",$co3);

        }
        else{
            $co3 =null;

        }
        if(isset($request->co4))
        {
            $co4 =$request->co4;
            $co4=implode(",",$co4);

        }
        else{
            $co4 =null;

        }


        $rand=rand(11111, 99999);

        $use=new place_order();
        $use->team_name=$request->team_name;
        $use->wo_id=$request->wo_id;  
        $use->order_id=$request->order_id;

        $use->po1=$po1;
        $use->po2=$po2;
        $use->po3=$po3;
        $use->po4=$po4;
        $use->co1=$co1;
        $use->co2=$co2;
        $use->co3=$co3;
        $use->co4=$co4;
        $use->notes=$request->notes;
        $use->prod_id=$request->pro_id;
        
        $use->colo1=$request->colo1;
        $use->colo2=$request->colo2;
        $use->colo3=$request->colo3;
        $use->loc3=$loc3;
        $use->size3=$size3;
        $use->logo3 =$logo3;
        if(isset($request->file))
        {    
            if ($request->hasFile('file')) {
                      
    
                $file = $request->file('file');
                $extension = $request->file->extension();
                $fileName2 = time(). "1_." .$extension;
                $request->file->move('upload/', $fileName2);
                $use->file = $fileName2;
            }
        }        
        else{
            
            $use->file = $request->pre_file;
            
        }
        
        $use->user_id=Auth::user()->id;
        $use->save();
        
        
         $cont=count($request->type);


         for($i=0; $i< $cont ; $i++ )

            {
                if(isset($request->type[$i]))
                {
                
                    $quite=new order_lettering();

                    $quite->type=$request->type[$i];
                    if(isset($request->location[$i]))
                    {

                        $quite->location=$request->location[$i];
                    }
                    if(isset($request->font_name[$i]))
                    {
                        $quite->font_name=$request->font_name[$i];
                    }
                    if(isset($request->main_color[$i]))
                    {

                        $main_color =$request->main_color[$i];
                        $main_color=implode(",",$main_color);

            
                        $quite->main_color=$main_color;
                    }
                    if(isset($request->trim_color[$i]))
                    {
                        $trim_color =$request->trim_color[$i];
                        $trim_color=implode(",",$trim_color);

            
                        $quite->trim_color=$trim_color;
                        
                    } 
                    if(isset($request->size[$i]))
                    {
                        $size =$request->size[$i];
                        $size=implode(",",$size);

            
                        $quite->size=$size;
                        
                    } 
                    
                    if(isset($request->text[$i]))
                    {
                        $quite->text=$request->text[$i];
                    }
                    $quite->order_id=$use->id;
                    
                    
                    $quite->save();
                } 
                 else{
                    $cont++;
                }
            }

            
            return redirect()->route('edit_roster_dub', ['id' => $use->id,'prev_id'=>$id]);

           



    }
    function order_dubl(Request $request){
        

         //dd('ddd');
//       $dat=place_order::OrderBy('id','desc')
//       ->offset(1)
//       ->limit(1)
//       ->toSql();
// dd($dat);
        if(isset($request->size3))
        {
        $logo3;
            for($k=0; $k< count($request->size3); $k++ )
            {
                if(isset($request->file3[$k]))
                {
                    if ($request->file3[$k]!=null) {
                                   
                        $file = $request->file('file3')[$k];
                        $extension = $request->file3[$k]->extension();
                        $fileName1 = time().$k. "_." .$extension;
                        $request->file3[$k]->move('upload/', $fileName1);
                        
                        $logo3[] = $fileName1;
                    }

                }    
                else{
                    $logo3[] = $request->prev_file3[$k];
                }

            }
            $logo3=implode(",",$logo3);
            $size3=implode(",",$request->size3);
        }
        else{
            $logo3 =null;
            $size3 =null;

        }
        if(isset($request->loc3))
        {
            $loc3=implode(",",$request->loc3);
        }
        else{
            $loc3 =null;

        }    
       
        if(isset($request->po1))
        {
            $po1=$request->po1;
            $po1=implode(",",$po1);

        }
        else{
            $po1 =null;

        }
        if(isset($request->po2))
        {
            $po2 =$request->po2;
            $po2=implode(",",$po2);

        }
        else{
            $po2 =null;

        }
        if(isset($request->po3))
        {
            $po3 =$request->po3;
            $po3=implode(",",$po3);

        }
        else{
            $po3 =null;

        }
        if(isset($request->po4))
        {
            $po4 =$request->po4;
            $po4=implode(",",$po4);

        }
        else{
            $po4 =null;

        }
        if(isset($request->co1))
        {
            $co1 =$request->co1;
            $co1=implode(",",$co1);

        }
        else{
            $co1 =null;

        }
        if(isset($request->co2))
        {
            $co2 =$request->co2;
            $co2=implode(",",$co2);

        }
        else{
            $co2 =null;

        }
        if(isset($request->co3))
        {
            $co3 =$request->co3;
            $co3=implode(",",$co3);

        }
        else{
            $co3 =null;

        }
        if(isset($request->co4))
        {
            $co4 =$request->co4;
            $co4=implode(",",$co4);

        }
        else{
            $co4 =null;

        }


        $rand=rand(11111, 99999);    
        $use=new place_order();
        $use->team_name=$request->team_name;

        $use->wo_id=$request->wo_id;
        $use->order_id=$request->order_id;  

        $use->po1=$po1;
        $use->po2=$po2;
        $use->po3=$po3;
        $use->po4=$po4;
        $use->co1=$co1;
        $use->co2=$co2;
        $use->co3=$co3;
        $use->co4=$co4;
        $use->notes=$request->notes;
        $use->prod_id=$request->pro_id;
        
        $use->colo1=$request->colo1;
        $use->colo2=$request->colo2;
        $use->colo3=$request->colo3;
        $use->loc3=$loc3;
        $use->size3=$size3;
        $use->logo3 =$logo3;

        if(isset($request->file))
        {    
            if ($request->hasFile('file')) {
                      
    
                $file = $request->file('file');
                $extension = $request->file->extension();
                $fileName2 = time(). "1_." .$extension;
                $request->file->move('upload/', $fileName2);
                $use->file = $fileName2;
            }
        }        
        else{
            
            $use->file = $request->pre_file;
            
        }     
        
        
        $use->user_id=Auth::user()->id;
        $use->save();
        $cont=count($request->type);

         for($i=0; $i< $cont; $i++ )

            {
                if(isset($request->type[$i]))
                {
                
                    $quite=new order_lettering();

                    $quite->type=$request->type[$i];
                    if(isset($request->location[$i]))
                    {

                        $quite->location=$request->location[$i];
                    }
                    if(isset($request->font_name[$i]))
                    {
                        $quite->font_name=$request->font_name[$i];
                    }
                    if(isset($request->main_color[$i]))
                    {

                        $main_color =$request->main_color[$i];
                        $main_color=implode(",",$main_color);

            
                        $quite->main_color=$main_color;
                    }
                    if(isset($request->trim_color[$i]))
                    {
                        $trim_color =$request->trim_color[$i];
                        $trim_color=implode(",",$trim_color);

            
                        $quite->trim_color=$trim_color;
                        
                    } 
                    if(isset($request->size[$i]))
                    {
                        $size =$request->size[$i];
                        $size=implode(",",$size);

            
                        $quite->size=$size;
                        
                    } 
                    
                    if(isset($request->text[$i]))
                    {
                        $quite->text=$request->text[$i];
                    }
                    $quite->order_id=$use->id;
                    $quite->save();
                } 
                else{
                    $cont++;
                }
            }
            
            $prev_id=$request->prev_id;


            
            return redirect()->route('roster_dub', ['id' => $use->id,'prev_id'=>$prev_id]);

           



    }
    public function get_orders(){

    $orderdetail=place_order::all();
    // dd($orderdetail);
    return view('user.order',compact('orderdetail'));
    }
    public function order_detail($id){
            $data=place_order::with('lettering','roaster')->find($id);

        return view('user.order_detail' ,compact('data'));
    }
    
}
 