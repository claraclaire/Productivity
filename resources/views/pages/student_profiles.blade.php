@extends('layout.student_profile')


@section('content')

<div class="header">
	<div class="container">
		<div class="col-md-8 header-left">
			<div class="col-sm-5 pro-pic">
				<img class="img-responsive" src="../../design/images/def.png" alt=" "/>
			</div>
			
			<div class="col-sm-5 pro-text">
				<h1>Intern Name</h1>
				<p>{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}</p>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-4 header-right ">
			<ul class="list-left">
				<li>Student ID :</li>
				<li>Email:</li>
				<li>Address:</li>
				<li>University:</li>
				<li>Department:</li>
				<li>Year Level:</li>
				<li>Course:</li>
			</ul>
			<ul class="list-right">
				<li>{{ $student->studentnumber }}</li>
				<li>{{ $student->users->email }}</li>
				<li>{{ $student->address }}</li>
				<li>{{ $student->school->schoolname }}</li>
				<li>{{ $student->department->depCode }}</li>
				<li>{{ $student->yearLevel }}</li>
				<li>{{ $getcourse->description}}</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner -->
<!-- about -->
<div id="about" class="about">
	<div class="container">
		<h3 class="tittle">Department</h3>
		<p class="abt-para">{{ $student->department->depName }}</p>
	</div>
	
				
	</div>


	
<br>
	<h2 style="padding-left:30px;">Logs</h2><br><br>

	
	<div class="clearfix">
		<div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab" style="width:500px;">
    <thead>
    
        <tr>
           
            <th>Date</th>
            <th>Day</th>
            <th>In</th>
            <th>Out</th>
            <th>Status</th>
            
        </tr>
    </thead>
    @foreach($getlogs as $logs)
         @if($logs->isholiday == '0')  
            <tr>
         @elseif($logs->isholiday == '1')
         	<tr style="color:red;">
         @endif

              
                <td>{{ $logs->logindate }}</td>
                <td>{{ $logs->day }}</td>
                <td>{{ $logs->logintime }}</td>
                <td>{{ $logs->logouttime }}</td>
                <td>@if($logs->attendance == '1')
                	  Late
                    @elseif($logs->attendance == '2')
                      OnTime
                    @else
                      Absent
                    @endif
                </td>
               
            </tr>
           
     @endforeach       
    </table>
    </div>


	</div>
</div>
@endsection

