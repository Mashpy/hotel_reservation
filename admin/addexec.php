<?php
include('connect.php');





	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"../reservation/img/products/" . $_FILES["image"]["name"]);
			
			$location=$_FILES["image"]["name"];
			$roomname=$_POST['rname'];
			$id=$_POST['id'];
			$type=$_POST['type'];
			$rate=$_POST['rate'];
			$desc=$_POST['desc'];
			$rnum=$_POST['rnum'];
			

			
			$update=mysql_query("INSERT INTO reservation_available (reserv_id,room_type_name,image,description,room_number,unit_price)
VALUES
('$id','$type','$location','$desc','$rnum','$rate')");
header("location: rooms.php");
			exit();
		
			}
	}


?>
