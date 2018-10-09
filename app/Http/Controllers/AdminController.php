<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Admin;
use App\Registration;
use Session;
use Datatables;

class AdminController extends Controller
{
    public function login(){
    	return view("admin.login");
    }

    public function login_check(Request $request){

    	$admin_email=$request->email;
    	$admin_password=md5($request->password);

    	$admin_obj=Admin::where('email',$admin_email)->where('password',$admin_password)->first();
    	//dd($admin_obj);
    	if($admin_obj){
    		Session::put('id',$admin_obj->id);
    		Session::put('name',$admin_obj->name);
    		Session::put('email',$admin_obj->email);
    		Session::put('access_level',$admin_obj->access_level);
    		return redirect ('/admin/show');
    	} else{

    		Session()->flash('message','Your Email and Password Is Invaild');
    		return redirect('/admin-panel');
    	}

    	

    }

	public function dashboard(){

		//echo "dd";
		// $dashboard=view('admin.dashboard');
		return view('admin.dashboard')->with('admin.master');
    }
    public function logout(){
    	Session::flush();
    	return redirect('/admin-panel')->with('flash_message_logout','Logged Out Successfully');
    }

    public function show(){
         $user_name="";
        if(Session::has('id'))
        {
                 // $all_data=Registration::select('id','applicant_name','email','division','district','thana','created_at')->get()->toArray();
                 // // dd($all_data[0]);
                 $data_obj=Registration::orderBy('id', 'DESC')->paginate(5);
                 //dd($data_obj);
            

            return view('admin.show',compact('data_obj'));

        }else
        {
            return redirect('/admin-panel')->with('flash_message_error','Please Login To Access');
        }

    	
    }
    // public function manage_user(){
    //     // $user_name="";
    //     // if(Session::has('id'))
    //     // {
    //     //          $students = Registration::all();
    //  			// return Datatables::of($students)->make(true);
            

    //         return view('admin.ajaxdata');

        // }else
        // {
        //     return redirect('/admin-panel')->with('flash_message_error','Please Login To Access');
        // }

    // }
    public function getdata()
    {
     $students = Registration::select('id','applicant_name','email','division','district','thana','created_at');
     return Datatables::of($students)->addColumn('action', function ($student) {
                return '<a href="{{URL::to("/admin/edit/")}}-'.$student->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
          
            ->make(true);
    }


    public function search(Request $request){

        if($request->ajax()){
            $output="";
            $students=Registration::where('applicant_name','LIKE','%'.$request->search.'%')->orWhere('email','LIKE','%'.$request->search.'%')->orWhere('division','LIKE','%'.$request->search.'%')->orWhere('district','LIKE','%'.$request->search.'%')->orWhere('thana','LIKE','%'.$request->search.'%')->get();
            if($students){
                foreach ($students as $key => $student) {
                    $output.='<tr>'.
                              // '<td>'.$student->id.'</td>'.
                              '<td>'.$student->applicant_name.'</td>'.
                              '<td>'.$student->email.'</td>'.
                              '<td>'.$student->division.'</td>'.
                              '<td>'.$student->district.'</td>'.
                              '<td>'.$student->thana.'</td>'.
                              '<td>'.$student->created_at.'</td>'.
                              '<td>'.'<a href="'.'/admin/edit/'.$student->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.'</td>'.
                             
                              '</tr>';  
                }
                return response($output);
            }
        }
    }

    public function edit($id){
        // $id=$id;
        // dd($id);
        // exit();
        $data=Registration::where('id',$id)->first()->toArray();
        //dd($data['applicant_name']);
        return view('admin.edit',['data'=>$data]);

    }

    public function update(Request $request,$id){
        $data=$request->all();
        // $id=$id;
        // dd($id);
        Registration::where('id',$id)->update(
        [
            'applicant_name'=>$data['applicant_name'],
            'email'=>$data['email'],
            'division'=>$data['division'],
            'district'=>$data['district'],
            'thana'=>$data['thana'],
        ]);
        return redirect('/admin/show')->with('UpdateMesg','Update Data Successfully');
    }
}


