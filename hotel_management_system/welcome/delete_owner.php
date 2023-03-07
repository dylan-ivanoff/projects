<?php

include("../functions/config.php");

//if (isset($_POST["submit-btn-ownr-1"])) {

			$hotel_owr = $_COOKIE['own_name_dl'];


			if (!$db) {
				die("dbection failed: " . mysqli_dbect_error());
			}

					$sql_1 = "SELECT * FROM hotels_emp JOIN login on hotels_emp.user_id = login.id WHERE login.username='".$hotel_owr."' ;";
							$result = mysqli_query($db, $sql_1);

							if (mysqli_num_rows($result) > 0) {
							  // output data of each row
							  while($row = mysqli_fetch_assoc($result)) {
							    $last_id_1 = $row['user_id'];
							    echo $last_id_1;
							  }
							} else {
							  echo "0 results";
							}

					$sql_2 = "DELETE FROM hotels_emp WHERE user_id='".$last_id_1."';";

					if (mysqli_query($db, $sql_2)) {
					  echo "Record deleted successfully";
					} else {
					  echo "Error deleting record: " . mysqli_error($db);
					}


					$sql_3 = "DELETE FROM login WHERE id='".$last_id_1."';";

					if (mysqli_query($db, $sql_3)) {
					  echo "Record deleted successfully";
					} else {
					  echo "Error deleting record: " . mysqli_error($db);
					}

					$url_1 ="welcome.php";
        			//header( "Location: $url_1" );					


//}

?>