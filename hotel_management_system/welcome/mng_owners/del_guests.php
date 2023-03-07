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

			$sql = "SELECT * FROM guests_info WHERE egn ='".$old_egn."';";
			
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

			//$url_1 = "reserv_mng.php";
        	//header( "Location: $url_1" );

}

?>