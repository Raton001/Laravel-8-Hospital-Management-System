<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    
    public function main()
     {
        $doctors= Doctor::all();
        return view('welcome' ,compact('doctors')); 
     }

    public function allDoctor(){
     
        $doctors = Doctor::all();
        return view('alldoctor', compact('doctors'));

    }
   
    public function search (Request $request){
   
        $query= $request->get('query');
   
        $searched_item = Doctor::where('speacality', 'LIKE', '%' .$query. '%')->orwhere('name', 'LIKE', '%'.$query. '%')->get();
      
        return view('user.search', compact('searched_item'));
     }
   

     public function appointment(Request $request){

        $data= new Appointment; 

        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->doctor=$request->doctor;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->status='In Processing';

        if(Auth::id()){
            $data->user_id=Auth::user()->id;

        }
        
       $data->save();

       return redirect()->back()->with('message', 'Your Request for Appointment is Successfull. We will Contact with You Soon');

    }
     
 public function myAppointment(){

    if(Auth::id()){
     
      $user_id= Auth::user()->id;

      $data= Appointment::where('user_id',$user_id)->get();

     return view('user.myappointment', compact('data'));

    }
    else{
        return back();
    }
   
 }

 public function cancelAppointment($id){

    $data= Appointment::find($id)->delete();
    return back();
 }



}
