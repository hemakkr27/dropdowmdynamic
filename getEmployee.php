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
		$query=mysqli_query($db, "SELECT * FROM `products`") or die(mysqli_error());
		 echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Salary</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
		
		while($fetch=mysqli_fetch_array($query)){
			
			
			echo"<tr>
			<td>".$fetch['product_id']."</td>
			<td>".$fetch['product_name']."</td>
			<td>".$fetch['city_id']."</td>
			</tr>";
		}
	}
		
		



//https://www.phpzag.com/ajax-drop-down-selection-data-load-with-php-mysql/
?>




