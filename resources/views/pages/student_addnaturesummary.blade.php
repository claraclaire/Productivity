@extends('layout.student_profile')


@section('content')
	<br>
      <h3 style="padding-left:70px;">Nature of Works Summary Hours</h3>
      <hr>
    <div class="modal-body" style="padding-left:90px;">
      
            <!-- content goes here -->
      {!! Form::open(['url' => '/student/insertsummary']) !!}

      		<input type = "text" name = "id" value ="{{$id}}"hidden>
              <div class="form-group">
                <label for="softwaredevelopment">Software Development</label>
                <input type="text" style = "width:200px;"class="form-control" name = "softwaredevelopment">
              </div>
              <div class="form-group">
                <label for="softwaretesting">Software Testing</label>
                <input type="text" style = "width:200px;" class="form-control" name = "softwaretesting" >
              </div>
              <div class="form-group">
                <label for="research">Research</label>
                <input type="text" style = "width:200px;" class="form-control" name = "research" >
              </div>
              <div class="form-group">
                <label for="technicalsupport">Technical Support</label>
                <input type="text" style = "width:200px;" class="form-control" name = "technicalsupport" >
              </div>
              <div class="form-group">
                <label for="clericaltasks">Clerical Task</label>
                <input type="text" style = "width:200px;" class="form-control" name = "clericaltasks" >
              </div>
              <div class="form-group">
                <label for="errands">Errands</label>
                <input type="text"style = "width:200px;" class="form-control" name = "errands" >
              </div>
              
            
              <button type="submit" class="btn btn-default">Submit</button>
              
            {!! Form::close() !!}

</div>  

@endsection