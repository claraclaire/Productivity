@extends('layout.company_profile')

{!! HTML::style('../../design/css/design.css') !!}
{!! HTML::script('../../design/css/design.js') !!}
{!! HTML::style('../../design/css/tablelist.css') !!}
<style>
    .txt{.
        margin-bottom: 40px;
        font-family: sans-serif;
    }
    .in{
        font-family: sans-serif;
    }

  .lamisa tr td{
    padding: 10px;
  }
   .imageChks {
        position: relative;
        filter:alpha(opacity=100);
        opacity: 1;
    }



</style>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({ maxDate: 0,dateFormat: 'yy-mm-dd' });
    });
</script>

@section('content')

<div class="col-lg-6 col-sm-6">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar" style="padding-left:90px;">
            <img alt="" src="../../design/images/def.png">
        </div><br>
        <div class="card-info" style="padding-left:90px;"> <span class="card-title">{{$intern->firstname}} {{$intern->middlename}} {{$intern->lastname}}</span>
		<br><h5><i><b>{{$intern->users->email}}</b></i></h5>
    <h5><i>Contact #: +{{$intern->phonenumber}}</i></h5>
        </div>

    </div>
<br>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="..." style="padding-left:90px;">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-default" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                <div class="hidden-xs">Task</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                <div class="hidden-xs">Journal</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <div class="hidden-xs">Appraisal</div>
            </button>
        </div>
    </div>











      <!-- Task Tab -->
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1" style="padding-left:90px;"><br><br><br>
        
          {!! Form::open(['url'=>'/company/inserttaskforintern']) !!}

         <input type="text" style="width:300px;" class="form-control" name = "taskdescription" placeholder="Task Description"><br>
         TASK RANGE:<br>
         Starting<input type = "date" style="width:300px;" class="form-control" name = "startrange"><br>
         End <input type = "date" style="width:300px;" class="form-control" name = "endrange"><br>
         <input type="text" style="width:300px;" class="form-control" name ="projectname" placeholder="Name of Project"><br>
         Select Nature of Work :
         <select style="width:300px;" class = "form-control" name = "nature">
         @foreach($nature as $nature)
             <option value = "{{$nature->natureofwork}}" >{{$nature->natureofwork}}</option>
        @endforeach
         </select><br>
         <button type = "submit" class = "btn btn-success">Add Task</button>

        {!! Form::close() !!}

          <div class="row col-md-6 col-md-offset-2 custyle" style="padding-left:150px;">
		
    		    <table class="table table-striped custab" >
        		    <thead>
        		    
        		        <tr>
        		        	  
        		            <th>Task</th>
        		            <th>Project</th>
        		            <th>Nature of Work</th>
        		            <th>Completion</th>
        		            
        		        </tr>
        		    </thead>
        		    @foreach($gettask as $task)
        		   
        		            <tr>
        		            	  <td>{{$task->taskdescription}}</td>
        		                <td>{{$task->projectname}}</td>
        		                <td>{{$task->natureofwork->natureofwork}}</td>
        		                <td>
                            @if($task->completion == "incomplete")  
                            <h6 style="color:skyblue;">Incomplete</h6>
                            @elseif($task->completion == "Done")
                            <h6 style="color:yellowgreen;">Done</h6>
                            @endif
                            </td>
        		                
        		            </tr>
                @endforeach
    		         
    		    </table>
		    </div>
		    
        </div>
        <!-- End of Task Tab -->











        <!-- Journal Tab -->
        <div class="tab-pane fade in" id="tab2"><br>
                  
              <div id="page-wrapper">
                    <!-- /.col-lg-12 -->
              <div class="row">
              <div class="col-lg-12">
                         
              <div class="container" style="width:900px;padding-bottom:30px;">

                <table class="rwd-table">
                  <tbody>
                    <tr>
                      <th>Date</th>
                      <th>Entry</th>
                      <th>Status</th>
                      
                    </tr>
                     @foreach($journal as $journal)
                    <tr>
                      <td data-th="Date">
                      <a href="{{URL::to('/company/journalcontent/'.$journal->journalid)}}">{{$journal->date}}</a> 
                      </td>
                      <td data-th="Entry" class = "entry">
                       Date Submitted: {{$journal->dateSubmitted}}<br><br>
                                                    
                         Software Development:<span style = "color:yellowgreen;">  {{$journal->softwaredevelopment}}</span><br>
                         Software Testing:<span style = "color:yellowgreen;">  {{$journal->softwaretesting}}</span><br>
                         Research:<span style = "color:yellowgreen;">  {{$journal->research}}</span><br>
                         Technical Support:<span style = "color:yellowgreen;">  {{$journal->technicalsupport}}</span><br>
                         Clerical Task:<span style = "color:yellowgreen;">  {{$journal->clericaltasks}}</span><br>
                         Errands:<span style = "color:yellowgreen;">  {{$journal->errands}}</span><br>
                         Total Hours:<span style = "color:red;">  {{$journal->totalHours}}</span><br> <br>                         
                         Entry: {{$journal->entry}}
                      </td>
                      <td data-th="Invoice Number">
                        @if($journal->date != $journal->dateSubmitted)
                         Late Entry
                        @else
                          <img src="../design/icon/1470305721_tick_16.png" width="20" height="20">
                        @endif
                      </td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                
              </div>

                          </div>
                      </div>
                  </div>


        </div>
 
        <!-- End of Journal Tab  -->









        <!-- Appraisal Tab -->
        <div class="tab-pane fade in" id="tab3"><br><br><br>
          

        	<div id="page-wrapper" style="padding-left:40px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="font:Arial;color:skyblue;font-size:40px;" align="center">
                   
                        <i class="fa fa-file-text-o fa-fw" ></i>
                        APPRENTICE PERFORMANCE APPRAISAL REPORT 
                        
                  
                    </h1> 
                    @foreach($pappraisal as $appraisal)
                        @if($appraisal->student_userid == $id)
                       <h5> {{$appraisal->term}} (<span style="color:yellowgreen;">Done</span>)</h5>
                        @else

                        @endif
                    @endforeach
                    @foreach($mappraisal as $mappraisal)
                        @if($mappraisal->student_userid == $id)
                       <h5> {{$mappraisal->term}} (<span style="color:yellowgreen;">Done</span>)</h5>
                        @else

                        @endif
                    @endforeach
                    @foreach($fappraisal as $fappraisal)
                        @if($fappraisal->student_userid == $id)
                       <h5> {{$fappraisal->term}} (<span style="color:yellowgreen;">Done</span>)</h5>
                        @else

                        @endif
                    @endforeach
                  <!-- /.row -->
                    <div class="form-group">
                      <table class="lamisa">
                        {!! Form::open(array('url'=>'/company/insertappraisal'))!!}
                         <tr>
                          <td><strong>RATING</strong></td>                
                        </tr>
                        <tr style="text-align:center">

                          <td><strong>5 - Excellent</strong></td>
                          <td><strong>4 - Very Good</strong></td>
                          <td><strong>3 - Good</strong></td>
                          <td><strong>2 - Fair</strong></td>
                          <td><strong>1 - Poor</strong></td>                
                        </tr>
                        <tr>
                          <td colspan="5" ><hr></td>                
                        </tr>
                        <tr >
                          <td colspan="1">Term</td>
                          <td colspan="1" >{!! Form::text("term","",["maxlength"=>50,"class"=>"form-control txt"]) !!}</td>
                          
                          <td colspan="3"></td>
                        </td>
                        <tr>
                          <td><strong>1. Quality of Work</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="4">Ability to work with thoroughness, accuracy and neatness</td>
                          <td colspan="2"><select name="qualityofwork"> 
                                               <option>5</option>
                                                <option>4</option>
                                                 <option>3</option>
                                                  <option>2</option>
                                                   <option>1</option>
                                            </select></td>
                        </tr>
                        <tr>
                          <td><strong>2. Quantity of Work</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="4">Individual productivity, swift execution of tasks with least errors</td>
                          <td colspan="2"><select name="quantityofwork"> 
                                               <option>5</option>
                                                <option>4</option>
                                                 <option>3</option>
                                                  <option>2</option>
                                                   <option>1</option>
                                            </select></td>
                        </tr>
                        <tr>
                          <td><strong>3. Dependability</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="4">Ability to perform and complete work as instructed and when needed extends office hours when demanded.</td>
                          <td colspan="2"><select name="dependability"> 
                                               <option>5</option>
                                                <option>4</option>
                                                 <option>3</option>
                                                  <option>2</option>
                                                   <option>1</option>
                                            </select></td>
                        </tr>
                        
                        <tr>
                          <td><strong>4. Cooperation</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="4">Ability to work harmoniously with others, follow instructions carefully.</td>
                          <td colspan="2"><select name="cooperation"> 
                                               <option>5</option>
                                                <option>4</option>
                                                 <option>3</option>
                                                  <option>2</option>
                                                   <option>1</option>
                                            </select></td>
                        </tr>
                        <tr>
                          <td><strong>5. Personality</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="4">Effectiveness in control with others, courtesy, tact, dresses neatly and appropriately.</td>
                          <td colspan="2"><select name="personality"> 
                                               <option>5</option>
                                                <option>4</option>
                                                 <option>3</option>
                                                  <option>2</option>
                                                   <option>1</option>
                                            </select></td>
                        </tr>
                        <tr>
                          <td><strong>6. Attendance</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="4">Regular and punctual in office attendance, proper observance of break periods and dismissal time.</td>
                          <td colspan="2"><select name="attendance"> 
                                               <option>5</option>
                                                <option>4</option>
                                                 <option>3</option>
                                                  <option>2</option>
                                                   <option>1</option>
                                            </select></td>
                        </tr>
                        <tr>
                          <td><strong>7. Resourcefulness</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="4">Ability to develop innovative solutions and adjust readily to changing circumstances.</td>
                          <td colspan="2"><select name="resourcefulness"> 
                                               <option>5</option>
                                                <option>4</option>
                                                 <option>3</option>
                                                  <option>2</option>
                                                   <option>1</option>
                                            </select></td>
                        </tr>
                        <tr>
                          <td><strong>8. Managerial Potentials</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="4">Can deal with people effectively, handle problems correctly and manage other resources efficiently.</td>
                          <td colspan="2"><select name="managerialpotentials"> 
                                               <option>5</option>
                                                <option>4</option>
                                                 <option>3</option>
                                                  <option>2</option>
                                                   <option>1</option>
                                            </select></td>
                        </tr>
                        <!-- <tr>
                          <td colspan="3"></td>
                           <td colspan="1">Total:</td>
                          <td colspan="2">{{ Form::text("managepotentials","",["maxlength"=>50,"class"=>"form-control txt"]) }}</td>
                        </tr> -->
                        <tr>
                          <td><strong>Comments:</strong></td>
                          <td></td>
                        <tr>
                          <td colspan="5">{!! Form::textarea("comment","",["class"=>"form-control txt"]) !!}</td>
                        </tr>
                        <tr>
                          <td colspan="5"><hr></td>                
                        </tr>
                       </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>{!!Form::submit('Submit',array("class"=>"txt btn-primary btn"))!!}</td>
                        </tr>   
                     
                      </table>
                    </div>
                    
                    </div>
        		{!!Form::close()!!} 
                        
         </div>
      </div>

    </div>

  </div>
  <!-- End of Appraisal Tab -->








  
</div>
    
   
            
    

@endsection