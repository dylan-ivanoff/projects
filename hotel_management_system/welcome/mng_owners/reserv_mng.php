<?php

	include('../../session.php');

			if(strval($login_level) == '5' || strval($login_level) == '6' || strval($login_level) == '7'){
		$url = '../../404_page_error/error.html'; 

		header( "Location: $url" );
	}

	require ('countries-array.php');

function countries_dropdown($user_country_code='') {
    $option = "";
    foreach ($GLOBALS['countries_list'] as $key => $value) {
        $selected = ($value['code'] == $user_language_code ? ' selected' : '');
        $option .= '<option value="'.$value['code'].'"'.$selected.'>'.$value['name'].'</option>'."\n";
    }
    return $option;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- fancyTable Js -->
<script src="../../src/fancyTable.js"></script>


<!-- Styles.css -->
<link rel="stylesheet" href="../styles.css">


<!-- Phone Number With Code -->
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


<style type="text/css">
	input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>

<link rel="stylesheet" href="nav.css"> 




</head>
<body style="background-image: url('../../img/background.jpg');">
	       

    <div class="container" style="position: relative; width: 64%; margin-left: 5%;">
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


				$sql = "SELECT id FROM hotels_info WHERE name = '".$_SESSION['h_name']."';";
				$result = $db->query($sql);


				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {			    		
				  	//echo $row['id'];
				  	$_SESSION['h_id'] = $row['id'];
				  }
				} else {
				  //echo "0 results";
				}

				//////

				$sql = "SELECT * FROM guests_info WHERE hotel_gid = '".$_SESSION['h_id']."';";
				$result = $conn->query($sql);


				$g_info = array();
				$count = 0;
				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {

				    		$egn = $row['egn'];
				    		$first_name = $row['first_nm'];
				    		$last_name = $row['last_nm'];
				    		$gsm = $row['gsm'];
							$gcr_psprt = $row['passport'];
							$g_cntry = $row['country'];				    						    	

		                    //echo $the_elem;		    
		                    array_push($g_info, $egn, $first_name, $last_name, $gsm, $gcr_psprt, $g_cntry);

				  }
				} else {
				  //echo "0 results";
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
		                    //echo $the_elem;		    
		                    array_push($r_info, $num, $type, $price, $availability);

				  }
				} else {
				  //echo "0 results";
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
				  //echo "0 results";
				}


				$sql_s = "SELECT guest_res.id, guests_info.egn, guest_res.date_in, guest_res.date_out, guest_res.num_of_people, rooms.num, guest_res.price_gr, guest_res.extr_ppl, guest_res.num_chldr  FROM guest_res JOIN guests_info ON guest_res.gid = guests_info.id JOIN rooms ON guest_res.room_num = rooms.id WHERE guests_info.hotel_gid = '".$_SESSION['h_id']."' ;";
				$result_s = $conn->query($sql_s);
				$gr_info = array();
				$gr_info_1 = array();
				$count = 0;
				if ($result_s->num_rows > 0) {
				  // output data of each row
				  while($row = $result_s->fetch_assoc()) {
				  			$gres_id = $row['id'];
				  			//echo $gres_id;
				  			array_push($gr_info_1, $gres_id);
				  			//print_r($gr_info_1);

				  			$guest_egn = $row['egn'];
				    		$date_in = $row['date_in'];
				    		$date_out = $row['date_out'];				    						    		
				    						    						    				    		
				    		$num_of_people = $row['num_of_people'];
				    		$r_number = $row['num'];
				    		$tamount = $row['price_gr'];

				    		$extr_ppl_gr = $row['extr_ppl'];
				    		$num_chldr_gr = $row['num_chldr'];
		                    //echo $the_elem;		    
		                    array_push($gr_info, $guest_egn, $date_in, $date_out, $num_of_people, $r_number, $tamount, $extr_ppl_gr, $num_chldr_gr);

				  }
				} else {
				  //echo "0 results";
				}






				$sql_rms = "SELECT * FROM rooms JOIN room_type ON rooms.type_id = room_type.id WHERE hot_id  = '".$_SESSION['h_id']."' AND free='yes';";
								$result = $conn->query($sql_rms);


								$rm_info = array();
								$count = 0;
								if ($result->num_rows > 0) {
								  // output data of each row
								  while($row = $result->fetch_assoc()) {

								    		$num_r = $row['num'];
								    		$price_r = $row['price'];
								    		$type_r = $row['type'];
								    		$cap_r = $row['cap'];	
								    		$exr_bds_cps = $row['extr_beds_cps'];	
								    		$chldr_cps = $row['chldr_cps'];
								    		$extra_bds_ppr = $row['extra_bds_ppr'];			    	
								    		$chldr_ppr = $row['chldr_ppr'];

						                    //echo $the_elem;		    
						                    array_push($rm_info, $num_r, $price_r, $type_r, $cap_r, $exr_bds_cps, $chldr_cps, $extra_bds_ppr, $chldr_ppr);

								  }
								} else {
								  //echo "0 results";
								}


				$sql_crser = "SELECT * FROM personal_info JOIN login ON personal_info.u_id = login.id WHERE ho_id  = '".$_SESSION['h_id']."' AND login.level >= '2';";
								$result = $conn->query($sql_crser);


								$ser_info = array();
								$count = 0;
								if ($result->num_rows > 0) {
								  // output data of each row
								  while($row = $result->fetch_assoc()) {

								    		//$crser_fnm = $row['f_name'];
								    		$u_name = $row['username'];
								    		$level_emp = $row['level'];

								    		if($level_emp == '2'){
								    			$level_emp = 'Owner';								    			
								    		}elseif ($level_emp == '3') {
								    			$level_emp = 'Manager';
								    		}elseif ($level_emp == '4') {
								    			$level_emp = 'Receptionist';
								    		}elseif ($level_emp == '5') {
								    			$level_emp = 'Housekeeper';
								    		}elseif ($level_emp == '6') {
								    			$level_emp = 'Food Service';
								    		}elseif ($level_emp == '7') {
								    			$level_emp = 'Security';
								    		}							    						    	

						                    //echo $the_elem;		    
						                    array_push($ser_info, $level_emp, $u_name);

								  }
								} else {
								  //echo "0 results";
								}				



					$sql_serv = "SELECT * FROM services WHERE hotel_id   = '".$_SESSION['h_id']."';";
								$result = $conn->query($sql_serv);


								$serv_info = array();
								$count = 0;
								if ($result->num_rows > 0) {
								  // output data of each row
								  while($row = $result->fetch_assoc()) {

								    		$serv_nm = $row['service'];
								    		$serv_pr = $row['price'];
								    						    	
						                    //echo $the_elem;		    
						                    array_push($serv_info, $serv_nm, $serv_pr);

								  }
								} else {
								  //echo "0 results";
								}



				$sql_srtb = "SELECT guest_res.id, guests_info.egn, login.username, guest_serv.serv_nm, guest_serv.price_serv, guest_serv.add_info FROM guest_serv JOIN guest_res ON guest_serv.gr_id  = guest_res.id JOIN guests_info ON guest_res.gid = guests_info.id JOIN login ON guest_serv.in_chrg_lid = login.id WHERE hotel_gid   = '".$_SESSION['h_id']."';";
								$result = $conn->query($sql_srtb);


								$sr_tb = array();
								$count = 0;
								if ($result->num_rows > 0) {
								  // output data of each row
								  while($row = $result->fetch_assoc()) {  
								  			$id_reserv = $row['id'];
								  			//echo $id_1;

								    		$egn_ser = $row['egn'];
								    		$in_chrg_lid = $row['username'];
								    		$serv_nm = $row['serv_nm'];
								    		$price_serv = $row['price_serv'];				    	
								    		$add_info = $row['add_info'];

						                    //echo $the_elem;		    
						                    array_push($sr_tb, $egn_ser, $id_reserv, $serv_nm, $price_serv, $in_chrg_lid, $add_info);

								  }
								} else {
								  //echo "0 results";
								}				


				$conn->close();

        ?>



			<div class="body-content" style="padding-left: 5%; padding-top: 3%;">

		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view" style="width: 21%; float: left;">

		    	<div class="div-form" style="width: 100%;">
						  <form name="cr_guests" id="cr_guests" action="reserv_funcs.php" method="POST">
						  	<h3>Create Guests</h3>

						  	<link rel="stylesheet" href="//cdn.tutorialjinni.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
							<link rel="stylesheet" href="//cdn.tutorialjinni.com/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
							<link rel="stylesheet" href="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />

							<label>Select Country</label>
							<select name="country_slc" id="country_slc" class="selectpicker countrypicker" data-flag="true" data-default="BG"></select>

							<script src="//cdn.tutorialjinni.com/jquery/3.6.1/jquery.min.js"></script>
							<script src="//cdn.tutorialjinni.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
							<script src="//cdn.tutorialjinni.com/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
							<script src="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>

							<br><br>
							
							<label id="gsm_lbl" for="gsm_cr">Phone</label>
						    <input type="text" id="gsm_cr" name="gsm_cr" required="">

						    <button style="width: 100%;" type="button" class="btn btn-info" id="ch_validity">check validity</button>
						    <br><br>

						    <script type="text/javascript">
						    	document.getElementById('gsm_cr').addEventListener("keydown", function(){
						    		$("#sbt-crt").prop('hidden',true);
						    	});

						    	element = document.getElementById('ch_validity');
						    	//alert(document.getElementById('gsm_cr').value);
					        	
					        	element.addEventListener("click", function() {
					        			$.ajax({
								        type: "POST",
								        url: 'gsm_validity.php',
								        data: {arguments: document.getElementById('gsm_cr').value}, 
								         success:function(data) {
								        //alert(data); 
								        //alert(data[11]);
								        if(data[11] == 'f'){
								        	document.getElementById('gsm_lbl').innerHTML = 'Wrong Number';
								        	document.getElementById('gsm_lbl').style.color="rgb(128, 0, 32)";
								        	$("#sbt-crt").prop('hidden',true);
								        }else if(data[11] == 't'){
								        	document.getElementById('gsm_lbl').innerHTML = 'Right Number';
								        	document.getElementById('gsm_lbl').style.color="green";
								        	$("#sbt-crt").prop('hidden',false);
								        }

								         }
								    });
					        		});					        	 

						    </script>

						    <script type="text/javascript">
						    	element = document.getElementById('ch_validity');
						    	//alert(document.getElementById('gsm_cr').value);
					        	
					        	element.addEventListener("click", function() {
					        			$.ajax({
								        type: "POST",
								        url: 'gsm_validity.php',
								        data: {arguments: document.getElementById('gsm_cr').value}, 
								         success:function(data) {
								        //alert(data); 
								        //alert(data[11]);
								        if(data[11] == 'f'){
								        	document.getElementById('gsm_lbl').innerHTML = 'Wrong Number';
								        	document.getElementById('gsm_lbl').style.color="rgb(128, 0, 32)";
								        	$("#sbt-crt").prop('hidden',true);
								        }else if(data[11] == 't'){
								        	document.getElementById('gsm_lbl').innerHTML = 'Right Number';
								        	document.getElementById('gsm_lbl').style.color="green";
								        	$("#sbt-crt").prop('hidden',false);
								        }

								         }
								    });
					        		});
					        	 


						    </script>


					        <script type="text/javascript">
					        	document.getElementById('gsm_cr').value = '+359';
					        	element = document.getElementById('country_slc');
					        	
					        	element.addEventListener("change", function() {
					        		//alert($("#country_slc :selected").text());

						        	var val_country = $("#country_slc :selected").text();
						        	var code_cntr='';
						        	if(val_country.toLowerCase() == 'bulgaria'){
						        		code_cntr = '+359';
						        	}else if(val_country.toLowerCase() == 'germany'){
						        		code_cntr = '+49';
						        	}else if(val_country.toLowerCase() == 'sweden'){
						        		code_cntr = '+46';
						        	}else if(val_country.toLowerCase() == 'romania'){
						        		code_cntr = '+40';
						        	}else if(val_country.toLowerCase() == 'belgium'){
						        		code_cntr = '+33';
						        	}

					        		document.getElementById('gsm_cr').value = code_cntr;
					        		
					        	});
					        </script>
						  


							<label for="email_g">Email</label>
						    <input type="email" id="email_g" name="email_g" required="" maxlength="30">
						    						  	
						  	<label id="egn_lbl" for="egn_cr">ID</label>
						    <input type="text" id="egn_cr" name="egn_cr" maxlength="10" pattern="[0-9]{10}">


						    <label id="g_pass_clbl" for="g_pass_c">Passport Code</label>
						    <input type="text" id="g_pass_c" name="g_pass_c" maxlength="10">

						    <a href="#" onclick="return false;" id="give_efnp"><span><i id="give_efnp_txt">No ID?</i></span></a> <br>

						    <script type="text/javascript">
						    	var countV = 1;
						    	element = document.getElementById('give_efnp');
						    	element.addEventListener("click", function() {
						    		//alert((document.getElementById('egn_lbl').style.visibility=='hidden').toString());
								  if(countV % 2 == 0){

								  $("#egn_lbl").prop('hidden',false);
								  $("#egn_cr").prop('hidden',false);

								  $("#g_pass_clbl").prop('hidden',true);
								  $("#g_pass_c").prop('hidden',true);

								  $("#give_efnp_txt").text('No ID Card?');
								  								 
								  countV++;
								  }else{
								  $("#g_pass_clbl").prop('hidden',false);
								  $("#g_pass_c").prop('hidden',false);

								  $("#egn_lbl").prop('hidden',true);
								  $("#egn_cr").prop('hidden',true);

								  $("#give_efnp_txt").text('No Passport?');

								  countV++;

								  }	

								 // document.getElementById('give_efnp').value = 'No Passport?';						  
								});
						    </script>


						    <label id="f_name_lbl" for="f_name_cr">First Name</label>
						    <input type="text" id="f_name_cr" name="f_name_cr" required="" >

						    <label id="l_name_lbl" for="l_name_cr">Last Name</label>
						    <input type="text" id="l_name_cr" name="l_name_cr" required="" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')">
						  	
						  	
						  
						    <input type="submit" value="Create Guest" id="sbt-crt" name="sbt-btn-crt">   
						  <!--  <button type="submit" id="sbt-crt" name="sbt-btn-crt">Create</button>  -->
						  </form>
						</div>

						<script>



/*
						$("#cr_guests").submit(function(e) {
							e.preventDefault();
						});
						*/


						/*
						function fetchpost () {

						  // (A) GET FORM DATA
						  var form = document.getElementById("cr_guests");
						  var data = new FormData(form);
						 
						  // (B) FETCH
						  fetch("test.php", {
						    method: "post",
						    body: data
						  })
						  .then((res) => { return res.text(); })
						  .then((txt) => { console.log(txt); })
						  .catch((err) => { console.log(err); });						  

						  // (C) PREVENT HTML FORM SUBMIT
						  return false;
						}
						*/
						
						</script>	

		    </div>	
		    <div class="right-view" style="width: 78%; float: right; padding-right: 5%;">
		    	<div class="div-form" style="width: 75%; position: relative; float: left;">
								  	<table id="sampleTable_1" class="table table-striped sampleTable" style="color: black;">
								<thead>
									<tr>
									<th id="second">ID</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Phone</th>
									<th>Passport</th>
									<th>Country</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>													 						


						<div id="upd_gst" class="div-form" style="width: 23%;  position: relative; float: right;">													

						  <form action="upd_guests.php" method="POST">
						  	<h3>Update Guests</h3>
						  							

						  	<label id="g_gsm_lbl" for="g_gsm">Update Phone</label><br>
						    <input type="text" id="g_gsm" name="g_gsm" pattern="[+]{1}[0-9]{*}">

						    <button style="width: 100%;" type="button" class="btn btn-info" id="ch_validity1">check validity</button>
						    <br><br>

						    <script type="text/javascript">
						    	document.getElementById('g_gsm').addEventListener("keydown", function(){
						    		$("#sbt-btn-ug").prop('hidden',true);
						    	});

						    	element = document.getElementById('ch_validity1');
						    	//alert(document.getElementById('gsm_cr').value);
					        	
					        	element.addEventListener("click", function() {
					        			$.ajax({
								        type: "POST",
								        url: 'gsm_validity.php',
								        data: {arguments: document.getElementById('g_gsm').value}, 
								         success:function(data) {
								        //alert(data); 
								        //alert(data[11]);
								        if(data[11] == 'f'){
								        	document.getElementById('g_gsm_lbl').innerHTML = 'Wrong Number';
								        	document.getElementById('g_gsm_lbl').style.color="rgb(128, 0, 32)";
								        	$("#sbt-btn-ug").prop('hidden',true);
								        }else if(data[11] == 't'){
								        	document.getElementById('g_gsm_lbl').innerHTML = 'Right Number';
								        	document.getElementById('g_gsm_lbl').style.color="green";
								        	$("#sbt-btn-ug").prop('hidden',false);
								        }

								         }
								    });
					        		});					        	 

						    </script>
						  							  						   				  								  
						    <label for="egn">ID</label>
						    <input type="text" id="egn" name="egn" value="" required="" disabled="true" >

						    <label for="egn_new">Update ID</label>
						    <input type="text" id="egn_new" name="egn_new" value="" required="" pattern="[0-9]{10}">

						    <label for="pass_new">Update Passport</label>
						    <input type="text" id="pass_new" name="pass_new" value="" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity('Passport is 10 digits!')">
						    
						    <label for="f_name">First Name</label><br>
						    <input type="text" id="f_name" name="f_name" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')">

						    <label for="l_name">Last Name</label><br>
						    <input type="text" id="l_name" name="l_name" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')">

						    
						    						  

						    <input type="submit" value="Update Guest" id="sbt-btn-ug" name="sbt-btn-ug" style="background-color:#ff5733;">
						    <input type="submit" value="Delete Guest" id="sbt-btn-dg" name="sbt-btn-dg" style="background-color:#722F37;">
						  </form>

						  </div>	

		    </div>

		    </div>
		    </div>

		</div>

		<label></label>
		<input id="qua_guest" type="text" name="" value="Qua Guest..." style="width: 33%; margin-left: 33%;" disabled="true">


		<!-- Reservations -->

		<div class="body-content" style="padding-left: 5%; padding-top: 3%;">

		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view" style="width: 21%; float: left;">

		    	<div id="cr_res_d" class="div-form" style="width: 100%;">
						  <form name="cr_guests" id="cr_guests" action="reserv_funcs.php" method="POST">
						  	<h3>Create Reservation</h3>

						  	
						  	<label id="date_in_lbl" for="date_in_cr">Date In</label>
						    <input type="date" id="date_in_cr" name="date_in_cr" onchange="handlerFST(event);" required="" min="<?php echo date("Y-m-d"); ?>">	
						    			    						    
						    <label id="date_out_lbl" for="date_out_cr">Date Out</label>
						    <input type="date" id="date_out_cr" name="date_out_cr" onchange="handler(event);" required="" min="<?php echo date('Y-m-d', strtotime("+1 day")); ?>">

						    <label id="nop_n_lbl" for="nop_cr">Number of People</label>
						    <input type="text" id="nop_cr" name="nop_cr" required="" pattern="[1-9]+">

						    <script type="text/javascript">

						    	/*
						    	function totalPriceNew(e){
						    		alert("Wander");
						    		var current_rn = document.getElementById('rooms_cap').value;
						    		
						    		var rm_arr = <?php //echo $rm_info;?>;						    		
						    		//var rm_price = rm_arr[rm_array.indexOf(current_rn)+1];
						    		var rm_price = rm_arr[1];

						    		alert(rm_price.toString());
						    	}
						    */							    	


						    	function handlerFST(e){ //dateIn 
								  //alert(e.target.value);
								  var date_1 = document.getElementById('date_in_cr').value;
						    	  var date_2 = document.getElementById('date_out_cr').value;

								  var timestamp = Date.parse(date_2);

									if (isNaN(timestamp) == false) {  //if it is a valid date
										//alert(e.target.value);
									  totalPrice();
									  if(parseInt(totalPrice())<1){
									  	//alert(e.target.value);
									  	
										document.getElementById('sbt-crgr').hidden = true;
										document.getElementById('date_in_lbl').innerHTML = "Date In"+ " Cannot Exceed Date Out!";
										//document.getElementById('date_out_cr').style.backgroundColor = 'red';
										//document.getElementById('date_out_cr').style.background-color = 'red';
										//document.getElementById('date_out_cr').style = "background-color: red;";
										//date_2.style.backgroundColor = 'green';
										//alert("hi");

										
										document.getElementById('date_in_cr').style.backgroundColor = '#C41E3A'; //Cardinal Red	#C41E3A ----> https://htmlcolorcodes.com/colors/shades-of-red/

										document.getElementById('tamount_cr').value = '';
										

									  }else{
									  	document.getElementById('sbt-crgr').hidden = false;
									  	document.getElementById('date_in_lbl').innerHTML = "Date In";
									  	document.getElementById('date_in_cr').style.backgroundColor = 'white';
									  	chngDateRoomPr();
									  }
									}
								}


						    	function handler(e){	//dateOut 					    		
								  //alert(e.target.value);
								  var date_1 = document.getElementById('date_in_cr').value;
						    	  var date_2 = document.getElementById('date_out_cr').value;

								  var timestamp = Date.parse(date_1);

									if (isNaN(timestamp) == false) {  //if it is a valid date
										//alert(e.target.value);

										totalPrice();
									  
									  if(parseInt(totalPrice())<1){
									  	//alert(e.target.value);
									  	
										document.getElementById('sbt-crgr').hidden = true;
										document.getElementById('date_out_lbl').innerHTML = "Date Out"+ " Cannot Precede Date In!";
										document.getElementById('date_out_cr').style.backgroundColor = '#C41E3A'; //Cardinal Red	#C41E3A ----> https://htmlcolorcodes.com/colors/shades-of-red/
										//e.style.backgroundColor = 'red';
										document.getElementById('tamount_cr').value = '';

									  }else{
									  	document.getElementById('sbt-crgr').hidden = false;
									  	document.getElementById('date_out_lbl').innerHTML = "Date Out";
									  	document.getElementById('date_out_cr').style.backgroundColor = 'white';
									  	chngDateRoomPr();
									  }
									}
								}


								function totalPrice(){
						    		var date_1 = document.getElementById('date_in_cr').value;
						    		var date_2 = document.getElementById('date_out_cr').value;							    		
						    		
						    		const date1 = new Date(date_1);
									const date2 = new Date(date_2);
									const diffTime = date2 - date1;
									const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

									if(diffDays > 0){
										document.getElementById('tamount_lbl').innerHTML = "Total Amount"+" for "+diffDays+" days:";	
									}else{
										document.getElementById('tamount_lbl').innerHTML = "Total Amount:";	
										//document.getElementById('sbt-crgr').hidden = true;
									}
									
									return diffDays;

						    	}
						    	

						    	$('#nop_cr').on('input',function(e){ //block rooms with fewer capacity
						    		var rm_array = <?php echo json_encode($rm_info); ?>;
						    		var num_people = document.getElementById('nop_cr').value;						    		

						    		let element = document.getElementById('rooms_cap');
    								element.value = "";



								    //alert(num_people);

								    let k=0;
								    while(k < rm_array.length){
								    	var val_id = rm_array[k];
								    	document.getElementById(val_id).hidden = false;
								    	k=k+8;
								    }

								    let i = 0;
								    var count_rm = rm_array.length-3;

								while (i < count_rm) {
								    //console.log(scores[i]);
								    if(rm_array[i+3] < num_people){
								    	var value_id = rm_array[i];
								    	document.getElementById(value_id).hidden = true;
								    }
								    
								    i=i+8;
								}
								});
						    								    						    
								

						    </script>

						    <label id="noap_cr_lbl" for="noap_cr">Number of Extra People</label>
						    <input type="text" id="noap_cr" name="noap_cr" required="" pattern="[1-9]+">

						    <script type="text/javascript">
						    	$('#noap_cr').on('input',function(e){ //block rooms with fewer capacity based on add. people (bedss)
						    		var rm_array = <?php echo json_encode($rm_info); ?>;
						    		var num_people = document.getElementById('noap_cr').value;
						    		

						    		let element = document.getElementById('rooms_cap');
    								element.value = "";



								    //alert(num_people);

								    let k=0;
								    while(k < rm_array.length){
								    	var val_id = rm_array[k];
								    	document.getElementById(val_id).hidden = false;
								    	k=k+8;
								    }

								    let i = 0;
								    var count_rm = rm_array.length-3;

								while (i < count_rm) {
								    //console.log(scores[i]);
								    if(rm_array[i+4] < num_people){
								    	var value_id = rm_array[i];
								    	document.getElementById(value_id).hidden = true;
								    }
								    
								    i=i+8;
								}
								});	
						    </script>

						    <label id="noch_cr_lbl" for="noch_cr">Number of Children</label>
						    <input type="text" id="noch_cr" name="noch_cr" required="" pattern="[1-9]+">

						    <script type="text/javascript">
						    	$('#noch_cr').on('input',function(e){ //block rooms with fewer capacity based on add. people (bedss)
						    		var rm_array = <?php echo json_encode($rm_info); ?>;
						    		var num_people = document.getElementById('noch_cr').value;

						    		let element = document.getElementById('rooms_cap');
    								element.value = "";



								    //alert(num_people);

								    let k=0;
								    while(k < rm_array.length){
								    	var val_id = rm_array[k];
								    	document.getElementById(val_id).hidden = false;
								    	k=k+8;
								    }

								    let i = 0;
								    var count_rm = rm_array.length-3;

								while (i < count_rm) {
								    //console.log(scores[i]);
								    if(rm_array[i+5] < num_people){
								    	var value_id = rm_array[i];
								    	document.getElementById(value_id).hidden = true;
								    }
								    
								    i=i+8;
								}
								});	
						    </script>

						    <label id="rooms_cap_lbl" for="rooms_cap">Room Num</label>
						    <select name="rooms_cap" id="rooms_cap" onchange="chngDateRoomPr()"> <!-- onchange="changeLvl()" -->
							   <!-- <option value=''>--Choose--</option>  -->

							   <script type="text/javascript">
							   		//var diffDays = 0;
							   		function chngDateRoomPr(){ //changeLvl()
							   		var date_1 = document.getElementById('date_in_cr').value;
						    		var date_2 = document.getElementById('date_out_cr').value;							    		
						    		
						    		const date1 = new Date(date_1);
									const date2 = new Date(date_2);
									const diffTime = date2 - date1;
									const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 									

							   			//document.getElementById('tamount_cr').value = diffDays.toString();
							   			sumTotal(diffDays.toString());
							   		}

							   		function sumTotal(p){
							   			var slcValue = document.getElementById('rooms_cap').value;
							   			//alert(slcValue);
							   			var arraySlc = <?php echo json_encode($rm_info); ?>;

							   			var extr_ppl = document.getElementById('noap_cr').value;
							   			var extr_chldr = document.getElementById('noch_cr').value;

							   			//alert(p);

							   			var loop = 0;
							   			var sumPrice = 0; //price in select
							   			var extr_ppr = 0;
							   			var extr_chpr = 0;
							   			while (loop < arraySlc.length) {
										    //console.log(arraySlc[loop]);
										    if(arraySlc[loop] == slcValue){
										    	//alert(arraySlc[loop+1].toString());
										    	sumPrice = arraySlc[loop+1];
										    	extr_ppr = arraySlc[loop+6];
										    	extr_chpr = arraySlc[loop+7];
										    }
										    loop++;
										}
							   			//alert(arraySlc.indexOf(slcValue).toString();
							   			//var index1 = arraySlc.indexOf(109);
							   			//alert(sumPrice);
							   			//alert(typeof p);
							   			var endSum = parseInt(p.trim())*(parseInt(sumPrice.trim())+sumPrice/100*extr_ppl*extr_ppr+sumPrice/100*extr_chldr*extr_chpr);
							   			endSum = Math.round(endSum);
							   			document.getElementById('tamount_cr').value = endSum.toString();

							   		}
							   </script>

							   <option></option>

							   <?php

							   $k = 0;
							   foreach ($rm_info as $value) {
							   	if( fmod($k, 8) == 0)
									  echo '<option id="'.$rm_info[$k].'" value="'.$rm_info[$k].'">'."N: ".$rm_info[$k]." | $:".$rm_info[$k+1]." | T:".$rm_info[$k+2]." | C:".$rm_info[$k+3]." | EX.P.: ".$rm_info[$k+4]." | EX.CH.: ".$rm_info[$k+5].'</option>';
									  $k++;
									}

							     ?>

							  </select>



							  <!--
						    <label id="room_n_lbl" for="room_n_cr">Room Num</label>
						    <input type="text" id="room_n_cr" name="room_n_cr" required="">

						-->

						    <label id="tamount_lbl" for="tamount_cr">Total Amount</label>
						    <input type="text" id="tamount_cr" name="tamount_cr" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
						    
						  	
						  
						    <input type="submit" value="Create Reservation" id="sbt-crgr" name="sbt-btn-crgr"> 
						  </form>
						</div>


		    </div>	
		    <div class="right-view" style="width: 78%; float: right; padding-right: 5%;">
		    	<div id="table_r" class="div-form" style="width: 65%; position: relative; float: left;">
								  	<table id="sampleTable_2" class="table table-striped sampleTable" style="color: black;">
								<thead>
									<tr>
									<th id="third">Date In</th>
									<th>Date Out</th>
									<th>People</th>
									<th>Extra People</th>
									<th>Num Children</th>
									<th>Room Num</th>
									<th>Amount</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>



												<div id="upd_resr" class="div-form" style="width: 33%; position: relative; float: right;">													

						  <form action="reserv_funcs.php" method="POST">
						  	<h3>Update Reservations</h3>
						  							  						   				  								  
						    <label for="date_in_res">Date In</label>
						    <input type="date" id="date_in_res" name="date_in_res" value="" required="" min="<?php echo date("Y-m-d"); ?>">

						    <label for="date_out_r">Date Out</label>
						    <input type="date" id="date_out_r" name="date_out_r" value="" required="" min="<?php echo date('Y-m-d', strtotime("+1 day")); ?>">
						    
						    <label for="num_p_res">Number Of People</label><br>
						    <input type="text" id="num_p_res" name="num_p_res" pattern="[1-9]+" required="">

						    <script type="text/javascript">
						    	

						    	$('#num_p_res').on('input',function(e){ //block rooms with fewer capacity
						    		var rm_array = <?php echo json_encode($rm_info); ?>;
						    		var num_people = document.getElementById('num_p_res').value;						    		
						    		let element = document.getElementById('room_num_res');
    								element.value = "";



								    //alert(num_people);

								    let k=0;
								    while(k < rm_array.length){
								    	var val_id = rm_array[k]+"_1";
								    	document.getElementById(val_id).hidden = false;  //make every element visible again
								    	k=k+8;
								    }

								    let i = 0;
								    var count_rm = rm_array.length-3;

								while (i < count_rm) {
								    //console.log(scores[i]);
								    if(rm_array[i+3] < num_people){
								    	var value_id = rm_array[i]+"_1";
								    	document.getElementById(value_id).hidden = true;
								    }
								    
								    i=i+8;
								}
								});
						    							    
								

						    </script>

						    <label id="noap_cr_u_lbl" for="noap_cr_u">Number of Extra People</label>
						    <input type="text" id="noap_cr_u" name="noap_cr_u" required="" pattern="[1-9]+">

						    <script type="text/javascript">
						    	$('#noap_cr_u').on('input',function(e){ //block rooms with fewer capacity based on add. people (bedss)
						    		var rm_array = <?php echo json_encode($rm_info); ?>;
						    		var num_people = document.getElementById('noap_cr_u').value;
						    		

						    		let element = document.getElementById('room_num_res');
    								element.value = "";



								    //alert(num_people);

								    let k=0;
								    while(k < rm_array.length){
								    	var val_id = rm_array[k];
								    	document.getElementById(val_id).hidden = false;
								    	k=k+8;
								    }

								    let i = 0;
								    var count_rm = rm_array.length-3;

								while (i < count_rm) {
								    //console.log(scores[i]);
								    if(rm_array[i+4] < num_people){
								    	var value_id = rm_array[i]+"_1";
								    	document.getElementById(value_id).hidden = true;
								    }
								    
								    i=i+8;
								}
								});	
						    </script>

						    <label id="noch_cr_u_lbl" for="noch_cr_u">Number of Children</label>
						    <input type="text" id="noch_cr_u" name="noch_cr_u" required="" pattern="[1-9]+">

						    <script type="text/javascript">
						    	$('#noch_cr_u').on('input',function(e){ //block rooms with fewer capacity based on add. people (bedss)
						    		var rm_array = <?php echo json_encode($rm_info); ?>;
						    		var num_people = document.getElementById('noch_cr_u').value;

						    		let element = document.getElementById('room_num_res');
    								element.value = "";



								    //alert(num_people);

								    let k=0;
								    while(k < rm_array.length){
								    	var val_id = rm_array[k];
								    	document.getElementById(val_id).hidden = false;
								    	k=k+8;
								    }

								    let i = 0;
								    var count_rm = rm_array.length-3;

								while (i < count_rm) {
								    //console.log(scores[i]);
								    if(rm_array[i+5] < num_people){
								    	var value_id = rm_array[i] + "_1";
								    	document.getElementById(value_id).hidden = true;
								    }
								    
								    i=i+8;
								}
								});	
						    </script>


						    <label for="room_num_res">Room Number</label><br>
						<!--    <input type="text" id="room_num_res" name="room_num_res">   -->

						    <select name="room_num_res" id="room_num_res" onchange="changeLvl_1()">
						    
						    	<script type="text/javascript">
							   		function changeLvl_1(){
							   		var date_1 = document.getElementById('date_in_ur').value;
						    		var date_2 = document.getElementById('date_out_ur').value;							    		
						    		
						    		const date1 = new Date(date_1);
									const date2 = new Date(date_2);
									const diffTime = date2 - date1;
									const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 									

							   			//document.getElementById('tamount_cr').value = diffDays.toString();
							   			sumTotal_1(diffDays.toString());
							   		}

							   		function sumTotal_1(p){
							   			var slcValue_1 = document.getElementById('room_num_res').value;
							   			//alert(slcValue);
							   			var arraySlc_1 = <?php echo json_encode($rm_info); ?>;

							   			var extr_ppl = document.getElementById('noap_cr_u').value;
							   			var extr_chldr = document.getElementById('noch_cr_u').value;

							   			//alert(p);

							   			var loop = 0;
							   			var sumPrice = 0; //price in select
							   			var extr_ppr = 0;
							   			var extr_chpr = 0;
							   			while (loop < arraySlc.length) {
										    //console.log(arraySlc[loop]);
										    if(arraySlc[loop] == slcValue){
										    	//alert(arraySlc[loop+1].toString());
										    	sumPrice = arraySlc[loop+1];
										    	extr_ppr = arraySlc[loop+6];
										    	extr_chpr = arraySlc[loop+7];
										    }
										    loop++;
										}
							   			//alert(arraySlc.indexOf(slcValue).toString();
							   			//var index1 = arraySlc.indexOf(109);
							   			//alert(sumPrice);
							   			//alert(typeof p);
							   			var endSum = parseInt(p.trim())*(parseInt(sumPrice.trim())+sumPrice/100*extr_ppl*extr_ppr+sumPrice/100*extr_chldr*extr_chpr);
							   			endSum = Math.round(endSum);

							   			document.getElementById('t_amount_res').value = endSum.toString();

							   		}
							   </script>

							   <option></option>

							   <?php

							   $k = 0;
							   foreach ($rm_info as $value) {
							   	if( fmod($k, 8) == 0)
									  echo '<option id="'.$rm_info[$k].'_1'.'" value="'.$rm_info[$k].'">'."N: ".$rm_info[$k]." | $:".$rm_info[$k+1]." | T:".$rm_info[$k+2]." | C:".$rm_info[$k+3]." | EX.P.: ".$rm_info[$k+4]." | EX.CH.: ".$rm_info[$k+5].'</option>';
									  $k++;
									}

							     ?>

							</select>

						    <label for="t_amount_res">Total Amount</label><br>
						    <input type="text" id="t_amount_res" name="t_amount_res" pattern="[0-9]+">
						    						  
						    <input type="submit" value="Update Reservation" id="sbt-btn-ur" name="sbt-btn-ur" style="background-color:#ff5733;">
						    <input type="submit" value="Delete Reservation" id="sbt-btn-dr" name="sbt-btn-dr" style="background-color:#722F37;">
						  </form>

						  </div>	

		    </div>

		    </div>
		    </div>

		</div>

		<input id="qua_guest_s" type="text" name="" value="Qua Guest..." style="width: 33%; margin-left: 33%;" disabled="true">

		<!-- Services -->

		<div class="body-content" style="padding-left: 5%; padding-top: 3%;">

		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view" style="width: 27%; float: left;">

		    	<div class="div-form" style="width: 86%;">
						  <form name="cr_service" id="cr_service" action="reserv_funcs.php" method="POST">
						  	<h3>Create Service</h3>

						  	<label id="serv_cap_lbl" for="serv_cap">Select Service:</label>
						    <select name="serv_cap" id="serv_cap" onchange="setPrice()">
							   <!-- <option value=''>--Choose--</option>  -->

							   <script type="text/javascript">
							   		
							   		function setPrice(){
							   			var slcValue = document.getElementById('serv_cap').value;
							   			var arraySlc = <?php echo json_encode($serv_info); ?>;

							   			var loop = 0;
							   			var sumPrice = 0; //price in select
							   			while (loop < arraySlc.length) {
										    //console.log(arraySlc[loop]);
										    if(arraySlc[loop] == slcValue){
										    	//alert(arraySlc[loop+1].toString());
										    	sumPrice = arraySlc[loop+1];
										    }
										    loop++;
										}
							   			
							   			//var endSum = parseInt(p.trim())*parseInt(sumPrice.trim());
							   			document.getElementById('t_serv_pr').value = sumPrice.toString();

							   		}
							   </script>

							   <option></option>

							   <?php

							   $k = 0;
							   foreach ($serv_info as $value) {
							   	if( fmod($k, 2) == 0)
									  echo '<option id="'.$serv_info[$k].'" value="'.$serv_info[$k].'">'.$serv_info[$k]." | $:".$serv_info[$k+1].'</option>';
									  $k++;
									}

							     ?>

							  </select>


						  	<label for="serv_emp">Assigned to:</label>

							<select name="serv_emp" id="serv_emp">
							  <?php

							   $k = 0;
							   foreach ($ser_info as $value) {
							   	if( fmod($k, 2) == 0)
									  echo '<option id="'.$ser_info[$k+1].'" value="'.$ser_info[$k+1].'">'.$ser_info[$k].": ".$ser_info[$k+1].'</option>';
									  $k++;
									}

							     ?>
							</select>
							
						<!--	<label style="font-size: 0.777em;">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</label>   -->

						    <label>Some additional information?</label>
							<textarea name ="comment" placeholder="Some additional information?" maxlength="100" style="resize: none; width: 100%; height: 5em;"></textarea>
						    						    

							  <!--
						    <label id="room_n_lbl" for="room_n_cr">Room Num</label>
						    <input type="text" id="room_n_cr" name="room_n_cr" required="">

						-->

						    <label id="t_serv_pr_lbl" for="t_serv_pr">Total Amount</label>
						    <input type="text" id="t_serv_pr" name="t_serv_pr" required="" pattern="[0-9]+">

						    <script type="text/javascript">
						
						/*
						    	function totalPriceNew(e){
						    		alert("Wander");
						    		var current_rn = document.getElementById('rooms_cap').value;
						    		
						    		var rm_arr = <?php echo $rm_info;?>;						    		
						    		//var rm_price = rm_arr[rm_array.indexOf(current_rn)+1];
						    		var rm_price = rm_arr[1];

						    		alert(rm_price.toString());
						    	}

						*/


						    	/*
						    	function totalPrice(){
						    		var date_1 = document.getElementById('date_in_cr').value;
						    		var date_2 = document.getElementById('date_out_cr').value;							    		
						    		
						    		const date1 = new Date(date_1);
									const date2 = new Date(date_2);
									const diffTime = date2 - date1;
									const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

									if(diffDays > 0){
										document.getElementById('tamount_lbl').innerHTML = "Total Amount: "+diffDays;	
									}else{
										document.getElementById('tamount_lbl').innerHTML = "Total Amount:";	
									}
									

									return diffDays;

						    	}

						    	function handler(e){
								  //alert(e.target.value);
								  var date_1 = document.getElementById('date_in_cr').value;
						    	  var date_2 = document.getElementById('date_out_cr').value;

								  var timestamp = Date.parse(date_1);

									if (isNaN(timestamp) == false) {  //if it is a valid date
										//alert(e.target.value);
									  
									  if(parseInt(totalPrice())<1){
									  	//alert(e.target.value);
									  	
										document.getElementById('sbt-crgr').hidden = true;
										document.getElementById('date_out_lbl').innerHTML = "Date Out"+ " - Fix!";

									  }else{
									  	document.getElementById('sbt-crgr').hidden = false;
									  	document.getElementById('date_out_lbl').innerHTML = "Date Out";
									  }
									}
								}

								function handlerFST(e){
								  //alert(e.target.value);
								  var date_1 = document.getElementById('date_in_cr').value;
						    	  var date_2 = document.getElementById('date_out_cr').value;

								  var timestamp = Date.parse(date_2);

									if (isNaN(timestamp) == false) {  //if it is a valid date
										//alert(e.target.value);
									  
									  if(parseInt(totalPrice())<1){
									  	//alert(e.target.value);
									  	
										document.getElementById('sbt-crgr').hidden = true;
										document.getElementById('date_in_lbl').innerHTML = "Date In"+ " - Fix!";

									  }else{
									  	document.getElementById('sbt-crgr').hidden = false;
									  	document.getElementById('date_in_lbl').innerHTML = "Date In";
									  }
									}
								}

								*/

						    </script>
						  	
						  
						    <input type="submit" value="Create Service" id="sbt-crgr" name="sbt-btn-rcrt"> 
						  </form>
						</div>


		    </div>	
		    <div class="right-view" style="width: 72%; float: right; padding-right: 5%;">
		    	<div id="serv_div" class="div-form" style="width: 60%; position: relative; float: left;">
								  	<table id="sampleTable_3" class="table table-striped sampleTable" style="color: black;">
								<thead>
									<tr>
									<th id="fourth">Service</th>
									<th>Price</th>
									<th>Assigned To</th>	
									<th>Add. Info</th>								
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>



						<div id="upd_serv" class="div-form" style="width: 33%; position: relative; float: right;">													

						  <form action="reserv_funcs.php" method="POST">
						  	<h3>Update Service</h3>
						  							  						   				  								  						    						    
						    <label id="serv_cap_lbl1" for="serv_cap1">Select Service:</label>
						    <select name="serv_cap1" id="serv_cap1" onchange="setPrice1()">
							   <!-- <option value=''>--Choose--</option>  -->

							   <script type="text/javascript">
							   		
							   		function setPrice1(){
							   			var slcValue = document.getElementById('serv_cap1').value;
							   			var arraySlc = <?php echo json_encode($serv_info); ?>;

							   			var loop = 0;
							   			var sumPrice = 0; //price in select
							   			while (loop < arraySlc.length) {
										    //console.log(arraySlc[loop]);
										    if(arraySlc[loop] == slcValue){
										    	//alert(arraySlc[loop+1].toString());
										    	sumPrice = arraySlc[loop+1];
										    }
										    loop++;
										}
							   			
							   			//var endSum = parseInt(p.trim())*parseInt(sumPrice.trim());
							   			document.getElementById('t_serv_pr1').value = sumPrice.toString();

							   		}
							   </script>

							   <option></option>

							   <?php

							   $k = 0;
							   foreach ($serv_info as $value) {
							   	if( fmod($k, 2) == 0)
									  echo '<option id="'.$serv_info[$k].'" value="'.$serv_info[$k].'">'.$serv_info[$k]." | $:".$serv_info[$k+1].'</option>';
									  $k++;
									}

							     ?>

							  </select>

							<label for="serv_emp1">Who's In Charge?</label>

							<select name="serv_emp1" id="serv_emp1">
							  <?php

							   $k = 0;
							   foreach ($ser_info as $value) {
							   	if( fmod($k, 2) == 0)
									  echo '<option id="'.$ser_info[$k+1]."_1".'" value="'.$ser_info[$k+1].'">'.$ser_info[$k].": ".$ser_info[$k+1].'</option>';
									  $k++;
									}

							     ?>
							</select>  


							<label>Some additional information?</label>
							<textarea id="txt_su" name ="comment1" placeholder="Some additional information?" maxlength="100" style="resize: none; width: 100%; height: 5em;"></textarea>


						    <label for="t_serv_pr1">Total Amount</label><br>
						    <input type="text" id="t_serv_pr1" name="t_serv_pr1" pattern="[0-9]+">
						    						  
						    <input type="submit" value="Update Service" id="sbt-btn-us" name="sbt-btn-us" style="background-color:#ff5733;">
						    <input type="submit" value="Delete Service" id="sbt-btn-ds" name="sbt-btn-ds" style="background-color:#722F37;">
						  </form>

						  </div>	

		    </div>

		    </div>
		    </div>

		</div>




		<script type="text/javascript">

			var arr_res_2 = <?php echo json_encode($g_info); ?>;
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


			//////

			//---- Reservation Table

			var countR = 0;
			function enableResvT(g_egn){

				//if(countR == 0){
				
			var arr_res_3 = <?php echo json_encode($gr_info); ?>;
			var arr_res_num_3 = arr_res_3.length;


			//$(document).ready(function() {
							

				// Generate a big table
				var value_2 = 0;
				for(var n=0;n<(arr_res_num_3/8);n++){
					var row = $("<tr onclick='myFunction_2(this)'>");
					//var row_1 = $("<th>");
					$("#sampleTable_2").find("thead th[id=third]").each(function() {
						if(arr_res_3[value_2] == g_egn){
							//alert(arr_res_3[value_2+5]);

						
						$("<td>",{
							html: String(arr_res_3[value_2+1]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_3[value_2+2]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_3[value_2+3]), //people
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_3[value_2+6]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_3[value_2+7]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_3[value_2+4]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_3[value_2+5]), 
							style:"padding:2px;"
						}).appendTo($(row));
						}
						value_2 = value_2 + 8;

					});
					row.appendTo($("#sampleTable_2").find("tbody"));


				}


				// And make them fancy
				$("#sampleTable_2").fancyTable({
					sortColumn:false,
					pagination: true,
					perPage:10,
					globalSearch:true
				});		
	
			//});
				countR = 1;
					//	}	

			}

			function depopulizeResvT(){
									
					//var row_1 = $("<th>");
					$("#sampleTable_2").find("thead th[id=third]").each(function() {

						
						$("<td>",{
							html: "", 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: "", 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: "", 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: "", 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: "", 
							style:"padding:2px;"
						}).appendTo($(row));
						

					});
					row.appendTo($("#sampleTable_2").find("tbody"));
				


				// And make them fancy
				$("#sampleTable_2").fancyTable({
					sortColumn:false,
					pagination: true,
					perPage:10,
					globalSearch:true
				});		
			}



			//////

			//---- Service Table
			var rows_s = 0;
			var countS = 0;
			function enableServT(g_egn, res_id){

				
				//if(countR == 0){
				
			var arr_res_4 = <?php echo json_encode($sr_tb); ?>;
			var arr_res_num_4 = arr_res_4.length;


			//alert(res_id.toString());
			//$(document).ready(function() {
							

				// Generate a big table
				var value_2 = 0;
				for(var n=0;n<(arr_res_num_4/6);n++){
					var row = $("<tr onclick='myFunction_3(this)'>");
					//var row_1 = $("<th>");
					$("#sampleTable_3").find("thead th[id=fourth]").each(function() {
						if(arr_res_4[value_2] == g_egn && arr_res_4[value_2+1]==res_id){
							rows_s++;
							//alert(arr_res_4[value_2+3]);						
						$("<td>",{
							html: String(arr_res_4[value_2+2]), 
							style:"padding:2px;"
						}).appendTo($(row));
						

						$("<td>",{
							html: String(arr_res_4[value_2+3]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_4[value_2+4]), 
							style:"padding:2px;"
						}).appendTo($(row));	

						$("<td>",{
							html: String(arr_res_4[value_2+5]), 
							style:"padding:2px;"
						}).appendTo($(row));											

						}
						value_2 = value_2 + 6;

					});
					row.appendTo($("#sampleTable_3").find("tbody"));


				}


				// And make them fancy
				$("#sampleTable_3").fancyTable({
					sortColumn:false,
					pagination: true,
					perPage:10,
					globalSearch:true
				});		
	
			//});
				countS = 1;
					//	}	

			}


			

		</script>

		<script type="text/javascript">
			
			var egn_t;
						function myFunction(x) { //table (Create Guest Table) row onclick -> populate the Create Guest form and get the data in the Reservation Table
			      //alert("Row index is: " + x.rowIndex);
			      //arr_res_2[parseInt(x.rowIndex)-2]
			    $("#upd_resr *").prop('disabled',true);
			    $("#cr_service *").prop('disabled',true);
			    $("#upd_serv *").prop('disabled',true);
			    $("#cr_res_d *").prop('disabled',false);
			    $("#upd_gst *").prop('disabled',false);
			    document.getElementById('egn').disabled = true;
			    var table = document.getElementById('sampleTable_1');			    

			     // alert(table.rows.length);                // number of rows
				//	alert(table.rows[2].cells.length);       // number of cells in row 3
				//alert(typeof String(x.rowIndex));
				var row = parseInt(x.rowIndex);

				//alert(row.toString());

			    //alert(table.rows[row].cells[1].innerHTML);

			    egn_t = table.rows[row].cells[0].innerHTML;
			    var f_name_t = table.rows[row].cells[1].innerHTML;
			    var l_name_t = table.rows[row].cells[2].innerHTML;
			    var gsm_g = table.rows[row].cells[3].innerHTML;
			    var psprt_gs = table.rows[row].cells[4].innerHTML;
			    if(psprt_gs.includes('null')){
			    	psprt_gs = '';
			    }

			    document.getElementById('qua_guest').value = "ID: " + egn_t + " | Name: " + f_name_t + " " + l_name_t;
			    document.getElementById('qua_guest_s').value = "ID: " + egn_t + " | Name: " + f_name_t + " " + l_name_t;
			    

			    document.getElementById('egn').value = egn_t;
			    document.getElementById('egn_new').value = egn_t;
			    document.getElementById('f_name').value = f_name_t;
			    document.getElementById('l_name').value= l_name_t;
			    document.getElementById('g_gsm').value = gsm_g;
			    document.getElementById('pass_new').value = psprt_gs;

			    if(countR==1){
					$("#sampleTable_2 td").remove();   //remove existing data from reservation table

					var table_res = document.getElementById('sampleTable_2');
					var inputs = table_res.getElementsByTagName('input');
					while (inputs.length) inputs[0].parentNode.removeChild(inputs[0]);	

					//$("#table_r").load(" #table_r > *");

					//var th = document.createElement('th');			
					//var tr = document.createElement('tr');			

				}	
				setCookie("old_egn", table.rows[row].cells[0].innerHTML, 3);
				enableResvT(egn_t); //populate reserv. table
			    enableIfSlcd();

			    //session_start();
			    //$_SESSION["old_egn_g"] = egn_t;
			    
			    			    

			  }

			  function setCookie(cname, cvalue, exdays) {
				  const d = new Date();
				  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				  let expires = "expires="+d.toUTCString();
				  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				}

				function enableIfSlcd(){
				/*					
					document.getElementById('date_in_cr').disabled = false;
					document.getElementById('date_out_cr').disabled = false;
					document.getElementById('room_n_cr').disabled = false; 
					document.getElementById('nop_cr').disabled = false;
					*/
				}

				function disableIfNotSlcd(){
					/*
					document.getElementById('date_in_cr').disabled = true;
					document.getElementById('date_out_cr').disabled = true;
					document.getElementById('room_n_cr').disabled = true;
					document.getElementById('nop_cr').disabled = true;
					*/
				}

				function populateResrT(){

				}


			    //////////


			    // disable adding EGN if it already exists
				document.getElementById("egn_cr").addEventListener("input", myFuncExist);

			    function myFuncExist() {
				  //alert("The value of the input field was changed.");
				  //alert(String(document.getElementById('nhotel').value));
				  if(arr_res_2.includes(document.getElementById('egn_cr').value)){
				  	document.getElementById('egn_lbl').innerHTML = "Exists";
				  	//alert("Nt OK");
				  	document.getElementById('sbt-crt').hidden = true;
				  }else{
				  	document.getElementById('sbt-crt').hidden = false;
				  }
				  
				}


				///////////

				//document.getElementById('upd_resr').disabled = "true";
				
				function myFunction_2(x) {
			    //alert("Row index is: " + x.rowIndex);
			    $("#upd_resr *").prop('disabled',false);
			    $("#cr_service *").prop('disabled',false);
			    $("#upd_serv *").prop('disabled',true);

			    var index_arr = <?php echo json_encode($gr_info_1);?>

			    var table = document.getElementById('sampleTable_2');			    

				var row = parseInt(x.rowIndex);
				//alert(row.toString());
				//alert(index_arr[row-2].toString());

			    //alert(table.rows[row].cells[1].innerHTML);
			    
			    var date_in_r = table.rows[row].cells[0].innerHTML;		
			    var date_out_r = table.rows[row].cells[1].innerHTML;	    
			    var people_r = table.rows[row].cells[2].innerHTML;
			    var extr_ppl_r = table.rows[row].cells[3].innerHTML;
			    var num_chldr_r = table.rows[row].cells[4].innerHTML;
			    var room_num_r = table.rows[row].cells[5].innerHTML;
			    var amount_r = table.rows[row].cells[6].innerHTML;


			    document.getElementById('date_in_res').value = date_in_r;
			    document.getElementById('date_out_r').value = date_out_r;
			    document.getElementById('num_p_res').value = people_r;
			    document.getElementById('noap_cr_u').value = extr_ppl_r;
			    document.getElementById('noch_cr_u').value = num_chldr_r;
			    document.getElementById('room_num_res').value = room_num_r;
			    document.getElementById('t_amount_res').value = amount_r;

			    //setCookie("serv_old", serv_name, 3);

			    if(countS==1){
			    	//rows_s = 0;
					$("#sampleTable_3 td").remove();   //remove existing data from reservation table

					var table_res = document.getElementById('sampleTable_3');
					var inputs = table_res.getElementsByTagName('input');
					while (inputs.length) inputs[0].parentNode.removeChild(inputs[0]);	
			

				}	

				setCookie("date_in", date_in_r, 1);
				setCookie("date_out", date_out_r, 1);
				setCookie("res_slc_id", index_arr[row-1], 1);
				//alert(index_arr[row-2].toString());

				enableServT(egn_t, index_arr[row-1]); //populate reserv. table   parseInt(x.rowIndex)


			  }


			  	function myFunction_3(x) {
			    //alert("Row index is: " + x.rowIndex);
			   // $("#upd_resr *").prop('disabled',false);
			    $("#upd_serv *").prop('disabled',false);

			    var table = document.getElementById('sampleTable_3');

				var row = parseInt(x.rowIndex);

			    //alert(table.rows[row].cells[1].innerHTML);
			    
			    var serv_s = table.rows[row].cells[0].innerHTML;		
			    var price_s = table.rows[row].cells[1].innerHTML;	    
			    var in_chrg_s = table.rows[row].cells[2].innerHTML;
			    var add_info_s = table.rows[row].cells[3].innerHTML;

			    


			    document.getElementById('txt_su').value = add_info_s;
			    
			    document.getElementById('t_serv_pr1').value = price_s;
			    
			    document.getElementById('serv_emp1').value = in_chrg_s;

			    document.getElementById('serv_cap1').value = serv_s;

			    //alert(rows_s.toString());
			    //alert(row.toString());

			    //var index_stb = row-2;
			    setCookie("ser_nm", serv_s, 1);
			    //setCookie("index_stb", index_stb, 1);			    

			    //setCookie("serv_old", serv_name, 3);

/*
			    if(countS==1){
					$("#sampleTable_3 td").remove();   

					var table_res = document.getElementById('sampleTable_3');
					var inputs = table_res.getElementsByTagName('input');
					while (inputs.length) inputs[0].parentNode.removeChild(inputs[0]);				

				}	

				*/

				//enableServT(egn_t); //populate reserv. table


			  }

			  function setCookie(cname, cvalue, exdays) {
				  const d = new Date();
				  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				  let expires = "expires="+d.toUTCString();
				  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				}

		</script>


		<script type="text/javascript">
			disableIfNotSlcd();
									
		</script>

</body>
<script type="text/javascript">
	//$("#upd_resr").children().prop('disabled',true);
	$("#upd_resr *").prop('disabled',true); //disable fields of Upd. Reservation div
	
	$("#cr_service *").prop('disabled',true); //disable fields of Create Service  div

	$("#upd_serv *").prop('disabled',true);
	
	$("#cr_res_d *").prop('disabled',true);
	
	$("#upd_gst *").prop('disabled',true);

	$("#sbt-crt").prop('hidden',true);


	//document.getElementById('g_pass_clbl').style.visibility = 'hidden';
	//document.getElementById('g_pass_c').style.visibility = 'hidden';
	$("#g_pass_clbl").prop('hidden',true);
	$("#g_pass_c").prop('hidden',true);
</script>



</html>