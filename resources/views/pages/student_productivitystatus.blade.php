@extends('layout.student_profile')


@section('content')
<br>
    <h1 style="padding-left:60px;padding-top:20px;">Productivity Status</h1><hr>
<br><br>

<div class="row col-md-6 col-md-offset-2 custyle" style="padding-left:30px;">
    <table class="table table-striped custab" style="width:1400px;">

    <thead>
    
        <tr>
           
            <th>Application ID<i><br>01</br></i><i><br>02</br></i></th>
         <font color="blue">   <th>Application Name<i><br>Google Chrome</br></i><i><br>Viber</br></i></th></font>
            <th>Starting Time<i><br>1:20 p.m</br></i><i><br>4:00 p.m</br></i></th>
            <th>End Time<i><br>3:50 p.m</br></i><i><br>4:30 p.m</br></i></th>
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
