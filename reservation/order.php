<?ob_start();?>
<?php

define('INCLUDE_CHECK',1);
require "connect.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Grand Hotel and Restaurant</title>

<link rel="stylesheet" type="text/css" href="demo.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js.txt"></script>


<script type="text/javascript" src="script.js"></script>
<Script language="javascript">
function checkKeyCode(evt)
{

var evt = (evt) ? evt : ((event) ? event : null);
var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
if(event.keyCode==116)
{
evt.keyCode=0;
return false
}
}
document.onkeydown=checkKeyCode;
</script> 
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</head>

<body>

<div id="main-container">

    <div class="container">
    
    	<span class="top-label">
            <span class="label-txt">Reservation Summary</span>
        </span>
        
        <div class="content-area" style="background-image:none; background-color:#ffffff; border-radius:15px;">
    
    		<div class="content" id="content">
            	<h1>Reservation details:</h1>
                <?php
				if ($_POST){
				
				 $numnights=$_POST['numnights'];
				$arival=$_POST['start'];
				$departure=$_POST['end'];
				$firstname=$_POST['fname'];
				$lastname=$_POST['lname'];
				$address=$_POST['address'];
				$city=$_POST['city'];
				$country=$_POST['country'];
				$email=$_POST['email'];
				$contact=$_POST['contact'];
				$stat='active';
				$roomid=$_POST['auto_id'];
				$confirmation =$_POST['confirm'];
			     $price=$_POST['price'];
		    
				$N = count($roomid);
				}
				$ip_sqlq=mysql_query("select * from reservation_details where auto_id='$roomid'");
					$countq=mysql_num_rows($ip_sqlq);
					if($countq==0)
					{
					   $sq = "SELECT * FROM reservation_details ORDER BY id DESC LIMIT 1 ";
                          
                        $qy = mysql_query($sq);
                         $qq = mysql_fetch_assoc($qy);   						

					    $a = $qq['id']+1;
						$insert = "INSERT INTO reservation_details (id ,auto_id ,arrival,departure,status,confirmation ) VALUES ($a,$roomid,'$arival','$departure','$stat','$confirmation' )" ;
						$check = mysql_query($insert)
						
						or die(mysql_error());
						
                        $total = $numnights*$price;
						echo '<div style="display:none;">';
					
						
						echo '</div>';
						
						 $sqq = "SELECT * FROM customer_info ORDER BY custo_id DESC LIMIT 1 ";
                          
                        $qyq = mysql_query($sqq);
                         $qqq = mysql_fetch_assoc($qyq);   						

					     $aq = $qqq['custo_id']+1;
						$inse = "INSERT INTO customer_info (custo_id ,name , email , address ) VALUES ($aq,'$firstname','$email','$address' )" ;
						
						$check = mysql_query($inse)
						
						or die(mysql_error());
						
						
						
						
						
						
						$sq1 = "SELECT * FROM booking_table ORDER BY book_id DESC LIMIT 1 ";
                          
                        $qy1 = mysql_query($sq1);
                         $qq1 = mysql_fetch_assoc($qy1);   						

					    $a1 = $qq1['book_id']+1;
						
						mysql_query("INSERT INTO booking_table (book_id , custo_id , reserv_id , days ,total_price) VALUES ($a1,$aq,'$roomid','$numnights','$total')");
					}
				?>
				<?php 
				$total = $numnights*$price;
				?>
				<h2>Check Inn:<?php echo $arival ?></h2>
				<h2>Check Out: <?php echo $departure ?></h2>
				<h2>Number Of Nights: <?php echo $numnights; ?></h2>
				<h2>Confirmation: <?php echo $confirmation; ?></h2>
				<?php echo '<h2>Total :'. $total.'</h2>'; ?>
				<h1>Your Personnal Details:</h1>
				<h2>Firstname: <?php echo $firstname ?></h2>
				<h2>Lastname: <?php echo $lastname ?></h2>
				<h2>Address: <?php echo $address ?></h2>
				<h2>City: <?php echo $city ?></h2>
				<h2>Country: <?php echo $country ?></h2>
				<h2>Email: <?php echo $email ?></h2>
				<h2>Contact: <?php echo $contact ?></h2>
			
				<h1><a href= "paypalpayout.php?confirm=<?php echo $confirmation; ?>">Submit</a>  <a href="javascript:Clickheretoprint()">print</a></h1>
			    <h1></h1>
				
       	        <div class="clear"></div>
            </div>
			<tr>
			
			
        </div>
        

    </div>

</div>

</body>
</html>
<?ob_flush();?>