<?php 

define('INCLUDE_CHECK',1);
require "connect.php";
function createRandomPassword() {
					$chars = "abcdefghijkmnopqrstuvwxyz023456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 7) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
			 $confirm = createRandomPassword();




$auto_id = $_GET['auto_id'];
$type=$_GET['room_type_name'];
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

  <script src="js/jquery.min.js"></script>
  <script src="js/kendo.web.min.js"></script>
  <script src="js/console.js"></script>
<script type="text/javascript" src="script.js"></script>

</head>

<body>

<div id="main-container">

	<div class="tutorialzine">
    <h1>Book Your Desired Room</h1>
    </div>

	<div style="width:1000px; height:auto;">
		<div class="container" style="float: left; width: 764px;">
		
			<span class="top-label">
				<span class="label-txt">Rooms</span>
			</span>
			
			<div class="content-area" style="border-radius:15px;">
		
				<div class="content">
				<?php
					
			
						
						$q = mysql_query("SELECT * FROM reservation_details where departure >= '$arival' and auto_id='$auto_id'")
						or die(mysql_error());
						
						$rows = mysql_num_rows($q);
						
				
						if($rows==0){
						 $query = mysql_query("SELECT * FROM `reservation_available` WHERE `auto-id`='$auto_id' and `room_type_name`='$type'")
						 or die(mysql_error());
						
						while($row=mysql_fetch_assoc($query)){
					
						   echo '<div class="product">Room Type : '.$row['room_type_name'].'</div>';
							echo '<div class="product"><img src="'.$row['image'].'" alt="'.htmlspecialchars($row['room_type_name']).'" width="380" height="300" class="pngfix" /> </div>';
					       $price = $row['unit_price'];
						}
						
						
						 

					?>
						<form  method="post" action="order.php">

		<div class="container" style="float: right; width: 212px; padding-bottom: 15px;">
			<span class="top-label">
				<span class="label-txt">Personal Details</span>
			</span>
			<div class="content-area" style="border-radius:15px; padding-bottom: 25px;">
				<div>
					Firstname:<br>
					<input type="text" name="fname" id="boxy" required validationMessage="Please select movie"/><br>
					lastname:<br>
					<input type="text" name="lname" id="boxy" required validationMessage="Please select movie"/><br>
					Address:<br>
					<input type="text" name="address" id="boxy" required validationMessage="Please select movie" /><br>
					City:<br>
					<input type="text" name="city" id="boxy" required validationMessage="Please select movie"  /><br>
					Country:<br>
					<input type="text" name="country" id="boxy" required validationMessage="Please select movie" /><br>
					Email:<br>
					<input type="email" name="email" id="boxy" required validationMessage="Please select movie" /><br>
					Contact Number:<br>
					<input type="number" min="1" max="15" name="contact" id="boxy" required validationMessage="Please select movie" /><br>
					<input type="hidden" name="start" value="<?php echo $arival; ?>" >
					<input type="hidden" name="auto_id" value="<?php echo $auto_id; ?>" >
					<input type="hidden" name="price" value="<?php echo $price; ?>" >
					<input type="hidden" name="confirm" value="<?php echo $confirm; ?>" >
					<input type="hidden" name="end" value="<?php echo $departure; ?>" >
					<input type="hidden" name="numnights" value="<?php echo $numberofnights; ?>" >
					<input type="submit"   class="button" value="Checkout" id="boxy"  style="width: 147px; margin-top: 18px;">
				</div>
			</div>
		</div>
		</form>
		<?php } 
		
		
		else{
						echo '<h2>Sorry, Currently it is reserved.</h2>';
						echo '<h2> Go Back and Choose another.</h2>';
							
						}
		
		?>
					<div class="clear"></div>
				
				</div>

			</div>
		</div>


		
		<div class="clearfix"></div>
	</div>
	
</div>
 <script>
                $('document').ready(function() {
                    var data = [
                    "12 Angry Men",
                    "Il buono, il brutto, il cattivo.",
                    "Inception",
                    "One Flew Over the Cuckoo's Nest",
                    "Pulp Fiction",
                    "Schindler's List",
                    "The Dark Knight",
                    "The Godfather",
                    "The Godfather: Part II",
                    "The Shawshank Redemption"
                    ];

                    $("#search").kendoAutoComplete({
                        dataSource: data,
                        separator: ", "
                    });

                    $("#time").kendoDropDownList({
                        optionLabel: "--Select Country--"
                    });

                    $("#amount").kendoNumericTextBox();

                    var validator = $("#tickets").kendoValidator().data("kendoValidator"),
                    status = $(".status");

                    $("form").submit(function(event) {
                        event.preventDefault();
                        if (validator.validate()) {
                            status.text("")
                                .removeClass("invalid")
                                .addClass("valid");
                        } else {
                            status.text("Oops! There is invalid data in the form.")
                                .removeClass("valid")
                                .addClass("invalid");
                        }
                    });
                });
            </script>
</body>
</html>