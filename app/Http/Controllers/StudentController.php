<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Auth;
use View;
use Input;
use Session;
use Redirect;
use Validator;
use App\Coordinator;
use App\Department;
use App\User;
use App\Course;
use App\Company;
use App\UsersLog;
use App\Task;
use App\CompanyEvaluation;
use App\HiredIntern;
use Carbon\Carbon;
use App\Journal;
use App\NatureSummary;
use App\NatureofWorks;
use App\AppSite;
use App\Notification;
use App\Insight;
use App\School;
use App\ClassRooster;
use App\Holiday;

use App\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

   public function getInternRegister()
   {

      $course = Course::all();
      $company = Company::all();
      $school = School::all();
      $department = Department::all();
 
      return view('pages.student_register')->with(['course'=>$course,'company'=>$company,'school'=>$school,'department'=>$department]);
   }

   public function insertStudent(Request $request)
   {
      $schoolname = $request['school'];
      $getschid = School::where('schoolname','=',$schoolname)->get()->first();
      $schoolid = $getschid->schoolid;
      $department = $request['department'];
      $getdepid = Department::where('depName','=',$department)->get()->first();
      $depid = $getdepid->depID;
      $course = $request['course'];
      $courseid = Course::where('description','=',$course)->get()->first();
      $courid = $courseid->courseid;
      $company = $request['company'];
      $companyid = Company::where('companyname','=',$company)->get()->first();
      $compid = $companyid->userid;

      $rules = array(
            'studentnumber' => 'required',
            'firstname' => 'required|min:1',
            'middlename' => 'required|min:1',
            'lastname' => 'required|min:1',
            'phonenumber' => 'required',
            'address' => 'required',
            'civilstatus' => 'required',
            'citizenship' => 'required',
            'religion' => 'required',
            'fathersname' => 'required',
            'mothersname' => 'required',
            'yearlevel' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'company' => 'required',
            'start' => 'required',
            'end' => 'required',

            );

      $validator = Validator::make($request->all(),$rules);
      $sn = $request['studentnumber'];
      $findsn = ClassRooster::where('studentnumber','=',$sn)->get()->first();
      
      if($validator->fails())
      {
          return Redirect::to('/viewinternregister')
                        ->withErrors($validator)
                        ->withInput();
      }
      else
      {
              if($findsn == null)
              {
                return Redirect::to('/viewinternregister')
                              ->withErrors("Not Registered !! Student Number not in the List")
                              ->withInput();
              }
              elseif($findsn == true)
              {
                   $user = new User;
                   $user->email = $request['email'];
                   $user->username = $request['username'];
                   $user->password = Hash::make($request['password']);
                   $user->role = "1";
                   $user->status = "1";
                   $user->save();

                   $id = $user->id;

                  


                   $student = new Student;
                   $student->userid = $id;
                   $student->studentnumber = $request['studentnumber'];
                   $student->firstname = $request['firstname'];
                   $student->middlename = $request['middlename'];
                   $student->lastname = $request['lastname'];
                   $student->phonenumber = $request['phonenumber'];
                   $student->dateofbirth = $request['dateofbirth'];
                   $student->gender = $request['gender'];
                   $student->address = $request['address'];
                   $student->civilStatus = $request['civilstatus'];
                   $student->citizenship = $request['citizenship'];
                   $student->religion = $request['religion'];
                   $student->fathersName = $request['fathersname'];
                   $student->mothersName = $request['mothersname'];
                   $student->schoolid = $schoolid;
                   $student->departid = $depid;
                   $student->courseid = $courid;
                   $student->yearLevel = $request['yearlevel'];
                   $student->save();

                    $hired = new HiredIntern;
                   $hired->company_userid = $compid;
                   $hired->student_userid = $id;
                   $hired->start = $request['start'];
                   $hired->end = $request['end'];
                   $hired->hoursRendered = "00:00:00";
                   $hired->workstatus = "1";
                   $hired->save();

                  

                   return Redirect::to('/login');
             }
      }

   }
   

   public function getStudentProfile()
   {
      $id = Session::get('id');
      $student = Student::where('userid','=',$id)->get()->first();
      $courseid = $student->courseid;
      $getcourse = Course::where('courseid','=',$courseid)->get()->first();;
      $getlogs = UsersLog::where('users_userid','=',$id)->orderBy('logindate','asc')->get();
      $carbon = Carbon::now('Asia/Manila');
      $date = $carbon->format('m-d');
      $getdate = Holiday::where('holdates','=',$date)->first();
      if($getdate == null)
      {
        $result = 0;
      }
      else
      {
        $result = 1;
      }

      $status = User::where('id','=',$id)->get()->first();

      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.student_profiles')->with(['student'=>$student,'getcourse'=>$getcourse,'getlogs'=>$getlogs,'count'=>$count,'notif'=>$notif,'result'=>$result,'status'=>$status]);
   }

   public function getProductivityStatus()
   {
      
      $id = Session::get('id');
      $carbon = Carbon::now('Asia/Manila');
      $date = $carbon->toDateString();

      $app = AppSite::where('student_userid','=',$id,'AND','date','=',$date)->get();


       // do {

       //    for ($i= 1 ; $app >= 0 ; $i++) { 
       //       $compare = AppSiteList::where('$app','=',$appsitename);
       //        if($compare->status == '1'){
       //            if($apptime->startingtime )
       //            {
       //                 $productivity++;
       //            } 
       //            else{

       //            }  
       //         }  
       //         elseif ($compare->status == '2')
       //         {
       //            if($apptime->startingtime )
       //            {
       //                $productivity--;
       //            } 
       //            else{

       //            }  
       //         }
       //         elseif($compare->status == '3')
       //         {
       //            if($apptime->startingtime )
       //            {
       //                $productivity++;
       //            } 
       //            else{

       //            }  
       //         }
       //         elseif($compare == null)
       //         {
       //            if($apptime->startingtime )
       //            {
      //                  $productivity--;
       //            } 
       //            else{

       //            }  
       //         }
       //       }
   
       //   } while ( ($app != 0) ||($date == $app->date));




      $status = User::where('id','=',$id)->get()->first();
      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.student_productivitystatus')->with(['app'=>$app,'count'=>$count,'notif'=>$notif,'status'=>$status]);
   }

  
  


   public function getEvaluation()
   {
      $id = Session::get('id');
      $getcompany = HiredIntern::where('student_userid','=',$id)->get()->first();
      $evaluation = CompanyEvaluation::where('student_userid','=',$id)->get()->first();
      if($evaluation == null)
      {
         $eval = false;
      }
      elseif($evaluation == true)
      {
         $eval = true;
      }
      $status = User::where('id','=',$id)->get()->first();
      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.student_evaluatecompanyform')->with(['getcompany'=>$getcompany,'eval'=>$eval,'count'=>$count,'notif'=>$notif,'status'=>$status]);
   }

   public function insertEvaluation(Request $request)
   {
      $id = Session::get('id');
      $student = Student::where('userid','=',$id)->first();
      $coor = Coordinator::find(1);
      $logintime = Carbon::now('Asia/Manila');
      $date = $logintime->toDateString();
      
      $getcomp = HiredIntern::where('student_userid','=',$id)->get()->first();
      $compid = $getcomp->company_userid;
      $carbon = Carbon::now('Asia/Manila');
      $date = $carbon->toDateString();
 

      $rules = array(
            'immediate_superior' => 'required',
            'co_worker' => 'required',
            'workplace' => 'required',
            'opportunities' => 'required',
            'tasks_assigned' => 'required',
            'overall_experience' => 'required',
            'greatest_benefits' => 'required',
            'biggest_problems' => 'required',
            'suggest_improvement' => 'required',
            'recommend_company' => 'required',
            );

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
             return Redirect::to('/student/evaluatecompanyform')
                        ->withErrors($validator)
                        ->withInput();
        }

        else
        {

            $compeval = new CompanyEvaluation;
            $compeval->company_userid = $compid;
            $compeval->student_userid = $id;
            $compeval->immediate_superior = $request['immediate_superior'];
            $compeval->iscomment = $request['iscomment'];
            $compeval->co_worker = $request['co_worker'];
            $compeval->cwcomment = $request['cwcomment'];
            $compeval->workplace = $request['workplace'];
            $compeval->wpcomment = $request['wpcomment'];
            $compeval->opportunities = $request['opportunities'];
            $compeval->ocomment = $request['ocomment'];
            $compeval->tasks_assigned = $request['tasks_assigned'];
            $compeval->tacomment = $request['tacomment'];
            $compeval->overall_experience = $request['overall_experience'];
            $compeval->oecomment = $request['oecomment'];
            $compeval->greatest_benefits = $request['greatest_benefits'];
            $compeval->biggest_problems = $request['biggest_problems'];
            $compeval->suggest_improvement = $request['suggest_improvement'];
            $compeval->recommend_company = $request['recommend_company'];
            $compeval->date = $date;
            $compeval->status = "1";
            $compeval->save();

            $notif = new Notification;
            $notif->notif_from = $id;
            $notif->sent_to = $coor->userid;
            $notif->message = $student->lastname.' submitted a Company Evaluation!';
            $notif->is_read = "0";
            $notif->was_sent_at = $date;
            $notif->save();

            
            return Redirect::to('/student/evaluatecompanyform');
        }

   }

   public function getInsight()
   {
      $id = Session::get('id');

      $ins = Insight::where('student_userid','=',$id)->first();
         if($ins == null)
         {
            $insight = false;
         }
         else
         {
            $insight = $ins;
         }
      $status = User::where('id','=',$id)->get()->first();
      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.student_insight')->with(['count'=>$count,'notif'=>$notif,'insight'=>$insight,'status'=>$status]);
   }

   public function insertInsight(Request $request)
   {
      $id = Session::get('id');
      $carbon = Carbon::now('Asia/Manila');
      $date = $carbon->toDateString();

      $insight = new Insight;
      $insight->student_userid = $id;
      $insight->content = $request['content'];
      $insight->dateSubmitted = $date;
      $insight->status = "1";
      $insight->save();

      return Redirect::to('/student/insight');
   }

   public function editInsight(Request $request)
   {
      $id = Session::get('id');

      $carbon = Carbon::now('Asia/Manila');
      $date = $carbon->toDateString();

      $editinsight = Insight::where('student_userid','=',$id)->get()->first();
      $editinsight->content = $request['cont'];
      $editinsight->dateSubmitted = $date;
      $editinsight->save();

      return Redirect::to('/student/insight');
   }

    public function getPracticumPolicy()
    {
         $id = Session::get('id');

         $status = User::where('id','=',$id)->get()->first();
         $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
         $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
        return view('pages.student_practicumpolicy')->with(['notif'=>$notif,'count'=>$count,'status'=>$status]);
    }


}