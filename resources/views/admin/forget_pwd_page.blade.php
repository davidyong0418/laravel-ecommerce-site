<body style=" font-size:22px; padding:15px;border-radius:3px;font-family:'Times New Roman';">
<div>
<div>
<?php

?>     
	   		<p style="Margin-top: 0;line-height: 25px;Margin-bottom: 25px">Hi <?php if($type=='retailer'){ echo ucwords($name); }elseif($type=='user'){ echo ucwords($name); }else{ echo 'Admin';}?>,  </p> 
		<p style="Margin-top: 0;line-height: 25px;Margin-bottom: 25px;text-decoration: none;border-radius: 2px;padding: 4px;">
		<p>We have received your request to reset your Raffle Admin Panel Password. In order to proceed with this request, please follow the link below: </p>
		<a href="{{$url}}">{{$url}} </a> <br />
		<p>If you don’t want to reset your password, you can ignore this email.</p>
		<p>If you did not request this change, you may want to review your security settings or contact us for assistance.</p>

		<br />

		<p>Best, <br/>
		Your Friends at Raffle
		</p>	</div></body>
		</div>
		</html>
