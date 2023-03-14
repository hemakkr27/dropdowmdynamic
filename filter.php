<?php
	require'dbConfig.php';
	if(ISSET($_POST['filter'])){
		$category=$_POST['village'];
 
		$query=mysqli_query($db, "SELECT * FROM `cities` WHERE `city_name`='$category'") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['name']."</td><td>".$fetch['city_name']."</td></tr>";
		}
	}else if(ISSET($_POST['reset'])){
		$query=mysqli_query($$db, "SELECT * FROM `cities`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['name']."</td><td>".$fetch['city_name']."</td></tr>";
		}
	}else{
		$query=mysqli_query($db, "SELECT * FROM `cities`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['city_id']."</td><td>".$fetch['city_name']."</td></tr>";
		}
	}
?>