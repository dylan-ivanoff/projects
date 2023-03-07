<?php

include("../../functions/config.php");

if (isset($_POST["sbt-btn-upd-m-1"])) {

			$del_mng = $_COOKIE['del_empoyee']; 

			$new_pass = md5($_POST['emp_pass1']);


			if (!$db) {
				die("dbection failed: " . mysqli_dbect_error());
			}

					$sql_1 = "SELECT * FROM hotels_emp JOIN login on hotels_emp.user_id = login.id WHERE login.username='".$del_mng."' ;";
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


					$sql1 = "UPDATE login SET pass='".$new_pass."' WHERE username = '".$del_mng."';";

						if (mysqli_query($db, $sql1)) {
						  echo "Record updated successfully";
						} else {
						  echo "Error updating record: " . mysqli_error($db);
						}

					$url_1 ="staff_acc_crt.php";
        			header( "Location: $url_1" );					

		
}

?>