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
            	<?php
require "connect.php";
$confirmation=$_GET['confirm'];
$ip_confirmation=mysql_query("select * from booking_table , reservation_details , customer_info where reservation_details.confirmation='$confirmation' and reservation_details.auto_id = booking_table.reserv_id 
and customer_info.custo_id = booking_table.custo_id");
while($rows = mysql_fetch_array($ip_confirmation))
	{
	$firstname=$rows['name'];

	
	$address=$rows['address'];
	
	$email=$rows['email'];

	$arrival=$rows['arrival'];
	$departure=$rows['departure'];
	$day=$rows['days'];
	
	
	}
	echo '<h2>Personal Information</h2>';
echo 'Name: '.$firstname.'<br>';

echo 'Address: '.$address.'<br>';

echo 'Email: '.$email.'<br>';


echo '<h2>Reservation Details</h2><br>';
echo 'Arrival: '.$arrival.'<br>';
echo 'Departure: '.$departure.'<br>';
echo 'Number Of nights: '.$day.'<br>';
echo 'Payable: <br>';
echo 'Rooms: <br>';
$ip_room=mysql_query("select * from reservation_details where confirmation='$confirmation'");
while($rowa = mysql_fetch_array($ip_room))
	{
	$qty='a';
	$room='a';
	$id='a';

		
		
	
		echo '<br>';
	}
?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
   
	<input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="argiep_1323161081_biz@gmail.com" />
        <input type="hidden" name="item_name" value="Rooms Reserve" />
        <input type="hidden" name="item_number" value="<?php echo $confirmation; ?>" />
        <input type="hidden" name="amount" value="<?php echo $payable; ?>" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="currency_code" value="PHP" />
        <input type="hidden" name="lc" value="GB" />
        <input type="hidden" name="bn" value="PP-BuyNowBF" />
        <input type="image" src="paypal_button.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 157px;" />
        <img alt="fdff" border="0" src="paypal_button.png" width="1" height="1" />
        <!-- Payment confirmed -->
        <input type="hidden" name="return" value="https://tameraplazainn.x10.mx/savingreservation.php?confirmation<?php echo $confirmation; ?>" />
        <!-- Payment cancelled -->
        <input type="hidden" name="cancel_return" value="http://tameraplazainn.x10.mx/cancel.php" />
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="notify_url" value="http://tameraplazainn.x10.mx/ipn.php" />
        <input type="hidden" name="custom" value="any other custom field you want to pass" />
    </form>
			
				
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