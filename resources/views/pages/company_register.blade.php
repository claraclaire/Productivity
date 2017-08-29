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


{!! Form::open(['url' => '/company/register', 'class' => 'form-horizontal']) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<b style = "font-size:20px;padding-left:220px;"><i><strong>Company Details</strong></i></b>
<br><br>
<div class="form-group">
<label class="col-md-4 control-label">Company Name</label>
<div class="col-md-6">
<input type="text" class="form-control" name="companyname">
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Address</label>
<div class="col-md-6">
<input type="text" class="form-control" name="address"  >
</div>
</div>



<div class="form-group">
<label class="col-md-4 control-label">Contact</label>
<div class="col-md-6">
<input type="text" class="form-control" name="contact" >
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Description</label>
<div class="col-md-6">
<input type="textarea" class="form-control" name="description" >
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Email</label>
<div class="col-md-6">
<input type="text" class="form-control" name="email" >
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Username</label>
<div class="col-md-6">
<input type="text" class="form-control" name="username"  >
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Password</label>
<div class="col-md-6">
<input type="password" class="form-control"  name="password" >
</div>
</div>

<br>
<b style = "font-size:20px;padding-left:220px;"><i><strong>Company Representative Details</strong></i></b>
<br><br>

<div class="form-group">    
<label class="col-md-4 control-label">First Name</label>
<div class="col-md-6">
<input type="text" class="form-control" name="repfirstname"  >
</div>
</div>

<div class="form-group">    
<label class="col-md-4 control-label">Middle Name</label>
<div class="col-md-6">
<input type="text" class="form-control" name="repmiddlename" >
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Last Name</label>
<div class="col-md-6">
<input type="text" class="form-control"  name="replastname" >
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Position</label>
<div class="col-md-6">
<input type="text" class="form-control"  name="position" >
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