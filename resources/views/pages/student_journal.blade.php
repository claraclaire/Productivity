@extends('layout.student_profile')


{!! HTML::style('../../design/css/tablelist.css') !!}
<style>

    .txt{.
        margin-bottom: 40px;
        width:320px;
        font-family: sans-serif;
    }
    .in{
        background-color: transparent;
        font-family: sans-serif;
    }

  .lamisa tr td{
    padding: 10px;
  }


 


</style>
@section('content')


    <div id="page-wrapper">
      <!-- /.col-lg-12 -->
         <div class="row">
            <div class="col-lg-12">
               
                <h1 class="page-header" style="padding-left:60px;">
                    <i class="fa fa-edit fa-fw" width="55" height="60"></i>
                    Journal
                </h1>
                <a href="#" data-toggle="modal" data-target="#squarespaceModal" style="font-size:25px;padding-left:50px;"><img src="../../design/icon/adds.png" width="30" height="30">Add Entry</a>
                <!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog"  style = "margin-top: 60px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Add Journal Entry</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
           

            <div class="form-group">
              <table class="lamisa">
                {!! Form::open(array('url'=>'/student/addjournal'))!!}
                <?php
                  $timezone = new DateTimeZone('Asia/Manila');
                  $datetime = new DateTime();
                  $datetime->setTimezone($timezone);
                 

                ?>
                <tr>
                  <td>Date:</td>
                  <td colspan="2"><input class="form-control" value="{{$datetime->format('Y-m-d')}}" style="width:200px" type="date"  name="date" ></td>
                </tr>
                <tr>
                  <td>Time-In:</td>
                  <td colspan="2"><input class="form-control" value="" style="width:200px" type="time" name="start" ></td>
                </tr>
                <tr>
                  <td>Time-Out:</td>
                  <td colspan="2"><input class="form-control" value="" style="width:200px" type="time" name="end"></td>
                </tr>
                <tr>
                   <td style="padding-left:30px;"><b>Nature of Work</b></td>
                </tr>
                <tr>
                  <td>Software Development</td>
                  <td><input type="text" style = "width:100px;"class="form-control" name = "softwaredevelopment"></td>
                <tr>
                <tr>
                  <td>Software Testing</td>
                  <td><input type="text" style = "width:100px;" class="form-control" name = "softwaretesting" ></td>
                </tr>
                <tr>
                  <td>Research</td>
                  <td><input type="text" style = "width:100px;" class="form-control" name = "research" ></td>
                </tr>
                <tr>
                  <td>Technical Support</td>
                  <td><input type="text" style = "width:100px;" class="form-control" name = "technicalsupport" ></td>
                </tr>
                <tr>
                  <td>Clerical Task</td>
                  <td><input type="text" style = "width:100px;" class="form-control" name = "clericaltasks" ></td>
                </tr>
                <tr>
                  <td>Errands</td>
                  <td><input type="text"style = "width:100px;" class="form-control" name = "errands" ></td>
                </tr>

                <tr>
                  <td>Total Hours:</td>
                  <td><input type="text" style = "width:150px;" class="form-control" name = "totalHours" ></td>
                </tr>
                
              
                <tr>
                  <td>Entry:</td>
                  <td colspan="4">{!! Form::textarea("entry","",["class"=>"form-control", "name"=>"entry"]) !!}</td>
                </tr>
                <tr>
                <td></td>
                <td><button data-dismiss="modal" class="btn btn-default" role = "button">Cancel</button>&nbsp&nbsp{!!Form::submit('Submit',array("class"=>"txt btn-primary btn", "name"=>"submitJournal"))!!}</td>
                </tr>   
             
              </table>
            </div>
              
              
              
            {!! Form::close() !!}

        </div>
        <div class="modal-footer">
            
        </div>
    </div>
  </div>
</div>
<!-- end of modal -->

                <br><br>
                

<div class="container">

  <table class="rwd-table">
    <tbody>
      <tr>
        <th>Date</th>
        <th>Entry</th>
        <th>Status</th>
        <th>Validation</th>
        
      </tr>
       @foreach($journal as $journal)
      <tr>
        <td data-th="Date">
        <a href="{{URL::to('/student/journalcontent/'.$journal->journalid)}}">{{$journal->date}}</a> 
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
        <td>
          @if($journal->validation == 0)
          <span style = "color:red;">Pending</span>
          @elseif($journal->validation == 1)
          <span><img src="../../design/icon/approved.png" width="30" height="30"></span>
          @elseif($journal->validation == 2)
          <span><img src="../../design/icon/disapproved.png" width="30" height="30"></span>
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

@endsection