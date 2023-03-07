<?php

	include('../../session.php');


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

	<style type="text/css">
		/* Include the padding and border in an element's total width and height */
* {
  box-sizing: border-box;
}

/* Remove margins and padding from the list */
ul {
  margin: 0;
  padding: 0;
}

/* Style the list items */
ul li {
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;

  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Set all odd list items to a different color (zebra-stripes) */
ul li:nth-child(odd) {
  background: #f9f9f9;
}

/* Darker background-color on hover */
ul li:hover {
  background: #ddd;
}

/* When clicked on, add a background color and strike out text */
ul li.checked {
  background: #888;
  color: #fff;
  text-decoration: line-through;
}

/* Add a "checked" mark when clicked on */
ul li.checked::before {
  content: '';
  position: absolute;
  border-color: #fff;
  border-style: solid;
  border-width: 0 2px 2px 0;
  top: 10px;
  left: 16px;
  transform: rotate(45deg);
  height: 15px;
  width: 7px;
}

/* Style the close button */
.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

/* Style the header */
.header {
  background-color: rgb(245,254,255, .48);
  padding: 30px 40px;
  color: white;
  text-align: center;
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the input */
input {
  margin: 0;
  border: none;
  border-radius: 0;
  width: 75%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

/* Style the "Add" button */
.addBtn {
  padding: 10px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
}

.addBtn:hover {
  background-color: #bbb;
}



	</style>

	<?php

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


				$h_nm = $_SESSION['h_name'];



				$sql = "SELECT guest_res.date_in, guest_res.date_out, guest_res.num_of_people, guest_res.price_gr, rooms.num, guests_info.egn , guests_info.first_nm, guests_info.last_nm, guests_info.gsm FROM guest_res JOIN guests_info ON guest_res.gid  = guests_info.id JOIN rooms ON guest_res.room_num  = rooms.id WHERE guests_info.hotel_gid  = '".$hid."' AND guest_res.date_in > 'CURDATE()' AND guest_res.date_in < CURDATE() + INTERVAL 3 DAY AND guest_res.date_out >= CURDATE(); "; //get data for 3 days ahead
				$result = $conn->query($sql);


				$g_info = array();
				$s_info = array();
				$count = 0;
				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {

				    		//$egn = $row['egn'];				  			

				    		$f_name = $row['first_nm'];
				    		$l_name = $row['last_nm'];
				    		$gsm = $row['gsm'];
				    		$egn = $row['egn'];
				    		$num_of_people = $row['num_of_people'];
				    		$num = $row['num'];
				    		$price_gr = $row['price_gr'];
				    		$date_in = $row['date_in'];
				    		$date_out = $row['date_out'];
				    		

				    
		                    //echo $the_elem;		    
		                    array_push($g_info, $f_name, $l_name, $gsm, $egn, $num_of_people, $num, $price_gr, $date_in, $date_out);

		                    //array_push($s_info, $gs_id);

				  }
				} else {
				  //echo "0 results";
				}
				

?>

<link rel="stylesheet" href="nav.css">


</head>
<body style="background-image: url('../../img/background.jpg'">

	  <div class="container" style="position: relative; width: 64%; margin-left: 5%;">
	    <div class="topnav">
	      <a href="#home">Welcome, <?php echo $login_session; ?></a>
	      <a href="#"><?php echo $position; ?></a>
	      <a href="#"><?php echo "Hotel: ".$_SESSION['h_name']; ?></a>
	      <a href = "../welcome_owr.php">Back</a>      
	      <a href = "../../logout.php">Sign Out</a>
	    </div>
	  </div>

	<div style="padding-left: 5%; padding-top: 3%; padding-bottom: 3%; padding-right: 5%; position: relative;">

		<div id="myDIV" class="header">
		  <h2>Tasks (lightgreens Start Today)</h2>		 
	<!--	  <span onclick="newElement()" class="addBtn">Add</span>  -->
		</div>

		<ul id="myUL">
		
		  <?php
	//$g_info
    $array_len  = count($g_info);
    $checked_arr = array();
    $num_of_elems = 9;
    $tasks = $array_len/$num_of_elems;
    //echo "<li>".$array_len."</li>";

    $q = 0;
    $cnt_done = 0;
    for($i=0; $i<$array_len/$num_of_elems;$i++){

    	$time = strtotime($g_info[$q+7]);

		$newformat = date('Y-m-d',$time);
    	
    	$now = new DateTime();
		$now_frt = $now->format('Y-m-d');


		$style_s ="";
		if($newformat == $now_frt){
    	   $style_s = "background-color: lightgreen; color: black"; //li background color is lightgreen if guest must leave today
    	}else{
    		$style_s="background-color: white; color: black;";
    	}

 	    	

    	$show = "<li id='".$i."' style='".$style_s."' >"."Names: ".$g_info[$q]." ".$g_info[$q+1]." <i class='fas fa-phone-volume'></i> GSM:".$g_info[$q+2]." <i class='far fa-id-card'></i> EGN: ".$g_info[$q+3]." <i class='fas fa-users'></i> Num Of People: ".$g_info[$q+4]." <i class='fas fa-door-open'></i> Room Num: ".$g_info[$q+5]." <i class='fas fa-comment-dollar'></i> Price: ".$g_info[$q+6]." <i class='fas fa-calendar-plus'></i> Date In: ".$g_info[$q+7]." <i class='fas fa-calendar-minus'></i> Date Out ".$g_info[$q+8]."</li>";

    	if($login_level == 3){ //manager
    		$show = "<li id='".$i."' style='".$style_s."' >"."Names: ".$g_info[$q]." ".$g_info[$q+1]." <i class='fas fa-phone-volume'></i> GSM:".$g_info[$q+2]." <i class='far fa-id-card'></i> EGN: ".$g_info[$q+3]." <i class='fas fa-users'></i> Num Of People: ".$g_info[$q+4]." <i class='fas fa-door-open'></i> Room Num: ".$g_info[$q+5]." <i class='fas fa-comment-dollar'></i> Price: ".$g_info[$q+6]." <i class='fas fa-calendar-plus'></i> Date In: ".$g_info[$q+7]." <i class='fas fa-calendar-minus'></i> Date Out ".$g_info[$q+8]."</li>";
							
		}else if($login_level == 4){ //receptionist
			$show = "<li id='".$i."' style='".$style_s."' >"."Names: ".$g_info[$q]." ".$g_info[$q+1]." <i class='fas fa-phone-volume'></i> GSM:".$g_info[$q+2]." <i class='far fa-id-card'></i> EGN: ".$g_info[$q+3]." <i class='fas fa-users'></i> Num Of People: ".$g_info[$q+4]." <i class='fas fa-door-open'></i> Room Num: ".$g_info[$q+5]." <i class='fas fa-comment-dollar'></i> Price: ".$g_info[$q+6]." <i class='fas fa-calendar-plus'></i> Date In: ".$g_info[$q+7]." <i class='fas fa-calendar-minus'></i> Date Out ".$g_info[$q+8]."</li>";
			
			
		}else if($login_level == 5 || $login_level == 6 || $login_level == 7){
			$show = "<li id='".$i."' style='".$style_s."' >"."Names: ".$g_info[$q]." ".$g_info[$q+1]." <i class='fas fa-users'></i> Num Of People: ".$g_info[$q+4]." <i class='fas fa-door-open'></i> Room Num: ".$g_info[$q+5]." <i class='fas fa-calendar-plus'></i> Date In: ".$g_info[$q+7]." <i class='fas fa-calendar-minus'></i> Date Out ".$g_info[$q+8]."</li>";
			

		}

    	echo $show;

    	
    	$q = $q + $num_of_elems;
    }
		
   ?>	  
		</ul>
	</div>


<script type="text/javascript">
	// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}



</script>



</body>
</html>