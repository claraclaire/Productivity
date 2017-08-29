@extends('layout.coordinator_profile')

{!! HTML::style('../../design/css/tablelist.css') !!}

@section('content')

<br>
<!-- <div class = "search"><input type ="text" class = "searchtext" name ="keyword" ><input type = "submit" class="btn btn-primary" name = "submitsearch" value = "Search"></div>
 --><br>


<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">

    <table class="table table-striped custab">
    <thead>
    
        <tr>
            <th>View Evaluation</th>
            <th>Name</th>
            <th>Image</th>
            <th>Address</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Company</th>
            
        </tr>
    </thead>
    @foreach($intern as $student)
            <tr>
                <td><a href="{{URL::to('/coordinator/companyevaluation/'. $student->student->userid)}}">{{$student->student->studentnumber}}</a></td>
                <td>{{$student->student->lastname}}, {{$student->student->firstname}} {{$student->student->middlename}}</td>
                <td><img src="../../img/user.png" height = "90" width="90"></td>
                <td>{{$student->student->address}}</td>
                <td>{{$student->student->users->email}}</td>
                <td>{{$student->student->gender}}</td>
                <td>{{$student->company->companyname}}</td>
            </tr>

    @endforeach        
    </table>
    </div>
</div>


@endsection