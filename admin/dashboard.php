<?php
	require_once('../auth.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to Grand Hotel and Restaurant</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
</head>
<body>
	<div id="container">
		<div id="adminbar-outer" class="radius-bottom">
			<div id="adminbar" class="radius-bottom">
				<a id="logo" href="dashboard.php"></a>
				<div id="details">
					<a class="avatar" href="javascript: void(0)">
					<img width="36" height="36" alt="avatar" src="img/avatar.jpg">
					</a>
					<div class="tcenter">
					Hi
					<strong>Admin</strong>
					!
					<br>
					<a class="alight" href="javascript: void(0)">Visit website</a>
					|
					<a class="alightred" href="../index.php">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div id="panel-outer" class="radius" style="opacity: 1;">
			<div id="panel" class="radius">
				<ul class="radius-top clearfix" id="main-menu">
					<li>
						<a class="active" href="dashboard.php">
							<img alt="Dashboard" src="img/m-dashboard.png">
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="user.php">
							<img alt="Users" src="img/m-users.png">
							<span>Users</span>
							<span class="submenu-arrow"></span>
						</a>
					</li>
					<li>
						<a href="aboutus.php">
							<img alt="Articles" src="img/m-articles.png">
							<span>About Us</span>
							<span class="submenu-arrow"></span>
						</a>
					</li>
					<li>
						<a href="message.php">
							<img alt="Newsletter" src="img/m-newsletter.png">
							<span>Comments</span>
						</a>
					</li>
					<li>
						<a href="rooms.php">
							<img alt="Statistics" src="img/m-statistics.png">
							<span>Rooms</span>
						</a>
					</li>
					<li>
						<a href="roominventory.php">
							<img alt="Custom" src="img/m-custom.png">
							<span>Room Inventory</span>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
				<div id="content" class="clearfix">
					<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> Confirmation Number </th>
								<th> Name </th>
								<th> Address </th>
								
								<th> Email </th>
								<th> Check Inn </th>
								<th> Check Out </th>
							
								<th> Status </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('connect.php');
							$result = mysql_query("select * from booking_table , reservation_details , customer_info where reservation_details.auto_id = booking_table.reserv_id 
and customer_info.custo_id = booking_table.custo_id ");
							while($row = mysql_fetch_array($result))
								{
									echo '<tr class="record" id="'.$row['status'].'">';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['confirmation'].'</td>';
									echo '<td>'.$row['name'].'</td>';
									echo '<td><div align="right">'.$row['address'].'</div></td>';
									
									echo '<td><div align="right">'.$row['email'].'</div></td>';
									echo '<td><div align="right">'.$row['arrival'].'</div></td>';
									echo '<td><div align="right">'.$row['departure'].'</div></td>';
									echo '<td><div align="left">';
									$rrr=$row['confirmation'];
									$results = mysql_query("SELECT * FROM reservation_details ,reservation_available where confirmation='$rrr' and reservation_details.auto_id = reservation_available.auto-id");
									
									echo '</div></td>';
									echo '<td><div align="right">'.$row['status'].'</div></td>';
									echo '<td><div align="center"><a href="#" id="'.$row['confirmation'].'" class="delbutton" title="Click To Delete">delete</a></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>
				</div>
				<div id="footer" class="radius-bottom">
					2012-2013 �
					<a class="afooter-link" href="">Admin</a>
					by
					<a class="afooter-link" href="">Grand Hotel & Restaurant</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteres.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>