<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Product;
use App\Models\Sport;
use App\Models\User;
use App\Models\order;
use App\Models\place_order;
use App\Models\roaster;
use App\Models\roaster_detail;
use App\Models\product_option;
use App\Models\Prod_option;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class AdminController extends Controller
{
    function index(){
       
      $orders = place_order::select(
         DB::raw('count(*) as total'),
            DB::raw("DATE_FORMAT(created_at,'%Y') as months"),
            DB::raw("DATE_FORMAT(created_at,'%m') as monthKey"),

  )
  ->orderBy('created_at', 'desc')

  ->groupBy('months', 'monthKey')
  ->orderBy('months', 'asc')
 
  ->get();
 
//  $data = [];
 
//      foreach($orders as $row) {
//         $data['label'][] =$row->created_at;
//         $data['data'][] = (int) $row->total;
//       }
// return $data;
    // $data['chart_data'] = json_encode($data);
    // return $chart_data;
        return view('Admin_asstes.index',compact('orders'));
    }
    function users(){
        $users=User::where('role','user')->get();
        return view('Admin_asstes.users',compact('users'));

    }
    function sports(){
        $sports=Sport::all();
        return view('Admin_asstes.sports',compact('sports'));

    }
    function Products(){
        $products=Product::all();
        $sports=Sport::all();
        return view('Admin_asstes.Products',compact('products','sports'));

    }

    function edit_product($id){
        $product=Product::find($id);
        $sports=Sport::all();
        return view('Admin_asstes.edit_product',compact('product','sports'));

    }


    function edit_sports($id){
        $sport=Sport::find($id);
        return view('Admin_asstes.edit_sports',compact('sport'));

    }

    function edit_user($id){
        $user=User::find($id);
        return view('Admin_asstes.edit_user',compact('user'));

    }
    function options(){
        $sports=Sport::all();
        $options=Option::all();
        return view('Admin_asstes.options',compact('sports','options'));
    }

    function adduser(Request $request){
        $user=new User();
        $user->name=$request->name;
        $user->number=$request->number;
        $user->email=$request->email;
        $user->address=$request->address;

        $user->password=Hash::make($request->password);
        $user->Bio=$request->bio;
        $user->save();
        return back()->with("success","Successfully Added");

    }
    function delete_user($id){
        $user=User::find($id);
        $user->delete();
        return back()->with("success","Successfully Deleted");

    }
    function update_user(Request $request){
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->number=$request->number;
        $user->email=$request->email;
        $user->address=$request->address;

        if (isset($request->password)) {

                  $user->password=Hash::make($request->password);

        }

        $user->Bio=$request->bio;
        $user->save();
        // dd($user);
        return redirect('admin/users')->with("success","Successfully Updated Profile");
    }
    function add_sports(Request $request){
        $sport=new Sport();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $request->file->extension();
            $fileName = rand(11111, 99999) . "_." . $extension;
            $request->file->move('upload/sports/', $fileName);
            $sport->image = $fileName;
        }
        $sport->name=$request->name;
        $sport->save();
        return back()->with("success","Successfully Added");

    }
    function delete_sports($id){
        $sports=Sport::find($id);
        $destination='upload/sports/'.$sports->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $sports->delete();
        return back()->with("success","Successfully Deleted");

    }
    function update_sports(Request $request){
        $sport=Sport::find($request->id);
        if ($request->hasFile('file')) {
            $destination='upload/sports/'.$sport->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('file');
            $extension = $request->file->extension();
            $fileName = rand(11111, 99999) . "_." . $extension;
            $request->file->move('upload/sports/', $fileName);
            $sport->image = $fileName;
        }
        $sport->name=$request->name;
        $sport->save();
        return back()->with("success","Successfully Updated");
    }
    function add_product(Request $request){
        $product=new Product();
        $product->name=$request->name;
        $product->description=$request->description;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $request->file->extension();
            $fileName = rand(11111, 99999) . "_." . $extension;
            $request->file->move('upload/product/', $fileName);
            $product->image = $fileName;
        }
        $product->sports_id=$request->sports_id;
        $product->save();
        return back()->with("success","Successfully Added");


    }
    function update_product(Request $request){
        $product=Product::find($request->id);
        $product->name=$request->name;
        $product->description=$request->description;
        if ($request->hasFile('file')) {
            $destination='upload/product/'.$product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('file');
            $extension = $request->file->extension();
            $fileName = rand(11111, 99999) . "_." . $extension;
            $request->file->move('upload/product/', $fileName);
            $product->image = $fileName;
        }
        $product->sports_id=$request->sports_id;
        $product->save();
        return back()->with("success","Successfully Updated");
    }
    function delete_product($id){
        $product=Product::find($id);
        $destination='upload/product/'.$product->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $product->delete();
        return back()->with("success","Successfully Deleted");


    }
    function get_product(Request $request){
        $products=Product::where('sports_id',$request->id)->get();
        return view('Admin_asstes.get_product',compact('products'));
        // return response()->json($products);
    }
    function get_product_option(Request $request){
        
        $prod_options=Prod_option::where('product_id',$request->id)->where('parent','Product Option')->get();
        $col_vers=Prod_option::where('product_id',$request->id)->where('parent','Color Version')->get();

//  dd($prod_options);
        $id=$request->id;
        
        return view('Admin_asstes.get_product_option' ,compact('id', 'prod_options','col_vers'));
    }
    
    function add_option(Request $request){
        $validated = $request->validate([

            'product_id' => 'required',
        ]);
        $option=new Option();
        $option->product_id=$request->product_id;
        $option->option=$request->option;
        $option->save();
        return back()->with("success","Successfully Added");

    }
    function delete_option($id){
        $option=Option::find($id);
        $option->delete();
        return back()->with("success","Successfully Deleted");

    }
    function edit_option($id){
        $option=Option::find($id);
        $products=Product::all();
        $sports=Sport::all();
        return view('Admin_asstes.edit_option',compact('option','sports','products'));
    }
    function update_option(Request $request){
        $validated = $request->validate([

            'product_id' => 'required',
        ]);
        $option=Option::find($request->id);
        $option->product_id=$request->product_id;
        $option->option=$request->option;
        $option->update();
        return back()->with("success","Successfully Updated");
    }
public function orders(){
    $orderdetail=place_order::get();
    return view('Admin_asstes.order',compact('orderdetail'));
}
public function order_detail(){
    return view('Admin_asstes.order_detail');
}
public function edit_profile(){
    $user=User::where('id',auth()->user()->id)->first();
    
    return view('Admin_asstes.edit_profile',compact('user'));
}
public function update_profile(Request $request){
    $user=User::find($request->id);
    $user->name=$request->name;
    
    $user->email=$request->email;
   

   

 
    $user->save();
    // dd($user);
    return redirect('admin/index')->with("success","Successfully Updated Admin Profile");
    
    
}
public function update_password(Request $request){
    $user=User::find($request->id);
    if ($request->password != null && $request->old_pass) {

        $request->validate([

            'password' => ['required', 'confirmed'],


        ]);


        if (\Hash::check($request->old_pass, $user->password)) {
            $user->fill([
                'password' => \Hash::make($request->password)
            ])->save();
            return back()->with('success', 'Password updated successfully');

        } else {
            return back()->with('error', 'Password does not match');
        }
    }

    return back()->with('error', 'Enter password to update');
    return back()->with("success","Password Updated Successfully");
    
    
}

public function product_detail($id){
    //$placeorder=place_order::with('lettering','roaster')->find($id);
    $data=place_order::with('lettering','roaster')->find($id);

   


return view('Admin_asstes.product_detail',compact('data'));
}
}
