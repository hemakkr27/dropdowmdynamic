   
   
<?php
include_once("dbConfig.php");

	if(ISSET($_REQUEST['cities'])){
		
			$query=mysqli_query($db, "SELECT product_id, product_name FROM cities 
WHERE product_id='".$_REQUEST['products']."'") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['city_id']."</td><td>".$fetch['city_name']."</td></tr>";
		}
	}else if(ISSET($_POST['reset'])){
		$query=mysqli_query($conn, "SELECT * FROM `motors`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['name']."</td><td>".$fetch['category']."</td></tr>";
		}
	}else{
		$query=mysqli_query($db, "SELECT * FROM `cities`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['state_id']."</td><td>".$fetch['city_name']."</td></tr>";
		}
	}
		
		



//https://www.phpzag.com/ajax-drop-down-selection-data-load-with-php-mysql/
?>



