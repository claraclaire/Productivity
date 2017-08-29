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
use App\CategorizeSite;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
   
     public function getStudentTasks()
   {
      $id = Session::get('id');
      $hired = HiredIntern::where('student_userid','=',$id)->first();
      $getid = $hired->hiredinternsid;
      $task = Task::where('hiredinternsid','=',$getid)->get();
      $productive = "productive";
      $unprod = "unproductive";
      $neut = "neutral";
      $getprod = CategorizeSite::where('category','=',$productive)->get();

      $getunprod = CategorizeSite::where('category','=',$unprod)->get();
      $neutral = CategorizeSite::where('category','=',$neut)->get();
      $status = User::where('id','=',$id)->get()->first();
      $count = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->count();
      $notif = Notification::where('sent_to','=',$id,'AND','is_read','=','0')->get();
      return view('pages.student_tasks')->with(['getprod'=>$getprod,'getunprod'=>$getunprod,'neutral'=>$neutral,'task'=>$task,'count'=>$count,'notif'=>$notif,'status'=>$status]);
   }

   public function insertTask(Request $request)
   {
        $id = Session::get('id');
        $hired = HiredIntern::where('student_userid','=',$id)->first();
        $hiredintern = $hired->hiredinternsid;
        $nature = $request['nature'];
        $get = NatureofWorks::where('natureofwork','=',$nature)->first();
        $getid = $get->natureid;
        

        $task = new Task;
        $task->hiredinternsid = $hiredintern;
        $task->taskdescription = $request['taskdescription'];
        $task->startrange = $request['startrange'];
        $task->endrange = $request['endrange'];
        $task->timestartrange = $request['timestartrange'];
        $task->timeendrange = $request['timeendrange'];
        $task->projectname = $request['projectname'];
        $task->natureid = $getid;
        $task->status = "1";
        $task->completion = "incomplete";
        $task->save();

        return Redirect::to('/student/tasks');
   }

   public function taskDone($taskid)
   {
        $find = Task::where('taskid','=',$taskid)->first();
        $find->completion = "Done";
        $find->save();

        return Redirect::to('/student/tasks');
   }

   public function insertTaskForIntern(Request $request)
   {

      $logintime = Carbon::now('Asia/Manila');
      $date = $logintime->toDateString();

      $id = Session::get('internid');
      $userid = Session::get('id');

      $repname = Company::where('userid','=',$userid)->first();

      $hired = HiredIntern::where('student_userid','=',$id)->first();
      $hiredintern = $hired->hiredinternsid;
      $nature = $request['nature'];
      $get = NatureofWorks::where('natureofwork','=',$nature)->first();
      $getid = $get->natureid;

        $task = new Task;
        $task->hiredinternsid = $hiredintern;
        $task->taskdescription = $request['taskdescription'];
        $task->startrange = $request['startrange'];
        $task->endrange = $request['endrange'];
        $task->timestartrange = $request['timestartrange'];
        $task->timeendrange = $request['timeendrange'];
        $task->projectname = $request['projectname'];
        $task->natureid = $getid;
        $task->status = "1";
        $task->completion = "incomplete";
        $task->save();

        $notif = new Notification;
        $notif->notif_from = $userid;
        $notif->sent_to = $id;
        $notif->message = $repname->repfirstname.' your supervisor added a new task for you!';
        $notif->is_read = "0";
        $notif->was_sent_at = $date;
        $notif->save();

       return Redirect::to('/company/interninfo/'.$id);


   }


}
