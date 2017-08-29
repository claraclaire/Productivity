<?php

namespace App\Http\Controllers;

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

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    

	public function insertSubject(Request $request)
	{
		$rules = array(
			'offercode' => 'required|min:5',
			'coursenumber' => 'required|min:5',
			'subjectdescription' => 'required|min:3',
			'days' => 'required',
			'time' => 'required',
			'room' => 'required',
		);

		$validator = Validator::make($request->all(),$rules);


		if($validator->fails())
		{
			 return Redirect::to('coordinator/class')
                        ->withErrors($validator)
                        ->withInput();
		}
		else
		{
			$subject = new Subject;
			$subject->offercode = $request['offercode'];
			$subject->coursenumber = $request['coursenumber'];
			$subject->subjectdescription = $request['subjectdescription'];
			$subject->days = $request['days'];
			$subject->time = $request['time'];
			$subject->room = $request['room'];
			$subject->coordinator_userid = Session::get('id');
			$subject->dep_ID = "1";
			$subject->status = "1";
			$subject->save();

			return Redirect::to('coordinator/class');
		}
	}

	

}
