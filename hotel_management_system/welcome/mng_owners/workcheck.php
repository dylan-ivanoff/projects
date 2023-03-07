<?php

	include('../../session.php');

		if(strval($login_level) == '5' || strval($login_level) == '6' || strval($login_level) == '7'){
		$url = '../../404_page_error/error.html'; 

		header( "Location: $url" );
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

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
  background-color: white;
  color: black;
}

/* Style the header */
.header {
  background-color: white;
  padding: 30px 40px;
  color: black;
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



				$sql = "SELECT guest_serv.checked, guest_serv.ch_time, guests_info.gsm, guests_info.first_nm, guests_info.last_nm, guest_res.date_in, guest_res.date_out, guest_res.num_of_people, rooms.num, guest_serv.serv_nm, guest_serv.price_serv, guest_serv.add_info, login.username, personal_info.f_name, personal_info.l_name, personal_info.avatar, personal_info.ph_num FROM guest_serv JOIN guest_res ON guest_serv.gr_id = guest_res.id JOIN rooms ON guest_res.room_num =rooms.id JOIN guests_info ON guest_res.gid = guests_info.id JOIN login ON guest_serv.in_chrg_lid = login.id JOIN personal_info ON login.id = personal_info.u_id JOIN hotels_emp ON login.id = hotels_emp.user_id JOIN hotels_info ON hotels_emp.hotel_id  = hotels_info.id WHERE hotels_info.name = '".$h_nm."' AND guest_res.date_in > 'CURDATE()' AND guest_res.date_in < CURDATE() + INTERVAL 3 DAY AND guest_res.date_out >= CURDATE(); "; //get data for 3 days ahead
				$result = $conn->query($sql);


				$g_info = array();
				$s_info = array();
				$count = 0;
				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {

				    		//$egn = $row['egn'];				  			

				    		$f_name = $row['f_name'];
				    		$l_name = $row['l_name'];
				    		$user_nm = $row['username'];
				    		$avatar = $row['avatar'];
				    		$ph_number = $row['ph_num'];
				    		$checked_s = $row['checked'];
				    		$checked_t = $row['ch_time'];

				    		$date_in_s = $row['date_in'];
				    		$date_out_s = $row['date_out'];
				    		$first_n = $row['first_nm'];
				    		$last_n = $row['last_nm'];  
				    		$num_p = $row['num_of_people'];
				    		$room_n = $row['num'];  
				    		$price_s = $row['price_serv'];  
				    		$add_inform = $row['add_info'];

				    		//$gs_id = $row['id'];				    
				    		

		                    //echo $the_elem;		    
		                    array_push($g_info, $f_name, $l_name, $avatar, $user_nm, $ph_number, $checked_s, $checked_t, $date_in_s, $date_out_s, $first_n, $last_n, $num_p, $room_n, $price_s, $add_inform);

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
		  <input type="text" id="myInput" placeholder="Progress..." style="width: 33%; margin-left: 33%;" disabled="true">
	<!--	  <span onclick="newElement()" class="addBtn">Add</span>  -->
		</div>

		<ul id="myUL">
		
		  <?php
	//$g_info
    $array_len  = count($g_info);
    $checked_arr = array();
    $num_of_elems = 15;
    $tasks = $array_len/$num_of_elems;
    //echo "<li>".$array_len."</li>";

    $q = 0;
    $cnt_done = 0;
    for($i=0; $i<$array_len/$num_of_elems;$i++){
    	if($g_info[$q+5] == 1){ array_push($checked_arr, $i); $cnt_done++;} //if task is done

    	$time = strtotime($g_info[$q+7]);

		$newformat = date('Y-m-d',$time);
    	
    	$now = new DateTime();
		$now_frt = $now->format('Y-m-d');


		$style_s ="";
		if($newformat == $now_frt){
    	   $style_s = "background-color: lightgreen; color: black;"; //li background color is lightgreen if guest must leave today
    	}else{
    		$style_s="background-color: white; color: black;";
    	}



    	if($g_info[$q+2]==""){$g_info[$q+2] = 'no-avatar-300.png';}    	    	

    	$show = "<li id='".$i."' style='".$style_s."' >"."<img id='output_1' width='48' src='avatars/".$g_info[$q+2]."' />"." ".$g_info[$q]." ".$g_info[$q+1]." username:".$g_info[$q+3]." GSM: ".$g_info[$q+4]." Date In: ".$g_info[$q+7]." Date Out: ".$g_info[$q+8]." Names: ".$g_info[$q+9]." ".$g_info[$q+10]." People: ".$g_info[$q+11]." Room N. ".$g_info[$q+12]." $: ".$g_info[$q+13]." Add. Info: ".$g_info[$q+14]." Activity Time: ".$g_info[$q+6]."</li>";
    	echo $show;
/*
    	if($g_info[$q+10] == 1){    		
    		array_push($checked_arr, $i);
    	}

    	$time = strtotime($g_info[$q]);

		$newformat = date('Y-m-d',$time);
    	
    	$now = new DateTime();
		$now_frt = $now->format('Y-m-d');


		$style_s ="";
		if($newformat == $now_frt){
    	   $style_s = "background-color: lightgreen;"; //li background color is lightgreen if guest must leave today
    	}else{
    		$style_s="background-color: #f44336;";
    	}


		$show = "<li id='".$i."' style='".$style_s."' >"."Date In: ".$g_info[$q]." | Date Out: ".$g_info[$q+1]." | N. of People: ".$g_info[$q+2]." | Room N.: ".$g_info[$q+3]." | Serv.: ".$g_info[$q+4]." | Name: ".$g_info[$q+7]." ".$g_info[$q+8]." GSM:".$g_info[$q+9]." | Comment: ".$g_info[$q+6]." | $: ".$g_info[$q+5]."</li>";

		echo $show;

	*/	
    	
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

// Click on a close button to hide the current list item
/*
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}
*/

// Add a "checked" symbol when clicking on a list item
/*
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);
*/

// Create a new list item when clicking on the "Add" button

/*
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
*/


</script>

<script type="text/javascript">

	var n_done = <?php echo json_encode($cnt_done); ?>
//	document.getElementById('myInput').placeholder = n_done.toString();
	var t_tasks = <?php echo json_encode($tasks); ?>
	
	var ch_arr = <?php echo json_encode($checked_arr) ;?>

	let y = 0;

	while (y < ch_arr.length) {
	    //console.log(scores[i]);
	    //alert();
	    document.getElementById(ch_arr[y].toString()).classList.toggle('checked');	    
	    y++;
	    document.getElementById('myInput').placeholder = n_done.toString()+ " Out Of " + t_tasks.toString() + "Tasks Done";
	}
</script>

</body>
</html>