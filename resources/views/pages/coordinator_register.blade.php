@extends('register')

@section('content')

<br><br>
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


{!! Form::open(['url' => '/coordinator/register', 'class' => 'form-horizontal']) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<b style = "font-size:20px;padding-left:220px;"><strong>Coordinator Details</strong></b>

<br><br>
<div class="form-group">
<label class="col-md-4 control-label">Coordinator Number</label>
<div class="col-md-6">
<input type="text" class="form-control" name="coordinatornumber">
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">First Name</label>
<div class="col-md-6">
<input type="text" class="form-control" name="firstname"  >
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Middle Name</label>
<div class="col-md-6">
<input type="text" class="form-control" name="middlename">
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Last Name</label>
<div class="col-md-6">
<input type="text" class="form-control" name="lastname">
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Contact Number</label>
<div class="col-md-6">
<input type="text" class="form-control" name="contact" >
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">About You</label>
<div class="col-md-6">
<input type="text" class="form-control" name="about">
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">School</label>
<div class="col-md-6">

<select class="form-control" name="school">
            <option>Choose option</option>
        @foreach($schoolist as $school)
            <option value = "{{$school->schoolname}}">{{$school->schoolname}}</option>
        @endforeach
        
</select>

</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Department</label>
<div class="col-md-6">

<select class="form-control" name="department">
		    <option>Choose option</option>
		@foreach($departmentlist as $department)
			<option value = "{{$department->depName}}">{{ $department->depName }}</option>
		@endforeach
		
</select>

</div>
</div>
   
<div class="form-group">    
<label class="col-md-4 control-label">Email Address</label>
<div class="col-md-6">
<input type="email" class="form-control" name="email">
</div>
</div>

<div class="form-group">    
<label class="col-md-4 control-label">Username</label>
<div class="col-md-6">
<input type="text" class="form-control" name="username">
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Password</label>
<div class="col-md-6">
<input type="password" class="form-control"  name="password" >
</div>
</div>



<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
Register
</button>
                            
</div>
</div>
{!! Form::close() !!}


@stop