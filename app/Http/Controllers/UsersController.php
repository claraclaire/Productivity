<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Input;
use Request;
use Session;
use Redirect;
use Validator;
use App\Coordinator;
use App\User;
use App\UsersLog;
use Carbon\Carbon;
use Storage;
use App\Appsite;
use App\Holiday;
use App\HiredIntern;
use App\Student;


use App\Http\Requests;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{
 
    public function getLanding()
    {
        $getdate = Carbon::now('Asia/Manila');
        $date = $getdate->format('m-d');
        $hol = Holiday::where('holdates','=',$date)->get();
        if($hol == " ")
        {
            $getholiday = $hol->holnames;
            return view ('pages.landing')->with(['getholiday'=>$getholiday]);
        }
        else
        {
        return view ('pages.landing');
        }
    }

     public function getLogin()
    {
        return view('pages.login');
    }

    public function studLogout()
    {
        $id = Session::get('id');
        $get = User::where('id','=',$id)->get()->first();
        $get->status = "1";
        $get->save();


        $log = Session::get('logid');
        $user = UsersLog::where('logid','=',$log)->get()->first();

        $logout = Carbon::now('Asia/Manila');
        $logtime = $logout->format('h:i:s A');
        $date = $logout->format('m-d-Y');

        $user->logouttime = $logtime;
        $user->save();
        

        $appsite = AppSite::where('student_userid','=',$id,'AND','date','=',$date)->get();
        Storage::disk('txt')->put('appsite('.$date.'---'.$id.').txt', $appsite);
        $getno = Student::where('userid','=',$id)->get()->first();

//send messages to students when their account has been log out
            $arr_post_body = array( 
                "message_type" => "SEND",
                "mobile_number" => $getno->phonenumber,
                "shortcode" => "292904034",
                "message_id" => str_random(32),
                "message" => urlencode("Your account has been successfully logged out!"),
                "client_id" => "ee8785385ee511ef3f1a4af354ee17bc772d866ef2f396181e63a692d44922ed",
                "secret_key" => "ee5a1c82a32fd2b83bbaddf034ada940a89669be771b6f99f3deeb7b93f0da3f"
            );

            $query_string = "";
            foreach($arr_post_body as $key => $frow)
            {
                $query_string .= '&'.$key.'='.$frow;
            }

            $URL = "https://post.chikka.com/smsapi/request";

            $curl_handler = curl_init();
            curl_setopt($curl_handler, CURLOPT_URL, $URL);
            curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body));
            curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string);
            curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl_handler, CURLOPT_SSL_VERIFYPEER, FALSE);
            $response = curl_exec($curl_handler);
            curl_close($curl_handler);
   //end send message     
       
        Session::flush();

        return Redirect::to('/login');
                   


        
    }

    public function logout()
    {
        $id = Session::get('id');
        $get = User::where('id','=',$id)->get()->first();
        $get->status = "1";
        $get->save();


        $log = Session::get('logid');
        $user = UsersLog::where('logid','=',$log)->get()->first();

        $logout = Carbon::now('Asia/Manila');
        $logtime = $logout->format('h:i:s A');
        $date = $logout->format('m-d-Y');

        $user->logouttime = $logtime;
        $user->save();
        

        
        Session::flush();

        return Redirect::to('/login');
               


        
    }
   


    // public function login()
    // {
    //     $request = Request::all();
        
    //     $email = $request['email'];
    //     $password = $request['password'];
        

    //     if (Auth::attempt(['email' => $email,'password' => $password])) 
    //     {

    //         $id = Auth::user()->id;
    //         Session::put('id',$id);

    //         $logintime = Carbon::now('Asia/Manila');
    //         $date = $logintime->toDateString();
    //         $time = $logintime->toTimeString();

    //         $userlog = new Userslog;
    //         $userlog->users_userid = $id;
    //         $userlog->logindate = $date;
    //         $userlog->logintime = $time;
    //         $userlog->logouttime = " ";
    //         $userlog->save();

    //         $logid = $userlog->logid;
    //         Session::put('logid',$logid);



    //       if(Auth::user()->role == 1)
    //       {
    //         $getstatus = User::where('id','=',$id)->get()->first();
    //         $getstatus->status = "active";
    //         $getstatus->save();

    //         return Redirect::to('/student/profile');
    //       }
    //        elseif(Auth::user()->role == 2)
    //       {
            
    //         return Redirect::to('/coordinator/profile');
    //       }
    //       elseif(Auth::user()->role == 3)
    //       {
           
    //         return Redirect::to('/company/profile');
    //       }

    //     }
    //     else
    //     {
           
    //         return Redirect::to('/login');
    //     }

    // }

   
     public function login()
    {
        $request = Request::all();
        
        $email = $request['email'];
        $password = $request['password'];
        
    

        if (Auth::attempt(['email' => $email,'password' => $password])) 
        {


            $id = Auth::user()->id;
            Session::put('id',$id);

            $logintime = Carbon::now('Asia/Manila');
            $date = $logintime->format('Y-m-d');
            $time = $logintime->format('h:i:s A');
            $getdate = $logintime->format('m-d');
            $day = $logintime->format('l');
            $ishol = Holiday::where('holdates','=',$date)->first();
            $getstudent = HiredIntern::where('student_userid','=',$id)->first();

            //$compdate = $logintime->format('m-d');
            //if($compdate == Holiday::where('holdate','=',$compdate))
            //{}
            //else
            //{}
            // $date = $logintime->toDateString();
            // $time = $logintime->toTimeString();
            
            $userlog = new Userslog;
            $userlog->users_userid = $id;
            $userlog->logindate = $date;
            $userlog->day = $day;
            $userlog->logintime = $time;
            $userlog->logouttime = " ";
            
            $userlog->attendance = "2";
            
            if($ishol == null){
            $userlog->isholiday = "0";
            }
            else{
            $userlog->isholiday = "1";
            }
            $userlog->save();

            $logid = $userlog->logid;
            Session::put('logid',$logid);



          if(Auth::user()->role == 1)
          {
            $getstatus = User::where('id','=',$id)->get()->first();
            $getstatus->status = "active";
            $getstatus->save();

            return Redirect::to('/student/profile');
          }
           elseif(Auth::user()->role == 2)
          {
            
            return Redirect::to('/coordinator/profile');
          }
          elseif(Auth::user()->role == 3)
          {
           
            return Redirect::to('/company/profile');
          }

        }
        else
        {
           
           return Redirect::to('/login')
                        ->withErrors('The username and password doesnt match!! Please try again.')
                        ->withInput();
        }  

    } 
    
}
