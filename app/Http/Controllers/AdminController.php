<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function addDoctor(){

        return view('admin.addDoctor');
    }

   public function store(Request $request){
      
    $doctor= new Doctor; 

      $image= $request->file;
      $imagename = time(). '.' . $image->getClientOriginalExtension();
      $request->file->move('doctorImage', $imagename);

      $doctor->image=$imagename;
      $doctor->name= $request->name;
      $doctor->phone= $request->phone;
      $doctor->speacality= $request->speacality;
      $doctor->room= $request->room;

      $doctor->save();

      return back()->with('message', 'Doctor Added Successfully ');
     
        

   }

  public function show(){

    $data=Appointment::all();

    return view('admin.appointments', compact('data'));
  } 


  public function deleteAppointment($id){

    $data= Appointment::find($id)->delete();
    return back();
 }

 public function approved($id){
     $data= Appointment::find($id);
     $data->status='Approved';
     $data->save();
     return back();

 }


 public function user(){

    $data=User::all();

    return view('admin.alluser', compact('data'));
 }


 public function deleteuser($id){

    $data= User::find($id)->delete();
    return back();
 }



 public function doctor(){

    $data=Doctor::all();
    
    return view('admin.alldoctor', compact('data'));
    
}

public function editdoctor($id){
  $data=Doctor::find($id);
    return view('admin.updatedoctor', compact('data'));
}

public function updateDoctor(Request $request, $id){
      $doctor=Doctor::find($id);

      $image= $request->file;
      
      if($image){

        $imagename = time(). '.' . $image->getClientOriginalExtension();
        $request->file->move('doctorImage', $imagename);
        $doctor->image=$imagename;

      }
      
      $doctor->name= $request->name;
      $doctor->phone= $request->phone;
      $doctor->speacality= $request->speacality;
      $doctor->room= $request->room;

      $doctor->save();

      return back()->with('message', 'Doctor Updated Successfully ');

}



public function deleteDoctor($id){

    $data= Doctor::find($id)->delete();
    return back();
 }


 public function sendMail($id){

  $data=Doctor::find($id);
  $mail=Appointment::find($id);

  return view('admin.email', compact('data','mail'));

}

public function mailNotification(Request $request, $id){
    
  $data=Appointment::find($id);

  $details=[
     
    'greeting'=> $request->greetings,
    'body'=> $request->body,
    'action'=> $request->action,
    'name'=> $request->name
  ];

  Notification::send($data,new EmailNotification($details));

  return back()->with('message', 'Email Send Successfull ');


}

//    public function dashboard(){

//     // $appoint=Appointment::all();
//     // $doctors= Doctor::all();
//     return view('admin.dashboard', compact('doctors','appoint'));

//    }


}
