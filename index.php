<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dynamic Selection Box</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	
	<link type="text/css" rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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



$( document ).ready(function() {
    var heights = $(".panel").map(function() {
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);

    $(".panel").height(maxHeight);
});

</script>






</head>
<body>

  <style>
h1.alert-info {
    margin-bottom: -10px;
}
  
ul{	list-style: none;}
.my_select-boxes li {
   float:left;
 
   padding:11px;
  
}

.my_select-boxes {
    width: 100%;
    display: inline-block;
}
.myvillcenter {
    /* text-align: center; */
    background-color: #0099cc;
    padding-left: 48px;
    padding-bottom: 10px;
    padding-top: 10px;
	    color: #fff;
}

#myboxid {
    border-right: 2px solid #bbb;
	    margin-bottom: 0px;
		    border-bottom: 2px solid #bbb;
}

li p.halfspace {
    float: left;
    width: 50%;
}
label.mymapspac p
{
    overflow:hidden;
    white-space:nowrap;
    text-overflow:ellipsis;
}
.hideOverflow
{
    overflow:hidden;
    white-space:nowrap;
    text-overflow:ellipsis;
    width:100%;
    display:block;
}
div#myboxid ul {
    margin: 0 auto;
   
    margin: 20px;
}
.myboxborder {
    margin: 0 auto;
    border: 1px solid;
    margin: 20px;
}
.w_200{width: 200px;}
.float_left.w_200 {
    float: left;
}
.float_right.w_200 {
    float: right;
}
div#myboxid {
    background: #ffff99;
}
.float-left li {
    float: left;
    padding: 20px;
}
.center {
    text-align: center;
    display: block;
}
#myboxid a {
    text-decoration: underline;
}
label.floatright {
    float: right;
    padding-right: 20px;
    padding-top: 20px;
}
.floatright li {
    float: right;
}
.pdcls10{padding:10px;}

th.bg-dark-success {
    background-color: #8ed27d;
	font-weight: bold;
    font-size: 24px;
    font-style: italic;
}
.bg-success-light {
    background-color: #ccff99;
}
.bold{fontsize:22px;
font-weight:bold;}
.my {
    margin: 30px;

}
.bgyello {
    background-color: #ffff99;
    border: 2px solid #bbb;
 
    margin-left: 0px;
    margin-right: 0px;
}
.underline {
    text-decoration: underline;
}
#myid {
    margin-bottom: -10px;
}
.pad_10{padding-top:10px; padding-bottom-10px;}
tr.bg-success.text-white {
    background: #f0ffe1;
}
table.table.table-responsive.table-bordered.myallbox tr th {
    border: 0px;
}
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 0px solid #ddd;
}
td.bg-dark-success.center {
    background: #5ebb00;
}
.displinli {
    display: inline-block;
}
.colwhite{    color: white;}
.restcolr{background: #ff9933;}
.pinkcolr{background: #ff99ff;}
.lightorangcolr{background: #ffe79b;}
.lightgreecol{background:#ccff66}
.extracol{background:#ccff99}
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
	<form action="" method="post">
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
		
		
		<li>	<button class="btn btn-primary" type="submit" name="filter">search</button></li>

		

	
			</ul>

	
		</form>
		
	</div>
	
	
	<div class="my">
	
		<table class="table table-responsive table-bordered myallbox">
				<thead class="alert-info">
				
				
				<p><tr><h1 align="center" class="alert-info">All Details Show</h1> </tr></p>
					<!-- <th>NVCODE</th>
					<th>PCODE</th>
					<th>VILLAGENAME</th>
					<th>GRAMPANCHAYAT</th>
					<th>GMAP</th>
					<th>LOCATION</th> -->
				</thead>
				
		

				<tbody class="alert-info mytableboxbody">
				

				
					<?php 	
					

			if(isset($_POST['filter']))
			
			
				{				
				
				
    
    if(!empty($_POST['village'])) {
        $selected = $_POST['village'];
        //echo 'You have chosen: ' . $selected;
    

						$village =$_REQUEST['village'];
					
				
					
					$query=mysqli_query($db, "SELECT * FROM `village_master` WHERE NVCODE =$village") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
		
		?>
		
		<div class="" id="myid">
		<h1 class="myvillcenter"><?php	echo $fetch['VILLAGENAME'] ?></h1>
		
		

		
		
		</div>
							
							

		 <div class="row bgyello">
		
		 <div class="col-md-3 panel" id="myboxid">
		 <ul class="myboxborder">
		<li> <p><a href="#" target="_blank">SARPANCH</a></p></li>
		<li> <p>GRAM SACHIV</p></li>
		 <li><p>J.E.</p></li>
		 <li><p class="float_left w_200">PATWARI</p>
		  <p class="float_right">PATWARI</p></li>
		 </ul>
		 
<!--   srno: <label><?php //echo $fetch['srno'];?></label> -->
  
  </div>
  <div class="col-md-3 panel" id="myboxid">
 <a href="#" class="center">Google Map:  </a><span class="hideOverflow"><a href="'. $fetch['GMAP'] .'" target="_blank"><?php echo $fetch['GMAP'];?></a></span></div>
  
  <div class="col-md-3 panel" id="myboxid"> 
    <label class="center">HOW TO REACHForm H.Q.<?php echo $fetch['PCODE'];?></label>
	 <ul class="float-left">
		
		<li> DISTRICT</li>
	
		 <li>SUB DIVISION</li>
		 <li>TEHSIL</li>
	
		 </ul>
	
	</div>
	
	  <div class="col-md-3 panel" id="myboxid"> 
	  <div class="row">
	  <div class="col-md-12">
    <label class="floatright"><a href="#" >TSC</a></label></div>
		  <div class="col-md-12">
	<ul class="floatright">
	<li><img src="css/images/vis.003.png" class="floatright pdcls10"></li>
	<li><img src="css/images/vis.003.png" class="floatright pdcls10"></li>
	</ul>
	</div>
	</div>
	
</div>
	</div>
				
<div class="mytextcls">
<div class="row pad_10">
	
	  <div class="col-md-1 ">
    <label class="underline"><a href="#" >Jamabandi</a></label>
	</div>
		  <div class="col-md-1">
	
	  <label class="underline"><a href="#" >Collector Rate</a></label>
</div>
	  <div class="col-md-10">
	 <label class="">Surrounding Villages: </label>
	pipli, Bir Pipli, Ratgal Sector:7, kheri Markanda.
</div>
</div>
</div>
	
		<form>
			<tbody>
			<th colspan="2" class="bg-dark-success"> Village information</th>
			<th colspan="2" class="bg-dark-success"> Statistical Information</th>
			<th class="bg-dark-success"> Accessibilities</th>
			<th colspan="2" class="bg-dark-success"> Cattles</th>
                  <tr class="bg-success-light text-white">
                    <th scope="row">DISTRICT</th>
                    <td>Ambala</td>
                    <td ><span class="bold">Total Area</span> <br>
					Acre Karnal Marle<br> (Hectare)</td>
                    <td><?php echo $fetch['SAREA'];?></td>
                    <td> <i class="fa fa-train" aria-hidden="true"></i> Railway Station</td>
                    <td> <i class="fa fa-twitter" aria-hidden="true"></i>Buffalos</td>
                    <td>313</td>
                   
                  </tr>
				  
                  <tr class="bg-success text-white">
                    <th scope="row">SUBDIVISION</th>
                    <td><?php echo $fetch['TEHSIL'];?></td>
                     <td ><span>Cultivable</span> <br>
					Acre Karnal Marle<br> (Hectare)</td>
                    <td></td>
                    <td> <i class="fa fa-bus" aria-hidden="true"></i> Bus Stand</i></td>
                    <td> <i class="fa fa-twitter" aria-hidden="true"></i> Cow</i></td>
					 <td>13</td>
                  </tr>
                  <tr class="bg-success-light text-white">
                    <th scope="row">TEHSIL</th>
                    <td><?php echo $fetch['TEHSIL'];?></td>
                                        <td ><span>Non-Cultivable</span> <br>
					Acre Karnal Marle<br> (Hectare)</td>
                   
                    <td>400-4-7<br>(162.09)</td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i> Police<br>Station</td>
					  <td></td>
                    <td></td>
                   
                  </tr>
                   <tr class="bg-success text-white">
                    <th scope="row">Sub Tehsil</th>
                    <td><?php echo $fetch['TEHSIL'];?></td>
                   <td> <i class="fa fa-bus" aria-hidden="true"></i><br> Population</i></td>
                    <td></td>

                    <td> <i class="fa fa-bus" aria-hidden="true"></i> Police <br> Post</td>
					  <td><i class="fa fa-bus" aria-hidden="true"></i> Dog</td>
                    <td>19</td>
                  </tr>
                
				   <tr class="bg-success-light text-white">
                    <th scope="row">kanungo Circle</th>
                    <td><?php echo $fetch['TEHSIL'];?> - 1</td>
                    <td>Male</td>
                    <td></td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i> Post Office</td>
					  <td><i class="fa fa-bus" aria-hidden="true"></i> Pigs</td>
                    <td>0</td>
                  </tr>
				   <tr class="bg-success text-white">
                    <th scope="row">Patwar Circle</th>
                    <td>Pipli</td>
                    <td>Female</td>
                    <td></td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i> Bank</td>
					    <td><i class="fa fa-bus" aria-hidden="true"></i> Chamels</td>
                    <td>0</td>
                  </tr>
                 <tr class="bg-success-light text-white">
                    <th scope="row">Block</th>
                    <td><?php echo $fetch['TEHSIL'];?></td>
                    <td></td>
					 <td></td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i>ATM</td>
                   
					   <td><i class="fa fa-bus" aria-hidden="true"></i> Rabbits</td>
                    <td>0</td>
                  </tr>
				   <tr class="bg-success text-white">
                    <th scope="row">Gram <br> Panchayat</th>
                    <td>Devidapura</td>
                    <td></td>
					<td></td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i> MANDI</td>
                    
					   <td><i class="fa fa-bus" aria-hidden="true"></i> Donkeis</td>
                    <td>0</td>
                  </tr>
                 <tr class="bg-success-light text-white">
                    <th scope="row">Parliament <br> Consitituency</th>
                    <td>Kurukshetra</td>
                    <td></td>
                    <td></td>
					 <td></td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i> Mules</td>
                    <td>0</td>
                  </tr> <tr class="bg-success text-white">
                    <th scope="row">Assembly <br> Consitituency</th>
                    <td></td>
                     <td><i class="fa fa-bus" aria-hidden="true"></i> Voters</td>
                    <td></td>
					 <td></td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i> Hores</td>
                    <td>1</td>
                  </tr>
                 <tr class="bg-success-light text-white">
                    <th scope="row">Vaterinary <br> Hospital</th>
                    <td></td>
                      <td> <i class="fa fa-bus" aria-hidden="true"></i><br>Panchayatghar</td>
					   
					 <td></td>
					 <td class="lightorangcolr"></td>
                     <td><i class="fa fa-bus" aria-hidden="true"></i> Goats</td>
                    <td>0</td>
                  </tr> <tr class="bg-success text-white">
                    <th scope="row">Health Sub-center</th>
                    <td>Ratgal</td>
                    <td> <i class="fa fa-bus" aria-hidden="true"></i>AWCs</td>
                    <td>3</td>
                     <td colspan="2" class="center lightgreecol" ><a href="#" target="_blank" class="underline">Public Health</a></td>
					 <td><i class="fa fa-bus" aria-hidden="true"></i> Sheepes</td>
                    <td>0</td>
                  </tr>
                 <tr class="bg-success-light text-white">
                    <th scope="row">PHC</th>
                    <td>Pipli</td>
                     <td> <i class="fa fa-bus" aria-hidden="true"></i>Talab</td>
                    <td></td>
                        <td colspan="2"  class="center pinkcolr"><a href="#" target="_blank" class="underline">Voters List</a></td>
					  <td></td>
                    <td></td>
                  </tr> <tr class="bg-success text-white">
                    <th scope="row">CHC</th>
                    <td>Mathana</td>
                   <td> <i class="fa fa-bus" aria-hidden="true"></i>Stadium</td>
                    <td></td>
                        <td colspan="2" class="center restcolr"><a href="#" target="_blank" class="underline">Pensioners List</a></td>
					  <td></td>
                    <td></td>
                  </tr>
                 <tr class="bg-success-light text-white">
                    <th scope="row">Hospital</th>
                    <td></td>
  <td> <i class="fa fa-bus" aria-hidden="true"></i>Chaupals</td>
                    <td>0</td>
                    <td colspan="2"  class="bg-dark-success center colwhite"> INDIRA GANDHI<br>AWAAS YOJANA</td>
					  <td></td>
                   <td></td>
                  </tr> 
				  <tr class="bg-success text-white">
                    <th scope="row">Elect. Sub-center</th>
                    <td>66KV PIPLI</td>
                     <td> <i class="fa fa-bus" aria-hidden="true"></i>Primary<br> School</td>
                    <td>1</td>
                                        <td colspan="1" >
										<span class="displinli">Chief Minister BPL<br> Awaas Yojana</span>
					 <span class="displinli"> <a href="#" target="_blank" class="underline">2010-11	</a>  <a href="#" target="_blank"class="underline">  2011-<br>12</a>  <a href="#" target="_blank"class="underline">  2011-12</a>
					 </span>
					 </td>
 <td class="extracol"></td>
  <td class="extracol"></td>
                  </tr>
                 <tr class="bg-success-light text-white">
                    <th scope="row">Elect. Complaint-center</th>
                    <td>Pipli</td>
                  <td> <i class="fa fa-bus" aria-hidden="true"></i>Middle<br> School</td>
                    <td>0</td>
                                         <td colspan="1" class=""><span class="displinli">IAY Incentive-<br>Homestead Scheme</span>
					  <span class="displinli"><a href="#" target="_blank" class="underline">2010-11	</a>  <a href="#" target="_blank"class="underline">  2011-<br>12</a>  <a href="#" target="_blank"class="underline">  2011-12</a>
					  </span>
					  </td>
                   <td class="extracol"></td>
				    <td class="extracol"></td>
                  </tr> 
				  <tr class="bg-success text-white">
                    <th scope="row">Elect. Sub-Division</th>
                    <td>Pipli</td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i> Secondary<br>School</td>
                    <td>1</td>
                    <td colspan="1" class=""><span class="displinli">Non-Cultivable</span>
					 <span class="displinli"><a href="#" target="_blank" class="underline pdcls10">2010-11</a>  
					 <a href="#" target="_blank"class="underline ">  2011-<br>12</a>  
					 <a href="#" target="_blank"class="underline ">  2011-12</a>
					 </span>
					 </td>
                    <td class="extracol"></td>
                    <td class="extracol"></td>
					
                  </tr>
				   <tr class="bg-success-light text-white">
                    <th scope="row">Elect. SDO</th>
                    <td>Kulwant<br>Singh, 230241,<br>9315609792</td>
                    <td><i class="fa fa-bus" aria-hidden="true"></i> Sr.Sec.<br>School</td>
                    <td>0</td>
                    <td></td>
					  <td></td>
                   <td></td>
                  </tr>
                
                </tbody>
	
  
</form>
		
		<?php
		

		
		//echo"<tr><th>srno</th> <td>".$fetch['srno']."</td></tr>";
		//echo"<tr><th>NVCODE</th> <td>".$fetch['NVCODE']."</td></tr>";
		//echo"<tr><th>PCODE</th> <td>".$fetch['PCODE']."</td></tr>";
		//echo"<tr><th>VILLAGENAME</th> <td>".$fetch['VILLAGENAME']."</td></tr>";
		//echo"<tr><th>GRAMPANCHAYAT</th> <td>".$fetch['GRAMPANCHAYAT']."</td></tr>";
				 
		//echo"<tr><th>GMAP</th> <td>".$fetch['GMAP']."</td></tr>";
		//echo"<tr><th>GMAP</th> <td>".'<a href="'. $fetch['GMAP'] .'" class="mr-3" title="View Record" data-toggle="tooltip" target="_blank"> <span class="">'. $fetch['GMAP'] .'</span></a>'."</td></tr>";
				//echo"<tr><th>LOCATION</th> <td>".$fetch['LOCATION']."</td></tr>";

		
		
			//echo"<tr>
			//<td>".$fetch['SRNO']."</td>
			//<td>".$fetch['NVCODE']."</td>
			//<td>".$fetch['PCODE']."</td>
			//<td>".$fetch['VILLAGENAME']."</td>
			//<td>".$fetch['GRAMPANCHAYAT']."</td>
			//<td>".$fetch['GMAP']."</td>
			
		  // <td>".'<a href="getEmployee.php?id='. $fetch['LOCATION'] .'" class="mr-3" title="View Record" data-toggle="tooltip"> <span class="">'. $fetch['NVCODE'] .'</span></a>'."</td>
			
			//</tr>";
			
			
		//	ALTER TABLE village_master  ADD OX varchar(50) NULL    AFTER BUFFALOS,  ADD COWS varchar(50) NULL    AFTER OX;
			
			
			}}
			
			
		}
		
		
		
		
		
		
		?>
				</tbody>
				</table>
				
			
				
				


	<!-- <footer>
	https://www.positronx.io/how-to-get-selected-values-from-select-option-in-php/
	
	https://stackoverflow.com/questions/24257490/how-to-display-selected-item-at-drop-down-list
	imp
	https://www.youtube.com/watch?v=umb3XZpVMiU
	<a href="#"><p>Submit</p></a></footer> -->
	
	
	
	

</div>
</div>





</body>
</html>


       
