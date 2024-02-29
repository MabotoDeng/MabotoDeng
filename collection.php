<?php include("function/header.php");
		include("function/navi_menu.php");?>
<style>
#lineholder{color:red;
			overflow: hidden;
			margin-bottom: 10px;}
.sidea{    float: left;
			width: 32%;
			text-align: right;
			padding: 4px;
			padding-right: 7px;}
.sideb{    float: right;
			width: 65%;}
.sideb input,.sideb select{        height: 26px;
								width: 92%;
								background: none;
								border: 1px #bdb8b8 solid;}
.savbutt{	
			background: #8bc34a;
			margin-top: 21px;
			padding: 3px 19px;
			cursor: pointer;}
.inputform{    border: 1px #006032 dashed;
				width: 394px;
				margin: auto;
				padding: 11px;
				margin-top: 15px;
				text-align: center;}
.inputform h3{  margin: 0px 0px 21px 0px;}
.delbutt{height: 19px;
    margin: 0px;
    background: #e24444;
    color: white;
    border: 1px #ef0808 solid;
    margin-top: 0px;
    cursor: pointer;}
.sideb input:disabled{background: #e2e1e1;}
</style>	

<?php
if(isset($_POST['savebutt'])){
	$clothid=$_POST['clothid'];
	$ownersname=$_POST['ownersname'];
	$clothtype=$_POST['clothtype'];
	$quantity=$_POST['quantity'];
	$cost=$_POST['cost'];
	$tcost=$_POST['tcost'];
	$servedby=$_POST['servedby'];
	$tdate=$_POST['tdate'];
	
	$query=mysql_query("INSERT INTO clothes (clothid,owner,clothtype,qty,cost,tcost,balance,servedby,tdate) VALUES ('$clothid','$ownersname','$clothtype','$quantity','$cost','$tcost','$tcost','$servedby','$tdate')") or die(mysql_error());
}
if(isset($_POST['delbuto'])){
	$id=$_POST['deleteval'];
	$query=mysql_query("DELETE FROM clothes WHERE id='$id'") or die(mysql_error());
}
?>		
			<div class="right_content">
				<form action="" class="inputform" method="POST">
					<h3>Register Received Clothes</h3>
					<div id="lineholder">
						<div class="sidea">
							Cloth ID :
						</div>
						<div class="sideb">
							<input type="text" value="" name="clothid" required="" placeholder=" cloth id">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Owners Name :
						</div>
						<div class="sideb">
							<input type="text" value="" name="ownersname" required="" placeholder=" Owners name">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Cloth Type :
						</div>
						<div class="sideb">
							<input type="text" value="" name="clothtype" required="" placeholder=" cloth type">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Quantity :
						</div>
						<div class="sideb">
							<input type="number" min="1" value="1" name="quantity" class="quantity" required="" placeholder="quantity">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Cost :
						</div>
						<div class="sideb">
							<input type="number" min="0" value="0" name="cost" class="cost" required="" placeholder="cost">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Total Cost :
						</div>
						<div class="sideb">
							<input type="number" min="0" value="" disabled readonly name="tcost" class="tcost" required="" placeholder="total cost">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Served By :
						</div>
						<div class="sideb">
							<input type="text" readonly disabled min="0" value="<?php echo $uname2;?>" name="servedby" placeholder="Served By">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Date :
						</div>
						<div class="sideb">
							<input type="date" value="" name="tdate" required="" placeholder="date">
						</div>
					</div>
					<input type="SUBMIT" name="savebutt" class="savbutt" value="Receive">
				</form>
			
	
			<br>
				<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="17"style="color:rgb(237, 239, 236); font-family:serif;background-color:rgb(63, 165, 35);font-weight:bold;text-align:center;text-transform:uppercase;">COLLECTION LIST</td>
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
					<td>Delete</td>
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
					<td><form action="" method="POST" style="padding:0px;margin:2px;"><input type="hidden" value="<?php echo $id;?>" name="deleteval"><input type="submit" class="delbutt" name="delbuto" value="Delete"></form></td>
				</tr>
<?php } ?>		
				
			</table>
							
						
</div>
	</div>		

<div id="footer">
			
		</div>
<script>
jQuery(document).ready(function(){
	jQuery(".right_content").on("keyup",".quantity,.cost",function(){
			var quantity = parseFloat(jQuery(".quantity").val());
			var cost = parseFloat(jQuery(".cost").val());
			var newval = quantity*cost;
			jQuery(".tcost").val(newval);
	});
});
</script>		
	</body>
<html>