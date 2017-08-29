<!DOCTYPE html>
<html>
<head>
<title>PauseBreak</title>
<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Resume Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	{!! HTML::style('../design/css/bootstrap.css') !!}
	{!! HTML::style('../design/css/style.css') !!}
	{!! HTML::script('../design/js/jquery-2.1.4.min.js') !!}
	<!-- start-smoth-scrolling -->
	{!! HTML::script('../design/js/move-top.js') !!}
	{!! HTML::script('../design/js/easing.js') !!}
		
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

	{!! HTML::script('../design/js/numscroller-1.0.js') !!}
	
 

<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>



</head>
<body id = "body">
<!-- banner -->
<div class="header-top" id = "header-top">
	<div class="container">
		<ul>
		
			<li><a  href="/student/profile"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
			<li><a href="/student/practicumpolicy"><span class="glyphicon glyphicon-book"></span>Policy</a></li>
			<li><a href="/student/journal"><span class="glyphicon glyphicon-book"></span>Journal</a></li>
			<li><a href="/student/tasks"><span class="glyphicon glyphicon-tasks"></span>Tasks</a></li>
			<li><a href="/student/productivitystatus"><span class="glyphicon glyphicon-stats"></span>Productivity Status</a></li>
			<li><a href="/student/evaluatecompanyform"><span class="glyphicon glyphicon-pencil"></span>Evaluation</a></li>
			<li><a href="/student/insight"><span class="glyphicon glyphicon-eye-open"></span>Insight</a></li>
						
			<li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-bell"><span style = "color:red;" class = "badge">{{$count}}</span></i></a>
                    <ul class="dropdown-menu alert-dropdown">
                    @foreach($notif as $notif)
                        <li>
                            <a href="#">{{$notif->message}}</a>
                        </li>
                      @endforeach  
                    </ul>
                </li>
              
			<li class="dropdown user-dropdown" style = "float:right;">
			 
                               
                           
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><img src = "../../design/images/user.png" width="15" height = "15">&nbsp&nbsp&nbsp{{Auth::user()->username}}&nbsp<b class="caret"></b></a>
                        <ul class="dropdown-menu" style="width:130px;max-height:70px;">
                         {!! Form::open(['url' =>'/studlogout']) !!}
                         <div style="padding-left:17px;padding-top:0px;">
                         <img src = "../../design/icon/logout.png" width="15" height = "15" ><button style="background-color:transparent;border:0px;" type = "submit">Logout</button>
						</div>
						
<!--                             <li><a href="/studlogout" type = "submit"><img src = "../../design/icon/logout.png" width="15" height = "15">&nbsp&nbspLog Out</a></li>
 -->                         {!! Form::close() !!}
                        </ul>
                    </li>


			
		</ul>
	</div>
</div>
<!-- check if user has been idle -->
@if($status->status == "active")

@elseif($status->status == "inactive")

 <?php 
 //send message to student when they have been idled for 5 minutes already
  $arr_post_body = array( 
                "message_type" => "SEND",
                "mobile_number" => $status->student->phonenumber,
                "shortcode" => "292904034",
                "message_id" => str_random(32),
                "message" => urlencode("You've been idled for 5 minutes already.Continue work or log out your account."),
                "client_id" => "ee8785385ee511ef3f1a4af354ee17bc772d866ef2f396181e63a692d44922ed",
                "secret_key" => "ee5a1c82a32fd2b83bbaddf034ada940a89669be771b6f99f3deeb7b93f0da3f"
            );

            $query_string = "";
            foreach($arr_post_body as $key => $frow)
            {
                $query_string .= '&'.$key.'='.$frow;
            }

            $URL = "https://post.chikka.com/smsapi/request";

            $curl_handler = curl_init();
            curl_setopt($curl_handler, CURLOPT_URL, $URL);
            curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body));
            curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string);
            curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl_handler, CURLOPT_SSL_VERIFYPEER, FALSE);
            $response = curl_exec($curl_handler);
            curl_close($curl_handler);


//end of send message
       
  ?>
  
   @else



  @endif
<!-- end of idle checking -->
@yield('content')

	{!! HTML::script('../design/js/bootstrap.js') !!}
	{!! HTML::script('../design/js/scripts.js') !!}
	{!! HTML::script('../design/js/jquery.nicescroll.js') !!}
	
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>
