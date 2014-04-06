<?php

define('INCLUDE_CHECK',1);
require "connect.php";


$reserv_id=$_GET['reserv_id'];
$arival = $_GET['arival'];
$reserv_name= $_GET['reserv_name'];	
$departure = $_GET['departure'];
$numberofnights = $_GET['nights'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Grand Hotel and Restaurant</title>

<link rel="stylesheet" type="text/css" href="demo.css" />

<!--[if lt IE 7]>
<style type="text/css">
	.pngfix { behavior: url(pngfix/iepngfix.htc);}
    .tooltip{width:200px;};
</style>
<![endif]-->


<script type="text/javascript" src="js/sadrag1.js"></script>
<script type="text/javascript" src="js/sadrag2.js"></script>

<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js"></script>


<script type="text/javascript" src="script.js"></script>

</head>

<body>

<div id="main-container">

	<div class="tutorialzine">
    <h1>Select a Room That Is Available</h1>
    </div>

	<div style="width:1000px; height:auto;">
		<div class="container" style="float: left; width: 983px;">
		
			<span class="top-label">
				<span class="label-txt">Rooms</span>
			</span>
			
			<div class="content-area" style="border-radius:15px;height:850px">
		
				
					
					<?php
					
				
				
					
		$result = mysql_query("SELECT * FROM reservation_available WHERE reserv_id=$reserv_id");
		if (!$result) {
			die("Database query failed: " . mysql_error());
		}
		

		// 4. Use returned data
		 echo "<td colspan='2'>&nbsp;<h3> Room Type :&nbsp;&nbsp;".$reserv_name."</h3></td>";
		while ($row = mysql_fetch_array($result)) {

		$id=$row["reserv_id"];
			$r = $row["room_type_name"];
			echo '<br/>';
		
			
	
					
					echo '<table width="490" border="0">';
  echo '<tr>';
   
  echo '</tr>';
  echo '<tr>';
    echo '<td width="150" rowspan="5">'. '<img width=250 height=160 alt="Unable to View" src="' . $row["image"] . '"/>'.'</td>';
    
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Room Description: '.$row['description'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Room Name: <b>'.$row['room_type_name'].'</b></td>';
  echo '</tr>';
echo '</td>';
 echo '<tr>';
    echo '<td>';
	
	$auto_id = $row['auto-id'];


	$Link='<input name="autoid" type="image" value="' .$row["auto-id"]. '" src="img/reseve1.jpg" alt="Reserve" align="middle" width="60" height="30" />';
	echo "<a href = 'booking.php?auto_id=$auto_id&& arival=$arival&& departure=$departure && nights=$numberofnights && room_type_name=$r'>".$Link."</a>";
		
	
	
	echo '</td>';
  echo '</tr>';
echo '</table>';
  
}
				?>
					
					
					<div class="clear"></div>
				</div>

			</div>
		</div>
	

	
</body>
</html>
