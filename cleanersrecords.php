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
.sideb input,.sideb select{    height: 26px;
								width: 92%;}
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
</style>	

<?php
if(isset($_POST['savebutt'])){
	$cleanersid=$_POST['cleanersid'];
	$cleanersname=$_POST['cleanersname'];
	$gender=$_POST['gender'];
	$department=$_POST['department'];
	$query=mysql_query("INSERT INTO cleaners (idnum,fullname,gender,department) VALUES ('$cleanersid','$cleanersname','$gender','$department')") or die(mysql_error());
}
if(isset($_POST['delbuto'])){
	$id=$_POST['deleteval'];
	$query=mysql_query("DELETE FROM cleaners WHERE id='$id'") or die(mysql_error());
}
?>		
			<div class="right_content">
				<form action="" class="inputform" method="POST">
					<h3>Register Cleaners Records</h3>
					<div id="lineholder">
						<div class="sidea">
							Cleaners ID :
						</div>
						<div class="sideb">
							<input type="text" value="" name="cleanersid" required="" placeholder=" cleaners id">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Cleaners Name :
						</div>
						<div class="sideb">
							<input type="text" value="" name="cleanersname" required="" placeholder=" cleaners name">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Gender :
						</div>
						<div class="sideb">
							<select name="gender" required="">
								<option value="">~select~</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Department :
						</div>
						<div class="sideb">
							<select name="department" required="">
								<option value="">~select~</option>
								<option value="Cleaning">Cleaning</option>
								<option value="Ironing">Ironing</option>
								<option value="Receiving">Receiving</option>
								<option value="Dispatching">Dispatching</option>
							</select>
						</div>
					</div>
					<input type="SUBMIT" name="savebutt" class="savbutt" value="Save Data">
				</form>
			
	
			<br><br><br>
				<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="7"style="color:rgb(237, 239, 236); font-family:serif;background-color:rgb(63, 165, 35);font-weight:bold;text-align:center;text-transform:uppercase;">CLEANERS LIST</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;text-align:center;">
					<td>~</td>
					<td >ID Num</td>
					<td>Full Name</td>
					<td>Gender</td>
					<td>Department</td>
					<td>Delete</td>
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
					<td><form action="" method="POST" style="padding:0px;margin:2px;"><input type="hidden" value="<?php echo $id;?>" name="deleteval"><input type="submit" class="delbutt" name="delbuto" value="Delete"></form></td>
				</tr>
<?php } ?>		
				
			</table>
							
						
</div>
	</div>		

<div id="footer">
			
		</div>
		
	</body>
<html>