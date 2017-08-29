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
use App\Notification;
use App\Holiday;

use App\Student;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
     public function getStudentJournal()
   {
      $id = Session::get('id');
      $journal = Journal::where('student_userid','=',$id)->orderBy('date','asc')->get();
      $status = User::where('id','=',$id)->get()->first();
      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.student_journal')->with(['journal'=>$journal,'count'=>$count,'notif'=>$notif,'status'=>$status]);
   }

   public function addJournal(Request $request)
   {
      $id = Session::get('id');
      $carbon = Carbon::now('Asia/Manila');
      $date1 = $carbon->format('m-d-Y');
      $date = $carbon->format('m-d');
      $getdate = Holiday::where('holdates','=',$date)->first();
      


      $rules = array(
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'entry' => 'required',
         );

      $validator = Validator::make($request->all(),$rules);

      if($validator->fails())
      {
         return Redirect::to('/student/journal')
                        ->withErrors($validator)
                        ->withInput();
      }
      else
      {
         $journal = new Journal;
         $journal->student_userid = $id;
         $journal->entry = $request['entry'];
         $journal->date = $request['date'];
         $journal->start = $request['start'];
         $journal->end = $request['end'];
         $journal->softwaredevelopment = $request['softwaredevelopment'];
         $journal->softwaretesting = $request['softwaretesting'];
         $journal->research = $request['research'];
         $journal->technicalsupport = $request['technicalsupport'];
         $journal->clericaltasks = $request['clericaltasks'];
         $journal->errands = $request['errands'];
         $journal->totalHours = $request['totalHours'];
         $journal->dateSubmitted = $date;
         $journal->validation = "0";
         if($getdate == null){
         $journal->isholiday = "0";
         }
         else{
         $journal->isholiday = "1";
         }
         $journal->status = "1";
         $journal->save();

         return Redirect::to('/student/journal');

      }

   }

   public function getJournalContent($journalid)
   {
      $id = Session::get('id');
      $journal = Journal::where('journalid','=',$journalid)->get()->first();

      $date = $journal->date;
      $compare = UsersLog::where('logindate','=',$date)->get()->first();
      $status = User::where('id','=',$id)->get()->first();
      //dd($status);
      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.student_journalcontent')->with(['count'=>$count,'notif'=>$notif,'journal'=>$journal,'compare'=>$compare,'status'=>$status]);
   }




}
