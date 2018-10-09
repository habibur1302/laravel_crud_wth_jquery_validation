<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Registration;
use App\Education;
use App\Training;
use DB;


class RegistrationController extends Controller
{
    public function register()
    {
    	return view('work.registration');
    }
 
    public function check(Request $request)
    {
     if($request->get('email'))
     {
      $email = $request->get('email');
      // dd($email);
      // exit();
      $data = DB::table("registrations")
       ->where('email', $email)
       ->count();
      if($data > 0)
      {
       echo 'not_unique';
      }
      else
      {
       echo 'unique';
      }
     }
    }
    public function insert(Request $request)
    {
      $imgname='';
      $file=$request->file('photo');
      $filename=$file->getClientOriginalName();
      $imgname=uniqid().$filename;
      $destinationpath=public_path('/img/');
      $file->move($destinationpath,$imgname);

      $cvname='';
      $file2=$request->file('cv');
      $filename2=$file2->getClientOriginalName();
      $cvname=uniqid().$filename2;
      $destinationpath2=public_path('/cv/');
      $file2->move($destinationpath2,$cvname);
      
      $data=new Registration();
      $data->applicant_name=$request['applicant_name'];
      $data->email=$request['email'];
      $data->mail_address=$request['mail_address'];
      $data->division=$request['division'];
      $data->district=$request['district'];
      $data->thana=$request['thana'];
      $data->address=$request['address'];
      $data->language=$request['language'];
      $data->photo=$imgname;
      $data->cv=$cvname;
      $data->training=$request['radioBtn'];
      // dd($data);
      // exit();
      $data->save();
      $data2=array();
      for($count = 0; $count < count($request["exam"]); $count++)
      {
        $data2[]=
        [
          'registration_id'=>$data->id,
          'exam_name'=>$request["exam"][$count],
          'university'=>$request["university"][$count],
          'board'=>$request["board"][$count],
          'result'=>$request["result"][$count],
        ];
      }
      Education::insert($data2);  
      // dd($data2);
      // exit();
      $data3=array();
      for($count_val = 0; $count_val < count($request["training_name"]); $count_val++)
      {
        $data3[]=
        [
          'registration_id'=>$data->id,
          'training_name'=>$request["training_name"][$count_val],
          'training_details'=>$request["training_details"][$count_val],
        ];

      }
      Training::insert($data3); 
    	return redirect()->back()->with('message','Registration successfull');
    }
}
