<?php

	include('../../session.php');

		if(strval($login_level) == '3' || strval($login_level) == '4' || strval($login_level) == '5' || strval($login_level) == '6' || strval($login_level) == '7'){
		$url = '../../404_page_error/error.html'; 

		header( "Location: $url" );
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Owners</title>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- fancyTable Js -->
<script src="../../src/fancyTable.js"></script>


<!-- Styles.css -->
<link rel="stylesheet" href="../styles.css">

<link rel="stylesheet" href="nav.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<body style="background-image: url('../../img/background.jpg');">


	<div class="container" style="position: relative; width: 48%; margin-left: 5%;">
	    <div class="topnav">
	      <a href="#home">Welcome, <?php echo $login_session; ?></a>
	      <a href="#"><?php echo $position; ?></a>
	      <a href="#"><?php echo "Hotel: ".$_SESSION['h_name']; ?></a>
	      <a href = "../welcome_owr.php">Back</a>      
	      <a href = "../../logout.php">Sign Out</a>
	    </div>
	  </div>	  



			<div class="body-content" style="padding-left: 10%; padding-top: 3%;">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view">

		    	<div style="width: 70%;">
					<table id="sampleTable" class="table table-striped sampleTable" style="color: white; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">
						<thead>
							<tr>
							<th id="first">Hotel</th>
							<th>Username</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>						    	

		    	</div>

	

	        <?php 
        $a=15; 

        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel_db";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT username FROM hotels_emp JOIN hotels_info ON hotels_emp.hotel_id = hotels_info.id JOIN login ON hotels_emp.user_id = login.id WHERE hotels_info.name = '".$_SESSION['h_name']."' AND login.level = '2';";
		$result = $conn->query($sql);


		$owners = array();
		$count = 0;
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {

		    		$the_elem = $row['username'];
                    //echo $the_elem;		    
                    array_push($owners, $the_elem);

		  }
		} else {
		  echo "0 results";
		}

		$conn->close();

        ?>

			<script type="text/javascript">
			// Word genarator

			var arr_res_1 = <?php echo json_encode($owners); ?>;
			var arr_res_num_1 = arr_res_1.length;

			var h_hotel = <?php echo json_encode($_SESSION['h_name']); ?>;



			$(document).ready(function() {

				// Generate a big table
				for(var n=0;n<arr_res_num_1;n++){
					var row = $("<tr>");
					//var row_1 = $("<th>");
					$("#sampleTable").find("thead th[id=first]").each(function() {

						$("<td>",{
							html: String(h_hotel), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_1[n]), 
							style:"padding:2px;"
						}).appendTo($(row));

					});
					row.appendTo($("#sampleTable").find("tbody"));


				}


				// And make them fancy
				$("#sampleTable").fancyTable({
					sortColumn:false,
					pagination: true,
					perPage:15,
					globalSearch:true
				});		
	
			});
		</script>

				    </div>
				    		    <div class="right-view">

						<div class="div-form" style="width: 70%;">
						  <form action="create_owners.php" method="POST">
						  	<h3>Create Owner</h3>
						    <label for="user">Username</label>
						    <input type="text" id="user" name="username" placeholder="Username.." style="width: 92%;">

						    <label for="pass">Password</label><br>
						    <div style="position: relative;">
						    							    
						    <input type="password" id="pass" name="password" placeholder="Password.." style="width: 92%;"> 
						    <i style="cursor: pointer;" class="far fa-eye" id="togglePassword" style="width: 5%; padding-left: 3%;"></i> 
						    </div>

						    <label for="nhotel">Hotel</label>
						    <input type="text" id="nhotel" name="hotel_name" style="width: 92%;" readonly="readonly" placeholder='<?php echo $_SESSION['h_name']; ?>'>
						  
						    <input type="submit" value="Submit" name="sbt-btn-cown" style="width: 92%;"> 
						  </form>
						</div>

		    </div>
		    <?php //delOwners($owners, $login_session); ?>
		  </div>		  
		</div>

		<div class="body-content" style="padding-top: 3%; padding-left: 10%;">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view">
		    			    <div style="width: 70%;">	
		    			    <form action="mng_del_owr.php" method="POST">	  
		    			    <label for="del_owr" style="color: white; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Delete Owner</label>  	  				    				   
				    		<select id="del_owr" name="del_owr">
				    		<option disabled selected value id="emp_hotel" value="none"> -- select an option -- </option>


						      <?php   
						      
						      	if(count($owners)>1){
						      
							      foreach ($owners as $value) {
							      	
							      	if($value != $login_session){							      		

							      		echo "<option value=".$value.">".$value."</option>";
							      		
							      	}
							      
							      } 

						      	}
						      										      								      
						      
						      ?>
						      </select>
						      <input type="submit" value="Delete Owner" name="sbt-btn-del-o">
				    			</form>	  				    				  		    	
		    				</div>
		    </div>
		    <div class="right-view"></div>
		</div>


</body>
<script type="text/javascript">
	const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#pass');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</html>