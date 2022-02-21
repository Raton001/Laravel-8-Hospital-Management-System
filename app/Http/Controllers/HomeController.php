<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

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
        $appoint=Appointment::all();
        $doctors= Doctor::all();
        if(Auth::id()){
            if (Auth::user()->usertype=='0'){
                return view('user.home', compact('doctors'));
            } else{

                return view('admin.dashboard', compact('doctors','appoint'));
            }


        } else{

            return redirect()->back();
        }
        
       
    }
   
    

}
