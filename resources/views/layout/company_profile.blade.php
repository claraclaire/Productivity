<!DOCTYPE html>
<html>
<head>

<title>PauseBreak</title>
<!-- for-mobile-apps -->
<!-- <link rel="icon" sizes="114x114" href="${resource(dir: '../../design/images', file: 'logo1.png')}"> -->

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
	
	
		{!! HTML::script('../design/js/style.js') !!}

</head>
<body>
<!-- banner -->
<div class="header-top">
	<div class="container">
		<ul>
			<li><a href="/company/profile"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
			<li><a href="/company/practicumpolicy"><span class="glyphicon glyphicon-book"></span>Practicum Policy</a></li>
			<li><a  href="/company/interns"><span class="glyphicon glyphicon-home"></span>Interns</a></li>
			<li><a  href="/company/managesites"><span class="glyphicon glyphicon-th-list"></span>Manage Sites</a></li>
			<li class="dropdown user-dropdown" style = "float:right;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><img src = "../../design/images/user.png" width="15" height = "15">&nbsp&nbsp&nbsp{{Auth::user()->username}}&nbsp<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/logout"><img src = "../../design/icon/logout.png" width="15" height = "15">&nbsp&nbspLog Out</a></li>
                        </ul>
                    </li>

			
		</ul>
	</div>
</div>	



@yield('content')

	{!! HTML::script('../design/js/bootstrap.js') !!}
	{!! HTML::script('../design/js/scripts.js') !!}
	{!! HTML::script('../design/js/jquery.nicescroll.js') !!}
	
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>
