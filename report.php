<?php include("function/header.php");
		include("function/navi_menu.php");?>
			
			<div class="right_content">
<!------------------------------------------------------------------report begining----------------------------------------------------------------------------->
<?php 
if(isset($_POST['go'])){
	$val=$_POST['query'];
		if($val==1){
?>

<br><br>
				<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="17"style="color:rgb(237, 239, 236); font-family:serif;background-color:rgb(63, 165, 35);font-weight:bold;text-align:center;text-transform:uppercase;">ALL TRANSACTION</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;text-align:center;">
					<td>~</td>
					<td>Cloth Id</td>
					<td>Owner</td>
					<td>Type</td>
					<td>Qty</td>
					<td>Total Cost</td>
					<td>Balance</td>
					<td>Paid</td>
					<td>Arrears</td>
					<td>Date</td>
					<td>Servec by</td>
				</tr>
<?php
 $x=0;
 $get_allk=mysql_query("SELECT * FROM transaction ORDER BY ID asc")or die(mysql_error());
								$num_user=mysql_num_rows($get_allk);
                                  for($t=0;$t<$num_user;$t++)
                                 {
									$newbal=mysql_result($get_allk,$t,'arrears');
									$date=mysql_result($get_allk,$t,'s_date');
									$paid=mysql_result($get_allk,$t,'paid');
									$prevamo=mysql_result($get_allk,$t,'amount');
									$cloid=mysql_result($get_allk,$t,'acc_num');
									$servedby=mysql_result($get_allk,$t,'full_name');
  
 $get_all=mysql_query("SELECT * FROM clothes WHERE id='$cloid'")or die(mysql_error());
								$num_userh=mysql_num_rows($get_all);
                                  for($i=0;$i<$num_userh;$i++)
                                 {
									$id=mysql_result($get_all,$i,'id');
									$owner=mysql_result($get_all,$i,'owner');
									$clothtype=mysql_result($get_all,$i,'clothtype');
									$qty=mysql_result($get_all,$i,'qty');
									$cost=mysql_result($get_all,$i,'cost');
									$tcost=mysql_result($get_all,$i,'tcost');
									//$servedby=mysql_result($get_all,$i,'servedby');
									//$tdate=mysql_result($get_all,$i,'tdate');
									//$balance=mysql_result($get_all,$i,'balance');
									$clothid=mysql_result($get_all,$i,'clothid');
								 }
$x++;								 
								
?>
			<tr style="font-family:serif;font-size:14px;background-color:#36476C;color:#efefef;text-align:center;">
					<td><?php echo $x;?></td>
					<td ><?php echo $clothid;?></td>
					<td ><?php echo $owner;?></td>
					<td ><?php echo $clothtype;?></td>
					<td><?php echo $qty;?></td>
					<td><?php echo $tcost;?></td>
					<td><?php echo $prevamo;?></td>
					<td ><?php echo $paid;?></td>
					<td ><?php echo $newbal;?></td>
					<td><?php echo $date;?></td>
					<td><?php echo $servedby;?></td>
				</tr>
<?php } ?>		
				
			</table>
			<a style="  margin-left: 25px;
  color: rgb(63, 165, 35);" href="javascript:window.print()">Print</a>
<?php }
if($val==2){ ?>
<!-----------------2------------------------------------------------------>
<br><br><br>
				<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="17"style="color:rgb(237, 239, 236); font-family:serif;background-color:rgb(63, 165, 35);font-weight:bold;text-align:center;text-transform:uppercase;">CLOTHES COLLECTION LIST REPORT</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;text-align:center;">
					<td>~</td>
					<td >ID</td>
					<td>Owners Name</td>
					<td>Type</td>
					<td>Qty</td>
					<td>Cost</td>
					<td>Total</td>
					<td>Servedby</td>
					<td>Date</td>
					<td>Balance</td>
					
				</tr>
<?php
 $x=0;
 $get_all=mysql_query("SELECT * FROM clothes")or die(mysql_error());
								$num_user=mysql_num_rows($get_all);
                                  for($i=0;$i<$num_user;$i++)
                                 {
									$id=mysql_result($get_all,$i,'id');
									$owner=mysql_result($get_all,$i,'owner');
									$clothtype=mysql_result($get_all,$i,'clothtype');
									$qty=mysql_result($get_all,$i,'qty');
									$cost=mysql_result($get_all,$i,'cost');
									$tcost=mysql_result($get_all,$i,'tcost');
									$servedby=mysql_result($get_all,$i,'servedby');
									$tdate=mysql_result($get_all,$i,'tdate');
									$balance=mysql_result($get_all,$i,'balance');
									$clothid=mysql_result($get_all,$i,'clothid');
									$x++;									
?>
			<tr style="font-family:serif;font-size:14px;background-color:#36476C;color:#efefef;text-align:center;">
					<td><?php echo $x;?></td>
					<td ><?php echo $clothid;?></td>
					<td ><?php echo $owner;?></td>
					<td><?php echo $clothtype;?></td>
					<td><?php echo $qty;?></td>
					<td><?php echo $cost;?></td>
					<td ><?php echo $tcost;?></td>
					<td ><?php echo $servedby;?></td>
					<td><?php echo $tdate;?></td>
					<td><?php echo $balance;?></td>
				</tr>
<?php } ?>		
				
			</table>
			<a style="  margin-left: 25px;
  color: rgb(63, 165, 35);" href="javascript:window.print()">Print</a>

<?php }
if($val==3){ ?>
<!------------3-------------------------------------------------------------------------->

<br><br><br>
				<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="7"style="color:rgb(237, 239, 236); font-family:serif;background-color:rgb(63, 165, 35);font-weight:bold;text-align:center;text-transform:uppercase;">CLEANERS LIST REPORT</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;text-align:center;">
					<td>~</td>
					<td >ID Num</td>
					<td>Full Name</td>
					<td>Gender</td>
					<td>Department</td>
					
				</tr>
<?php
 $x=0;
 $get_all=mysql_query("SELECT * FROM cleaners")or die(mysql_error());
								$num_user=mysql_num_rows($get_all);
                                  for($i=0;$i<$num_user;$i++)
                                 {
									$id=mysql_result($get_all,$i,'id');
									$fullname=mysql_result($get_all,$i,'fullname');
									$gender=mysql_result($get_all,$i,'gender');
									$department=mysql_result($get_all,$i,'department');
									$idnum=mysql_result($get_all,$i,'idnum');
									$x++;									
?>
			<tr style="font-family:serif;font-size:14px;background-color:#36476C;color:#efefef;text-align:center;">
					<td><?php echo $x;?></td>
					<td ><?php echo $idnum;?></td>
					<td ><?php echo $fullname;?></td>
					<td><?php echo $gender;?></td>
					<td><?php echo $department;?></td>
				</tr>
<?php } ?>		
				
			</table>
			<a style="  margin-left: 25px;
  color: rgb(63, 165, 35);" href="javascript:window.print()">Print</a>

<?php } ?>
</div>
</div>
	
	</div>
<!------------------------------------footer--------------------------------->
	  <footer>
		<div id="footer">	
		<div id="connect">
		<a href="http://pinterest.com/fwtemplates/" target="_blank" class="pinterest"></a> <a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a> <a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a> <a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
		</div>	
		</div>
      </footer>
</body>
<?php
die;
    } ?>

<form action="" method="POST">
	<table border="0" cellspacing="8" style="width: 55%;margin: auto;font-weight:bold;margin-top: 54px;text-align:center;">
						<tr>
							<td colspan="2" >SELECT QUERY TO PRODUCE REPORT </td>
						</tr>
						<tr>
							<td><select name="query" required="" style="width: 230px;height: 25px;text-align: center;" >
									<option value="">---select---</option>
									<option value="1">report of all transactions</option>
									<option value="2">report of all collections</option>
									<option value="3">report of all cleaners</option>
									
								</select>
							<td><input type="SUBMIT" value="Generate Report" name="go" id="go"style="width: 120px;height: 28px;background-color: rgb(53, 245, 209);"></td>
						</tr>
					</table>
</form>
<!-------------------------------------------------------------------Report end--------------------------------------------------------------------------------->
			</div>
			
		</div>
<div id="footer">
			
		</div>
		
	</body>
<html>