@extends('layout.company_profile')


@section('content')

<div class="header">
	<div class="container">
		<div class="col-md-8 header-left">
			<div class="col-sm-5 pro-pic">
				<img class="img-responsive" src="../../design/images/def.png" alt=" "/>
			</div>
			
			<div class="col-sm-5 pro-text">
				<h1>{{ $compinfo->companyname }}</h1>
				<p><strong>Company Representative</strong></p><br>
				<p >Name: {{$compinfo->replastname}}, {{$compinfo->repfirstname}} {{$compinfo->repmiddlename}}</p>
				<p>Position: {{ $compinfo->position }}</p>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-4 header-right ">
			<ul class="list-left">
				
				<li>Email:</li>
				<li>Phone no:</li>
				<li>Located At:</li>
			</ul>
			<ul class="list-right">
				<li><a href="mailto:info@example.com">{{$user->email}}</a></li>
				<li>{{$compinfo->contact}}</li>
				<li>{{$compinfo->address}}</li>
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
			<h3 class="modal-title" id="lineModalLabel">Edit Company Information</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			{!! Form::open(['url' => '/editcomprofile']) !!}

			
			  <div class="form-group">
                <label for="companyname">Company Name</label>
                <input type="text" class="form-control" name = "companyname"value="{{ $compinfo->companyname }}">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name = "address"value="{{ $compinfo->address }}">
              </div>
              <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name = "contact"value="{{ $compinfo->contact }}">
              </div>
			  <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name = "description"value="{{ $compinfo->description }}">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name = "username"value="{{ $user->username }}">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name = "email" value="{{ $user->email }}">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name = "password" value="{{ $user->password }}">
              </div><br>

			Edit Representative Information<br>
              <div class="form-group">
                <label for="repfirstname">First Name</label>
                <input type="text" class="form-control" name = "repfirstname" value="{{ $compinfo->repfirstname }}">

              </div>
              <div class="form-group">
                <label for="repmiddlename">Middle Name</label>
                <input type="text" class="form-control" name = "repmiddlename" value="{{ $compinfo->repmiddlename }}">
              </div>
              <div class="form-group">
                <label for="replastname">Last Name</label>
                <input type="text" class="form-control" name = "replastname" value="{{ $compinfo->replastname }}">
              </div>
              
              <div class="form-group">
                <label for="department">Position</label>
                <input type="text" class="form-control" name = "position" value="{{ $compinfo->position }}">
              </div>
              
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
		<p class="abt-para">{{$compinfo->description}}</p>
	</div>
	
				
	</div>

	<div class="clearfix"></div>
</div>
@endsection