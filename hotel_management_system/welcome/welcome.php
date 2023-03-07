<?php
   include('../session.php');
   //include('hotels_owners.php');

   	if($login_level == '1'){
	//$url = 'welcome/welcome.php';
	//header("location: $url");
	//header("Refresh:0");
   		;
}elseif ($login_level == '2') {
	$url = 'welcome_owr.php';
	header("location: $url");# code...
}elseif ($login_level == '3' || $login_level == '4' || $login_level == '5' ||  $login_level == '6' || $login_level == '7') {
	$url = 'welcome_owr.php';
	header("location: $url");
}
else{
	$url = '../404_page_error/error.html';
	header("location: $url");# code...
}
?>

<html>
   
   <head>
      <title>Welcome </title>

         <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- fancyTable Js -->
<script src="../src/fancyTable.js"></script>


<!-- Styles.css -->
<link rel="stylesheet" href="styles.css">

<link rel="stylesheet" href="mng_owners/nav.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script type="text/javascript" src="js_funcs.js"></script>

   </head>
   
   <body style="background-image: url('../img/background.jpg');">
   	<div style="margin-right: 10%; margin-left: 10%; ">

<!--
      <h1>Welcome, <?php //echo $login_session; ?> <?php //echo $login_level; ?></h1> 
      <h2><a href = "../logout.php">Sign Out</a></h2>

  -->

          <div class="container" style="position: relative; width: 37%; margin-left: 33%; font-size: 1.5em; ">
        <div class="topnav">
          <a href="#"><button class="btn btn-primary btn-lg">Welcome, <?php echo $login_session; ?></button></a>         
          <a href = "../logout.php"><button class="btn btn-danger btn-lg">Sign Out</button></a>
        </div>
      </div>



		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container" style="position: relative;">
		    <div class="middle-view" style="width: 63%;">


      <div style="width: 37%; position: relative; float: left;" class="div-form">
      	<table id="sampleTable" class="table table-striped sampleTable">
	<thead>
		<tr>
		<th id="first">Hotel</th>
		<th>Owners (N)</th>
		</tr>
	</thead>
	<tbody>

	</tbody>
</table>
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

		$sql = "SELECT name FROM hotels_info";
		$result = $conn->query($sql);


		$z = array();
		$count = 0;
		$hotel_ow_un = array();
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		    $new_array[] = $row;

		    		$the_elem = $row['name'];
                    //echo $the_elem;

		    		$level = 2;					
					//$name = implode("", $row);
					$sql_2 = "SELECT * FROM hotels_emp JOIN login ON hotels_emp.user_id = login.id JOIN hotels_info ON hotels_emp.hotel_id = hotels_info.id  WHERE hotels_info.name = '".$the_elem."' AND login.level = '".$level."' ;";

					$result_1 = $conn->query($sql_2);

					if ($result_1->num_rows > 0) {
					  // output data of each row
					  while($row_1 = $result_1->fetch_assoc()) {
					    //$new_array_1[] = mysqli_num_rows($result_1);
					    if (!in_array($the_elem, $z)){
					    	array_push($z, $the_elem, mysqli_num_rows($result_1));
					    }
					    array_push($hotel_ow_un, $the_elem, $row_1['username']);
					  }
					} else {
					  $new_array_1[] = 0;
					}
		  }
		} else {
		  //echo "0 results";
		}


					
//print_r($hotel_ow_un);



/*

		$sql_1 = "SELECT * FROM login, hotels_info, hotels_emp WHERE login.level = '2' AND hotels_emp.user_id = login.id AND hotels_emp.hotel_id = hotels_info.id;";
		$result_1 = $conn->query($sql_1);

		if ($result_1->num_rows > 0) {
		  // output data of each row
		  while($row = $result_1->fetch_assoc()) {
		    $new_array_1[] = $row;
		  }
		} else {
		  echo "0 results";
		}

*/
		$conn->close();

        ?>
		<script type="text/javascript">
			// Word genarator

			var arr_res=<?php echo json_encode($new_array); ?>;
			var arr_res_num = arr_res.length;
			const new_arr = arr_res_num;

			var arr_res_1 = <?php echo json_encode($z); ?>;
			var arr_res_num_1 = arr_res_1.length;



			$(document).ready(function() {

				crHotOwnT();
	
			});

			function crHotOwnT(){
								// Generate a big table
				for(var n=0;n<arr_res_num_1-1;n=n+2){
					var row = $("<tr onclick='myFunction(this)'>");
					//var row_1 = $("<th>");
					$("#sampleTable").find("thead th[id=first]").each(function() {

						$("<td>",{
							html: String(arr_res_1[n]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_1[n+1]), 
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
			}

			// myFunction() Tbale onclick 

			var countR = 0;
			var hotel_nm = "";
			function myFunction(x) { //table (Create Guest Table) row onclick -> populate the Create Guest form and get the data in the Reservation Table
			      
			    //$("#upd_resr *").prop('disabled',true);
			    //$("#cr_service *").prop('disabled',true);
			    //$("#upd_serv *").prop('disabled',true);
			    //$("#cr_res_d *").prop('disabled',false);
			    //$("#upd_gst *").prop('disabled',false);
			    //document.getElementById('egn').disabled = true;
			    var table = document.getElementById('sampleTable');			    
			     
				var row = parseInt(x.rowIndex);	

				
				document.getElementById('sbm_del_o').style.visibility = 'hidden';				
				document.getElementById('submit-btn-del-1').style.visibility = 'hidden';


				document.getElementById('owner_slc_1').value = "";
				document.getElementById('owner_slc_1').style.visibility = 'hidden';
				document.getElementById('owner_slc_2').value = "";
				document.getElementById('owner_slc_2').style.visibility = 'hidden';

				counterST1 = 0;			

			    hotel_nm = table.rows[row].cells[0].innerHTML;
			    var num_own = parseInt(table.rows[row].cells[1].innerHTML);
			  
			    //document.getElementById('qua_guest').value = "EGN: " + egn_t + " | Name: " + f_name_t + " " + l_name_t;
			    //document.getElementById('qua_guest_s').value = "EGN: " + egn_t + " | Name: " + f_name_t + " " + l_name_t;
			    
/*
			    document.getElementById('egn').value = egn_t;
			    document.getElementById('egn_new').value = egn_t;
			    document.getElementById('f_name').value = f_name_t;
			    document.getElementById('l_name').value= l_name_t;
			    document.getElementById('g_gsm').value = gsm_g;

			    */

			    if(countR==1){
					$("#sampleTable_1 td").remove();   //remove existing data from owners' usernames table

					var table_res = document.getElementById('sampleTable_1');
					var inputs = table_res.getElementsByTagName('input');
					while (inputs.length) inputs[0].parentNode.removeChild(inputs[0]);	
		

				}	

				enableResvT(hotel_nm); //populate hotel <-> owner usernames table
			    
			    //setCookie("old_egn", table.rows[row].cells[0].innerHTML, 3);			    

			  }

			  function setCookie(cname, cvalue, exdays) {
				  const d = new Date();
				  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				  let expires = "expires="+d.toUTCString();
				  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				}



				

		</script>

      </div>      				
      		    	<div class="div-form" style="width: 50%; position: relative; float: right; margin-right: 7%;">
								  	<table id="sampleTable_1" class="table table-striped sampleTable">
								<thead>
									<tr>
									<th id="second">Hotel</th>
									<th>Owner Username</th>									
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>

							      <div style="width: 50%; position: relative; float: right; margin-right: 7%;">
							      	<form action="del_hotels.php" method="POST">
							      	<div style="width: 100%; position: relative;">
							      		<input style="position: relative; width: 55%; float: left;" id="owner_slc_1" type="text" name="owner_slc1" disabled="true">
	      								<input style="position: relative; width: 40%; float: right; background-color: #C41E3A;" type="submit" value="Delete Hotel" id="submit-btn-del-1" name="submit-btn-del-1">
	      							</form>	
							      		
							      	</div>
							      	<div style="width: 100%; position: relative;">

							      		<!--<form action="" method="post"> 	-->						      			

							      		<input style="position: relative; width: 55%; float: left;" id="owner_slc_2" type="text" name="owner_slc2" disabled="true">
	      								<input style="position: relative; width: 40%; float: right; background-color: #C41E3A;" id="sbm_del_o" type="submit" value="Delete Owner" name="submit-btn-ownr-1">

	      							<!--	</form> -->
							      		
							      	</div>

							      	<script type="text/javascript">
							      		$('#sbm_del_o').click(function() {
										    $.ajax({
										        url: 'delete_owner.php',
										        type: 'POST',
										        data: {
										            //email: 'email@example.com',
										            message: 'hello world!'
										        },
										        success: function(msg) {
										           // alert('Email Sent');
										            //document.getElementById('table_owners').contentWindow.location.reload();
										            $("#sampleTable_1 td").remove();   //remove existing data from owners' usernames table
													var table_res = document.getElementById('sampleTable_1');
													var inputs = table_res.getElementsByTagName('input');
													while (inputs.length) inputs[0].parentNode.removeChild(inputs[0]);

													//arr_res_3													

													let i = 0;

													while (i < arr_res_3.length) {
													    console.log(arr_res_3[i]);
													    if(arr_res_3[i] == own_name){
													    	//alert(own_name + " " + i.toString());
													    	arr_res_3.splice(i, 1);
													    	arr_res_3.splice(i-1, 1);
													    }
													    i++;
													}	
										
													enableResvT(hotel_nm);


													/////

													$("#sampleTable td").remove();   //remove existing data from owners' usernames table
													var table_res = document.getElementById('sampleTable');
													var inputs = table_res.getElementsByTagName('input');
													while (inputs.length) inputs[0].parentNode.removeChild(inputs[0]);

													//arr_res_3													

													let cnt_d = 0;

													while (cnt_d < arr_res_1.length) {
													    //console.log(arr_res_1[cnt_d]);
													    if(arr_res_1[cnt_d] == hot_name){													    	
													    	if(parseInt(arr_res_1[cnt_d+1])>0){
													    		arr_res_1[cnt_d+1] = (parseInt(arr_res_1[cnt_d+1])-1).toString();
													    	}
													    	
													    }
													    cnt_d++;
													}	
										
													crHotOwnT();

										        }               
										    });
										});
							      	</script>

	      	
	      	


	      </div>


						<script type="text/javascript">

			var arr_res_3 = <?php echo json_encode($hotel_ow_un); ?>;
		    function enableResvT(ho_user){

				//if(countR == 0){
				
			
			var arr_res_num_3 = arr_res_3.length;


			//$(document).ready(function() {
							

				// Generate a big table
				var value_2 = 0;
				for(var n=0;n<(arr_res_num_3/2);n++){
					var row = $("<tr onclick='myFunction_1(this)'>");
					//var row_1 = $("<th>");
					$("#sampleTable_1").find("thead th[id=second]").each(function() {
						if(arr_res_3[value_2] == ho_user){
							//alert(arr_res_3[value_2+5]);

						
						$("<td>",{
							html: String(arr_res_3[value_2]), 
							style:"padding:2px;"
						}).appendTo($(row));

						$("<td>",{
							html: String(arr_res_3[value_2+1]), 
							style:"padding:2px;"
						}).appendTo($(row));

						
						}
						value_2 = value_2 + 2;

					});
					row.appendTo($("#sampleTable_1").find("tbody"));


				}


				// And make them fancy
				$("#sampleTable_1").fancyTable({
					sortColumn:false,
					pagination: true,
					perPage:10,
					globalSearch:true
				});		
	
			//});
				countR = 1;
					//	}	

			}
						</script>

      <div>
      	
      </div>
      		    </div>
		    <div class="right-view" style="width: 37%;">

						<div class="div-form">
						  <form action="hotels_owners.php" method="POST">
						  	<h3>Create Owners / Hotels</h3>
						    <label for="user">Username</label>
						    <input type="text" id="user" name="username" placeholder="Username.." required="true" style="width: 92%;">

						    <label for="pass">Password</label><br>
						    <div style="position: relative;">
						    	<div style="width: 92%; float: left;">
						    		<input type="password" id="pass" name="password" placeholder="Password.." required="true">	
						    	</div>
						    	<div style="width: 7%; float: right; padding-left: 1%; padding-top: 4.7%;">
						    		<i style="cursor: pointer;" class="far fa-eye" id="togglePassword"></i>
						    	</div>
						    </div>
						    
						    

						    <br>

						    <label for="hotels">Hotels</label>						    
						    <select id="hotels" name="hotels" style="width: 92%;" onmousedown="select_chosen();">
						      <option disabled selected value id="empty" value="none"> -- select an option -- </option>
						      <?php 
						      $count = 2;
						      foreach ($z as $value) {
						      	
						      	if($count%2==0){
						      		echo "<option value=".$value.">".$value."</option>";
						      	}
						      	$count++;
						      } ?>
						    </select>
						    <label for="nhotel">New Hotel</label>
						    <input type="text" id="nhotel" name="newhotel" style="width: 92%;" placeholder="New hotel.." onkeypress="dropdown_default();">
						  
						    <input type="submit" style="width: 92%;" value="Create Owner" name="submit-btn"> 
						  </form>
						</div>

		    </div>
		  </div>		  
		</div>

		<br><br><br>
		<div class="body-content">
		  <div class="left-menu">

		  </div>
		  <div class="right-container" style="margin-top: 5%;">
		    <div class="middle-view" style="padding-right: 10%;">
		      
		    </div>
		    <div class="right-view">
		      	
		    </div>
		  </div>
		</div>

      </div>
   </body>
<script type="text/javascript">
	var own_name = "";
	var hot_name = "";
		var counterST1 = 0;
		function myFunction_1(x) {
			 

			    var table = document.getElementById('sampleTable_1');

				var row = parseInt(x.rowIndex);

				counterST1 = 1;

			    //alert(table.rows[row].cells[1].innerHTML);
			    
			    hot_name = table.rows[row].cells[0].innerHTML;		
			    own_name = table.rows[row].cells[1].innerHTML;	    
			  


			    document.getElementById('owner_slc_1').value = hot_name;  
			    document.getElementById('owner_slc_2').value = own_name;

		

			    setCookie("hotel_name_dl", hot_name, 1);
			    setCookie("own_name_dl", own_name, 1);




			  }
</script>

<script type="text/javascript">
	document.getElementById('sbm_del_o').style.visibility = 'hidden';
	document.getElementById('submit-btn-del-1').style.visibility = 'hidden';  

	document.getElementById('owner_slc_1').style.visibility = 'hidden';
	document.getElementById('owner_slc_2').style.visibility = 'hidden';

	document.getElementById("sampleTable_1").addEventListener("click", enableDOW);  
		function enableDOW() {  
		//document.getElementById("para").innerHTML = "Hello World" + "<br>" + "Welcome to the  javaTpoint.com";  
		//alert("Hyy");
		//alert('not hidden');
		document.getElementById('sbm_del_o').style.visibility = 'visible';
		document.getElementById('submit-btn-del-1').style.visibility = 'visible';

		document.getElementById('owner_slc_1').style.visibility = 'visible';
		document.getElementById('owner_slc_2').style.visibility = 'visible';
		} 
			
</script>

   
</html>




