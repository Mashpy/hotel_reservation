<?php

define('INCLUDE_CHECK',1);
require "connect.php";



	$arival = $_POST['start'];
	
	$departure = $_POST['end'];
	$numberofnights = $_POST['result'];
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
    <h1>Select The Type of Room You Want</h1>
    </div>

	<div style="width:1000px; height:auto;">
		<div class="container" style="float: left; width: 983px;">
		
			<span class="top-label">
				<span class="label-txt">Room Type</span>
			</span>
			
			<div class="content-area" style="border-radius:15px;height:650px;">
		
				
					
					<?php
					
			
			
					
		$result = mysql_query("SELECT * FROM reservation_type ORDER BY 'reserv_id' ASC");
		if (!$result) {
			die("Database query failed: " . mysql_error());
		}
		

		// 4. Use returned data
		while ($row = mysql_fetch_array($result)) {

			$res_id = $row['reserv_id'];
			$res_name = $row["reserv_name"]."<br />";
		
			
		
			 
			
	
					
					echo '<table width="490" border="0">';
  echo '<tr>';

  echo '</tr>';
  echo '<tr>';
    echo '<td width="150" rowspan="5">'. '<img width=150 height=105 alt="Unable to View" src="' . $row["image"] . '"/>'.'</td>';
    
  echo '</tr>';
  echo '<tr>';
  echo '<td>'.'Room Type Name: '.$row['reserv_name'].'</td>';

  echo '</tr>';
   echo '<tr>';
        echo '<td>'.'Room Description: '.$row['description'].'</td>';
  echo '</tr>';
echo '</td>';
 echo '<tr>';
    echo '<td>';

	$Link='<input name="roomid" type="image" value="" src="img/reseve1.jpg" alt="Reserve" align="middle" width="60" height="30";" />';
	echo "<a href = 'reservation_details.php?reserv_id=" . $row['reserv_id'] . "&& arival=$arival&& departure=$departure && reserv_name=$res_name &&nights=$numberofnights''>".$Link."</a></br>";
		
	
	
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
