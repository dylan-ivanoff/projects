<?php 

    include("../functions/config.php");
    if (isset($_POST["submit-btn"])) {

    	$myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = md5($_POST['password']); 
        $hotel = mysqli_real_escape_string($db, $_POST['newhotel']);
        $does_hexists = 0;
        if($hotel == ""){
        	$hotel = $_POST['hotels'];
        	$does_hexists++;
        }
        
        $sql = "INSERT INTO login (username, pass, level)
		VALUES ('".$myusername."', '".$mypassword."', '2')";

		if (mysqli_query($db, $sql)) {
		  $last_id = mysqli_insert_id($db);
		  echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}

		if($does_hexists == 0){
			$sql_1 = "INSERT INTO hotels_info (name)
			VALUES ('".$hotel."')";
			
			if (mysqli_query($db, $sql_1)) {
			  $last_id_1 = mysqli_insert_id($db);
			  echo "New record created successfully. Last inserted ID is: " . $last_id_1;
			} else {
			  echo "Error: " . $sql_1 . "<br>" . mysqli_error($db);
			}			
		}else{
			$sql_1 = "SELECT id FROM hotels_info WHERE name = '".$hotel."';";
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
		}


		$sql_2 = "INSERT INTO hotels_emp (user_id, hotel_id)
		VALUES ('".$last_id."', '".$last_id_1."')";

		if (mysqli_query($db, $sql_2)) {
		  $last_id_2 = mysqli_insert_id($db);
		  echo "New record created successfully. Last inserted ID is: " . $last_id_2;
		} else {
		  echo "Error: " . $sql_2 . "<br>" . mysqli_error($db);
		}
        
        $url ="welcome.php";
        header( "Location: $url" );
		

        /*
        echo "<div> POST BODY <br>";
        echo $hotel;
        echo "</div>";       
		*/

    }

?>