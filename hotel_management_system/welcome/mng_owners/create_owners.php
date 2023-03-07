<?php

//include("../../functions/config.php");
include('../../session.php');

if (isset($_POST["sbt-btn-cown"])) {
	if(empty($_POST['username'])== false && empty($_POST['password'])== false){
			$create_owr_u = mysqli_real_escape_string($db, $_POST['username']);
			$create_owr_p = md5($_POST['password']);

			$new_owr_id = "";
			$sql = "INSERT INTO login (username, pass, level) VALUES ('".$create_owr_u."', '".$create_owr_p."', '2')";

			if ($db->query($sql) === TRUE) {
			  echo "New record created successfully";
			  $last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  echo "Error: " . $sql . "<br>" . $db->error;
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
			  echo "0 results";
			}


			$sql_1 = "INSERT INTO hotels_emp (user_id, hotel_id) VALUES ('".$last_id."', '".$_SESSION['h_id']."')";

			if ($db->query($sql_1) === TRUE) {
			  echo "New record created successfully";
			  //$last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  echo "Error: " . $sql_1 . "<br>" . $db->error;
			}

			$db->close();

			$url_1 ="mng_owners.php";
        	header( "Location: $url_1" );

		}
}


?>