<?php include("function/header.php");
		include("function/navi_menu.php");?>
			
			<div class="right_content" >
				<img src="images/kcb_logo.jpg" width="50%" height="150" style="margin:auto;float:left;">
				<?php if($user_level==1){?> 
				<p style="float:right;float: right;
width: 48%;
height: 92px;
padding-top: 46px;
text-align: center;
font-weight: bold;background: rgba(88, 185, 62, 0.09);">Welcome <i style="color:green;"><?php echo $uname2;?></i><br>You Are Logged in As  <i style="color:green;">ADMINISTRATOR</i></p>
				<?php } else if($user_level==2){ ?>
				<p style="float:right;float: right;
width: 48%;
height: 92px;
padding-top: 46px;
text-align: center;
font-weight: bold;background: rgba(88, 185, 62, 0.09);">Welcome <i style="color:green;"><?php echo $uname2;?></i><br>You Are Logged in As  <i style="color:green;">MANAGER</i></p>
				
				<?php } else if($user_level==3){ ?>
				<p style="float:right;float: right;
width: 48%;
height: 92px;
padding-top: 46px;
text-align: center;
font-weight: bold;background: rgba(88, 185, 62, 0.09);">Welcome <i style="color:green;"><?php echo $uname2;?></i><br>Your Account Number is  <i style="color:green;"><?php echo $acc;?></i></p>
<?php } ?>

				<br><br><h3 style="color: rgb(87, 184, 60);
padding-left: 16px;
text-decoration: underline">About Dry Cleaner</h3>
<p style="width: 627px;
text-align: justify;
margin-left: 41px;">
Classic Drycleaners serves Residents of Juba, free pickup and delivery service, and a textile and electronics restoration division specializing in fire, smoke, mold and water damage restoration. We take great pride in being known as Harrisburg’s preferred garment care specialist.  We love our customers, our employees, and our community!
</p>
<h3 style="color: rgb(87, 184, 60);
padding-left: 16px;
text-decoration: underline">Branch Network</h3>
<p style="width: 480px;
text-align: justify;
margin-left: 41px;float:left;">
We offer dry cleaning and shirt laundry, as well as other awesome services such as free pickup and delivery service, professional repairs and alterations, and wash and fold laundry.  All of these services are exceptional and sought after for our level of expertise and professionalism. But, what really sets us apart is our community support.
</p>
<img src="images/ico.jpg" width="150" height="150" style="margin:auto;padding-left: 0px;float: right;margin-top: -21px;">
			</div>
			
		</div>
<div id="footer">
			
		</div>
		
	</body>
<html>