@extends('layout.student_profile')
<style type="text/css">
.task
{
    min-height: 20px;
    max-height: 400px;
    max-width:auto;
    padding-top: 20px;
    overflow-y:scroll; 
    position: relative;
    padding-left: 15px;
    padding-right: 15px;
    margin-bottom: 20px;
    background-color: white;
    border: 1px solid #e3e3e3;
    border-radius: 5px;
    
}
</style>
<script type="text/javascript">
     function show(select_item) {
    if (select_item == "Software Development") {
    hiddenresearch.style.display='none';
    hiddenDiv.style.display='block';

    
    } 
    else if (select_item == "Research"){
    hiddenresearch.style.display='block';
    hiddenDiv.style.display='none'; 
    }
    else{
    hiddenDiv.style.display='none'; 
    hiddenresearch.style.display='none';

    }
  }
</script>
@section('content')

    <h1 style="padding-left:60px;padding-top:20px;font-family:Helvetica Neue">Tasks (To Do List)</h1>
<hr style="width:1200px;">
<div class="row col-md-8 col-md-offset-2 custyle" style="padding-left:40px;padding-right:30px;">
 <div class = "task">
    <table class="table table-striped custab">
    <thead>
    
        <tr>
            <th>Task</th>
            <th>Date Range</th>
            <th>Time Range</th>
            <th>Project</th>
            <th>Nature of Work</th>
            <th>Completion</th>
            
        </tr>
    </thead>
   
        @foreach($task as $task)
            <tr style="font-family:Calibri;">

                <td>{{$task->taskdescription}}</td>
                <td>{{$task->startrange}} - {{$task->endrange}}</td>
                <td>{{$task->timestartrange}} - {{$task->timeendrange}}</td>
                <td>{{$task->projectname}}</td>
                <td>{{$task->natureofwork->natureofwork}}</td>
                <td>@if($task->completion == "incomplete")
                    <a href="{{URL::to('/student/taskdone/'.$task->taskid)}}">{{$task->completion}}</a>
                    @else
                    <h6 style="color:yellowgreen;">Done</h6>
                    @endif
                </td>
            </tr>
         @endforeach
    
    </table>
    </div>
 </div>



<div>

    {!! Form::open(['url'=>'/student/inserttask']) !!}
        <div style="padding-left:785px;">
         <input type="text" style="width:300px;" class="form-control" name = "taskdescription" placeholder="Task Description"><br>
         <h4 style="font-family:Arial;">Date Range:</h4><br>
         <div style="padding-left:43px;">
         Starting
         <input type = "date" style="width:300px;" class="form-control" name = "startrange"><br>
         </div>
         <div style="padding-left:42px;">
         End 
         <input type = "date" style="width:300px;" class="form-control" name = "endrange"><br>
         <h4 style="font-family:Arial;">Development Time:</h4><br><br>
         Starting<br>
         <input type = "time" style="width:300px;" class="form-control" name = "timestartrange"><br>
         End<br>
         <input type = "time" style="width:300px;" class="form-control" name = "timeendrange"><br>
         <input type="text" style="width:300px;" class="form-control" name ="projectname" placeholder="Name of Project"><br>
         Select Nature of Work :
         <select style="width:300px;" class = "form-control" name = "nature" onchange="java_script_:show(this.options[this.selectedIndex].value)">
         
             <option>Choose option</option>
             <option value = "Software Development">Software Development (See Sites and App Suggestion Below)</option>
             <option value = "Software Testing">Software Testing</option>
             <option value = "Research">Research (See Sites and App Suggestion Below)</option>
             <option value = "Technical Support">Technical Support</option>
             <option value = "Clerical Task">Clerical Task</option>
             <option value = "Errands">Errands</option>
        
         </select><br>
         
         <button type = "submit" class = "btn btn-success">Add Task</button>
         </div>
         </div>
         <div class="row">
  
    {!! Form::close() !!}
         <div id="hiddenDiv" style="display:none" id = "dev">
         <div style="padding-left:40px;padding-top:30px;">
         <h2>Suggestions:</h2><br>
         @foreach($getprod as $getprod)
         
         <table>
             <tr>
                 <td><a href="#">{{$getprod->sitename}}</a></td>
             </tr>
         </table>
         @endforeach
         </div></div>  
         <div id="hiddenresearch" style="display:none" id = "search">
         <div style="padding-left:40px;padding-top:30px;">
         <h2>Suggestions:</h2><br>
         @foreach($neutral as $neutral)
         
         <table>
             <tr>
                 <td><a href="#">{{$neutral->sitename}}</a></td>
             </tr>
         </table>
         @endforeach
         </div></div>              
</div><br>


@endsection