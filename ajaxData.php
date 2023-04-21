<?php
include('dbConfig.php');
if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    $rowCount = $query->num_rows;
	
    if($rowCount > 0){
        echo '<option value="">Select Your tehsil</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
        }
    }else{
        echo '<option value="">Tehsil Not Available</option>';
    }
}
if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    $query = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
    $rowCount = $query->num_rows;

    if($rowCount > 0){
        echo '<option value="">Select Your village</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">Village Not Available</option>';    
    }
}
if(isset($_POST["city_id"]) && !empty($_POST["city_id"])){
    $query = $db->query("SELECT * FROM products WHERE city_id = ".$_POST['city_id']." AND status = 1 ORDER BY product_name ASC");
    $rowCount = $query->num_rows;

    if($rowCount > 0){
        echo '<option value="">Select Your villagedetails</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['product_id'].'">'.$row['product_name'].'</option>';
        }
    }else{
        echo '<option value="">villagedetails Not Available</option>';
    }
}
?>