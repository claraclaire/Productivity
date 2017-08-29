@extends('layout.coordinator_profile')

{!! HTML::style('../../design/css/design.css') !!}
{!! HTML::script('../../design/css/design.js') !!}
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
        <div class="useravatar">
            <img alt="" src="../../design/images/def.png">
        </div>
        <div class="card-info"> <span class="card-title">{{$intern->firstname}} {{$intern->middlename}} {{$intern->lastname}}</span>
		<br><h5><i>{{$intern->users->email}}</i></h5>
        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                <div class="hidden-xs">Tasks</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-primary" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                <div class="hidden-xs">Journal</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-primary" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                <div class="hidden-xs">Logs</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="appraisal" class="btn btn-primary" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <div class="hidden-xs">Appraisals</div>
            </button>
        </div>
    </div>

        





      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
         
         <div class="row col-md-6 col-md-offset-2 custyle" style="padding-left:70px;">
		
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
		    <!-- End of Task Tab -->
        </div>
        




        <div class="tab-pane fade in" id="tab2"><br><br>
          
        	 <div class="table-responsive" style="padding-left:50px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" scope='colgroup'>Date</th>
                                <th rowspan="2" scope='colgroup' style = "max-width:400px;">Entry Details</th>
                                <th rowspan="2" scope='colgroup'>Status</th>
                                <th rowspan="2" scope='colgroup'>Validation</th>
                                <th rowspan="2" scope='colgroup'>Productivity Summary</th>
                                
                            </tr>
                            
                        </thead>
                        @foreach($journal as $journal)
                        <tbody>  
                          
                                <tr class="default">
                                    <td><a  href="{{URL::to('/coordinator/journalcontent/'.$journal->journalid)}}">{{$journal->date}}</a></td>    
                                    <td style = "min-width:400px;">Date Submitted: {{$journal->dateSubmitted}}<br>
                                    <br>
                                        Software Development:<span style = "color:yellowgreen;">  {{$journal->softwaredevelopment}}</span><br>
                                        Software Testing:<span style = "color:yellowgreen;">  {{$journal->softwaretesting}}</span><br>
                                        Research:<span style = "color:yellowgreen;">  {{$journal->research}}</span><br>
                                        Technical Support:<span style = "color:yellowgreen;">  {{$journal->technicalsupport}}</span><br>
                                        Clerical Task:<span style = "color:yellowgreen;">  {{$journal->clericaltasks}}</span><br>
                                        Errands:<span style = "color:yellowgreen;">  {{$journal->errands}}</span><br>
                                        Total Hours:<span style = "color:red;">  {{$journal->totalHours}}</span><br> <br>  
                                        Entry: {{$journal->entry}}
                                    </td> 
                                    <td>
                                      @if($journal->date != $journal->dateSubmitted)
                                        Late Entry
                                      @else
                                        Done
                                      @endif

                                    </td>  
                                    <td>
                                      {{$journal->validation}}
                                     
                                    </td>  
                                    <td><a href="#"></a></td> 
                   
                                </tr>                                                             
                        </tbody>
                        @endforeach
                    </table>
                </div>     

        </div>






        <div class="tab-pane fade in" id="tab3">
          
          <div class="clearfix" style="padding-left:150px;">
            <div class="row col-md-6 col-md-offset-2 custyle">
                <table class="table table-striped custab" style="width:500px;">
                <thead>
                
                    <tr>
                       
                        <th>Date</th>
                        <th>Logged In Time</th>
                        <th>Logged Out Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @foreach($getlogs as $logs)
                        <tr>

                            
                            <td>{{ $logs->logindate }}</td>
                            <td>{{ $logs->logintime }}</td>
                            <td>{{ $logs->logouttime }}</td>
                            <td>
                              @if($logs->logintime>$intern->hiredintern->start)
                                Late
                                @else
                                  OnTime
                                @endif
                            </td>
                           
                        </tr>

                 @endforeach       
                </table>
                </div>
            </div>

          </div>
       
            







        <div class="tab-pane fade in" id="tab4">

                <div id="page-wrapper" style="padding-left:40px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-file-text-o fa-fw" width="55" height="60"></i>
                            Appraisal Form
                        </h1>


                   
                            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    <button type="button" id="stars" class="btn btn-default" href="#prelim" data-toggle="tab"><span class="glyphicon" aria-hidden="true"></span>
                                        <div class="hidden-xs">Prelim</div>
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" id="favorite" class="btn btn-default" href="#midterm" data-toggle="tab"><span class="glyphicon" aria-hidden="true"></span>
                                        <div class="hidden-xs">Midterm</div>
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" id="following" class="btn btn-default" href="#final" data-toggle="tab"><span class="glyphicon" aria-hidden="true"></span>
                                        <div class="hidden-xs">Final</div>
                                    </button>
                                </div>
                               
                            </div>


                
                <div class="tab-content">
                 <div class="tab-pane fade in" id="prelim">
                        <div class="form-group">
                          <table class="lamisa">
                            {!! Form::open()!!}
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
                              <td colspan="5"><hr></td>                
                            </tr>

                    @if($prelim == false)

                                    <h2>No Prelim Submittion Yet!!!!</h2>

                                    @else


                            <tr >
                              <td colspan="1">Term</td>
                              <td colspan="1" ><input type = "text" class = "form-control" value = "{{$prelim->term}}" disabled></td>
                              
                              <td colspan="3"></td>
                            </td>
                            <tr>
                              <td><strong>1. Quality of Work</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to work with thoroughness, accuracy and neatness</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$prelim->qualityofwork}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>2. Quantity of Work</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Individual productivity, swift execution of tasks with least errors</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$prelim->quantityofwork}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>3. Dependability</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to perform and complete work as instructed and when needed extends office hours when demanded.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$prelim->dependability}}" disabled></td>
                            </tr>
                            
                            <tr>
                              <td><strong>4. Cooperation</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to work harmoniously with others, follow instructions carefully.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$prelim->cooperation}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>5. Personality</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Effectiveness in control with others, courtesy, tact, dresses neatly and appropriately.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$prelim->personality}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>6. Attendance</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Regular and punctual in office attendance, proper observance of break periods and dismissal time.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$prelim->attendance}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>7. Resourcefulness</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to develop innovative solutions and adjust readily to changing circumstances.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$prelim->resourcefulness}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>8. Managerial Potentials</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Can deal with people effectively, handle problems correctly and manage other resources efficiently.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$prelim->managerialpotentials}}" disabled></td>
                            </tr>
                          
                            <tr>
                              <td><strong>Comments:</strong></td>
                              <td></td>
                            <tr>
                              <td colspan="5"><input type = "textarea" class = "form-control" value = "{{$prelim->comment}}" disabled></td>
                            </tr>
                            <tr>
                              <td colspan="5"><hr></td>                
                            </tr>
                           </tr></tr>
                              
                         {!!Form::close()!!} 
                          </table>
                    </div>
                    </div>
                @endif   
     





           
            <div class="tab-pane fade in" id="midterm">
                        <div class="form-group">
                          <table class="lamisa">
                            {!! Form::open()!!}
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
                              <td colspan="5"><hr></td>                
                            </tr>
               @if($midterm == false)

                            <h2>No Midterm Submittion Yet!!</h2>

                          @else

                            <tr >
                              <td colspan="1">Term</td>
                              <td colspan="1" ><input type = "text" class = "form-control" value = "{{$midterm->term}}" disabled></td>
                              
                              <td colspan="3"></td>
                            </td>
                            <tr>
                              <td><strong>1. Quality of Work</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to work with thoroughness, accuracy and neatness</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$midterm->qualityofwork}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>2. Quantity of Work</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Individual productivity, swift execution of tasks with least errors</td>
                             <td colspan="2"><input type = "text" class = "form-control" value = "{{$midterm->quantityofwork}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>3. Dependability</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to perform and complete work as instructed and when needed extends office hours when demanded.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$midterm->dependability}}" disabled></td>
                            </tr>
                            
                            <tr>
                              <td><strong>4. Cooperation</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to work harmoniously with others, follow instructions carefully.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$midterm->cooperation}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>5. Personality</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Effectiveness in control with others, courtesy, tact, dresses neatly and appropriately.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$midterm->personality}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>6. Attendance</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Regular and punctual in office attendance, proper observance of break periods and dismissal time.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$midterm->attendance}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>7. Resourcefulness</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to develop innovative solutions and adjust readily to changing circumstances.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$midterm->resourcefulness}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>8. Managerial Potentials</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Can deal with people effectively, handle problems correctly and manage other resources efficiently.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$midterm->managerialpotentials}}" disabled></td>
                            </tr>
                          
                            <tr>
                              <td><strong>Comments:</strong></td>
                              <td></td>
                            <tr>
                              <td colspan="5"><input type = "textarea" class = "form-control" value = "{{$midterm->comment}}" disabled></td>
                            </tr>
                            <tr>
                              <td colspan="5"><hr></td>                
                            </tr>
                           </tr></tr>
                              
                         {!!Form::close()!!} 
                          </table>
                        </div>
                        </div>
              @endif
            





              
            <div class="tab-pane fade in" id="final">
                         <div class="form-group">
                          <table class="lamisa">
                            {!! Form::open()!!}
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
                              <td colspan="5"><hr></td>                
                            </tr>

                      @if($final == false)

                                      <h2>No Final Submittion Yet!!</h2>

                                    @else

                            
                            <tr >
                              <td colspan="1">Term</td>
                              <td colspan="1" ><input type = "text" class = "form-control" value = "{{$final->term}}" disabled></td>
                              
                              <td colspan="3"></td>
                            </td>
                            <tr>
                              <td><strong>1. Quality of Work</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to work with thoroughness, accuracy and neatness</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$final->qualityofwork}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>2. Quantity of Work</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Individual productivity, swift execution of tasks with least errors</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$final->quantityofwork}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>3. Dependability</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to perform and complete work as instructed and when needed extends office hours when demanded.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$final->dependability}}" disabled></td>
                            </tr>
                            
                            <tr>
                              <td><strong>4. Cooperation</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to work harmoniously with others, follow instructions carefully.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$final->cooperation}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>5. Personality</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Effectiveness in control with others, courtesy, tact, dresses neatly and appropriately.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$final->personality}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>6. Attendance</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Regular and punctual in office attendance, proper observance of break periods and dismissal time.</td>
                             <td colspan="2"><input type = "text" class = "form-control" value = "{{$final->attendance}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>7. Resourcefulness</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Ability to develop innovative solutions and adjust readily to changing circumstances.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$final->resourcefulness}}" disabled></td>
                            </tr>
                            <tr>
                              <td><strong>8. Managerial Potentials</strong></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Can deal with people effectively, handle problems correctly and manage other resources efficiently.</td>
                              <td colspan="2"><input type = "text" class = "form-control" value = "{{$final->managerialpotentials}}" disabled></td>
                            </tr>
                          
                            <tr>
                              <td><strong>Comments:</strong></td>
                              <td></td>
                            <tr>
                              <td colspan="5"><input type = "textarea" class = "form-control" value = "{{$final->comment}}" disabled></td>
                            </tr>
                            <tr>
                              <td colspan="5"><hr></td>                
                            </tr>
                           </tr></tr>
                              
                         {!!Form::close()!!} 
                          </table>
                        </div>
                     </div> 

                @endif


               

            </div>

               

            </div>
            <!-- End of Tab Content of Tab 4 -->


           
         </div>
         <!-- End of Tab 4 -->
    







         </div>
         <!-- End of Tab Content -->
    
</div>


@endsection