<?php

define('INCLUDE_CHECK',1);
require "connect.php";


	$arival = $_GET['arival'];
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
    <h1>Select Room</h1>
    </div>

	<div style="width:1000px; height:auto;">
		<div class="container" style="float: left; width: 464px;">
		
			<span class="top-label">
				<span class="label-txt">Rooms</span>
			</span>
			
			<div class="content-area" style="border-radius:15px;">
		
				<div class="content drag-desired">
					
					<?php
					
					
					
					
		
			$strSQL = "SELECT * FROM reservation_available WHERE reserv_id=". $_GET["reserv_id"];
			
			$id = $_GET["reserv_id"];
			
			$result = mysql_query($strSQL);

			while($row = mysql_fetch_array($result)) {
			$strTitle = $row["room_type_name"];
			$strPrice = $row["unit_price"];
			$strAvailable = $row["available"];
			echo  'Room-Type:' . $strTitle ." ".	'Price:' .$strPrice . "	" .	'Available:' . $strAvailable;
				echo $arival;
			if($strAvailable==0){
				echo "sorry no availble";
			}else{
			echo "<a href = 'booking.php?reserv_id=$id && room_type=$strTitle && price=$strPrice'>Click Here</a><br />";
			}
			}
					
				
					$result = mysql_query("SELECT * FROM internet_shop");
					while($row=mysql_fetch_assoc($result))
					{
				
						echo '<div class="product"><img src="img/products/'.$row['img'].'" alt="'.htmlspecialchars($row['name']).'" width="128" height="128" class="pngfix" /></div>';
					
						
						
					}

					?>
					
					
					<div class="clear"></div>
				</div>

			</div>
		</div>


		
		<div class="clearfix"></div>
	</div>
	
</div>

</body>
</html>