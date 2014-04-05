<?php
include('db.php');
$confirmation=$_POST['confirmation'];
$stat='Cancel';
mysql_query("UPDATE reservation SET status='$stat' WHERE confirmation='$confirmation'");


echo "You have successfully canceled reservation, a message will be sent to your email address.";
echo '<a href="index.php">Click Here!</a>';
?>