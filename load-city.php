<?php
include('dbConfig.php');

$sql = "SELECT distinct(city_id) FROM products";
$result = mysqli_query($db, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode ($output);

}else{
echo "No Record Found.";
}

?> :