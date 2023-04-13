<?php
  require_once "dbConfig.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM village_master WHERE VILLAGENAME LIKE '%{$_POST['query']}%' LIMIT 100";
	  
	  
      $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        //echo $res['VILLAGENAME']. "<br/>";
		
		
		
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Village not found
      </div>
      ";
    }
  }

?>


<?php


$return = '';

$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{
	$return .='
	<div class="table-responsive">
	<table class="table table bordered">
	<tr>
		<th>VILLAGENAME</th>
		<th>NVCODE</th>
		<th>SUBDIVISION</th>
		<th>TEHSIL</th>
	
	</tr>';
	while($row1 = mysqli_fetch_array($result))
	{
		$return .= '
		<tr>
		<td>'.$row1["VILLAGENAME"].'</td>
		<td>'.$row1["NVCODE"].'</td>
		<td>'.$row1["SUBDIVISION"].'</td>
		<td>'.$row1["TEHSIL"].'</td>
	
		</tr>';
	}
	echo $return;
	}
else
{
	echo 'No results containing all your search terms were found.';
}
?>