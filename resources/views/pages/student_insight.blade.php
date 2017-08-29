@extends('layout.student_profile')

{!! HTML::style('../../design/css/policy.css') !!}

@section('content')


<div class = "box" style="padding-left:90px;padding-top:50px;padding-bottom:50px;">
<h2 style="font:Arial;">FINAL INSIGHTS</h2><br>
Write an essay detailing your whole practicum experience.<br>
	<div class = "content" >

		@if($insight == false)
		{!! Form::open(['url' => '/student/insertinsight']) !!}

		
		<textarea class="form-control" name = "content" style="height:400px;" required></textarea><br>
		<button type = "submit" class = "btn btn-success btn">Submit Insight</button>
		

		{!! Form::close() !!}
		@else
		<textarea class="form-control" name = "content" style="height:400px;" disabled>{{ $insight->content }}</textarea><br>
		<a href="#" data-toggle="modal" data-target="#squarespaceModal" style="float:right;padding-right:30px;"><img src="../../design/images/edit.gif">Edit Insight</a>




		<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		  <div class="modal-dialog"  style = "margin-top: 30px;">
			<div class="modal-content" style="padding-bottom:50px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				</div>
				<div class="modal-body">
					
		            <!-- content goes here -->
					{!! Form::open(['url' => '/editinsight']) !!}

					
					  <div class="form-group">
		                <textarea class="form-control" name = "cont" style="height:300px;" >{{ $insight->content }}</textarea>
		              </div>
		              
		              <button type="submit" class="btn btn-success">Submit</button>
		            {!! Form::close() !!}

				</div>
				
			</div>
		  </div>
		</div>
<!-- end of modal -->
		@endif
	</div>
</div>
@endsection