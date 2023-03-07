<?php

	include('../../session.php');

			if(strval($login_level) == '4' || strval($login_level) == '5' || strval($login_level) == '6' || strval($login_level) == '7'){
		$url = '../../404_page_error/error.html'; 

		header( "Location: $url" );
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- fancyTable Js -->
<script src="../../src/fancyTable.js"></script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


<!-- Styles.css -->
<link rel="stylesheet" href="../styles.css">

<link rel="stylesheet" href="nav.css">


</head>
<body style="background-image: url('../../img/background.jpg');">

   

    <div class="container" style="position: relative; width: 48%; margin-left: 5%;">
        <div class="topnav">
          <a href="#home">Welcome, <?php echo $login_session; ?></a>
          <a href="#"><?php echo $position; ?></a>
          <a href="#"><?php echo "Hotel: ".$_SESSION['h_name']; ?></a>
          <a href = "../welcome_owr.php">Back</a>      
          <a href = "../../logout.php">Sign Out</a>
        </div>
      </div>




		    		        <?php 
		        $a=15; 

		        $servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "hotel_db";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT room_type.type, room_type.cap, room_type.extra_bds_ppr, room_type.chldr_ppr FROM room_type JOIN hotels_info ON room_type.h_id = hotels_info.id WHERE hotels_info.name = '".$_SESSION['h_name']."';";
				$result = $conn->query($sql);


				$r_types = array();
				$count = 0;
				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {

				    		$type = $row['type'];
				    		$r_cap = $row['cap'];
				    		$r_extra_bds_ppr = $row['extra_bds_ppr'];
				    		$r_cap = $row['chldr_ppr'];
		                    //echo $the_elem;		    
		                    array_push($r_types, $type, $r_cap, $r_extra_bds_ppr, $r_cap);

				  }
				} else {
				  echo "0 results";
				}

				// Room Table


				$sql_rm = "SELECT * FROM rooms JOIN room_type ON rooms.type_id = room_type.id JOIN hotels_info ON rooms.hot_id = hotels_info.id WHERE hotels_info.name = '".$_SESSION['h_name']."' ;";
				$result_rm = $conn->query($sql_rm);


				$r_info = array();
				$count = 0;
				if ($result_rm->num_rows > 0) {
				  // output data of each row
				  while($row = $result_rm->fetch_assoc()) {

				    		$num = $row['num'];
				    		$type = $row['type'];
				    		$price = $row['price'];
				    		$availability = $row['free'];
				    		$extr_beds_cps = $row['extr_beds_cps'];
				    		$chldr_cps = $row['chldr_cps'];
		                    //echo $the_elem;		    
		                    array_push($r_info, $num, $type, $price, $availability, $extr_beds_cps, $chldr_cps);

				  }
				} else {
				  echo "0 results";
				}



				
				$sql_s = "SELECT * FROM services JOIN hotels_info ON services.hotel_id = hotels_info.id WHERE hotels_info.name = '". $_SESSION['h_name']."' ;";
				$result_s = $conn->query($sql_s);
				$s_info = array();
				$count = 0;
				if ($result_s->num_rows > 0) {
				  // output data of each row
				  while($row = $result_s->fetch_assoc()) {

				    		$ser = $row['service'];
				    		$pr = $row['price'];				    		
		                    //echo $the_elem;		    
		                    array_push($s_info, $ser, $pr);

				  }
				} else {
				  echo "0 results";
				}





				$conn->close();

        ?>




		<div class="body-content" style="padding-left: 5%; padding-top: 3%;">

		<div style="width: 100%; position: relative;">
			<div style="width: 20%; position: relative; float: left;">
										<div class="div-form" style="width: 100%;">
						  <form action="h_cap_data.php" method="POST">
						  	<h5 style="padding-bottom: 7%;">Create Room Types</h5>

						  	
						  	<label id="r_type_lbl" for="r_type">New Room Type <i class="fas fa-door-open"></i></label>
						    <input type="text" id="r_type" name="r_type" required="">

						    <label id="hmp_type_lbl" for="hmp_type">How Many People? <i class="fas fa-users"></i></label>
						    <input type="text" id="hmp_type" name="hmp_type" required="" onkeypress="if(this.value.length<1){return event.charCode >= 49 && event.charCode <= 57;}else{return event.charCode >= 48 && event.charCode <= 57;}" pattern="[1-9]{1}[0-9]*" minlength="1" maxlength="2">

						    <label id="ebpp_type_lbl" for="ebpp_type">Extra Beds % Of Price <i class="fas fa-bed"></i></label>
						    <input type="text" id="ebpp_type" name="ebpp_type" required="" onkeypress="if(this.value.length==0){return event.charCode >= 48 && event.charCode <= 57;}else if(this.value.length==1 && parseInt(this.value)==0){return false;}else if(this.value.length==1 && parseInt(this.value)!=0){return event.charCode >= 48 && event.charCode <= 57;}else if(this.value.length==2 && parseInt(this.value)!=10){return false;}else if(this.value.length==2 && parseInt(this.value)==10){return event.charCode == 48}else{return event.charCode >= 48 && event.charCode <= 57;}" pattern="[1-9]{1}[0-9]*" minlength="1" maxlength="3">

						    <label id="chpp_type_lbl" for="chpp_type">Children % Of Price <i class="fas fa-child"></i></label>
						    <input type="text" id="chpp_type" name="chpp_type" required="" onkeypress="if(this.value.length==0){return event.charCode >= 48 && event.charCode <= 57;}else if(this.value.length==1 && parseInt(this.value)==0){return false;}else if(this.value.length==1 && parseInt(this.value)!=0){return event.charCode >= 48 && event.charCode <= 57;}else if(this.value.length==2 && parseInt(this.value)!=10){return false;}else if(this.value.length==2 && parseInt(this.value)==10){return event.charCode == 48}else{return event.charCode >= 48 && event.charCode <= 57;}" pattern="[1-9]{1}[0-9]*" minlength="1" maxlength="3">

						    <script type="text/javascript">
						    	
						    </script>
						  	
						  
						    <input type="submit" value="Create Room Type" id="sbt-crt" name="sbt-btn-crt"> 
						  </form>
						</div>	
				
			</div>
			<div style="width: 53%; position: relative; float: left; padding-left: 1%; padding-right: 1%;">
										<div class="div-form" style="width: 100%; ">
								  	<table id="sampleTable" class="table table-striped sampleTable" style="color: black;">
								<thead>
									<tr>
									<th id="first" >Room Type <i class="fas fa-door-open"></i></th>
									<th>Capacity <i class="fas fa-users"></i></th>
									<th>Extra Beds % of <i class="fas fa-comment-dollar"></i></th>
									<th>Children % of <i class="fas fa-comment-dollar"></i></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
						<form style="padding-top: 1%;" action="h_cap_data.php" method="POST">
							<button style="width: 50%; margin-left: 25%;" type="submit" class="btn btn-danger" id="sbt-drt" name="sbt-btn-drt" >Delete Room Type</button>
						</form>
						
					<!--	<input type="submit" value="Delete Room Type" id="sbt-drt" name="sbt-btn-drt" style="background-color: #C41E3A;">   -->
				
			</div>
			<div style="width: 27%; position: relative; float: right; padding-right: 5%; padding-bottom: 5%;">
				<div class="div-form" style="width: 100%;">
						  <form action="h_cap_data.php" method="POST">
						  	<h5 style="padding-bottom: 7%;">Update Room Types</h5>

						<!--
						  	<label id="u_type_tlbl" for="u_type_t">Update Room Types</label>
						    <input type="text" id="u_type_t" name="u_type_t" disabled="true">
						-->
						  	
						  	<label id="u_type_lbl" for="u_type">Update Room Types <i class="fas fa-door-open"></i> </label>
						    <input type="text" id="u_type" name="u_type">
			    
						<!--
						    <label id="u_num_ppl_tlbl" for="u_num_ppl_t">Update Num. of People</label>
						    <input type="text" id="u_num_ppl_t" name="u_num_ppl_t" disabled="true">						   
						-->  	
						   

						  	<label id="u_num_ppl_lbl" for="u_num_ppl">Update Num. of People <i class="fas fa-users"></i></label>
						    <input type="text" id="u_num_ppl" name="u_num_ppl" required="" onkeypress="if(this.value.length<1){return event.charCode >= 49 && event.charCode <= 57;}else{return event.charCode >= 48 && event.charCode <= 57;}" pattern="[1-9]{1}[0-9]*" minlength="1" maxlength="2">

						<!--
						    <label id="u_bds_ppr_tlbl" for="u_bds_ppr_t">Update Extra Beds % of Price</label>
						    <input type="text" id="u_bds_ppr_t" name="u_bds_ppr_t" disabled="true">
						 --> 	
						  	<label id="u_bds_ppr_lbl" for="u_bds_ppr">Update Extra Beds % of Price <i class="fas fa-bed"></i></label>
						    <input type="text" id="u_bds_ppr" name="u_bds_ppr" required="" onkeypress="if(this.value.length==0){return event.charCode >= 48 && event.charCode <= 57;}else if(this.value.length==1 && parseInt(this.value)==0){return false;}else if(this.value.length==1 && parseInt(this.value)!=0){return event.charCode >= 48 && event.charCode <= 57;}else if(this.value.length==2 && parseInt(this.value)!=10){return false;}else if(this.value.length==2 && parseInt(this.value)==10){return event.charCode == 48}else{return event.charCode >= 48 && event.charCode <= 57;}" pattern="[1-9]{1}[0-9]*" minlength="1" maxlength="3">

						<!--
						    <label id="u_chr_ppr_t_tlbl" for="u_chr_ppr_t">Update Children % of Price</label>
						    <input type="text" id="u_chr_ppr_t" name="u_chr_ppr_t" disabled="true">
						-->
						  	<label id="u_chr_ppr_lbl" for="u_chr_ppr">Update Children % of Price <i class="fas fa-child"></i></label>
						    <input type="text" id="u_chr_ppr" name="u_chr_ppr" required="" onkeypress="if(this.value.length==0){return event.charCode >= 48 && event.charCode <= 57;}else if(this.value.length==1 && parseInt(this.value)==0){return false;}else if(this.value.length==1 && parseInt(this.value)!=0){return event.charCode >= 48 && event.charCode <= 57;}else if(this.value.length==2 && parseInt(this.value)!=10){return false;}else if(this.value.length==2 && parseInt(this.value)==10){return event.charCode == 48}else{return event.charCode >= 48 && event.charCode <= 57;}" pattern="[1-9]{1}[0-9]*" minlength="1" maxlength="3">
						  	
						  	
						  
						    <input type="submit" style="background-color:#ff5733;" value="Update Room Type" id="sbt-urt" name="sbt-btn-urt"> 
						    
						  </form>

						</div>

				
			</div>
		</div>	




		<div style="width: 100%; position: relative; margin-top: 42%; padding-top: 5%;">
			<div class="div-form" style="width: 20%; float: left; position: relative; margin-top: 5%; ">
																

						  <form action="h_cap_data.php" method="POST">						  	
						  	<h5 style="padding-bottom: 7%;">Create Rooms</h5>

						  	
						  	<label for="rm_type">Type <i class="fas fa-door-open"></i></label>

						  	  <select name="lelev_cr_del" id="rm_type" onchange="changeLvl()">
							   <!-- <option value=''>--Choose--</option>  -->
							    
							    <?php
							    	$counter = 4;
							    	foreach ($r_types as $value) {
							    		if($counter % 4 == 0){
							    			echo '<option value="'.$value.'">'.$value.'</option>';
							    		}
									  $counter++;
									}
							     ?>
							  </select>
						   				  								  
						    <label for="nhotel">Room Number <i class="fas fa-sort-numeric-down"></i></label>
						    <input type="text" id="nhotel" name="hot_rm_n" value="" required="">
						    
						    <label for="price">Price <i class="fas fa-comment-dollar"></i></label><br>
						    <input type="text" id="price" name="price">

						    <label for="extra_bds">Extra Beds Cap. <i class="fas fa-users"></i></label><br>
						    <input type="text" id="extra_bds" name="extra_bds">


						    <label for="children_cap">Children Cap. <i class="fas fa-child"></i></label><br>
						    <input type="text" id="children_cap" name="children_cap">




						    <label for="available">Available? <i class="fas fa-lock-open"></i></label><br>
						    <select id="available" name="available">
						    	<option value="yes">yes</option>
						    	<option value="no">no</option>
						    </select>
						  
						    <input type="submit" value="Create Room" id="sbt-btn-cr" name="sbt-btn-cr"> 
						    <input type="submit" value="Update Room" id="sbt-btn-ur" name="sbt-btn-ur" style="background-color:#ff5733;">
						    <input type="submit" value="Delete Room" id="sbt-btn-dr" name="sbt-btn-dr" style="background-color:#C41E3A;">
						  </form>

	
			</div>

			<div class="div-form" style="width: 74%; position: relative; float: right; padding-left: 1%; margin-right: 5%; margin-top: 5%;">
						
								  	<table id="sampleTable_1" class="table table-striped sampleTable" style="color: black;">
								<thead>
									<tr>
									<th id="second">Number <i class="fas fa-sort-numeric-down"></i></th>
									<th>Room Type <i class="fas fa-door-open"></i></th>
									<th>Price <i class="fas fa-comment-dollar"></i></th>
									<th>Availability <i class="fas fa-lock-open"></i></th> 
									<th>Extra Beds Cap. <i class="fas fa-users"></i></th>
									<th>Children Cap. <i class="fas fa-child"></i></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						
			</div>


			

		</div>



		<div style="width: 100%; position: relative;">
			<div style="width: 20%; position: relative; float: left;">
			</div>

			<div style="width: 53%; position: relative; float: left; padding-left: 1%; padding-right: 1%;">
			</div>


			<div style="width: 27%; position: relative; float: right; padding-right: 5%; padding-bottom: 5%;">
			</div>

		</div>


		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view" style="width: 33%; float: left;">
		    			    	<div style="width: 86%;">
	



						

				    				    	

		    	</div>


		    </div>
		    <div class="right-view" style="width: 66%; float: right; padding-right: 5%;">		    			   						



															    		    	

		    </div>
		   </div>
		  </div>
		   </div>

		   <!-- Extras -->

		<div class="body-content" style="padding-left: 5%; padding-top: 3%; padding-bottom: 3%;">
		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view" style="width: 38%; float: left;">
						<div class="div-form" style="width: 100%; position: relative; float: left;">
							<table id="sampleTable_2" class="table table-striped sampleTable" style="color: black;">
								<thead>
									<tr>
									<th id="third">Service <i class="fas fa-concierge-bell"></i></th>
									<th>Price <i class="fas fa-comment-dollar"></i></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>		    	

		    </div>
		    <div class="right-view" style="width: 60%; float: right; padding-right: 5%; position: relative;">
		    	<div style="width: 48%; position: relative; float: left;" class="div-form">
		    		<form action="h_cap_data.php" method="POST">						  	
						  	<h5 style="padding-bottom: 7%;">Create Services</h5>
						  	
						  	<label id="r_ser_lbl" for="r_serv_1">New Service <i class="fas fa-concierge-bell"></i></label>
						    <input type="text" id="r_serv_1" name="r_serv_1" required="">

						    <label id="r_ser_lbl2" for="r_serv_2">Price <i class="fas fa-comment-dollar"></i></label>
						    <input type="text" id="r_serv_2" name="r_serv_2" required="">
						  							  
						    <input type="submit" value="Create Service" id="sbt-cs" name="sbt-btn-cs"> 
						  </form>
		    	</div>
						<div style="width: 48%; position: relative; float: right;" class="div-form">
						  <form action="h_cap_data.php" method="POST">
						  	<h5 style="padding-bottom: 7%;">Update Services</h5>

						  	<label id="u_serv_lbl1" for="u_serv_1">Update Service <i class="fas fa-concierge-bell"></i></label>
						    <input type="text" id="u_serv_1" name="u_serv_1" disabled="true">
						  	
						  	<label id="u_serv_lbl2" for="u_serv_2">Update Price <i class="fas fa-comment-dollar"></i></label>
						    <input type="text" id="u_serv_2" name="u_serv_2" required="">
						  	
						  
						    <input type="submit" style="background-color:#ff5733;" value="Update Service" id="sbt-us" name="sbt-btn-us"> 
						    <input type="submit" value="Delete Service" id="sbt-ds" name="sbt-btn-ds" style="background-color: #C41E3A;"> 
						  </form>
						</div>		    	


		    </div>
		 </div>
		  </div>
		    </div>



			<script type="text/javascript">
			// Word genarator

			var arr_res_1 = <?php echo json_encode($r_types); ?>;
			var arr_res_num_1 = arr_res_1.length;

			var h_hotel = <?php echo json_encode($_SESSION['h_name']); ?>;



			$(document).ready(function() {
				var q =0;

				// Generate a big table
				for(var n=0;n<arr_res_num_1/4;n++){
					var row = $("<tr onclick='myFunction_0(this)'>");
					//var row_1 = $("<th>");
					$("#sampleTable").find("thead th[id=first]").each(function() {

						$("<td>",{
							html: String(arr_res_1[q]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_1[q+1]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_1[q+2]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_1[q+3]), 
							style:"padding:2px;"
						}).appendTo($(row));

						q = q+4;

					});
					row.appendTo($("#sampleTable").find("tbody"));


				}


				// And make them fancy
				$("#sampleTable").fancyTable({
					sortColumn:false,
					pagination: true,
					perPage:10,
					globalSearch:true
				});		
	
			});


			// --- Room Table
			var arr_res_2 = <?php echo json_encode($r_info); ?>;
			var arr_res_num_2 = arr_res_2.length;			

			$(document).ready(function() {

				// Generate a big table
				var value = 0;
				for(var n=0;n<(arr_res_num_2/6);n++){
					var row = $("<tr onclick='myFunction(this)'>");
					//var row_1 = $("<th>");
					$("#sampleTable_1").find("thead th[id=second]").each(function() {

						$("<td>",{
							html: String(arr_res_2[value]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_2[value+1]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_2[value+2]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_2[value+3]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_2[value+4]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_2[value+5]), 
							style:"padding:2px;"
						}).appendTo($(row));

						value = value + 6;

					});
					row.appendTo($("#sampleTable_1").find("tbody"));


				}


				// And make them fancy
				$("#sampleTable_1").fancyTable({
					sortColumn:false,
					pagination: true,
					perPage:10,
					globalSearch:true
				});		
	
			});


			//---- Services Table
			var arr_res_3 = <?php echo json_encode($s_info); ?>;
			var arr_res_num_3 = arr_res_3.length;			

			$(document).ready(function() {

				// Generate a big table
				var value_2 = 0;
				for(var n=0;n<(arr_res_num_3/2);n++){
					var row = $("<tr onclick='myFunction_2(this)'>");
					//var row_1 = $("<th>");
					$("#sampleTable_2").find("thead th[id=third]").each(function() {

						$("<td>",{
							html: String(arr_res_3[value_2]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_3[value_2+1]), 
							style:"padding:2px;"
						}).appendTo($(row));

						value_2 = value_2 + 2;

					});
					row.appendTo($("#sampleTable_2").find("tbody"));


				}


				// And make them fancy
				$("#sampleTable_2").fancyTable({
					sortColumn:false,
					pagination: true,
					perPage:7,
					globalSearch:true
				});		
	
			});


		


		</script>	

		<script type="text/javascript">

			function myFunction_0(x) {
			    //alert("Row index is: " + x.rowIndex);

			    var table = document.getElementById('sampleTable');

				var row = parseInt(x.rowIndex);

			    //alert(table.rows[row].cells[1].innerHTML);
			    
			    var room_tp = table.rows[row].cells[0].innerHTML;			    
			    var room_cap = table.rows[row].cells[1].innerHTML;
			    var room_ebd = table.rows[row].cells[2].innerHTML;
			    var room_chr = table.rows[row].cells[3].innerHTML;

			    //document.getElementById('u_type_t').value = room_tp;
			    document.getElementById('u_type').value = room_tp;
			    document.getElementById('u_num_ppl').value = room_cap;
			    document.getElementById('u_bds_ppr').value = room_ebd;
			    document.getElementById('u_chr_ppr').value = room_chr;

			    setCookie("old_type", room_tp, 3);
			    // setCookie("old_cap", room_cap, 3);
			    // setCookie("old_bds_ppr", room_ebd, 3);
			    // setCookie("old_chr_ppr", room_chr, 3);

			  }

			  function setCookie(cname, cvalue, exdays) {
				  const d = new Date();
				  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				  let expires = "expires="+d.toUTCString();
				  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				}


			  			function myFunction_2(x) {
			    //alert("Row index is: " + x.rowIndex);

			    var table = document.getElementById('sampleTable_2');

				var row = parseInt(x.rowIndex);

			    //alert(table.rows[row].cells[1].innerHTML);
			    
			    var serv_name = table.rows[row].cells[0].innerHTML;		
			    var price = table.rows[row].cells[1].innerHTML;	    

			    document.getElementById('u_serv_1').value = serv_name;
			    document.getElementById('u_serv_2').value = price;

			    setCookie("serv_old", serv_name, 3);

			  }

			  function setCookie(cname, cvalue, exdays) {
				  const d = new Date();
				  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				  let expires = "expires="+d.toUTCString();
				  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				}

			
			function myFunction(x) {
			      //alert("Row index is: " + x.rowIndex);
			      //arr_res_2[parseInt(x.rowIndex)-2]
			    var table = document.getElementById('sampleTable_1');

			     // alert(table.rows.length);                // number of rows
				//	alert(table.rows[2].cells.length);       // number of cells in row 3
				//alert(typeof String(x.rowIndex));
				var row = parseInt(x.rowIndex);

			    //alert(table.rows[row].cells[1].innerHTML);

			    var number = table.rows[row].cells[0].innerHTML;
			    var room_t = table.rows[row].cells[1].innerHTML;
			    var price = table.rows[row].cells[2].innerHTML;
			    var is_free = table.rows[row].cells[3].innerHTML;
			    var extr_bds_cp = table.rows[row].cells[4].innerHTML;
			    var chldr_cp = table.rows[row].cells[5].innerHTML;

			    document.getElementById('nhotel').value = number;
			    document.getElementById('price').value = price;

			    document.getElementById('rm_type').value= room_t;
			    document.getElementById('available').value= is_free;    

			    document.getElementById('extra_bds').value= extr_bds_cp;
			    document.getElementById('children_cap').value= chldr_cp;

			    setCookie('old_rnum', number, 3);


			  }

			


		</script>

		<script type="text/javascript">


		// disable adding a room type if it already exists
		document.getElementById("r_type").addEventListener("input", myFuncExist);

		function myFuncExist() {
		  //alert("The value of the input field was changed.");
		  //alert(String(document.getElementById('nhotel').value));
		  if(arr_res_1.includes(document.getElementById('r_type').value)){
		  	document.getElementById('r_type_lbl').innerHTML = "Exists";
		  	//alert("Nt OK");
		  	document.getElementById('sbt-crt').hidden = true;
		  }else{
		  	document.getElementById('sbt-crt').hidden = false;
		  }
		  
		}

		// disable updating a room type if nothing changed
		document.getElementById("u_type").addEventListener("input", myFuncExist1);

		function myFuncExist1() {
		  var update_t = document.getElementById('u_type_t').value;
		  var update_new = document.getElementById('u_type').value;
		  
		  if(update_t === ""){
		  	document.getElementById('sbt-urt').hidden = true;
		  }else if(update_new === update_t){
		  	document.getElementById('sbt-urt').hidden = true;
		  }else if(arr_res_1.includes(update_new)){
		  	document.getElementById('sbt-urt').hidden = true;
		  }else{
		  	document.getElementById('sbt-urt').hidden = false;
		  }
		  			  
		}


		document.getElementById("nhotel").addEventListener("input", myFuncExist2);

		function myFuncExist2() {
		  var nhotel_1 = document.getElementById('nhotel').value;		  
		  
		  if(!arr_res_2.includes(nhotel_1)){
		  	document.getElementById('sbt-btn-ur').hidden = true;
		  	document.getElementById('sbt-btn-dr').hidden = true;
		  	document.getElementById('sbt-btn-cr').hidden = false;
		  }else{
		  	document.getElementById('sbt-btn-ur').hidden = false;
		  	document.getElementById('sbt-btn-dr').hidden = false;
		  	document.getElementById('sbt-btn-cr').hidden = true;
		  }
		  			  
		}



	    document.getElementById("r_serv_1").addEventListener("input", myFuncExist3);

		function myFuncExist3() {
		  var r_serv = document.getElementById('r_serv_1').value;		  
		  
		  if(arr_res_3.includes(r_serv)){
		  	document.getElementById('sbt-cs').hidden = true;
		  }else{
		  	document.getElementById('sbt-cs').hidden = false;
		  }
		  			  
		}


	    document.getElementById("u_serv_2").addEventListener("input", myFuncExist4);

		function myFuncExist4() {
		  var u_serv_1 = document.getElementById('u_serv_1').value;		  
		  
		  if(u_serv_1.length === 0){
		  	document.getElementById('sbt-us').hidden = true;
		  	document.getElementById('sbt-ds').hidden = true;
		  }else{
		  	document.getElementById('sbt-us').hidden = false;
		  	document.getElementById('sbt-ds').hidden = false;
		  }
		  			  
		}
		
				    	
		</script>




</body>
</html>