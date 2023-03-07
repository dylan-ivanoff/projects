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
	if(empty($_POST['r_type'])== false){
			$r_type = mysqli_real_escape_string($db, $_POST['r_type']);
			$r_cap = mysqli_real_escape_string($db, $_POST['hmp_type']);
			$extr_bds_ppr = mysqli_real_escape_string($db, $_POST['ebpp_type']);
			$chdr_ppr = mysqli_real_escape_string($db, $_POST['chpp_type']);

			//$new_mngr_id = "";
			$sql = "INSERT INTO room_type (type, cap, extra_bds_ppr, chldr_ppr, h_id ) VALUES ('".$r_type."', '".$r_cap."', '".$extr_bds_ppr."', '".$chdr_ppr."', '".$_SESSION['h_id']."')";

			if ($db->query($sql) === TRUE) {
			  echo "New record created successfully";
			  $last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  echo "Error: " . $sql . "<br>" . $db->error;
			}



			$db->close();

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );

		}
}

if (isset($_POST["sbt-btn-urt"])) {
			//$u_type = mysqli_real_escape_string($db, $_POST['u_type_t']);

		   $cookie_name = "old_type";
	   if(isset($_COOKIE[$cookie_name])) {
	   	    
	   	    $u_type = $_COOKIE[$cookie_name];

			$u_type_n = mysqli_real_escape_string($db, $_POST['u_type']); //      
			$u_num_ppl_n = mysqli_real_escape_string($db, $_POST['u_num_ppl']);
			$u_bds_ppr_n = mysqli_real_escape_string($db, $_POST['u_bds_ppr']);
			$u_chr_ppr_n = mysqli_real_escape_string($db, $_POST['u_chr_ppr']);


			$sql = "SELECT id FROM room_type WHERE h_id = '".$_SESSION['h_id']."' AND type='".$u_type."';";
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
			$sql = "UPDATE room_type SET type='".$u_type_n."', cap='".$u_num_ppl_n."', extra_bds_ppr='".$u_bds_ppr_n."', chldr_ppr='".$u_chr_ppr_n."' WHERE id = '".$r_id."';";

			if (mysqli_query($db, $sql)) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($conn);
			}

    

			$db->close();
		}	

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );

}



if (isset($_POST["sbt-btn-drt"])) {
			//$u_type = mysqli_real_escape_string($db, $_POST['u_type_t']);

		   $cookie_name = "old_type";
	   if(isset($_COOKIE[$cookie_name])) {	   	    
	   	    $u_type = $_COOKIE[$cookie_name];		 


			//$u_type_n = mysqli_real_escape_string($db, $_POST['u_type']);

			$sql = "SELECT id FROM room_type WHERE h_id = '".$_SESSION['h_id']."' AND type='".$u_type."';";
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
			$sql = "DELETE FROM room_type WHERE id='".$r_id."' ;";

			if ($db->query($sql) === TRUE) {
			  echo "Record deleted successfully";
			} else {
			  echo "Error deleting record: " . $db->error;
			}

    

			$db->close();
		}

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );

}


if (isset($_POST["sbt-btn-cr"])) {
	if(empty($_POST['hot_rm_n'])== false){

			$r_type = $_POST['lelev_cr_del']; 
			$r_num = mysqli_real_escape_string($db, $_POST['hot_rm_n']);
			$r_price = mysqli_real_escape_string($db, $_POST['price']);
			$r_avail = $_POST['available'];
			$exr_bds_cp = mysqli_real_escape_string($db, $_POST['extra_bds']);
			$chlr_cp = mysqli_real_escape_string($db, $_POST['children_cap']);


			$sql = "SELECT id FROM room_type WHERE h_id = '".$_SESSION['h_id']."' AND type='".$r_type."';";
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

			
			$sql = "INSERT INTO rooms (num, hot_id, type_id, price, free, extr_beds_cps, chldr_cps ) VALUES ('".$r_num."', '".$_SESSION['h_id']."', '".$r_id."', '".$r_price."', '".$r_avail."', '".$exr_bds_cp."', '".$chlr_cp."')";

			if ($db->query($sql) === TRUE) {
			  echo "New record created successfully";
			  $last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  echo "Error: " . $sql . "<br>" . $db->error;
			}


			$db->close();

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );

		}
}


if (isset($_POST["sbt-btn-ur"])) {
	if(empty($_POST['hot_rm_n'])== false){

		$cookie_name = "old_rnum";
	   if(isset($_COOKIE[$cookie_name])) {	   	    
	   	    $old_rnum_u = $_COOKIE[$cookie_name];

			$r_type = $_POST['lelev_cr_del']; 
			$r_num = mysqli_real_escape_string($db, $_POST['hot_rm_n']);
			$r_price = mysqli_real_escape_string($db, $_POST['price']);
			$r_avail = $_POST['available'];
			$exr_bds_cp = mysqli_real_escape_string($db, $_POST['extra_bds']);
			$chlr_cp = mysqli_real_escape_string($db, $_POST['children_cap']);


			$sql = "SELECT id FROM room_type WHERE h_id = '".$_SESSION['h_id']."' AND type='".$r_type."';";
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

			
			$sql = "UPDATE rooms SET num='".$r_num."', type_id='".$r_id."', price='".$r_price."', free='".$r_avail."', extr_beds_cps='".$exr_bds_cp."', chldr_cps='".$chlr_cp."' WHERE num = '".$old_rnum_u."';";

			if (mysqli_query($db, $sql)) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($conn);
			}


			$db->close();

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );
        }else{
        	$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );
        }

		}
}


if (isset($_POST["sbt-btn-dr"])) {
	$cookie_name = "old_rnum";
	   if(isset($_COOKIE[$cookie_name])) {	   	    
	   	    $old_rnum_u = $_COOKIE[$cookie_name];
	

			$r_num = mysqli_real_escape_string($db, $_POST['hot_rm_n']);
									
			$sql = "DELETE FROM rooms WHERE num ='".$old_rnum_u."' AND hot_id = '".$_SESSION['h_id']."' ;";

			if ($db->query($sql) === TRUE) {
			  echo "Record deleted successfully";
			} else {
			  echo "Error deleting record: " . $db->error;
			}


			$db->close();

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );

	}else{
		$url_1 = "h_capacity.php";
        header( "Location: $url_1" );
	}	
}


if (isset($_POST["sbt-btn-cs"])) {

			$service = $_POST['r_serv_1']; 
			$s_price = mysqli_real_escape_string($db, $_POST['r_serv_2']);

			
			$sql = "INSERT INTO services (service, price, hotel_id) VALUES ('".$service."', '".$s_price."' ,'".$_SESSION['h_id']."');";

			if ($db->query($sql) === TRUE) {
			  echo "New record created successfully";
			  $last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  echo "Error: " . $sql . "<br>" . $db->error;
			}


			$db->close();

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );

}


if (isset($_POST["sbt-btn-us"])) {
			
			$s_price = mysqli_real_escape_string($db, $_POST['u_serv_2']);

			$cookie_name = "serv_old";
			if(isset($_COOKIE[$cookie_name])) {			   	    
			   	$s_type = $_COOKIE[$cookie_name];			  
					    

			
			$sql = "UPDATE services SET price = '".$s_price."' WHERE hotel_id = '".$_SESSION['h_id']."' AND service='".$s_type."';";

			if (mysqli_query($db, $sql)) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($conn);
			}


			$db->close();

		}

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );

}



if (isset($_POST["sbt-btn-ds"])) {

			$cookie_name = "serv_old";
			if(isset($_COOKIE[$cookie_name])) {			   	    
			   	$s_type = $_COOKIE[$cookie_name];	
									
			$sql = "DELETE FROM services WHERE service ='".$s_type."' AND hotel_id = '".$_SESSION['h_id']."' ;";

			if ($db->query($sql) === TRUE) {
			  echo "Record deleted successfully";
			} else {
			  echo "Error deleting record: " . $db->error;
			}


			$db->close();

		}	

			$url_1 = "h_capacity.php";
        	header( "Location: $url_1" );

}



?>