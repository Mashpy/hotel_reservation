<?php
	include('connect.php');
	$roomid = $_POST['roomid'];
	$type=$_POST['type'];
	$rate=$_POST['rate'];
	$description=$_POST['description'];
	$rnumber=$_POST['rnumber'];
	mysql_query("UPDATE reservation_available SET room_type_name='$type', unit_price='$rate', description='$description', room_number='$rnumber' WHERE reserv_id='$roomid' AND room_type_name='$type'");
	header("location: rooms.php");
?>