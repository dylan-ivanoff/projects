<?php

	include('../../session.php');

		if(strval($login_level) == '4' || strval($login_level) == '5' || strval($login_level) == '6' || strval($login_level) == '7'){
		$url = '../../404_page_error/error.html'; 

		header( "Location: $url" );
	}

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


	   <?php 
  	//$_SESSION['change_by_lvl'] = "<script>var value</script> ";
	   $cookie_name = "lvl_cr_del";
	   if(!isset($_COOKIE[$cookie_name])) {
		  //echo "Cookie named '" . $cookie_name . "' is not set!";
	   	$_SESSION['change_by_lvl'] = 3;
		} else {
		  //echo "Cookie '" . $cookie_name . "' is set!<br>";
		  //echo "Value is: " . $_COOKIE[$cookie_name];
			$_SESSION['change_by_lvl']=$_COOKIE[$cookie_name];
		}
		//print_r($_SESSION);

		$select_who = "";
		if($_SESSION['change_by_lvl'] == 3){
			$select_who = "Manager";
		}elseif ($_SESSION['change_by_lvl'] == 4) {
			$select_who = "Receptionist";
		}elseif ($_SESSION['change_by_lvl'] == 5) {
			$select_who = "Housekeeper";
		}elseif ($_SESSION['change_by_lvl'] == 6) {
			$select_who = "Food Service";
		}elseif ($_SESSION['change_by_lvl'] == 7) {
			$select_who = "Security";
		}
  	
  ?>


<div style="width: 33%; margin:0 auto;">	
	  <label for="lelev_cr_del" style="color: white; text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Select Level:</label>
  <select name="lelev_cr_del" id="sel_lvl" onchange="changeLvl()">
    <!-- <option value='3'>--Choose--</option>  -->
    <option value='3' <?php if($select_who == "Manager") echo 'selected';?> >Manager</option>
    <option value='4' <?php if($select_who == "Receptionist") echo 'selected';?> >Receptionist</option>
    <option value='5' <?php if($select_who == "Housekeeper") echo 'selected';?> >Housekeeper</option>
    <option value='6' <?php if($select_who == "Food Service") echo 'selected';?> >Food Service</option>
    <option value='7' <?php if($select_who == "Security") echo 'selected';?> >Security</option>
  </select>
</div>
  <input type="hidden" name="val_sel" id="val_sel" value="">

  <script>
function changeLvl() {
  var e = document.getElementById("sel_lvl");
  var value = e.value;
  document.getElementById("val_sel").value = value;
  //alert(document.getElementById("val_sel").value);

  setCookie("lvl_cr_del", value, 3);

  
  location.reload();

}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
</script>

	<div class="body-content" style="padding-left: 5%; padding-top: 3%;">

		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container">
		    <div class="middle-view" style="width: 33%; float: left; margin-left: 10%;">
		    	<div style="width: 86%;" class="div-form">

		    		<form action="del_mngrs.php" method="POST">	 
			    	<input type="text" id="emp_username" name="" disabled="true">
			    	<input type="submit" value="<?php echo "Delete ".$select_who; ?>" name="sbt-btn-del-m-1">
		    	</form>

		    	<form action="update_mngrs.php" method="POST">	 
			    	<input type="text" id="emp_pass1" name="emp_pass1" minlength="8" maxlength="15">
			    	<input type="submit" value="<?php echo "Update Password Of ".$select_who; ?>" name="sbt-btn-upd-m-1">
		    	</form>
		    		
		    	</div>

		    	


		    	<div style="width: 86%;" >
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

				$sql = "SELECT username FROM hotels_emp JOIN hotels_info ON hotels_emp.hotel_id = hotels_info.id JOIN login ON hotels_emp.user_id = login.id WHERE hotels_info.name = '".$_SESSION['h_name']."' AND login.level = '".$_SESSION['change_by_lvl']."';";
				$result = $conn->query($sql);


				$managers = array();
				$count = 0;
				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {

				    		$the_elem = $row['username'];
		                    //echo $the_elem;		    
		                    array_push($managers, $the_elem);

				  }
				} else {
				  //echo "0 results";
				}

				$conn->close();

        ?>


			<script type="text/javascript">
			// Word genarator

			var arr_res_1 = <?php echo json_encode($managers); ?>;
			var arr_res_num_1 = arr_res_1.length;

			var h_hotel = <?php echo json_encode($_SESSION['h_name']); ?>;



			$(document).ready(function() {

				// Generate a big table
				for(var n=0;n<arr_res_num_1;n++){
					var row = $("<tr onclick='myFunction_1(this)'>");
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
					perPage:5,
					globalSearch:true
				});		
	
			});
		</script>


		    </div>
		    <div class="right-view" style="width: 33%; float: right; margin-right: 10%;">
		    				<div class="div-form" style="width: 86%;">
						  <form action="create_mngr.php" method="POST">
						  	<h3>Create <?php echo $select_who; ?></h3>
						    <label for="user">Username</label>
						    <input type="text" id="user" name="username" style="width: 92%;" placeholder="Username.." >

						    <label for="pass">Password</label><br>
						    <div style="position: relative;">
						    							    
						    <input type="password" id="pass" name="password" placeholder="Password.." style="width: 92%;"> 
						    <i style="cursor: pointer;" class="far fa-eye" id="togglePassword" style="width: 5%; padding-left: 3%;"></i> 
						    </div>
 
						    
						    <label for="nhotel">Hotel</label>
						    <input type="text" id="nhotel" name="hotel_name" style="width: 92%;" readonly="readonly" placeholder='<?php echo $_SESSION['h_name']; ?>'>
						  
						    <input type="submit" value="Submit" name="sbt-btn-cmng" style="width: 92%;"> 
						  </form>
						</div>
		    	
		    </div>
		    <div class="right-r-view" style="width: 3%; float: right;">

		    	
		    </div>
		  </div>		  
		</div>
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


  function myFunction_1(x) {
			    //alert("Row index is: " + x.rowIndex);
			   // $("#upd_resr *").prop('disabled',false);
			    //$("#upd_serv *").prop('disabled',false);

			    var table = document.getElementById('sampleTable');

				var row = parseInt(x.rowIndex);
			    
			    var emp_uname = table.rows[row].cells[1].innerHTML;		
			   // var own_name = table.rows[row].cells[1].innerHTML;	    
			   
			    

			    document.getElementById('emp_username').value = emp_uname;  
			    //document.getElementById('owner_slc_2').value = own_name;
			   

			    setCookie("del_empoyee", emp_uname, 1);
			   // setCookie("own_name_dl", own_name, 1);


			  }
</script>
</html>