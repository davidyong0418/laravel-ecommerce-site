<!DOCTYPE html>
<head>
<title>Admin Panel Raffle</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{url('admin/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{url('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{url('admin/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{url('admin/css/font.css')}}" type="text/css"/>
<link href="{{url('admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{url('admin/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Reset Password</h2>
	 @if(Session::has('message'))
                <div id="successMessage" style ="color:red;text-align: center;" class="alert alert-success"> {{Session::get('message')}} </div>
                 @endif
		<form action="" method="post">
			{{ csrf_field() }}
			<input type="password" class="ggg" name="password" value="{{old('password')}}" placeholder="PASSWORD" >
			   @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
			<input type="password" class="ggg" name="confpassword" value="{{old('confpassword')}}" placeholder="CONFIRM PASSWORD" >
			   @if ($errors->has('confpassword'))
                    <div class="error">{{ $errors->first('confpassword') }}</div>
                @endif
			
		
				<div class="clearfix"></div>
				<input type="submit" value="UPDATE" name="login">
		</form>
	
</div>
</div>
<script src="{{url('admin/js/bootstrap.js')}}"></script>
<script src="{{url('admin/js/jquery.dcjqaccordion.2.7.j')}}"></script>
<script src="{{url('admin/js/scripts.js')}}"></script>
<script src="{{url('admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{url('admin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{url('admin/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
