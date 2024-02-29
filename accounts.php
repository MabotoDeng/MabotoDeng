<?php include("function/header.php");
		include("function/navi_menu.php");?>
			
			<div class="right_content">
			<br><br>
						<form action="" method="POST">
			<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="5"style="color:#efefef; font-family:serif;background-color:rgb(70, 240, 70);font-weight:bold;text-align:center;">Register new System User</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;">
					<td >Full Names</td>
					<td>ID Number</td>
					<td>Username</td>
					<td>Password</td>
					<td>User level</td>
				</tr>
				<tr style="text-align: center;">
					<td><input type="text" required="" name="full_name" id="full_name"></td>
					<td><input type="number" required="" name="id_num" id="id_num" style="width:140px;text-align:center;"></td>
					<td><input type="text" required="" name="username" id="username" style="width:120px;text-align:center;"></td>
					<td><input type="password" required="" name="password" id="password" style="width:120px;text-align:center;"></td>
					<td><Select required="" name="level" id="level">
						<option value="">--select--</option>
						<option value="1">Admin(1)</option>
						<option value="2">Employee(2)</option>
						<option value="2">Accoutantant(3)</option>
					</td>
				</tr>
			</table>
			<br>
			<table width="95%" style="margin:auto;">
				<tr><td><input type="SUBMIT" value="REGISTER USER" name="register" id="register" style="width:210px; height:28;font-family: serif;margin-left: 10px;
border: 0;
background:rgb(18, 54, 148);
color: rgb(231, 216, 216);"></td></tr>
			</table>
</form>
			<br>
			<table border="0" width="95%" style="margin:auto;">
				<tr>
					<td colspan="6"style="color:#efefef; font-family:serif;background-color:rgb(70, 240, 70);font-weight:bold;text-align:center;">All System Users</td>
				</tr>
				<tr style="font-family:serif;font-size:14px;background-color:rgb(131, 65, 14);color:#efefef;">
					<td >Full Names</td>
					<td>ID/reg Number</td>
					<td>Username</td>
					<td>Password</td>
					<td>User level</td>
					<td>Active</td>
				</tr>
<?php 
	$get_fname=mysql_query("SELECT full_name FROM users WHERE active='YES' or active = 'NO'")or die(mysql_error());
	$get_id=mysql_query("SELECT id_num FROM users WHERE active='YES' or active = 'NO'")or die(mysql_error());
	$get_username=mysql_query("SELECT username FROM users WHERE active='YES' or active = 'NO'")or die(mysql_error());
	$get_password=mysql_query("SELECT password FROM users WHERE active='YES' or active = 'NO'")or die(mysql_error());
	$get_level=mysql_query("SELECT user_level FROM users WHERE active='YES' or active = 'NO'")or die(mysql_error());
	$get_active=mysql_query("SELECT active FROM users WHERE active='YES' or active = 'NO'")or die(mysql_error());
                      $num_username=mysql_num_rows($get_username);
                                  for($i=0;$i<$num_username;$i++)
                                 {
                                  $f_name=mysql_result($get_fname,$i,'full_name');
								  $id_num=mysql_result($get_id,$i,'id_num');
								  $username=mysql_result($get_username,$i,'username');
								  $password=mysql_result($get_password,$i,'password');
								  $level=mysql_result($get_level,$i,'user_level');
								  $active=mysql_result($get_active,$i,'active');
								  ?>
				<tr style="font-family:serif;font-size:14px;background-color:#36476C;color:#efefef;">
					<td><?php echo $f_name?></td>
					<td><?php echo $id_num?></td>
					<td><?php echo $username?></td>
					<td><?php echo $password?></td>
					<td><?php echo $level?></td>
					<td style="text-align:center;"><?php echo $active?></td>
				</tr>
<?php } ?>
			</table>
			<br><br>
<form action="" method="POST">
		<table border="0" width="95%" style="margin:auto;">
			
			<tr>
				<td>Activate/Deactivate Users</td>
				<td><input type="text" name="vdel_user" id="vdel_user" required="" placeholder="Enter User ID Number" style="width:200px;font-family:serif;background:#efefef"></td>
				<td><input type="submit" value="Activate" name="act" id="del_user" style="width:130px; height:26px;font-family:serif;border: 0;
background: rgb(70, 232, 15);"></td>
				<td><input type="submit" value="Deactivate" name="deact" id="del_user" style="width:130px; height:26px;font-family:serif;border: 0;
background: rgb(240, 53, 53);"></td>
			</tr>
		</table>
</form>			
			</div>
			
		</div>
		
<?php
		
		
		if (isset($_POST['register'])){
		$f_name=$_POST['full_name'];
		$idnum=$_POST['id_num'];
		$uname=$_POST['username'];
		$pass=$_POST['password'];
		$level=$_POST['level'];
		
		$query=mysql_query("INSERT INTO users (full_name,username,password,id_num,user_level,active) VALUE ('$f_name','$uname','$pass','$idnum','$level','YES')")or die(mysql_error());
		header("location:accounts.php");
		}
if (isset($_POST['act'])){
		$del_user=$_POST['vdel_user'];
		$query=mysql_query("UPDATE  users SET  active = 'YES' WHERE  id_num='$del_user'")or die(mysql_error());
		header("location:accounts.php");
		}
if (isset($_POST['deact'])){
		$del_user=$_POST['vdel_user'];
		$query=mysql_query("UPDATE  users SET  active = 'NO' WHERE  id_num='$del_user'")or die(mysql_error());
		header("location:accounts.php");
		}
		?>
<div id="footer">
			
		</div>
		
	</body>
<html>