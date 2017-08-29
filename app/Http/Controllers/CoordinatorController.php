<?php

namespace App\Http\Controllers;
use Hash;
use Auth;
use View;
use Session;
use Redirect;
use Validator;
use App\Company;
use App\Coordinator;
use App\Department;
use App\User;
use App\Subject;
use App\HiredIntern;
use App\Student;
use App\Task;
use App\NatureSummary;
use App\NatureofWorks;
use App\Journal;
use App\UsersLog;
use App\PrelimAppraisal;
use App\MidtermAppraisal;
use App\FinalAppraisal;
use App\CompanyEvaluation;
use App\Notification;
use App\School;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CoordinatorController extends Controller
{

     public function getCoordinatorRegister()
    {
        $schoolist = School::all();
        $departmentlist = Department::all();

        return view('pages.coordinator_register')->with(['schoolist'=>$schoolist,'departmentlist'=>$departmentlist]);
        
    }


     public function insertCoordinator(Request $request)
    {
        $school = $request['school'];
        $getschid = School::where('schoolname','=',$school)->get()->first();
        $schoolid = $getschid->schoolid;
               
        $depart = $request['department'];
        $getdepid = Department::where('depName','=',$depart)->get()->first();
        $departmentid = $getdepid->depID;


        $rules = array(
            'coordinatornumber' => 'required',
            'firstname' => 'required|min:1',
            'middlename' => 'required|min:1',
            'lastname' => 'required|min:1',
            'contact' => 'required|min:6',
            'about' => 'required',
            'email' => 'required|min:1',
            'username' => 'required',
            'password' => 'required|min:6',

            );

        $validator = Validator::make($request->all(),$rules);

        
        if($validator->fails())
        {
            return Redirect::to('/viewregister')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {       
            

            $user = new User;
            $user->email = $request['email'];
            $user->username = $request['username'];
            $user->password = Hash::make($request['password']);
            $user->role = "2";
            $user->status = "1";
            $user->save();

            $id = $user->id;

            $coor = new Coordinator;
            $coor->userid = $id;
            $coor->coordinatornumber = $request['coordinatornumber'];
            $coor->firstname = $request['firstname'];
            $coor->middlename = $request['middlename'];
            $coor->lastname = $request['lastname'];
            $coor->contact = $request['contact'];
            $coor->about = $request['about'];
            $coor->schoolid = $schoolid;
            $coor->departid = $departmentid;
            $coor->save();
            
            return Redirect::to('/login');
        }
        
       
            
    }


    public function getCoordinatorProfile(Request $request)
    {
        
        $id = Session::get('id');   
        $coorinfo = Coordinator::where('userid','=',$id)->get()->first();
        $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
        $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.coordinator_profiles')->with(['coorinfo'=>$coorinfo,'count'=>$count,'notif'=>$notif]);

    }

    public function getCoordinatorClass()
    {
        $id = Session::get('id');
        $subject = Subject::where('coordinator_userid','=',$id)->get();
        $student = Student::all()->count();

        $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
        $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
        return view ("pages.coordinator_class")->with(['subject'=>$subject,'student'=>$student,'count'=>$count,'notif'=>$notif]);
    }

    public function getCoordinatorStudentlist()
    {
        $id = Session::get('id');
        $student = Student::all();

        $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
        $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
        return view ("pages.coordinator_studentlists")->with(['student'=>$student,'count'=>$count,'notif'=>$notif]);
    }

    public function studentInfo($userid)
    {
        $id = Session::get('id');
        $intern = Student::where('userid','=',$userid)->first();
        //task
        $studtask = HiredIntern::where('student_userid','=',$userid)->first();
        $interntask = $studtask->hiredinternsid;
        $gettask = Task::where('hiredinternsid','=',$interntask)->get();
        //Journal
        $journal = Journal::where('student_userid','=',$userid)->get();
        $getlogs = UsersLog::where('users_userid','=',$userid)->orderBy('logindate','desc')->get();
        //Appraisal9
        $prelimappraisal = PrelimAppraisal::where('student_userid','=',$userid)->first();
        
        if($prelimappraisal == null)
        {
            $prelim = false;
        }
        else
        {
            $prelim = $prelimappraisal;
            
        }
        $midtermappraisal = MidtermAppraisal::where('student_userid','=',$userid)->first();
        
        
        if($midtermappraisal == null)
        {
            $midterm = false;
        }
        else
        {
            
            $midterm = $midtermappraisal;
            
        }
        $finalappraisal = FinalAppraisal::where('student_userid','=',$userid)->first();
        

        if($finalappraisal == null)
        {
            $final = false;
        }
        else
        {

            
            $final = $finalappraisal;
            
        }
        

        $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
        $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
        return view('pages.coordinator_studentinfo')->with(['intern'=>$intern,'gettask'=>$gettask,'journal'=>$journal,'getlogs'=>$getlogs,'count'=>$count,'notif'=>$notif,'prelim'=>$prelim,'midterm'=>$midterm,'final'=>$final]);
    }
  
    public function getCompanies()
    {
        $id = Session::get('id');

        $company = Company::all();

        $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
        $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
        return view('pages.coordinator_viewcompanies')->with(['company'=>$company,'count'=>$count,'notif'=>$notif]);
    }

    public function getCompanyDetails($userid)
    {
        $id = Session::get('id');
        $companyinfo = Company::where('userid','=',$userid)->get()->first();
        $user = User::find($userid);
        $counts = HiredIntern::where('company_userid','=',$userid)->count();
        
        $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
        $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
        return view('pages.coordinator_viewcompanydetails')->with(['companyinfo'=>$companyinfo,'user'=>$user,'counts'=>$counts,'count'=>$count,'notif'=>$notif]);
    }

   
   

    public function editCoordinatorProfile(Request $request)
    {

        $id = Session::get('id');
        $user = User::find($id);
        $coordinator = Coordinator::where('userid','=',$id)->get()->first();


        $rules = array(
            'coordinatornumber' => 'required',
            'firstname' => 'required|min:1',
            'middlename' => 'required|min:1',
            'lastname' => 'required|min:1',
            'contact' => 'required|min:6',
            'about' => 'required',
            'email' => 'required|min:1',
            'username' => 'required',
            'password' => 'required|min:6',

            );

        $validator = Validator::make($request->all(),$rules);

        
        if($validator->fails())
        {
             return Redirect::to('/coordinator/profile')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {       

            $coordinator->coordinatornumber = $request['coordinatornumber'];
            $coordinator->firstname = $request['firstname'];
            $coordinator->middlename = $request['middlename'];
            $coordinator->lastname = $request['lastname'];
            $coordinator->contact = $request['contact'];
            $coordinator->about = $request['about'];
            $coordinator->save();
            
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->save();

            return Redirect::to('/coordinator/profile');

        }
        
        
    }

    public function getViewCompanyIntern($userid)
    {
        $id = Session::get('id');
        $intern = HiredIntern::where('company_userid','=',$userid)->get();

        $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
        $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
        return view('pages.coordinator_viewcompanyintern')->with(['intern'=>$intern,'count'=>$count,'notif'=>$notif]);
    }

    public function getCompanyEvaluation($userid)
    {
        $id = Session::get('id');
        $find = CompanyEvaluation::where('student_userid','=',$userid)->first();
        
        if($find == null)
        {
            $value = true;
        }
        else
        {
            $value = false;
        }
        $evaluation = CompanyEvaluation::where('student_userid','=',$userid)->first();

        $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
        $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
        return view('pages.coordinator_companyevaluation')->with(['evaluation'=>$evaluation,'value'=>$value,'count'=>$count,'notif'=>$notif]);
    }

     public function getJournalContent($journalid)
   {
      $id = Session::get('id');
      $journal = Journal::where('journalid','=',$journalid)->get()->first();

      $date = $journal->date;
      $compare = UsersLog::where('logindate','=',$date)->get()->first();
      
      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.coordinator_journalcontent')->with(['count'=>$count,'notif'=>$notif,'journal'=>$journal,'compare'=>$compare]);
   }


}
