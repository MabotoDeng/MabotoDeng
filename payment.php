<?php include("function/header.php");
		include("function/navi_menu.php");?>
			
			<div class="right_content">
			<br><br><br>
				<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="7"style="color:rgb(237, 239, 236); font-family:serif;background-color:rgb(63, 165, 35);font-weight:bold;text-align:center;text-transform:uppercase;">MY LOAN STATUS</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;text-align:center;">
					<td>Acc. Num</td>
					<td >Full Names</td>
					<td>Loan Type</td>
					<td>Start</td>
					<td>Amount</td>
					<td>M/instalments</td>
					<td>Permision</td>
				</tr>
<?php
 $get_all=mysql_query("SELECT * FROM users Where appactive='active' and acc_num='$acc'")or die(mysql_error());
								$num_user=mysql_num_rows($get_all);
                                  for($i=0;$i<$num_user;$i++)
                                 {
									$reason=mysql_result($get_all,$i,'l_type');
									$start=mysql_result($get_all,$i,'s_date');
									$end=mysql_result($get_all,$i,'amount');
									$end2=mysql_result($get_all,$i,'total');
									$permision=mysql_result($get_all,$i,'permision');
									$emp_num=mysql_result($get_all,$i,'acc_num');
									$mi=mysql_result($get_all,$i,'m_i');
								
								if($permision=='granted'){$color="green";}
								if($permision=='denied'){$color="red";}
								if($permision=='pending..'){$color="";}
?>
			<tr style="font-family:serif;font-size:14px;background-color:#36476C;color:#efefef;text-align:center;">
					<td><?php echo $emp_num;?></td>
					<td ><?php echo $uname2;?></td>
					<td ><?php echo $reason;?></td>
					<td><?php echo $start;?></td>
					<td><?php echo $end;?></td>
					<td><?php echo $mi;?></td>
					<td style="background:<?php echo $color; ?>;"><?php echo $permision;?></td>
				</tr>
<?php } ?>		
				
			</table>
							
				
<form action="" method="POST">
	<table style="margin:auto;margin: auto;
margin-top: 58px;">
		<tr>
			<td colspan="3" style="text-align: center;
font-family: serif;
color: rgb(237, 239, 223);
/* text-decoration: underline; */
text-transform: uppercase;
padding-top: 4px;
padding-bottom: 5px;
background: rgb(63, 165, 35);
font-weight: bold;;">PAY INSTALLMENTS</td>
		</tr>
		<tr>
			<td>Enter Amount :</td><td><input type="number" style="text-align:right;" placeholder="enter amount to pay" name="c_paid"></td><td><input type="submit" style="width: 56px;
background-color: green;
border: 0;
height: 23px;
font-weight: bold;" value="PAY" name="paid" id="paid"></td>
		</tr>
	</table>
</form>
<?php
	if (isset($_POST['paid'])){
		$cash_paid=$_POST['c_paid'];
		$date3=date("Y-m-d");
		$arrears=$end2-$cash_paid;
		$query=mysql_query("INSERT INTO transaction (acc_num,full_name,loan_type,s_date,amount,paid,arrears) VALUES ('$emp_num','$uname2','$reason','$start','$end','$cash_paid','$arrears')")or die (mysql_error());
		$query=mysql_query("UPDATE users SET total = '$arrears' WHERE acc_num = '$acc'")or die (mysql_error());
		header("location:payment.php");
	}
?>		

<br><br>
				<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="7"style="color:rgb(237, 239, 236); font-family:serif;background-color:rgb(63, 165, 35);font-weight:bold;text-align:center;text-transform:uppercase;">MY TRANSACTION</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;text-align:center;">
					<td>Acc. Num</td>
					<td >Full Names</td>
					<td>Loan Type</td>
					<td>Start</td>
					<td>Amount</td>
					<td>PAID</td>
					<td>REMAINING</td>
				</tr>
<?php
 $get_all=mysql_query("SELECT * FROM transaction Where acc_num='$acc' ORDER BY ID asc")or die(mysql_error());
								$num_user=mysql_num_rows($get_all);
                                  for($i=0;$i<$num_user;$i++)
                                 {
									$reason=mysql_result($get_all,$i,'loan_type');
									$start=mysql_result($get_all,$i,'s_date');
									$end=mysql_result($get_all,$i,'amount');
									$permision=mysql_result($get_all,$i,'arrears');
									$emp_num=mysql_result($get_all,$i,'acc_num');
									$mi=mysql_result($get_all,$i,'paid');
								$color="green";
								//if($permision=='granted'){$color="green";}
								//if($permision=='denied'){$color="red";}
								//if($permision=='pending..'){$color="";}
?>
			<tr style="font-family:serif;font-size:14px;background-color:#36476C;color:#efefef;text-align:center;">
					<td><?php echo $emp_num;?></td>
					<td ><?php echo $uname2;?></td>
					<td ><?php echo $reason;?></td>
					<td><?php echo $start;?></td>
					<td><?php echo $end;?></td>
					<td><?php echo $mi;?></td>
					<td style="background:<?php echo $color; ?>;"><?php echo $permision;?></td>
				</tr>
<?php } ?>		
				
			</table>


		
			</div>
			
		</div>
<div id="footer">
			
		</div>
		
	</body>
<html>