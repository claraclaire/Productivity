@extends('layout.student_profile')


@section('content')
<br>
    <h1 style="padding-left:60px;padding-top:20px;">Productivity Status</h1><hr>
<br><br>

<div class="row col-md-6 col-md-offset-2 custyle" style="padding-left:30px;">
    <table class="table table-striped custab" style="width:1400px;">

    <thead>
    
        <tr>
           
            <th>Application ID</th>
            <th>Application Name</th>
            <th>Starting Time</th>
            <th>End Time</th>
        </tr>
    </thead>
   @foreach($app as $app)
            <tr>

                
                <td>{{$app->appid}}</td>
                <td>{{$app->appsitename}}</td>
                <td>{{$app->startingtime}}</td>
                <td>{{$app->endtime}}</td>
               
            </tr>

     @endforeach     
    </table>
    </div>


@endsection
