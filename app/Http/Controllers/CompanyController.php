<?php

namespace App\Http\Controllers;

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
use App\Company;
use App\Task;
use App\Student;
use App\HiredIntern;
use App\Journal;
use App\NatureofWorks;
use App\NatureSummary;
use App\PrelimAppraisal;
use App\MidtermAppraisal;
use App\FinalAppraisal;
use Carbon\Carbon;
use App\Notification;
use App\CategorizeSite;
use App\UsersLog;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    

    public function getCompanyProfile()
    {
        $id = Session::get('id');
        $user = User::find($id);
        $compinfo = Company::where('userid','=',$id)->get()->first();
        

        return view('pages.company_profiles')->with(['compinfo'=>$compinfo,'user'=>$user]);
    }

    public function getPracticumPolicy()
    {
        return view('pages.company_practicumpolicy');
    }

    public function getCompanyRegister()
    {
        return view('pages.company_register');
    }

    
    public function insertCompany(Request $request)
    {
        $rules = array(
            'companyname' => 'required|min:1',
            'address' => 'required|min:1',
            'contact' => 'required|min:6',
            'description' => 'required|min:1',
            'email' => 'required|min:1',
            'username' => 'required|min:1',
            'password' => 'required|min:6',
            'repfirstname' => 'required|min:1',
            'repmiddlename' => 'required|min:1',
            'replastname' => 'required|min:1',
            'position' => 'required|min:1',
            );

        $validator = Validator::make($request->all(),$rules);

        
        if($validator->fails())
        {
             return Redirect::to('/viewcompanyregister')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{  
            
            $user = new User;
            $user->email = $request['email'];
            $user->username = $request['username'];
            $user->password = Hash::make($request['password']);
            $user->role = "3";
            $user->status = "1";
            $user->save();   

            $id = $user->id; 

            $company = new Company;
            $company->userid = $id;
            $company->companyname = $request['companyname'];
            $company->address = $request['address'];
            $company->contact = $request['contact'];
            $company->description = $request['description'];
            $company->repfirstname = $request['repfirstname'];
            $company->repmiddlename = $request['repmiddlename'];
            $company->replastname = $request['replastname'];
            $company->position = $request['position'];
            $company->save();


            return Redirect::to('/login');
        
        }
        
    }


    

    public function editCompanyProfile(Request $request)
    {

        
        $id = Session::get('id');
        $user = User::find($id);
        $comp = Company::where('userid','=',$id)->get()->first();


        $rules = array(
            'companyname' => 'required|min:1',
            'address' => 'required|min:1',
            'contact' => 'required|min:6',
            'description' => 'required|min:1',
            'email' => 'required|min:1',
            'username' => 'required|min:1',
            'password' => 'required|min:6',
            'repfirstname' => 'required|min:1',
            'repmiddlename' => 'required|min:1',
            'replastname' => 'required|min:1',
            'position' => 'required|min:1',
            );

        $validator = Validator::make($request->all(),$rules);

        
        if($validator->fails())
        {
             return Redirect::to('/company/profile')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {  
        $comp->companyname = $request['companyname'];
        $comp->address = $request['address'];
        $comp->contact = $request['contact'];
        $comp->description = $request['description'];
        $comp->repfirstname = $request['repfirstname'];
        $comp->repmiddlename = $request['repmiddlename'];
        $comp->replastname = $request['replastname'];
        $comp->position = $request['position'];
        $comp->save();
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();


            return Redirect::to('/company/profile');
        }
        


    }

    public function getInterns()
    {
        $id = Session::get('id');
        $getintern = HiredIntern::where('company_userid','=',$id)->get();
       
        return view('pages.company_interns')->with(['getintern'=>$getintern]);
    }

    public function getInternInfo($userid)
    {
        Session::put('internid',$userid);
        $intern = Student::where('userid','=',$userid)->first();
        //Task
        $studcomptask = HiredIntern::where('student_userid','=',$userid)->first();
        $interntask = $studcomptask->hiredinternsid;
        $gettask = Task::where('hiredinternsid','=',$interntask)->get();
        //Nature of Work
        $nature = NatureofWorks::all();
        //Journal
        $journal = Journal::where('student_userid','=',$userid)->get();
        $pappraisal = PrelimAppraisal::where('student_userid','=',$userid)->get();
        $mappraisal = MidtermAppraisal::where('student_userid','=',$userid)->get();
        $fappraisal = FinalAppraisal::where('student_userid','=',$userid)->get();
        $id = Session::get('internid');
        return view('pages.company_interninfo')->with(['intern'=>$intern,'gettask'=>$gettask,'journal'=>$journal,'pappraisal'=>$pappraisal,'mappraisal'=>$mappraisal,'fappraisal'=>$fappraisal,'id'=>$id,'nature'=>$nature]);
    }



    
    public function insertAppraisal(Request $request)
    {
        $id = Session::get('internid');
        $compid = Session::get('id');
         $carbon = Carbon::now('Asia/Manila');
        $date = $carbon->toDateString();

        if($request['term'] == 'Prelim')
        {
        $appraisal = new PrelimAppraisal;
        $appraisal->student_userid = $id;
        $appraisal->company_userid = $compid;
        $appraisal->term = $request['term'];
        $appraisal->qualityofwork = $request['qualityofwork'];
        $appraisal->quantityofwork = $request['quantityofwork'];
        $appraisal->dependability = $request['dependability'];
        $appraisal->cooperation = $request['cooperation'];
        $appraisal->personality = $request['personality'];
        $appraisal->attendance = $request['attendance'];
        $appraisal->resourcefulness = $request['resourcefulness'];
        $appraisal->managerialpotentials = $request['managerialpotentials'];
        $appraisal->comment = $request['comment'];
        $appraisal->date = $date;
        $appraisal->status = "1";
        $appraisal->save();

        }
        elseif ($request['term'] == 'Midterm') 
        {

        $mappraisal = new MidtermAppraisal;
        $mappraisal->student_userid = $id;
        $mappraisal->company_userid = $compid;
        $mappraisal->term = $request['term'];
        $mappraisal->qualityofwork = $request['qualityofwork'];
        $mappraisal->quantityofwork = $request['quantityofwork'];
        $mappraisal->dependability = $request['dependability'];
        $mappraisal->cooperation = $request['cooperation'];
        $mappraisal->personality = $request['personality'];
        $mappraisal->attendance = $request['attendance'];
        $mappraisal->resourcefulness = $request['resourcefulness'];
        $mappraisal->managerialpotentials = $request['managerialpotentials'];
        $mappraisal->comment = $request['comment'];
        $mappraisal->date = $date;
        $mappraisal->status = "1";
        $mappraisal->save();

        }
        elseif ($request['term'] == 'Final') 
        {

        $fappraisal = new FinalAppraisal;
        $fappraisal->student_userid = $id;
        $fappraisal->company_userid = $compid;
        $fappraisal->term = $request['term'];
        $fappraisal->qualityofwork = $request['qualityofwork'];
        $fappraisal->quantityofwork = $request['quantityofwork'];
        $fappraisal->dependability = $request['dependability'];
        $fappraisal->cooperation = $request['cooperation'];
        $fappraisal->personality = $request['personality'];
        $fappraisal->attendance = $request['attendance'];
        $fappraisal->resourcefulness = $request['resourcefulness'];
        $fappraisal->managerialpotentials = $request['managerialpotentials'];
        $fappraisal->comment = $request['comment'];
        $fappraisal->date = $date;
        $fappraisal->status = "1";
        $fappraisal->save();

        }

        return Redirect::to('/company/interninfo/'.$id);
    }

    public function manageSites()
    {
        $getall = CategorizeSite::all();
   
        return view('pages.company_managesites')->with(['getall'=>$getall]);
    }

    public function addSites(Request $request)
    {
        $catsite = new CategorizeSite;

        $catsite->sitename = $request['sitename'];
        $catsite->category = $request['category'];
        $catsite->status = "1";
        $catsite->save();

        return Redirect::to('/company/managesites');
    }

    public function editSites(Request $request,$catsitesid)
    {
        

        $findsite = CategorizeSite::where('catsitesid','=',$catsitesid)->first();
        $findsite->sitename = $request['sitename'];
        $findsite->category = $request['category'];
        $findsite->status = $request['status'];
        $findsite->save();

        return Redirect::to('/company/managesites');
    }

    public function updateSite($catsitesid)
    {
        $getsite = CategorizeSite::find($catsitesid)->first();

        return view('pages.company_updatesite')->with(['getsite'=>$getsite]);
    }

    public function deleteSite($catsitesid)
    {
        CategorizeSite::find($catsitesid)->delete();
        return Redirect::to('/company/managesites');
    }
   
     public function getJournalContent($journalid)
   {
      $id = Session::get('id');
      $journal = Journal::where('journalid','=',$journalid)->get()->first();

      $date = $journal->date;
      $compare = UsersLog::where('logindate','=',$date)->get()->first();
      
      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.company_journalcontent')->with(['count'=>$count,'notif'=>$notif,'journal'=>$journal,'compare'=>$compare]);
   }

   public function approveJournal($journalid)
   {
        $update = Journal::where('journalid','=',$journalid)->first();
        $update->validation = "1";
        $update->save();

        return Redirect::to('/company/journalcontent/'.$journalid);

   }
    
   public function disapproveJournal($journalid)
   {
        $update = Journal::where('journalid','=',$journalid)->first();
        $update->validation = "2";
        $update->save();

        return Redirect::to('/company/journalcontent/'.$journalid);
   }

    public function addComment(Request $request)
    {
        
        $getjournalid = $request['journalid'];
        $getjournal = Journal::where('journalid','=',$getjournalid)->get()->first();
        $getjournal->comment = $request['comment'];
        $getjournal->save();
       
        return Redirect::to('/company/journalcontent/'.$getjournalid);
        
    }

    public function editComment(Request $request)
    {
        
        $getjournalid = $request['journalid'];
        $getjournal = Journal::where('journalid','=',$getjournalid)->get()->first();
        $getjournal->comment = $request['comment'];
        $getjournal->save();
       
        return Redirect::to('/company/journalcontent/'.$getjournalid);
        
    }


}
