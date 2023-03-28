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






</head>
<body>

  <style>

  
ul{	list-style: none;}
.my_select-boxes li {
   float:left;
 
   padding:11px;
  
}
  
  </style>

 <div class="wrapper">

<div class="my_container">
<h1 align="center">Dynamic Selection Box</h1><br/>
	<div class="my_select-boxes">
	<?php
	include('dbConfig.php');
	$query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
	$rowCount = $query->num_rows;
	?>
	<ul>
		<li><select name="subdivision" id="country" type="button" class="btn btn-primary btn-lg btn-block">
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
		</select></li>
		<li><select name="tehsil" id="tehsil" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">Select Your subdivision First</option>
		</select></li>
		<li><select name="village" id="village" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">Select Your subdivision First</option>
		</select></li>
		
		
		
		
		<li><select name="villagedetail" id="villagedetail" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="" selected="selected">Select Your subdivision First</option>
			
		</select></li>
		

	
			</ul>
	
		
		
	</div>
	
	


	<!-- <footer><a href="#"><p>Submit</p></a></footer> -->
	
	
	
	

	
	
	
	
	<div class="wrapper">
        <div class="">
		
		<!-- ajax code     start -->
		     <div class="row">
			 	<div class="col-md-12 ">
					
	<table id="main" border="0" cellspacing="0">

<tr>
<td id="header">
<hl>Load Records using Select Box 
with PHP & Ajax</h1>
</td>
</tr>
<tr>
<td id="table-form">
<form>
Select City : <select id="villagedetail">
<option value="">Select City</option>
</select>


</form>
</td>

</tr>

<tr>
<td id="table-data">

</td>
</tr>
	</table>
				</div>
			 
			 </div>
			 
			 <!-- ajax code        end-->
		
            <div class="row">
               
				  	<div class="col-md-6 ">
		<!-- <h3 class="text-primary">PHP - Drop Down Filter Selection</h3> -->
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="POST" action="">
				<div class="form-inline">
					<label>SELECT District:</label>
					<select class="form-control" name="category">
						<option  name="category" value="Thanesar">Thanesar</option>
						<option  name="category" value="Shahbad">Shahbad</option>
						<option  name="category" value="Kawasaki">Kawasaki</option>
					</select>
					<button class="btn btn-primary" name="filter">Filter</button>
					<button class="btn btn-success" name="reset">Reset</button>
				</div>
				<br></br>
				
				
				
				
			

			</form>
			<br /><br />
			<table class="table table-bordered">
				<thead class="alert-info">
					<th>District</th>
					<th>Sub division</th>
					<th>Tehsil</th>
					<th>Village</th>
					<th>NVcode</th>
				</thead>
				<thead>
					<?php include'filter.php'?>
				</thead>
				</table>
					<br /><br />
				
			
		</div>
	</div>
	
	
	  	<div class="col-md-6 ">


<form action="" method="post">
    <select name="Fruit">
        <option value="" disabled selected>Choose option</option>
        <option value="Apple">Apple</option>
        <option value="Banana">Banana</option>
        <option value="Coconut">Coconut</option>
        <option value="Blueberry">Blueberry</option>
        <option value="Strawberry">Strawberry</option>
    </select>
    <input type="submit" name="submit" vlaue="Choose options">
</form>


<?php
    if(isset($_POST['submit'])){
    if(!empty($_POST['Fruit'])) {
        $selected = $_POST['Fruit'];
        echo 'You have chosen: ' . $selected;
    } else {
        echo 'Please select the value.';
    }
    }
?>

            </div>        
            </div>        
        </div>
    </div>
	
</div>


</div>



<script>
$(document).ready (function(){
$.ajax({
url : "load-city.php",
type : "POST",
dataType : "JSON",
success : function(data){
$.each(data, function(key, value){
$("#villagedetail").append("<option>" + value.product_name + "</options>");
});

}
});
});



//https://www.youtube.com/watch?v=S8M7V5mdSdI&t=605s
</script>
</body>
</html>