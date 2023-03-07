<?php

	include('../../session.php');
	error_reporting(E_ALL);



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- fancyTable Js -->
<script src="../../src/fancyTable.js"></script>


<!-- Styles.css -->
<link rel="stylesheet" href="../styles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<style type="text/css">
		#inner0 {
   float:left; 

   border-bottom: 4mm ridge rgba(72 122 180 / .2); 
}

	#inner1 {
   float:left; 
   clear: left;
   margin-top: 3%;

   border-bottom: 4mm ridge rgba(72 122 180 / .2); 
}

#inner2{
   float:left; 
   clear: left;
   margin-top: 3%;

   border-bottom: 4mm ridge rgba(72 122 180 / .2); 
}

#inner3{
   float:left; 
   clear: left;
   margin-top: 3%;

   border-bottom: 4mm ridge rgba(72 122 180 / .2); 
}

#inner4{
   float:left; 
   clear: left;
   margin-top: 3%;

   border-bottom: 4mm ridge rgba(72 122 180 / .2); 
}

#inner5{
   float:left; 
   clear: left;
   margin-top: 3%;

   border-bottom: 4mm ridge rgba(72 122 180 / .2); 
}


#pass_1 {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

#pass_2 {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

#birthday{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

#phone{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;	
}

#u_email{
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
	

		<div class="body-content" style="padding-left: 5%; padding-top: 3%;">

		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view" style="width: 15%; float: left;">

		    </div>
		    <div class="right-view" style="width: 80%; float: right;">
		    	<div id="wrapper" class="div-form" style="width: 86%; ">
						  <form action="pers_info.php" method="POST" id="form_info" enctype="multipart/form-data">
						  	<h3 style="text-align: center;">Change Personal Info</h3>

						  	<div id="inner0" style="width: 100%; position: relative;">
						  		<div style="width: 27%; float: left; margin-left: 7%;">
						  			<label for="slc_prof_ph">Select Profile Photo</label>
						  			<input type="file" id="slc_prof_ph" name="img_av" style="margin-top: 5%;">

						  			<!--
						  				  <label for="lelev_cr_del" style="color: white; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Select Level:</label>
											  <select name="lelev_cr_del" id="sel_lvl" onchange="changeLvl()" required>
											    <option value='3'>Title</option>
											    <option value='3'>Mr</option>
											    <option value='4'>Mrs</option>
											    <option value='5'>Ms</option>
											    <option value='6'>Miss</option>
											  </select>
									-->		  
						  		</div>
						  		 
						  		<div style="width: 27%; float: left; margin-left: 7%;">
						  			<label for="f_name">First Name</label>
						    		<input type="text" id="f_name" name="first_name" value="<?php if($_SESSION['pers_info'][0] != ''){echo $_SESSION['pers_info'][0];}  ?>" required>
						  		</div>
						  		<div style="width: 27%; float: right;">
						  			<label for="l_name">Last Name</label>
						    		<input type="text" id="l_name" name="last_name" value="<?php if($_SESSION['pers_info'][1] != ''){echo $_SESSION['pers_info'][1];}  ?>" required>
						    		
						  		</div>

						  	</div>

						  	<div id="inner1" style="width: 100%; position: relative;">
						  		<div style="width: 27%; float: left; margin-left: 7%;">
						  			<label for="user">Username</label>
						    		<input type="text" id="user" name="username" placeholder="<?php echo $login_session; ?>" readonly>
						  		</div>

						  		<?php
						  			$sql_u_names = "SELECT username FROM login;";
							         $res_u_names = mysqli_query($db, $sql_u_names);
							         $hot_u_names_arr = array();

							         if (mysqli_num_rows($res_u_names) > 0) {
							           // output data of each row
							           while($row = mysqli_fetch_assoc($res_u_names)) {
							             $hot_u_names = $row['username'];
							             //echo $hotel_name_1;
							             array_push($hot_u_names_arr, $hot_u_names);
							             
							           }
							         } else {
							           //echo "0 results";
							         }
							         //print_r($hot_u_names_arr);

							         $sql_h_names = "SELECT name FROM hotels_info;";
							         $res_h_names = mysqli_query($db, $sql_h_names);
							         $hot_h_names_arr = array();

							         if (mysqli_num_rows($res_h_names) > 0) {
							           // output data of each row
							           while($row = mysqli_fetch_assoc($res_h_names)) {
							             $hot_h_names = $row['name'];
							             //echo $hotel_name_1;
							             array_push($hot_h_names_arr, $hot_h_names);
							             
							           }
							         } else {
							           //echo "0 results";
							         }

						  		?>

						  		<div style="width: 27%; float: left; margin-left: 7%;">
						  			<label for="new_user">New Username</label>
						    		<input type="text" id="new_user" name="new_username" placeholder="Username.."  minlength="5" maxlength="15">
						  		</div>
						  		<div style="width: 27%; float: right; padding-top: 5.7%;">						  			
						  			<label name="val_sel" id="val_exist" value="">Be creative!</label>
						  		</div>

						  		<script type="text/javascript">
						  			var h_u_names = <?php echo json_encode($hot_u_names_arr); ?>;
						  			$('#new_user').keyup(function(){						  				
									    var l = $(this).val();
									    if(l.length > 4){
									    	//$('#val_exist').text(l);
									    	if(h_u_names.includes(l)){
									    		$('#val_exist').text("Username Exists!");
									    		document.querySelector('#sbt-pinfo').disabled = true;									   								
									    	}else{
									    		$('#val_exist').text("Username Free.");
									    		document.querySelector('#sbt-pinfo').disabled = false;
									    	}
									    }
									    
									    // OR $('#test').html(l);
									    if($('#new_user').val() == ""){$('#val_exist').text("Be creative!");}
									});

						  		</script>

						  	</div>

						  	<div id="inner2" style="width: 100%; position: relative;">

						  		<?php
						  			$sql_pass = "SELECT pass FROM login WHERE username = '".$login_session."';";
								         $result = mysqli_query($db, $sql_pass);

								         if (mysqli_num_rows($result) > 0) {
								           // output data of each row
								           while($row = mysqli_fetch_assoc($result)) {
								             $user_pass = $row['pass'];
								             //echo $user_pass;
								             //$_SESSION['h_name'] = $hotel_name_1; 
								           }
								         } else {
								           //echo "0 results";
								         }

						  		 ?>

						  		<div style="width: 27%; float: left; margin-left: 7%;">
						  		<!--	<label id="password_lbl" for="pass">Your Old Password?</label>
						    		<input type="password" id="pass" name="password" placeholder="Type The Old Pass"> 
						    	-->
						  		</div>

						  		<script type="text/javascript">
						  			/*
						  			var old_pass = <?php //echo json_encode($user_pass); ?>;
						  			$('#pass').keyup(function(){						  				
									    var o = $(this).val();
									    if(o.trim().length > 3){
									    	//$('#val_exist').text(l);
									    	if(md5(o) !== old_pass){
									    		$('#password_lbl').text("Wrong!");
									    		document.querySelector('#sbt-pinfo').disabled = true;
									    	}else{
									    		$('#password_lbl').text("Right!");
									    		document.querySelector('#sbt-pinfo').disabled = false;	
									    	}
									    }else{
									    	$('#password_lbl').text("Your Old Password?");
									    }
									    
									    // OR $('#test').html(l);
									   // if($('#hot_name').val() === "" ){$('#val_exist').text("New Name");}
									});
									*/
						  		</script>


						  		<div style="width: 27%; float: left; margin-left: 7%;">
						  			<label id="pass_1_lbl" for="pass_1">New Password</label>

						  									  			<div style="position: relative;">
						  				<div style="width: 92%; float: left;">
						  					<input type="password" id="pass_1" name="password_1" placeholder="New Password" minlength="5" maxlength="25">
						  				</div>
						  				<div style="width: 5%; padding-left: 1%; padding-top: 7%; float: right;">
						  					<i style="cursor: pointer;" class="far fa-eye" id="togglePassword_1"></i>  	
						  				</div>
						  										    			
						  			</div>

						  		</div>
						  		<div style="width: 27%; float: right;">							  							  			
						  			<label id="pass_2_lbl" for="pass_2">Repeat The New Password</label>
						  			<div style="position: relative;">
						  				<div style="width: 92%; float: left;">
						  					<input type="password" id="pass_2" name="password_2" placeholder="Type It Again" minlength="5" maxlength="25"> 	
						  				</div>
						  				<div style="width: 5%; padding-left: 1%; padding-top: 7%; float: right;">
						  					<i style="cursor: pointer;" class="far fa-eye" id="togglePassword_2"></i>  	
						  				</div>
						  										    			
						  			</div>
						    		
						  		</div>

						  		<script type="text/javascript">						  			
						  			$('#pass_2').keyup(function(){						  				
									    var rp = $(this).val();
									    var np = $('#pass_1').val();
									    if(np.trim().length < 4){
									    	$('#pass_2_lbl').css({ 'color': 'red'});
									    	$('#pass_2_lbl').text("Pass Must Be 5 Or More Symbols!");
									    }else{

										    if(rp.trim().length > 3){
										    	//$('#val_exist').text(l);
										    	if(rp !== np ){
										    		$('#pass_2_lbl').css({ 'color': 'red'});
										    		$('#pass_2_lbl').text("Wrong!");
										    		document.querySelector('#sbt-pinfo').disabled = true;
										    	}else{
										    		$('#pass_2_lbl').css({ 'color': 'green'});
										    		$('#pass_2_lbl').text("Right!");
										    		document.querySelector('#sbt-pinfo').disabled = false;	
										    	}
										    }else{
										    	$('#pass_2_lbl').text("Repeat The New Password");
										    }
									    }
									    // OR $('#test').html(l);
									   // if($('#hot_name').val() === "" ){$('#val_exist').text("New Name");}
									});

									$('#pass_1').keyup(function(){						  				
									    var rp = $('#pass_2').val();
									    var np = $(this).val();
									    if(np.trim().length < 5){
									    	$('#pass_1_lbl').css({ 'color': 'red'});
									    	$('#pass_1_lbl').text("Pass Must Be 5 Symbols Or More!");
									    	document.querySelector('#sbt-pinfo').disabled = true;	
									    }else{
									    	$('#pass_1_lbl').css({ 'color': 'black'});
									    	$('#pass_1_lbl').text("New Password");


										    if(rp.trim().length > 0){
										    	
										    	if(rp !== np ){
										    		$('#pass_2_lbl').css({ 'color': 'red'});
										    		$('#pass_2_lbl').text("Wrong!");
											    		document.querySelector('#sbt-pinfo').disabled = true;	
										    	}else{
										    		    //$('#pass_2_lbl').style.color = 'green';
										    		    //document.getElementById('pass_2_lbl').style.color = 'green';
										    		    $('#pass_2_lbl').css({ 'color': 'green'});
											    		$('#pass_2_lbl').text("Right!");											    		
											    		document.querySelector('#sbt-pinfo').disabled = false;	
											    	}
										    	
										    }else{

											    $('#pass_2_lbl').text("Repeat it here!");
											    		document.querySelector('#sbt-pinfo').disabled = true;
										    }
									    }
									    // OR $('#test').html(l);
									   // if($('#hot_name').val() === "" ){$('#val_exist').text("New Name");}
									});
						  		</script>



						  	</div>

						  	<div id="inner3" style="width: 100%; position: relative;">
						  		<div style="width: 27%; float: left; margin-left: 7%;">
						    		  <label for="birthday">Birthday:</label>
  									  <input type="date" id="birthday" name="birthday" value="<?php echo date($_SESSION['pers_info'][2]); ?>" required>
						  		</div>	
						  							  		

						  		<div style="width: 27%; float: left; margin-left: 7%;">
						  			<div style="width: 100%; position: relative;">
						  				<label for="gender">Gender</label>	
						  			</div>
						  			<div style="position: relative; margin-top: 7%;">						  							
							    		<form>
							    		<?php  

							    		$gender = $_SESSION['pers_info'][3];
							    		$checked = 'checked="checked"';
							    		//if($gender != ""){echo $checked;}
							    		$phone_num = $_SESSION['pers_info'][4];
						
							    		?>   
							    		    <input type="radio" id="gender" name="gender" value="male" <?php if($gender == "male"){echo $checked;} ?> /> Male    
											<input type="radio" id="gender" name="gender" value="female" <?php if($gender == "female"){echo $checked;} ?>  /> Female
											<input type="radio" id="gender" name="gender" value="other" <?php if($gender == "other"){echo $checked;} ?> /> Other   											
										</form>

									</div>
						  		</div>
						  		<div style="width: 27%; float: right;">
						  			<label for="phone">Phone Number (0-888-888888)</label>
						    		<input type="tel" id="phone" name="phone" value="<?php if($phone_num!=""){echo $phone_num;} ?>"   pattern="[0]{1}-[7-9]{3}-[0-9]{6}" required>  		
						  		</div>

						  	</div>

						  	<?php
						  		if($login_level == 2){
						  			$hotel_name = $_SESSION['h_name'];
						  			echo '

						  				<div id="inner4" style="width: 100%; position: relative;">
									  		<div style="width: 27%; float: left; margin-left: 7%;">
									    		<label for="nhotel">Hotel</label>
									    		<input type="text" id="nhotel" name="hotel_name" readonly="readonly" placeholder="'.$hotel_name.'">
									  		</div>
									  		<div style="width: 27%; float: left; margin-left: 7%;">
									  			<label for="hot_name" id="hot_name_lb">New Hotel Name</label>
									    		<input type="text" id="hot_name" name="hot_name" placeholder="New Hotel Name" minlength="4" maxlength="15">
									  		</div>
									  		<div style="width: 27%; float: right;">
									  			<label for="repeat_h_name" id = "r_name_lb">Repeat The New Name</label>
									    		<input type="text" id="repeat_h_name" name="repeat_h_name" placeholder="Repeat Hotel Name" minlength="4" maxlength="15">  		
									  		</div>

									  	</div>

						  			';
						  		}
						  	?>

						  	<script type="text/javascript">
						  		var h_ex_names = <?php echo json_encode($hot_h_names_arr); ?>;
						  			$('#hot_name').keyup(function(){						  				
									    var h = $(this).val();
									    if(h.trim().length > 3){
									    	//$('#val_exist').text(l);
									    	if(h_ex_names.includes(h)){
									    		$('#hot_name_lb').text("Name Exists!");
									    		document.querySelector('#sbt-pinfo').disabled = true;
									    	}else{
									    		$('#hot_name_lb').text("Name Free.");
									    		document.querySelector('#sbt-pinfo').disabled = false;	
									    	}
									    }else{
									    	$('#hot_name_lb').text("New Name");
									    }
									    
									    // OR $('#test').html(l);
									   // if($('#hot_name').val() === "" ){$('#val_exist').text("New Name");}
									});

									// Repeat the hotel name
									$('#repeat_h_name').keyup(function(){						  				
									    var r = $(this).val();
									    if(r.trim().length > 3){
									    	var r_hotel = $('#hot_name').val();

									    	if(r !== r_hotel){
									    		$('#r_name_lb').text("Name Does Not Match!!");
									    		document.querySelector('#sbt-pinfo').disabled = true;							
									    		setCookie_1("ch_hot_nm", "", 3);	    								   	
									    	}else{
									    		$('#r_name_lb').text("Name Match!");
									    		document.querySelector('#sbt-pinfo').disabled = false;	
									    		setCookie_1("ch_hot_nm", r, 3);								   	
									    	}
									    }
									    
									    // OR $('#test').html(l);
									    if($('#hot_name_lb').val() == "" || $('#hot_name_lb').val().length < 4 ){$('#val_exist').text("New Name");}
									});

									function setCookie_1(cname, cvalue, exdays) {
									  const d = new Date();
									  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
									  let expires = "expires="+d.toUTCString();
									  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
									}

						  			

						  		
						  	</script>

						  	<div id="inner5" style="width: 100%; position: relative;">
						  		<div style="width: 33%; float: left; margin-left: 7%;">
						  									  		

						  

							<?php
							
								//print_r($_SESSION);
								if(empty($_SESSION['u_avatar'])){
									$avatar_nm = "no-avatar-300.png";
								}else{
									$avatar_nm = $_SESSION['u_avatar'];
								}

								$avatar = "avatars/".$avatar_nm;
								
							 ?>
							
							<p><img id="output" width="120" src="<?php echo $avatar; ?>" /></p>							


							<?php
									 $emails = "SELECT email FROM user_email JOIN login ON user_email.log_user_id = login.id WHERE login.username='".$login_session."';";
							         $res_emails = mysqli_query($db, $emails);
							         //$emails_arr = array();

							         if (mysqli_num_rows($res_emails) > 0) {
							           // output data of each row
							           while($row = mysqli_fetch_assoc($res_emails)) {
							             $email_get = $row['email'];
							             //echo $hotel_name_1;
							             //array_push($hot_h_names_arr, $hot_h_names);							             
							           }
							         } else {
							           //echo "0 results";
							           $email_get = "";
							         }

							?>



							</div>						  		
						  		<div style="width: 33%; float: left; ">						  			
						  			 <label for="u_email">Email</label>
						    		<input type="email" id="u_email" name="u_email" value="<?php if($email_get!=''){echo $email_get;}else{ echo 'Email';} ?>"  minlength="5" maxlength="35" required>
						    		<!-- <input type="text" name="sonny"> -->

						  		</div>						  		

						  	</div>
						    						    						   
						    
						  
						    <!-- <input type="submit" value="Submit" name="sbt-pinfo" id="sbt-pinfo"> 	-->
						    <button type="submit" form="form_info" value="Submit" id="sbt-pinfo" name="sbt-pinfo" style="margin-top: 5%; margin-left: 27%; width: 48%;">UPDATE</button>
						  </form>
						</div>
		    </div>
		  </div>

</body>

<script type="text/javascript">
	const togglePassword1 = document.querySelector('#togglePassword_1');
  const password = document.querySelector('#pass_1');

  togglePassword1.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});


	const togglePassword2 = document.querySelector('#togglePassword_2');
  const password2 = document.querySelector('#pass_2');

  togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});  
</script>
</html>