<?php


?>

<div id="inner5" style="width: 100%; position: relative;">
						  		<div style="width: 33%; float: left; margin-left: 7%;">
						  									  		


						  	<p><input type="file"  accept="image/*" name="image1" id="file"  onchange="loadFile(event)" style="display: none;"></p>						  	
							<p><label for="file" style="cursor: pointer;">Upload Image</label></p> 

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

							<script>
								
							var loadFile = function(event) {
								var image1 = document.getElementById('output');								
								//image.style.visibility = "hidden";								
								image1.src = URL.createObjectURL(event.target.files[0]);

							};												
								
							</script>

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
							           echo "0 results";
							           $email_get = "";
							         }

							?>


							</div>						  		
						  		<div style="width: 33%; float: left; padding-top: 7%;">						  			
						  			 <label for="u_email">Email</label>
						    		<input type="email" id="u_email" name="u_email" value="<?php if($email_get!=''){echo $email_get;}else{ echo 'Email';} ?>"  minlength="5" maxlength="15">
						    		<input type="text" name="sonny">

						  		</div>						  		

						  	</div>