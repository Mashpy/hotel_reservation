<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<?php
	include('connect.php');
	$id=$_POST['reserv_id'];
	$result = mysql_query("SELECT * FROM reservation_available where reserv_id='$id'") or die(mysql_error());
		while($row = mysql_fetch_array($result))
			{
				
				$type=$row['room_type_name'];
				$rate=$row['unit_price'];
				$description=$row['description'];
				$rnum=$row['room_number'];
				
			}
?>
<form action="execeditroom.php" method="post">
	Id:<br><input type="int" name="roomid" value="<?php echo $id; ?>"><br>
	Type:<br><input type="text" name="type" value="<?php echo $type ?>" class="ed"><br>
	Rate:<br><input type="text" name="rate" value="<?php echo $rate ?>" class="ed"><br>
	Description:<br><textarea name="description" class="ed"><?php echo $description ?></textarea><br>
	Room Number:<br><input type="text" name="rnumber" value="<?php echo $rnum ?>" class="ed"><br>
	<input type="submit" value="Edit" id="button1">
</form>