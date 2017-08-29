@extends('register')


@section('content')

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


<div class="row">
    <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            
            <div class="x_content">
                <br />
                
				{!! Form::open(['url' => '/student/register', 'class' => 'form-horizontal form-label-left input_mask','style' => 'padding-left:150px;']) !!}

                 <h1> Personal Information</h1>   
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student Number</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name = "studentnumber" placeholder="Student Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Firstname </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name ="firstname" placeholder="Firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Middlename</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name = "middlename" placeholder="Middlename">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lastname </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number (ex.639325479013) </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="phonenumber" placeholder="Cellphone Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="date-picker form-control col-md-7 col-xs-12" name = "dateofbirth" type="date">
                        </div>
                    </div>
                     <div class = "form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                
                      Male:  <input type="radio" class="flat" name="gender"  value="Male" checked="" required />
                      Female: <input type="radio" class="flat" name="gender"  value="Female" />
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Civil Status </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="civilstatus" placeholder="Civil Status">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Citizenship</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="citizenship" placeholder="Citizenship">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Religion</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="religion" placeholder="Religion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name = "fathersname" placeholder="Father's Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mother's Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name = "mothersname" placeholder="Mother's Name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">School</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name = "school">
                                <option>Choose option</option>
                            @foreach($school as $school)
                                <option value = "{{ $school->schoolname }}">{{ $school->schoolname }}</option>
                             @endforeach   
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name = "department">
                                <option>Choose option</option>
                            @foreach($department as $department)
                                <option value = "{{ $department->depName }}">{{ $department->depName }}</option>
                             @endforeach   
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name = "course">
                            	<option>Choose option</option>
                            @foreach($course as $course)
                                <option value = "{{ $course->description }}">{{ $course->description }}</option>
                             @endforeach   
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Year Level</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name = "yearlevel" placeholder="Year Level">
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name = "username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name = "email" placeholder="Email@yahoo.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password (minimum of 6 characters)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name = "password" placeholder="Password">
                        </div>
                    </div>


                    <h1>Hiring Information</h1> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Company</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name = "company">
                                <option>Choose option</option>
                            @foreach($company as $company)
                                <option value = "{{$company->companyname}}">{{$company->companyname}}</option>
                            @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Start of OJT</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="date-picker form-control col-md-7 col-xs-12" name = "start" type="time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">End of OJT</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="date-picker form-control col-md-7 col-xs-12" name = "end" type="time">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
     </div>
     </div>




@endsection