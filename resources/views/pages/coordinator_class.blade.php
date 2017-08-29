@extends('layout.coordinator_profile')

<script src="../../design/js/jquery.nicescroll.js"></script>
@section('content')
<br>
<div class="col-md-6" style = "padding-left:150px;">
		<h2>Subjects</h2>
		<br>
	@if (count($errors) > 0)
     <div class="alert alert-danger">
     <strong>Whoops! </strong> There were some problems with your input. <br> <br>
     <ul>
    
            @foreach ($errors->all() as $error)
         <li>{{ $error }} </li>
        @endforeach
     </ul>
     </div>
     @endif	
<div class = "supervisor-img" >
	<a href="#" data-toggle="modal" data-target="#squarespaceModal" ><img src="../../design/icon/adds.png" width="30" height="30">&nbsp&nbspAdd Your Class</a>
</div><br><br>


<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog"  style = "margin-top: 60px;">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Your Class Schedule</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			{!! Form::open(['url' => '/addclassschedule']) !!}

			  <div class="form-group">
                <label for="offercode">Offer Code</label>
                <input type="text" class="form-control" name = "offercode" placeholder = "Offer Code">
              </div>
			  <div class="form-group">
                <label for="coursenumber">Course No.</label>
                <input type="text" class="form-control" name = "coursenumber" placeholder = "Course Number">
              </div>
              <div class="form-group">
                <label for="subjectdescription">Subject Description</label>
                <input type="text" class="form-control" name = "subjectdescription" placeholder = "Description">
              </div>

              <h3 class="modal-title" id="lineModalLabel">Input Class Schedule</h3>
              <div class="form-group">
                <label for="days">Days ( MTWThFSa )</label>
                <input type="text" class="form-control" name = "days" placeholder = "Days of Class">
              </div>
              <div class="form-group">
                <label for="time">Time (e.g 8:00 - 12:00)</label>
                <input type="text" class="form-control" name = "time" placeholder = "Class Time">
              </div>
              <div class="form-group">
                <label for="room">Room</label>
                <input type="text" class="form-control" name = "room" placeholder = "Room #">
              </div>
			  <br>

			
              
              <button type="submit" class="btn btn-default">Submit</button>&nbsp&nbsp<button data-dismiss="modal" class="btn btn-default" role = "button">Cancel</button>
            {!! Form::close() !!}

		</div>
		<div class="modal-footer">
			
		</div>
	</div>
  </div>
</div>
<!-- end of modal -->
@foreach($subject as $subject)
				<div class="accordion">
							<div class="accordion-section">
								<h5><a class="accordion-section-title" href="#accordion-1">
									<span>{{ $subject->offercode }}</span> {{  $subject->coursenumber }} {{ $subject->subjectdescription }}
								<i class="glyphicon glyphicon-chevron-down"></i><div class="clearfix"></div>
								</a></h5>
								<div id="accordion-1" class="accordion-section-content">
									<h6>Schedules</h6>
									<ul>
										<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span><a href="#"><span>{{  $subject->days }}</span>{{ $subject->time }}</a>
										<br><span class="glyphicon glyphicon-check" style = "padding-left:28px;"> No. of Registered Students :</span> {{$student}}
										</li>

										
									</ul>
								</div>
							</div>
@endforeach
							<!-- <div class="accordion-section">
								<h5><a class="accordion-section-title" href="#accordion-2">
									<span>IT 442</span> Practicum 2
								<i class="glyphicon glyphicon-chevron-down"></i><div class="clearfix"></div>
								</a></h5>
								<div id="accordion-2" class="accordion-section-content">
									<h6>Schedules</h6>
									
									<ul>
										<li><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span><a href="#"><span>MTWThF</span>8:00 - 12:00</a></a></li>
										<li><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span><a href="#"><span>Sat</span>1:00 - 5:00</a></a></li>
										<li><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span><a href="#"><span>TTh</span>8:00 - 12:00</a></a></li>
									</ul>
								</div>
							</div>

							<div class="accordion-section">
								<h5><a class="accordion-section-title" href="#accordion-3">
									<span>IT 412</span> Other Subject 
								<i class="glyphicon glyphicon-chevron-down"></i><div class="clearfix"></div>
								</a></h5>
								<div id="accordion-3" class="accordion-section-content">
									<h6>Schedules</h6>
									<ul>
										<li><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span><a href="#"><span>Sat</span>8:00 - 12:00</a></a></li>
										<li><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span><a href="#"><span>Sat</span>8:00 - 12:00</a></a></li>
										<li><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span><a href="#"><span>Sat</span>8:00 - 12:00</a></a></li>
									</ul>
								</div>
							</div> -->
							
							<script>

							jQuery(document).ready(function() {
								function close_accordion_section() {
									jQuery('.accordion .accordion-section-title').removeClass('active');
									jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
								}

								jQuery('.accordion-section-title').click(function(e) {
									// Grab current anchor value
									var currentAttrValue = jQuery(this).attr('href');

									if(jQuery(e.target).is('.active')) {
										close_accordion_section();
									}else {
										close_accordion_section();

										// Add active class to section title
										jQuery(this).addClass('active');
										// Open up the hidden content panel
										jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
									}

									e.preventDefault();
								});
							});
				</script>
				</div>

@endsection