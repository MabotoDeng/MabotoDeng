<?php include("function/header.php");
		include("function/navi_menu.php");?>
			
			<div class="right_content">
																<script>
	function isEqual(str1,str2) 
		 {
		   if(str1==str2)
		   {		
			return true;
		   } else {
			return false;
		   }
		}
		
		/*----------------------password-------------------*/
		function done(){
 if(document.getElementById("change_cur").value=="" )
  {
   alert("Enter your Password !!");
   document.getElementById("change_cur").value = "";
   document.getElementById("change_new").value = "";
   document.getElementById("change_new_re").value = "";
   document.getElementById("change_cur").focus();
   return false;
  }
  if(document.getElementById("change_new").value=="" ||document.getElementById("change_new_re").value=="")
  {
   alert("Enter your New Password !!");
   document.getElementById("change_new").value = "";
   document.getElementById("change_new_re").value = "";
   document.getElementById("change_new").focus();
   return false;
  }
  if(isEqual(document.getElementById("change_new").value,document.getElementById("change_new_re").value)== false){
     alert("Password does not match Re-Enter again !!");
     document.getElementById("change_new").value = "";
     document.getElementById("change_new_re").value = "";
     document.getElementById("change_new").focus();
     return false;
    }
  }
	</script>
	<br>
	<div class="content">
				<h3 style=" color: rgb(18, 54, 148); padding-left: 19;">Manage Account</h3>
				<div style="float:left;
							padding:10px 0 0 80px;">
				<span style="background-color:rgb(18, 54, 148);
								padding:4px 10px 4px 10px;
								font-family:serif;
								color:white;">Change Password</span>
				</div>
				<br>
				<div style="border: 1px rgb(18, 54, 148) dashed;
							width: 85%;
							margin:20;
							margin:auto;">
				<form action="" method="POST">
				<table cellspacing="15" border="0" style="color: rgb(18, 54, 148); font-family:serif;padding:50px 50px 50px 0px;font-size:16px;">
				<tr>
					<td>Enter current password</td>
					<td><input type="password" id="change_cur" name="change_cur" onChange="document.getElementById('change_cur').value=trim(this.value);"></td>
				</tr>
<?php
if(isset($_POST['pas_save'])){
$cur_pass=$_POST['change_cur'];
$get_pass=mysql_query("SELECT password FROM users WHERE username='$user_name'")or die (mysql_error());
$pass_count=mysql_num_rows($get_pass);
for($i=0;$i<$pass_count;$i++)
{
$result=mysql_result($get_pass,$i,'password') ;
}
	if($result==$cur_pass){
		$new_pass=$_POST['change_new'];
		$query=mysql_query("UPDATE  users SET  password = '$new_pass' WHERE  username='$user_name'")or die(mysql_error());}
		
			else{
?>
		<tr><td></td><td colspan="2"style="text-align:center;color:red;font-size:13px;">* wrong password !!! *</td><tr>
<?php
}}
?>
				<tr>
					<td>Enter new password</td>
					<td><input type="password" id="change_new" name="change_new" onChange="document.getElementById('change_new').value=trim(this.value);"></td>
				</tr>
				<tr>
					<td>Re-enter new password</td>
					<td><input type="password" id="change_new_re" name="change_new_re" onChange="document.getElementById('change_new_re').value=trim(this.value);"></td>
				</tr>
				</table>
					<span style="padding-left:150px;"><input type="submit" value="Save New Password" id="pas_save" name="pas_save" style="height:35px;color:rgb(89, 6, 47);margin-left: 58px;" Onclick="return done(this.form);"></span>
				</form>

				</div>
				<br>
			</div>
		
		

<!---------------------------------------------------------------------->
			</div>
			
		</div>
<div id="footer">
			
		</div>
		
	</body>
<html>