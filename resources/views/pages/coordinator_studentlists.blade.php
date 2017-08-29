@extends('layout.coordinator_profile')

{!! HTML::style('../../design/css/studentlist.css') !!}
{!! HTML::script('../../design/css/studentlist.js') !!}


@section('content')

<br>
<div class="container">
    <div class="row">
        <h2>Registered Students</h2><hr><br>
        <div class="col-lg-12">
            <input type="search" class="form-control" id="input-search" placeholder="Search Student....." >
        </div>
        <br>
        <div class="searchable-container"><br><br>
        @foreach($student as $student)
            <div class="items col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">
               <div class="info-block block-info clearfix">
                    <div class="square-box pull-left">
                         <span><img src="../../design/images/def.png" width="100" height="100"></span>
                    </div><br><br>
                    <h5>{{$student->hiredintern->company->companyname}}</h5>
                    <h4>Name: <a href="{{URL::to('/coordinator/studentinfo/'. $student->userid)}}" >{{$student->lastname}}, {{$student->firstname}} {{$student->middlename}}</a></h4>
                    <p>Student Number: {{$student->studentnumber}}</p>
                    <span>Email: {{$student->users->email}}</span>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>



@endsection