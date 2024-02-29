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
	//echo $_POST['balancef'];
	$cloid=$_POST['cloid'];
	$paid=$_POST['paid'];
	$balance=$_POST['balancef'];
	$change=$_POST['changef'];
	$newbal=$balance-$paid;
	$tdate=date("Y-m-d");
	$paid=$paid-$change;
	
	$query=mysql_query("INSERT INTO transaction (s_date,amount,arrears,paid,acc_num,full_name) VALUES ('$tdate','$balance','$newbal','$paid','$cloid','$uname2')") or die(mysql_error());
	$query=mysql_query("UPDATE clothes SET balance='$newbal' WHERE id='$cloid'") or die(mysql_error());
}
?>		
			<div class="right_content">
				<form action="" class="inputform" method="POST">
					<h3>Receive Payments</h3>
					<div id="lineholder">
						<div class="sidea">
							Cloth ID :
						</div>
						<div class="sideb">
							<select class="clothid" required=''>
								<option value="">~select~</option>
								<?php
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
									echo '<option value="'.$clothid.'" 
									data-owner="'.$owner.'"
									data-clothtype="'.$clothtype.'"
									data-qty="'.$qty.'"
									data-cost="'.$cost.'"
									data-tcost="'.$tcost.'"
									data-servedby="'.$servedby.'"
									data-tdate="'.$tdate.'"
									data-balance="'.$balance.'"
									data-cloid="'.$id.'"
									>'.$clothid.'</option>';
								 }
								?>
							</select>

						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Owners Name :
						</div>
						<div class="sideb">
							<input type="text" value="" readonly disabled class="ownersname"  >
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Cloth Type :
						</div>
						<div class="sideb">
							<input type="text" value="" readonly disabled class="clothtype"  placeholder=" ">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Quantity :
						</div>
						<div class="sideb">
							<input type="number" min="1" value="" readonly disabled name="quantity" class="quantity"  placeholder="">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Cost :
						</div>
						<div class="sideb">
							<input type="number" min="0" value="" readonly disabled name="cost" class="cost" >
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Total Cost :
						</div>
						<div class="sideb">
							<input type="number" min="0" value="" disabled readonly name="tcost" class="tcost"  >
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Balance :
						</div>
						<div class="sideb">
							<input type="number" min="0" value="" style="background: #e2e1e1;" readonly  name="balancef" class="balance"  >
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Served By :
						</div>
						<div class="sideb">
							<input type="text" readonly disabled min="0" class="servedby" placeholder="">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Date :
						</div>
						<div class="sideb">
							<input type="text" value="" class="tdate"  placeholder="date">
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Paid :
						</div>
						<div class="sideb">
							<input type="number" disabled min="0" value="" name="paid" class="paid" required="" >
						</div>
					</div>
					<div id="lineholder">
						<div class="sidea">
							Change :
						</div>
						<div class="sideb">
							<input type="number" readonly style="background: #e2e1e1;" name="changef" class="change" required="" >
						</div>
					</div>
					<input type="hidden" name="cloid" class="cloid">
					<input type="SUBMIT" name="savebutt" class="savbutt" value="Make Payment">
				</form>
					
						
</div>
	</div>		

<div id="footer">
			
		</div>
<script>
jQuery(document).ready(function(){
	jQuery(".right_content").on("change",".clothid",function(){
			var owner = jQuery('option:selected',this).attr('data-owner');
			var clothtype = jQuery('option:selected',this).attr('data-clothtype');
			var qty = jQuery('option:selected',this).attr('data-qty');
			var cost = jQuery('option:selected',this).attr('data-cost');
			var tcost = jQuery('option:selected',this).attr('data-tcost');
			var servedby = jQuery('option:selected',this).attr('data-servedby');
			var tdate = jQuery('option:selected',this).attr('data-tdate');
			var balance = jQuery('option:selected',this).attr('data-balance');
			var cloid = jQuery('option:selected',this).attr('data-cloid');
			
			//alert(balance);
			
			jQuery(".ownersname").val(owner);
			jQuery(".clothtype").val(clothtype);
			jQuery(".quantity").val(qty);
			jQuery(".cost").val(cost);
			jQuery(".tcost").val(tcost);
			jQuery(".servedby").val(servedby);
			jQuery(".tdate").val(tdate);
			jQuery(".balance").val(balance);
			jQuery(".cloid").val(cloid);
			jQuery(".paid").attr('disabled', false);
	});
	jQuery(".right_content").on("keyup",".paid",function(){
		var paid = parseFloat(jQuery('.paid').val());
		var balance = parseFloat(jQuery('.balance').val());
		var change = balance-paid; 
			if(change>=0){jQuery(".change").val(0);}
			else{change=change*-1;jQuery(".change").val(change);}
	});
});
</script>		
	</body>
<html>