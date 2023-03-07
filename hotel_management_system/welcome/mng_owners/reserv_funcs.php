<?php

	include('../../session.php');

			
			$sql = "SELECT id FROM hotels_info WHERE name = '".$_SESSION['h_name']."';";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$_SESSION['h_id'] = $row['id'];
			  }
			} else {
			  echo "0 results";
			}



if (isset($_POST["sbt-btn-crt"])) {
	if(empty($_POST['egn_cr'])== false){
			$egn_cr = mysqli_real_escape_string($db, $_POST['egn_cr']);
			$pass_cr = mysqli_real_escape_string($db, $_POST['g_pass_c']);

			$f_name_cr = mysqli_real_escape_string($db, $_POST['f_name_cr']);
			$l_name_cr = mysqli_real_escape_string($db, $_POST['l_name_cr']);   
			$gsm_g = mysqli_real_escape_string($db, $_POST['gsm_cr']);
			$g_email_ins = mysqli_real_escape_string($db, $_POST['email_g']);

			$coutry= $_POST['country_slc'];
			//echo $coutry;

			$names = json_decode(file_get_contents("http://country.io/names.json"), true);
			//echo $names[$coutry]; //real name

			$key = array_search ($names[$coutry], $names);
			//echo $key; //country code 2

			
			//$new_mngr_id = "";
			$sql = "INSERT INTO guests_info (egn, passport, first_nm, last_nm, hotel_gid, gsm, country, g_email) VALUES ('".$egn_cr."', '".$pass_cr."', '".$f_name_cr."', '".$l_name_cr."', '".$_SESSION['h_id']."', '".$gsm_g."', '".$names[$coutry]."', '".$g_email_ins."')";

			if ($db->query($sql) === TRUE) {
			  echo "New record created successfully";
			  $last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  echo "Error: " . $sql . "<br>" . $db->error;
			}



			//$db->close();

			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

		}
}

if (isset($_POST["sbt-btn-ug"])) {
			//$u_type = mysqli_real_escape_string($db, $_POST['u_type_t']);

		   $cookie_name = "old_egn";
	   if(isset($_COOKIE[$cookie_name])) {
	   	    
	   	    $old_egn = $_COOKIE[$cookie_name];
		 


			$egn_new = mysqli_real_escape_string($db, $_POST['egn_new']);
			$f_nm = mysqli_real_escape_string($db, $_POST['f_name']);
			$l_nm = mysqli_real_escape_string($db, $_POST['l_name']);  
			$up_gsm = mysqli_real_escape_string($db, $_POST['g_gsm']);
			$psprt_gs = mysqli_real_escape_string($db, $_POST['pass_new']);

			$sql = "SELECT * FROM guests_info WHERE hotel_gid='".$_SESSION['h_id']."' AND egn ='".$old_egn."';";
			
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$r_id = $row['id'];
			  }
			} else {
			  echo "0 results";
			}

			//echo $r_id;

			//$new_mngr_id = "";
			$sql1 = "UPDATE guests_info SET egn='".$egn_new."', first_nm='".$f_nm."', last_nm='".$l_nm."', gsm='".$up_gsm."', passport = '".$psprt_gs."' WHERE id = '".$r_id."';";

			if (mysqli_query($db, $sql1)) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($db);
			}

    

			//$db->close();
		}	

			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

}



if (isset($_POST["sbt-btn-dg"])) {
			//$u_type = mysqli_real_escape_string($db, $_POST['u_type_t']);

		 $cookie_name = "old_egn";
	   if(isset($_COOKIE[$cookie_name])) {	   	    
	   	    $old_egn = $_COOKIE[$cookie_name];		
	   	   // echo $old_egn; 

	   	    //echo $old_egn;
	   	    //echo $_SESSION['h_id'];

			//$u_type_n = mysqli_real_escape_string($db, $_POST['u_type']);

	   	 

			//$new_mngr_id = "";
			$sql = "DELETE FROM guests_info WHERE egn ='".$old_egn."' AND hotel_gid = '".$_SESSION['h_id']."' ;";

			if ($db->query($sql) === TRUE) {
			  echo "Record deleted successfully";
			} else {
			  echo "Error deleting record: " . $db->error;
			}			

    
			//$url_1 = "reserv_mng.php";
        	//header( "Location: $url_1" );
			//$db->close();
		}

			//$url_1 = "reserv_mng.php";
        	//header( "Location: $url_1" );

}


if (isset($_POST["sbt-btn-crgr"])) {
	if(empty($_POST['date_in_cr'])== false && empty($_POST['date_out_cr'])== false && empty($_POST['rooms_cap'])== false && empty($_POST['tamount_cr'])== false){
			$date_in = mysqli_real_escape_string($db, $_POST['date_in_cr']);
			$date_out_cr = mysqli_real_escape_string($db, $_POST['date_out_cr']);
			$num_people = mysqli_real_escape_string($db, $_POST['nop_cr']);
			$rooms_cap = $_POST['rooms_cap'];   
			$tamount_cr = mysqli_real_escape_string($db, $_POST['tamount_cr']);
			
			$extr_ppl = mysqli_real_escape_string($db, $_POST['noap_cr']);
			$num_chldr = mysqli_real_escape_string($db, $_POST['noch_cr']);

			$cookie_name = "old_egn";
			$old_egn = $_COOKIE[$cookie_name];

	
			$sql = "SELECT id FROM guests_info WHERE hotel_gid = '".$_SESSION['h_id']."' AND egn ='".$old_egn."';";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$guest_id = $row['id'];			  	
			  }
			} else {
			  echo "0 results";
			}		



			$sql = "SELECT id FROM rooms WHERE hot_id  = '".$_SESSION['h_id']."' AND num ='".$rooms_cap."';";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$room_id = $row['id'];			  	
			  }
			} else {
			  echo "0 results";
			}	


			//$new_mngr_id = "";
			$sql = "INSERT INTO guest_res (gid, date_in, date_out, num_of_people, room_num, price_gr, extr_ppl, num_chldr) VALUES ('".$guest_id."', '".$date_in."', '".$date_out_cr."', '".$num_people."', '".$room_id."', '".$tamount_cr."', '".$extr_ppl."', '".$num_chldr."')";

			if ($db->query($sql) === TRUE) {
			  echo "New record created successfully";
			  $last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  echo "Error: " . $sql . "<br>" . $db->error;
			}



			//$db->close();

			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

		}else{
			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

		}
}




if (isset($_POST["sbt-btn-ur"])) {
			//$u_type = mysqli_real_escape_string($db, $_POST['u_type_t']);

		   $cookie_name = "old_egn";
	   if(isset($_COOKIE[$cookie_name])) {
	   	    
	   	    $old_egn = $_COOKIE[$cookie_name];
		 


			//$egn_new = mysqli_real_escape_string($db, $_POST['egn_new']);
			$date_in = mysqli_real_escape_string($db, $_POST['date_in_res']);
			$date_out = mysqli_real_escape_string($db, $_POST['date_out_r']);
			$num_people = mysqli_real_escape_string($db, $_POST['num_p_res']);
			$rooms_cap = $_POST['room_num_res'];   
			$tamount_cr = mysqli_real_escape_string($db, $_POST['t_amount_res']);

			$sql = "SELECT id FROM guests_info WHERE hotel_gid = '".$_SESSION['h_id']."' AND egn ='".$old_egn."';";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$guest_id = $row['id'];			  	
			  }
			} else {
			  echo "0 results";
			}		



			$sql = "SELECT id FROM rooms WHERE hot_id  = '".$_SESSION['h_id']."' AND num ='".$rooms_cap."';";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$room_id = $row['id'];			  	
			  }
			} else {
			  echo "0 results";
			}
			

			//$new_mngr_id = "";
			$sql = "UPDATE guest_res SET date_in='".$date_in."', date_out='".$date_out."', num_of_people='".$num_people."', room_num = '".$room_id."', price_gr='".$tamount_cr."' WHERE gid = '".$guest_id."' AND date_in='".$_COOKIE['date_in']."' AND date_out='".$_COOKIE['date_out']."' ;";

			if (mysqli_query($db, $sql)) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($conn);
			}

    

			//$db->close();
		}	

			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

}



if (isset($_POST["sbt-btn-dr"])) {
			//$u_type = mysqli_real_escape_string($db, $_POST['u_type_t']);

		   $cookie_name = "old_egn";
	   if(isset($_COOKIE[$cookie_name])) {	   	    
	   	    $old_egn = $_COOKIE[$cookie_name];		
	   	    //echo $old_egn; 


			//$u_type_n = mysqli_real_escape_string($db, $_POST['u_type']);

			$sql = "SELECT id FROM guests_info WHERE hotel_gid = '".$_SESSION['h_id']."' AND egn ='".$old_egn."';";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$guest_id = $row['id'];			  	
			  }
			} else {
			  echo "0 results";
			}

			//echo $guest_id;

			//$new_mngr_id = "";
			$sql = "DELETE FROM guest_res WHERE gid ='".$guest_id."' AND date_in='".$_COOKIE['date_in']."' AND date_out='".$_COOKIE['date_out']."'  ;";

			if ($db->query($sql) === TRUE) {
			  echo "Record deleted successfully";
			} else {
			  echo "Error deleting record: " . $db->error;
			}

    

			$db->close();
		}

			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

}

// Services

if (isset($_POST["sbt-btn-rcrt"])) {

			$serv = $_POST['serv_cap'];
			$in_charge = $_POST['serv_emp'];
			$add_info = mysqli_real_escape_string($db, $_POST['comment']);
			$amount = mysqli_real_escape_string($db, $_POST['t_serv_pr']);
			//echo $in_charge;

			$sql = "SELECT id FROM login WHERE username = '".$in_charge."' ;";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$log_id = $row['id'];			  	
			  }
			} else {
			  echo "0 results";
			}




			$cookie_name = "old_egn";
			$old_egn = $_COOKIE[$cookie_name];

			$sql = "SELECT id FROM guests_info WHERE hotel_gid = '".$_SESSION['h_id']."' AND egn ='".$old_egn."';";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$guest_id = $row['id'];			  	
			  }
			} else {
			  echo "0 results";
			}

	
			$sql = "SELECT id FROM guest_res WHERE gid = '".$guest_id."' AND date_in='".$_COOKIE['date_in']."' AND date_out='".$_COOKIE['date_out']."'  ;";
			$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$gr_id = $row['id'];			  	
			  }
			} else {
			  echo "0 results";
			}	


			//$new_mngr_id = "";
			$sql = "INSERT INTO guest_serv (gr_id, in_chrg_lid , serv_nm, price_serv, add_info) VALUES ('".$gr_id."', '".$log_id."', '".$serv."', '".$amount."', '".$add_info."')";

			if ($db->query($sql) === TRUE) {
			  echo "New record created successfully";
			  //$last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  echo "Error: " . $sql . "<br>" . $db->error;
			}



			$db->close();

			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

}



if (isset($_POST["sbt-btn-us"])) {
			//$u_type = mysqli_real_escape_string($db, $_POST['u_type_t']);

			$serv = $_POST['serv_cap1'];
			$in_charge = $_POST['serv_emp1'];
			$add_info = mysqli_real_escape_string($db, $_POST['comment1']);
			$amount = mysqli_real_escape_string($db, $_POST['t_serv_pr1']);

			//echo $in_charge;
		   
	   	    
	   	    $res_slc_id = $_COOKIE['res_slc_id']; 
	   	    $ser_nm = $_COOKIE['ser_nm'];

	   	    //echo $ser_nm;

	   	    $sql = "SELECT * FROM guest_serv WHERE gr_id='".$res_slc_id."';";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$serv_id = $row['id'];	
			  	//echo $serv_id."---";
			  	//echo $serv_id;
			  }
			} else {
			  echo "0 results";
			}

			$sql = "SELECT * FROM login WHERE username='".$in_charge."';";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$user_s = $row['id'];	
			  	//echo $serv_id."---";
			  	//echo $serv_id;
			  }
			} else {
			  echo "0 results";
			}

			$sql = "UPDATE guest_serv SET in_chrg_lid ='".$user_s."', serv_nm ='".$serv."', price_serv ='".$amount."', add_info = '".$add_info."' WHERE gr_id  = '".$res_slc_id."' AND serv_nm ='".$ser_nm."' ;";

			if (mysqli_query($db, $sql)) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($db);
			}


    

			$db->close();


			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

}



if (isset($_POST["sbt-btn-ds"])) {
			//$u_type = mysqli_real_escape_string($db, $_POST['u_type_t']);


	   	    $res_slc_id = $_COOKIE['res_slc_id']; 
	   	    $ser_nm = $_COOKIE['ser_nm'];


			//$new_mngr_id = "";
			$sql = "DELETE FROM guest_serv WHERE gr_id  = '".$res_slc_id."' AND serv_nm ='".$ser_nm."' ;";

			if ($db->query($sql) === TRUE) {
			  echo "Record deleted successfully";
			} else {
			  echo "Error deleting record: " . $db->error;
			}

    

			$db->close();		

			$url_1 = "reserv_mng.php";
        	header( "Location: $url_1" );

}


?>