<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role=="superadmin") {

            return redirect('superadmin/index');
        }
       else if (Auth::user()->role=="admins") {

            return redirect('admins/');
        }

        
    }
    public function logout(){
        Auth::logout();

        return redirect('/')->with('status', 'Logout Successfully');
    }
}
