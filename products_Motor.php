		

<?php
include('dbConfig.php');

$action = $_REQUEST['action'];

if($action=="showAll"){
	
	 $query = "SELECT product_id, product_name FROM products ORDER BY product_name";

	   $result= mysqli_query($conn, $query);
	echo $result;
	
}else{
	
	$stmt=$dbcon->prepare('SELECT product_id, product_name FROM products WHERE cat_id=:cid ORDER BY product_name');
	$stmt->execute(array(':cid'=>$action));
}
?>

<div class="row">
<?php
if($stmt->rowCount() > 0){
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($row);

?>
<div class="col-xs-3">
	<div style="border-radius:10px; border:blue solid 1px; background:azure; color:blue; padding:22px;"><?php echo $product_name; ?></div>
	<br />
</div>
<?php		
}

}else{
?>
<div class="col-xs-3">
	<div style="border-radius:3px; border:#cdcdcd solid 1px; padding:22px;"><?php echo $product_name; ?></div>
	<br />
</div>

<?php		
}
?>
</div>

		<?php
				require_once "dbConfig.php";
		if(isset($_POST['submit'])) {
        $search = $_POST['search'];
       // $searchq = preg_replace("#[^`0-9a-z]#i","", $searchq);
    
       // $query = mysqli_query("SELECT * FROM 'crud' WHERE 'name' LIKE '$search%' OR coin LIKE '$search%'") or die ("No results");
       // $count = mysqli_num_rows($queryQ);
	   //$query_run = mysqli_query($query, $conn);
	   
	   
	//   $query = "SELECT * FROM crud where id=$search";
	
	//$query = "SELECT * FROM crud where id=$search";
	
		// all data seach
 // $query = "select * from crud where id like '$search%' or name like '$search%' or address like '$search%' or salary like '$search%'";
 	// only one data seach id
 
  $query = "select * from crud where id = '$search%' ";

	   $result= mysqli_query($conn, $query);
		if($result)
		{
		
if(mysqli_num_rows($result)>0)
			{
			
			
			   echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Salary</th>";
                                      
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                      
										//echo "<td><a href='searchdata.php?data='>" . $row['id'] . "</a></td>";
										
				      echo "<td><a href='searchdata.php?data=" . $row['id'] . "'>" . $row['id'] . "</a></td>";
                                       
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";

										
                                    
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
			
			
	
			
			}else{
			echo '<h2 class="text-danger">Data not found</h2>';
			}
			
		}
	}


        ?>	