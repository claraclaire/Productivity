@extends('master')

@section('content')
    
<br><br>
 <div class="container-fluid">
 <div class="row">

 <div class="col-md-8 col-md-offset-2">
 <div class="panel panel-default">
 <div class="panel-heading"><a href = "/landingpage">PauseBreak</a></div>
 <div class="panel-body">
                    
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

{!! Form::open(['url'=>'/login', 'class' => 'form-horizontal']) !!}

 <input type="hidden" name="_token" value="{{ csrf_token() }}">

 <div class="form-group">
 {!! Form::label('email','E-Mail Address',['class' => 'col-md-4 control-label']) !!}
 <div class="col-md-6">
 {!! Form::text('email','',['class' => 'form-control']) !!}
 </div>
 </div>


<div class="form-group">
 <label class="col-md-4 control-label">Password </label>
 <div class="col-md-6">
 <input type="password" class="form-control" name="password">
 </div>
 </div>


 <div class="form-group">
 <div class="col-md-6 col-md-offset-4">
 
 </div>
 </div>

 <div class="form-group">
 <div class="col-md-6 col-md-offset-4">

 {!! Form::submit('Login',['class'=>'btn btn-primary','style'=>'margin-right:15px']) !!}
<br>
<br>
 <a href="#"> </a>
 
 </div>
 </div>
{!! Form::close() !!}
</form>

<div id="wrap" class="text-center">
  <!-- Button trigger modal -->
  <br>
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Register
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <br><br>
      
        <hr>
        <div class="alert alert-danger">
           <div class = "alert-content">
            <a  href="/viewcompanyregister"><img src="../design/icon/company.png" width="90" height="90"></a>Company
            <a  href="/viewregister"><img src="../design/icon/coordinator.png" width="90" height="90"></a>Coordinator
            <a  href="/viewinternregister"><img src="../design/icon/intern.png" width="90" height="90"></a>Intern
           </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>

 </div>
 </div>
 </div>
 </div>
 </div>

@stop