@extends('layout.student_profile')

{!! HTML::style('../../design/css/policy.css') !!}
{!! HTML::style('../../design/css/journalcontent.css') !!}
@section('content')

<div class = "box1">

	<div class = "policy1">
		<h2 style="padding-left:55px;font-family:Helvetica Neue">Entry Details</h2>
		
		<div class="line"></div>

		<div class = "insidecontent">
			<span class = "validation">
			@if($journal->validation == 0)
			<h4>Supervisors Approval: <span style = "color:red;">Pending</span></h4>
			@elseif($journal->validation == 1)
			<h4>Supervisors Approval:&nbsp&nbsp&nbsp<img src="../../design/icon/approved.png" width="15" height="15">Approved</h4>
			@elseif($journal->validation == 2)
			<h4>Supervisors Approval:&nbsp&nbsp&nbsp<img src="../../design/icon/disapproved.png" width="15" height="15">Rejected</h4>
			@endif
		</span>
			<h4>Date:  <u>{{$journal->date}}</u> </h4><br>
			<h5> Date Submitted: <u>{{$journal->dateSubmitted}}-2017</u></h5>
			<ul class = "time time-pills">
			<li>Time Out: <span><u>{{$compare->logouttime}}</u></span></li>
			<li>Time In:  <span><u>{{$compare->logintime}}</u></span></li>
			
			</ul>
			
			<div class = "nature">
			
				<li>Software Development: 
				@if($journal->softwaredevelopment == 0)
				<span>{{$journal->softwaredevelopment}}</span></li>
				@elseif($journal->softwaredevelopment > 0)
				<span style = "color:red;">{{$journal->softwaredevelopment}}</span>
				@endif
				</li>

				<li>Software Testing: 
				@if($journal->softwaretesting == 0)
				<span>{{$journal->softwaretesting}}</span>
				@elseif($journal->softwaretesting > 0)
				<span style = "color:red;">{{$journal->softwaretesting}}</span>
				@endif
				</li>

				<li>Research: 
				@if($journal->research == 0)
				<span>{{$journal->research}}</span>
				@elseif($journal->research > 0)
				<span style = "color:red;">{{$journal->research}}</span>
				@endif
				</li>

				<li>Technical Support: 
				@if($journal->technicalsupport == 0)
				<span>{{$journal->technicalsupport}}</span>
				@elseif($journal->technicalsupport > 0)
				<span style = "color:red;">{{$journal->technicalsupport}}</span>
				@endif
				</li>

				<li>Clerical Task: 
				@if($journal->clericaltasks == 0)
				<span>{{$journal->clericaltasks}}</span>
				@elseif($journal->clericaltasks > 0)
				<span style = "color:red;">{{$journal->clericaltasks}}</span>
				@endif
				</li>

				<li>Errands:
				@if($journal->errands == 0) 
				<span>{{$journal->errands}}</span>
				@elseif($journal->errands > 0) 
				<span style = "color:red;">{{$journal->errands}}</span>
				@endif
				</li>

				<h4>Total Hours: <span style = "color:blue;">{{$journal->totalHours}}</span></h4>
			  <div class = "entry">

				<h3>Entry:</h3>
				<p>{{$journal->entry}}</p>

		   	  </div>
		   	   <div class = "comment">

				<h3>Supervisors Comment:</h3>
				<p>{{$journal->comment}}</p>

		   	  </div>
			</div>
		</div>


	</div>

</div>

@endsection