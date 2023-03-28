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
		
		$query=mysqli_query($db, "SELECT * FROM `village_master`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr>
						<td>".$fetch['SRNO']."</td>
			<td>".$fetch['NVCODE']."</td>
			<td>".$fetch['PCODE']."</td>
			<td>".$fetch['VILLAGENAME']."</td>
			<td>".$fetch['GRAMPANCHAYAT']."</td>
			<td>".$fetch['GMAP']."</td>
			
		   <td>".'<a href="getEmployee.php?id='. $fetch['LOCATION'] .'" class="mr-3" title="View Record" data-toggle="tooltip"> <span class="">'. $fetch['NVCODE'] .'</span></a>'."</td>
			
			</tr>";
		}
	}
?>

