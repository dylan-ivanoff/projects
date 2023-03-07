<?php

	include('../../session.php');
	error_reporting(E_ALL);



	if (isset($_POST["sbt-pinfo"])) {
			
			$f_name = mysqli_real_escape_string($db, $_POST['first_name']);
			$l_name = mysqli_real_escape_string($db, $_POST['last_name']);
			$new_user = mysqli_real_escape_string($db, $_POST['new_username']);

			$new_pass = mysqli_real_escape_string($db, $_POST['password_2']);
			$new_pass1 = md5($_POST['password_2']);

			$b_day = mysqli_real_escape_string($db, $_POST['birthday']);
			$gender = mysqli_real_escape_string($db, $_POST['gender']);
			if($gender == ""){$gender = 'male';}
			$p_num = mysqli_real_escape_string($db, $_POST['phone']);
			//$e_mail = mysqli_real_escape_string($db, $_POST['u_email']);
			
			//$h_name = mysqli_real_escape_string($db, $_POST['repeat_h_name']);
			//$u_avatar = mysqli_real_escape_string($db, $_POST['repeat_h_name']);

				   

			//echo $gender;
				$sql = "SELECT * FROM personal_info WHERE u_id= '".$user_lid."' ;";
				$result = $db->query($sql);


			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {			    		
			  	//echo $row['id'];
			  	$empty = 0;
			  }
			} else {
			  $empty = 1;
			}

			if($empty == 1){
			$sql = "INSERT INTO personal_info (u_id, ho_id ) VALUES ('".$user_lid."', '".$_SESSION['hid']."')";

			if ($db->query($sql) === TRUE) {
			  echo "New record created successfully";
			  $last_id = $db->insert_id;
			  //echo $last_id;
			} else {
			  //echo "Error: " . $sql . "<br>" . $db->error;
			}

			}




				$sql_p_info = "UPDATE personal_info SET f_name = '".$f_name."', l_name = '".$l_name."', b_day = '".$b_day."', gender = '".$gender."', ph_num = '".$p_num."' WHERE u_id= '".$user_lid."' ;";


				if ($db->query($sql_p_info) === TRUE) {
				  echo "Record updated successfully";
				} else {
				  //echo "Error updating record: " . $db->error;
				}


				$cookie_name = "ch_hot_nm";
				if(isset($_COOKIE[$cookie_name])) {
					  //echo "Cookie named '" . $cookie_name . "' is not set!";
				   	 $h_name = $_COOKIE[$cookie_name];
				   	 //echo $h_name;
				   	  $sql_h_name = "UPDATE hotels_info SET name = '".$h_name."' WHERE name= '".$hotel_name_1."' ;";


						if ($db->query($sql_h_name) === TRUE) {
						  echo "Record updated successfully";
						} else {
						  //echo "Error updating record: " . $db->error;
						}

					}


				if($new_user != ""){
						$sql_n_user = "UPDATE login SET username = '".$new_user."' WHERE id= '".$user_lid."' ;";


						if ($db->query($sql_n_user) === TRUE) {
						  echo "Record updated successfully";
						  session_destroy();
						  $url_n_user = "../../logout.php";
			        	  header( "Location: $url_n_user" );

						} else {
						  echo "Error updating record: " . $db->error;
						}
				}

				
				if( strlen(trim($new_pass)) > 3){
						$sql_n_pass = "UPDATE login SET pass = '".$new_pass1."' WHERE id= '".$user_lid."' ;";


						if ($db->query($sql_n_pass) === TRUE) {
						  echo "Record updated successfully";
						  session_destroy();
						  $url_n_pass = "../../logout.php";
			        	  header( "Location: $url_n_pass" );
						} else {
						  echo "Error updating record: " . $db->error;
						}
				}				

			if(isset($_FILES['img_av'])){
		      $errors= array();
		      $file_name = $_FILES['img_av']['name'];
		      $file_size = $_FILES['img_av']['size'];
		      $file_tmp = $_FILES['img_av']['tmp_name'];
		      $file_type = $_FILES['img_av']['type'];
		      //$file_ext=strtolower(end(explode('.',$file_name)));
		      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
		      
		      $extensions= array("jpeg","jpg","png");
		      
		      if(in_array($file_ext,$extensions)=== false){
		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }
		      
		      if($file_size > 2097152) {
		         $errors[]='File size must be excately 2 MB';
		      }
		      
		      if(empty($errors)==true) {
		         move_uploaded_file($file_tmp,"avatars/".$file_name);
		         //echo "Success";

		         $sql_avr = "UPDATE personal_info SET avatar ='".$file_name."' WHERE u_id= '".$user_lid."' ;";

				if ($db->query($sql_avr) === TRUE) {
				  echo "Record updated successfully";
				} else {
				  echo "Error updating record: " . $db->error;
				}


		      }else{
		         //print_r($errors);
		      }
		   }

			

		    $url_1 = "personal_info.php";
        	header( "Location: $url_1" );




/*

			$new_mngr_id = "";
			$sql = "INSERT INTO login (username, pass, level) VALUES ('".$create_mngr_u."', '".$create_mngr_p."', '".$_SESSION['change_by_lvl']."')";

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

			$url_1 = "staff_acc_crt.php";
        	header( "Location: $url_1" );

		*/
	}



?>



