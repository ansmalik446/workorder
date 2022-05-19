<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sport;
use App\Models\roaster;
use App\Models\product_option;
use App\Models\place_order;
use App\Models\order_lettering;

use App\Models\Order_plac;
use App\Models\Order_plac_color;
use App\Models\roaster_detail;
use Auth;
use DB;
use PDF;
use Storage;
use URL;
use Mail;
use Session;
class ordercontroler extends Controller
{
    function edit_updat_order(Request $request,$id){
        

       

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
        


        $rand=rand(11111, 99999);

        $use=new place_order();
        $use->team_name=$request->team_name;
        $use->wo_id=$request->wo_id;
        $use->order_id=$request->order_id;  
        $use->notes=$request->notes;
        $use->prod_id=$request->pro_id;
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

            
            $prev_id=$request->id;
            DB::table('roasters')
            ->where('order_id', $id)
            ->update([
               'order_id' => $use->id
            ]);;

        //       $prev_ros=roaster::where('order_id',$prev_id)->get();
        // dd($prev_ros);
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
                        $ordr = new Order_plac_color;

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
            if($request->btn_val =='Print And Save')
            {
                return redirect()->route('save_print', ['id' => $use->id]);
            }
            else
            {
               
                return redirect()->route('edit_roster_dub', ['id' => $use->id,'prev_id'=>$prev_id]);

            }    
            

           



    }
    function delete_option($id)
    {
        DB::table('place_orders')
            ->where('id', $id)->delete();
       return back()->with("success","Successfully Deleted");

    }
    function check_order_id(Request $request){
        if(place_order::where('order_id', '=', $request->id)->exists()) 
        {
            return response()->json(201);   
        }
        else{
             return response()->json(200);
        }


    }
    public function add_csv(Request $request)
    {
            $file_name="file".$request->file_id;

            

           $file=$request->$file_name;



            
            
      
            // File Details 
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
      
            // Valid File Extensions
            $valid_extension = array("csv");

      
            // 2MB in Bytes
            $maxFileSize = 2097152; 
      
            // Check file extension
            if(in_array(strtolower($extension),$valid_extension)){
      
              // Check file size
              if($fileSize <= $maxFileSize){
      
                // File upload location
                $location = 'uploads';
      
                // Upload file
                $file->move($location,$filename);
      
                // Import CSV to Database
                $filepath = public_path($location."/".$filename);
      
                // Reading file
                $file = fopen($filepath,"r");
      
                $importData_arr = array();
                $insertData=array();
                $i = 0;
     
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                   $num = count($filedata );
                                        

                   // Skip first row (Remove below comment if you want to skip the first row)
                   if($i == 0){
                                         

                    
                      if($filedata [0]=="Number" && $filedata [1]=="Name" && $filedata [2]=="Top_Size" && $filedata [3]=="Bottom_Size" && $filedata [4]=="Notes")
                      {
                          
 
                        $i++;
                        continue;
                      }
                      else{
                       
                       return Response()->json([
                    "success" => false,
                    "msg" => 'File Column Is Not Match According To Instructions.'
                ]);
                      }
                   }
                   for ($c=0; $c < $num; $c++) {
                      $importData_arr[$i][] = $filedata [$c];
                   }
                   $i++;
                }
               
                
                fclose($file);
      
                // Insert to MySQL database
                 
                foreach($importData_arr as $importData){
                   
               
                  $insertData[] = [
                    "Number"=>$importData[0],
                    "Name"=>$importData[1],
                    "Top_Size"=>$importData[2],
                    "Bottom_Size"=>$importData[3],
                    "Notes"=>$importData[4],

                    
                    ];

                    
                   
      
                }
                return Response()->json([
                    "success" => true,
                    "file" => $insertData,
                    "msg" => 'File Column Is Not Match According To Instructions.'
                ]);

                
                
      
               
              }else{
                return Response()->json([
                    "success" => false,
                    "msg" => 'Import Successful.File too large. File must be less than 2MB.'
                ]);
                Session::flash('message','File too large. File must be less than 2MB.');
                
              }
      
            }else{
                 return Response()->json([
                    "success" => false,
                    "msg" => 'Import Successful.Invalid File Extension.'
                ]);
               
            }
            

            
            
      
    }
    
}
