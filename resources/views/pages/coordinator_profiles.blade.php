@extends('layout.coordinator_profile')


@section('content')

<div class="header">
	<div class="container">
		<div class="col-md-8 header-left">
			<div class="col-sm-5 pro-pic">
				<img class="img-responsive" src="../../design/images/def.png" alt=" "/>
			</div>
			
			<div class="col-sm-5 pro-text">
				
			<br><h1> Coordinator</h1>
				<p>{{ $coorinfo->firstname }} {{$coorinfo->middlename}} {{$coorinfo->lastname }}</p>

			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-4 header-right ">
			<ul class="list-left">
				<li>ID :</li>
				<li>Email:</li>
				<li>Phone no:</li>
				<li>University:</li>
				<li>Department:</li>
			</ul>
			<ul class="list-right">
				<li>{{$coorinfo->coordinatornumber}}</li>
				<li><a href="mailto:info@example.com">{{$coorinfo->users->email}}</a></li>
				<li>{{ $coorinfo->contact }}</li>
				<li>{{$coorinfo->school->schoolname}}</li>
				<li>{{ $coorinfo->department->depName }}</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner -->

<br>
<a href="#" data-toggle="modal" data-target="#squarespaceModal" style="float:right;padding-right:30px;"><img src="../../design/images/edit.gif">Edit Profile</a>
@if (count($errors) > 0)
     <div class="alert alert-danger">
     <strong>Whoops! </strong> There were some problems with your input. <br> <br>
     <ul>
    
            @foreach ($errors->all() as $error)
         <li>{{ $error }} </li>
        @endforeach
     </ul>
     </div>
     @endif	
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog"  style = "margin-top: 60px;">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Edit Profile</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			{!! Form::open(['url' => '/editcoorprofile']) !!}

			
			  <div class="form-group">
                <label for="coordinatornumber">Coordinator Number</label>
                <input type="text" class="form-control" name = "coordinatornumber"value="{{ $coorinfo->coordinatornumber }}">
              </div>
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name = "firstname"value="{{ $coorinfo->firstname }}">
              </div>
              <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" class="form-control" name = "middlename"value="{{ $coorinfo->middlename }}">
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" name = "lastname"value="{{ $coorinfo->lastname }}">
              </div>
              <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name = "contact"value="{{ $coorinfo->contact }}">
              </div>
			  <div class="form-group">
                <label for="about">About</label>
                <input type="text" class="form-control" name = "about"value="{{ $coorinfo->about }}">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name = "username"value="{{ $coorinfo->users->username }}">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name = "email" value="{{ $coorinfo->users->email }}">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name = "password" value="{{ $coorinfo->users->password }}">
              </div><br>

			
              
              <button type="submit" class="btn btn-default">Submit</button>&nbsp&nbsp<button data-dismiss="modal" class="btn btn-default" role = "button">Cancel</button>
            {!! Form::close() !!}

		</div>
		<div class="modal-footer">
			
		</div>
	</div>
  </div>
</div>
<!-- end of modal -->
<!-- about -->
<div id="about" class="about">
	<div class="container">
		<h3 class="tittle">About Me</h3>
		<p class="abt-para">{{$coorinfo->about}}</p>
	</div>
	
				
	</div>

	<div class="clearfix"></div>
</div>
@endsection