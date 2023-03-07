<?php

include("../functions/config.php");

if (isset($_POST["submit-btn-del-1"])) {

		
			//$hotel_nm = $_POST['owner_slc1'];
			$hotel_nm = $_COOKIE['hotel_name_dl'];			


			//echo $hotel_nm;
					if (!$db) {
					  die("dbection failed: " . mysqli_dbect_error());
					}
					
					

					

					$sql_1 = "SELECT id FROM hotels_info WHERE name='".$hotel_nm."';";
							$result = mysqli_query($db, $sql_1);

							if (mysqli_num_rows($result) > 0) {
							  // output data of each row
							  while($row = mysqli_fetch_assoc($result)) {
							    $last_id_1 = $row['id'];
							    echo $last_id_1;
							  }
							} else {
							  echo "0 results";
							}

					$sql_2 = "SELECT user_id FROM hotels_emp WHERE hotel_id='".$last_id_1."';";
							$result = mysqli_query($db, $sql_2);

							if (mysqli_num_rows($result) > 0) {
							  // output data of each row
							  while($row = mysqli_fetch_assoc($result)) {
							    $last_id_2 = $row['user_id'];
							    echo $last_id_2;
							  }
							} else {
							  echo "0 results";
							}

					$sql_3 = "DELETE FROM hotels_emp WHERE hotel_id='".$last_id_1."';";

					if (mysqli_query($db, $sql_3)) {
					  echo "Record deleted successfully";
					} else {
					  echo "Error deleting record: " . mysqli_error($db);
					}		

					$sql_4 = "DELETE FROM hotels_info WHERE name='".$hotel_nm."';";

					if (mysqli_query($db, $sql_4)) {
					  echo "Record deleted successfully";
					} else {
					  echo "Error deleting record: " . mysqli_error($db);
					}		


					$sql_5 = "DELETE FROM login WHERE id='".$last_id_2."';";

					if (mysqli_query($db, $sql_5)) {
					  echo "Record deleted successfully";
					} else {
					  echo "Error deleting record: " . mysqli_error($db);
					}		

					$url_1 ="welcome.php";
        			header( "Location: $url_1" );


		
			$url ="welcome.php";
        	//header( "Location: $url" );
		


/*
		// Check connection
		if (!$db) {
		  die("dbection failed: " . mysqli_dbect_error());
		}

		// sql to delete a record
		$sql = "DELETE * hotels_info WHERE name='".."';";

		if (mysqli_query($db, $sql)) {
		  echo "Record deleted successfully";
		} else {
		  echo "Error deleting record: " . mysqli_error($db);
		}
		*/

}




?>