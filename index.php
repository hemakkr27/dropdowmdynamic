<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dynamic Selection Box</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
	<script src="css/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#tehsil').html(html);
                    $('#village').html('<option value="">Select Your State First</option>'); 
                }
            }); 
        }else{
            $('#tehsil').html('<option value="">Select Your Country First</option>');
            $('#village').html('<option value="">Select Your State First</option>'); 
			 $('#villagedetail').html('<option value="">Select Your State First</option>'); 
        }
    });
    $('#tehsil').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#village').html(html);
                }
            }); 
        }else{
            $('#village').html('<option value="">Select Your State First</option>'); 
						 $('#villagedetail').html('<option value="">Select Your State First</option>'); 
        }
    });
	
	  $('#village').on('change',function(){
        var cityID = $(this).val();
        if(cityID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'city_id='+cityID,
                success:function(html){
                    $('#villagedetail').html(html);
                }
            }); 
        }else{
            $('#villagedetail').html('<option value="">Select Your State First</option>'); 
        }
    });
	
});
</script>


<script type="text/javascript">
$(document).ready(function()
{		
	// function to get all records from table
	function getAll(){
		
		$.ajax
		({
			url: 'products_Motor.php',
			data: 'action=showAll',
			cache: false,
			success: function(r)
			{
				$("#display").html(r);
			}
		});			
	}
	
	getAll();
	// function to get all records from table
	
	
	// code to get all records from table via select box
	$("#products_Motor").change(function()
	{				
		var id = $(this).find(":selected").val();

		var dataString = 'action='+ id;
				
		$.ajax
		({
			url: 'products_Motor.php',
			data: dataString,
			cache: false,
			success: function(r)
			{
				$("#display").html(r);
			} 
		});
	})
	// code to get all records from table via select box
});
</script>

<script>

$(document).ready(function(){  
	// code to get all records from table via select box
	$("#products").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ id;    
		$.ajax({
			url: 'getEmployee.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(employeeData) {
			   if(employeeData) {
					$("#heading").show();		  
					$("#no_records").hide();					
					$("#emp_name").text(employeeData.employee_name);
					$("#emp_age").text(employeeData.employee_age);
					$("#emp_salary").text(employeeData.employee_salary);
					$("#records").show();		 
				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}   	
			} 
		});
 	}) 
});

</script>

</head>
<body>
<form>
<div class="container">
<h1 align="center">Dynamic Selection Box</h1><br/>
	<div class="select-boxes">
	<?php
	include('dbConfig.php');
	$query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
	$rowCount = $query->num_rows;
	?>
		<select name="subdivision" id="country" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">Select Your subdivision</option>
			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
				}
			}else{
				echo '<option value="">Country Not Available</option>';
			}
			?>
		</select>
		<select name="tehsil" id="tehsil" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">Select Your subdivision First</option>
		</select>
		<select name="village" id="village" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">Select Your subdivision First</option>
		</select>
		<select name="villagedetail" id="villagedetail" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">Select Your subdivision First</option>
		</select>
		
		
		
		
		<select id="village" name="city_name"  type="button" class="btn btn-primary btn-lg btn-block">
			<option value="" selected="selected">Select Employee Name</option>
<?php

$sql = "SELECT * FROM cities LIMIT 10";
$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
while( $rows = mysqli_fetch_assoc($resultset) ) { 
?>
<option value="<?php 
echo $rows["city_id"]; ?>"><?php echo $rows["city_name"]; ?></option>
<?php }	?>
		</select>
		
		
		
		
	</div>
	
	<div class="footer">
<form method="POST" action="">
				<div class="form-inline">
					<label>city name:</label>
					
					<select class="form-control" name="city_name" id="village">
						
									<option value="" selected="selected">Select Employee Name</option>
<?php

$sql = "SELECT * FROM cities LIMIT 10";
$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
while( $rows = mysqli_fetch_assoc($resultset) ) { 
?>
<option value="<?php 
echo $rows["city_id"]; ?>"><?php echo $rows["city_name"]; ?></option>
<?php }	?>
						<option value="Honda">Honda</option>
						<option value="Kawasaki">Kawasaki</option>
					</select>
					<button class="btn btn-primary" name="filter">Filter</button>
					<button class="btn btn-success" name="reset">Reset</button>
				</div>
				<br></br>
			
<br></br>
				
			</form>
			<br /><br /><table class="table table-bordered">
				<thead class="alert-info">
					<th>Name</th>
					<th>Brand</th>
				</thead>
				<thead>
					<?php include'filter.php'?>
				</thead>
				</table>
</div>	


	<!-- <footer><a href="#"><p>Submit</p></a></footer>
	 -->
	
	
</div>
</form>
</body>
</html>