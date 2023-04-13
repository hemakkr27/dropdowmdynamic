<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dynamic Selection Box</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	
<!-- 	<link type="text/css" rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"> -->
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
                    $('#village').html('<option value="">Select Village </option>'); 
					 $('#villagedetail').html('<option value="">Select Village </option>'); 
					 	console.log(data);	
                }
            }); 
        }else{
            $('#tehsil').html('<option value="">Select Country </option>');
            $('#village').html('<option value="">Select State </option>'); 
			 $('#villagedetail').html('<option value="">Select Village </option>'); 
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
					 $('#villagedetail').html('<option value="">Select Village </option>');
					 	console.log(data);	
                }
            }); 
        }else{
            $('#village').html('<option value="">Select Village</option>'); 
						 $('#villagedetail').html('<option value="">Select Villagedetail </option>'); 
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
						console.log(data);
                }
            }); 
        }else{
            $('#villagedetail').html('<option value="">Select State </option>'); 
        }
    });
	
	
	  $('#filter').on('load',function(){
	          var countryID = $(this).val();
	    var stateID = $(this).val();
        var cityID = $(this).val();
        if(filter_id){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'filter_id',
                success:function(html){
                    $('#filter_id').html(html);
					
                }
            }); 
        }else{
            $('#villagedetail').html('<option value="">Select State </option>'); 
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
  
    @media (max-width: 768px) {
  .my_select-boxes li {
    float: none !important;
   
}
.mysearch {
    text-align: center;
    width: auto;
}

form#myForm ul {
    display: inline !important;
}

.mycontainer {
    margin-top: -15px !important;
}
.newrow {
    margin-left: 15px !important;
    margin-right: 15px;
}

.my_select-boxes ul {
    padding: 10px;
}




button#filter {
    margin-top: -30px;
}
  }
  
  
h1.alert-info {
    margin-bottom: -10px;
}
  
ul{	list-style: none;}
.my_select-boxes li {
   float:left;
 
   padding-left:11px;
   padding-right:11px;
  
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
		   <!--  border-bottom: 2px solid #bbb; -->
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
xml_error_string.underline {
    text-decoration: underline;
}
#myid {
    margin-bottom: -10px;
}
.pad_10{padding-top:10px; padding-bottom-10px;}
.padright_10{padding-right:10px;}
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
.floatcls{float:left}
.floatright{float:right}

.new_tscls  {
  overflow-wrap: break-word;
}

.hide {
  display: none;
}

.mycontainer  {
    margin-top: 25px;
   margin-bottom: 25px;
}



.newrow {
    margin-left: 0px;
    margin-right: 15px;
}


form#myForm ul {
    display: inline-block;
}

.mysearch {
    text-align: center;
    width: 600px;
}

  </style>

 <div class="wrapper">
 
 
 
 
 
	<h2 align="center" class="">VIS Kurukshetra</h2>
	<h4 align="center" class="">(Village Information System)</h4>
	<div align="center" class=""><img class="site_logo" height="100" id="logo" src="https://cdn.s3waas.gov.in/s3248e844336797ec98478f85e7626de4a/uploads/2018/03/2018031581.jpg" alt="Logo"></div>	

<div class="">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="my_container" align="center">

	<div class="my_select-boxes">
	<?php
	include('dbConfig.php');
	$query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
	$rowCount = $query->num_rows;
	?>
	<form action="view1.php" method="post" enctype="multipart/form-data" id="myForm">
	<ul>
	
	
	
		 <li><h3>Select Sub-Division  </h3><select name="subdivision" id="country" type="button" class="btn btn-primary btn-lg btn-block" selected="selected">
			<option value="">Select Sub-Division</option>
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
		<li><h3>Select Tehsil  </h3><select name="tehsil" id="tehsil" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">Select Tehsil</option>
		</select></li>
		<li><h3>Select Village  </h3><select name="village" id="village" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">Select Village </option>
		</select></li>
	<!-- 	<li><select name="filter" id="filter_id" type="button" class="btn btn-primary btn-lg btn-block">
			<option value="">submit</option>
		</select></li> -->
		
		
	 <li>	<h3><br></h3><button class="btn btn-primary mybtncls" value="submit"  type="submit" id="filter" name="filter">Submit</button></li> 

		  

	
			</ul>

	
		</form>
		
	</div>
		<div class="newrow">



<div class="mysearch">
<div class="mycontainer mt-5">
      
        <input type="text" class="form-control" name="live_search" id="live_search" autocomplete="off"
            placeholder="Search ...">
        <div id="search_result"></div>
    </div>




</div>



</div>


	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
			url:"searchmy.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
		$('#search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
		
			load_data(search);
		}
		else
		{
		
			load_data();
		}
		});
	});
	</script>

<!-- HERE CODE ADD  -->




</div>

		</div>
		</div>







	
	<p><tr><div align="center" class=""><img src="https://kurukshetra.gov.in/wp-content/themes/district-theme-11/images/nicLogo.png" alt="National Informatics Centre opens a new window"></div> </tr></p>
	


	
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'ajax-live-search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            $("#live_search").focusout(function () {
                                $('#search_result').css('display', 'none');
                            });
                            $("#live_search").focusin(function () {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#search_result').css('display', 'none');
                }
            });
        });
    </script>


</body>
</html>


       
