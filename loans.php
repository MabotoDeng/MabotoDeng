<?php include("function/header.php");
		include("function/navi_menu.php");?>
			
			<div class="right_content">
				<?php if($user_level==3){include("function/loan3.php");}
						 else if($user_level==2){include("function/loan2.php");}
							else if($user_level==1){include("function/loan1.php");}?>
<?php
if(isset($_POST['accept'])){
	$emp_id=$_POST['emp'];
	$query=mysql_query("UPDATE users SET permision = 'granted' WHERE acc_num = '$emp_id'")or die (mysql_error()) ;
	header("location:loans.php");
}
if(isset($_POST['deny'])){
	$emp_id=$_POST['emp'];
	$query=mysql_query("UPDATE users SET permision = 'denied' WHERE acc_num = '$emp_id'")or die (mysql_error()) ;
	header("location:loans.php");}
?>
<?php
	if(isset($_POST['apply'])){
		$acc_num=$_POST['acc'];
		$sdate=$_POST['st_date'];
		$amount=$_POST['amo'];
		$loan_t=$_POST['pref'];
		$m=($amount/20)+500;
			if($m>=2999){$m_i=3000;}
			else{$m_i=$m;}
		
		$query=mysql_query("UPDATE users SET s_date = '$sdate' WHERE acc_num = '$acc_num'")or die (mysql_error()) ;
		$query=mysql_query("UPDATE users SET amount = '$amount' WHERE acc_num = '$acc_num'")or die (mysql_error()) ;
		$query=mysql_query("UPDATE users SET total = '$amount' WHERE acc_num = '$acc_num'")or die (mysql_error()) ;
		$query=mysql_query("UPDATE users SET l_type = '$loan_t' WHERE acc_num = '$acc_num'")or die (mysql_error()) ;
		$query=mysql_query("UPDATE users SET permision = 'pending..' WHERE acc_num = '$acc_num'")or die (mysql_error()) ;
		$query=mysql_query("UPDATE users SET appactive = 'active' WHERE acc_num = '$acc_num'")or die (mysql_error()) ;
		$query=mysql_query("UPDATE users SET m_i = '$m_i' WHERE acc_num = '$acc_num'")or die (mysql_error()) ;
		
		print 	"
		<html>
		<head>
		<meta http-equiv='refresh' content='5;url=loans.php'>
		<head>
		<body>
		<span>
		<h5>** Reques Submitted succesfully!! <i> Please Wait for Admin to Respond </i> **<h5>
		<span>
		</body>
		</html>
		";
		}
	?>
			</div>
			
		</div>
<div id="footer">
			
		</div>
		
	</body>
<html>