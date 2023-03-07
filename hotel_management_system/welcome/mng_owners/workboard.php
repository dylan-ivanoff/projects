<?php
	include('../../session.php');



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	<style>
body {
  margin: 0;
  min-width: 250px;
}

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
  list-style-type: none;
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

				/*

				$date = new DateTime('2000-12-31');

				$date->modify('+1 day');
				echo $date->format('Y-m-d') . "\n";

*/


				$sql = "SELECT guest_serv.checked, guest_serv.id, guests_info.gsm, guests_info.first_nm, guests_info.last_nm, guest_res.date_in, guest_res.date_out, guest_res.num_of_people, rooms.num, guest_serv.serv_nm, guest_serv.price_serv, guest_serv.add_info FROM guest_serv JOIN guest_res ON guest_serv.gr_id = guest_res.id JOIN rooms ON guest_res.room_num =rooms.id JOIN guests_info ON guest_res.gid = guests_info.id WHERE guest_serv.in_chrg_lid = '".$user_lid."' AND guest_res.date_in > 'CURDATE()' AND guest_res.date_in < CURDATE() + INTERVAL 3 DAY AND guest_res.date_out >= CURDATE(); "; //get data for 3 days ahead
				$result = $conn->query($sql);


				$g_info = array();
				$s_info = array();
				$count = 0;
				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {

				    		//$egn = $row['egn'];				  			

				    		$date_in = $row['date_in'];
				    		$date_out = $row['date_out'];
				    		$num_of_people = $row['num_of_people'];				    	
				    		$room_num  = $row['num'];
				    		$serv_nm  = $row['serv_nm'];
				    		$price_serv  = $row['price_serv'];
				    		$add_info  = $row['add_info'];
				    		$f_nm = $row['first_nm'];
				    		$l_nm = $row['last_nm'];				    
				    		$gsm = $row['gsm'];
				    		$checked = $row['checked'];

				    		$gs_id = $row['id'];

		                    //echo $the_elem;		    
		                    array_push($g_info, $date_in, $date_out, $num_of_people, $room_num, $serv_nm, $price_serv, $add_info, $f_nm, $l_nm, $gsm, $checked);

		                    array_push($s_info, $gs_id);

				  }
				} else {
				  //echo "0 results";
				}
				

?>

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



	<div style="padding-left: 5%; padding-top: 3%; padding-bottom: 3%; padding-right: 5%;">
		<div id="myDIV" class="header">
  <h2 style="margin:5px">My To Do List (lightgreens Start Today)</h2>
</div>

<ul id="myUL">
  <li class="checked" style="background-color: lightgreen;">“Either you run the day or the day runs you.”</li>

  <?php
	//$g_info
    $array_len  = count($g_info);
    $checked_arr = array();
    $num_of_elems = 11;
    //echo "<li>".$array_len."</li>";

    $q = 0;
    for($i=0; $i<$array_len/$num_of_elems;$i++){

    	if($g_info[$q+10] == 1){    		
    		array_push($checked_arr, $i);
    	}

    	$time = strtotime($g_info[$q]);

		$newformat = date('Y-m-d',$time);
    	
    	$now = new DateTime();
		$now_frt = $now->format('Y-m-d');


		$style_s ="";
		if($newformat == $now_frt){
    	   $style_s = "background-color: lightgreen; color: black;"; //li background color is lightgreen if guest must leave today
    	}else{
    		$style_s="background-color: white; color: black;";
    	}


		$show = "<li id='".$i."' style='".$style_s."' >"."Date In: ".$g_info[$q]." | Date Out: ".$g_info[$q+1]." | N. of People: ".$g_info[$q+2]." | Room N.: ".$g_info[$q+3]." | Serv.: ".$g_info[$q+4]." | Name: ".$g_info[$q+7]." ".$g_info[$q+8]." GSM:".$g_info[$q+9]." | Comment: ".$g_info[$q+6]." | $: ".$g_info[$q+5]."</li>";

		echo $show;

		
    	
    	$q = $q + 11;
    }
		
   ?>
</ul>

<script>
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
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}


var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');   
    var id_elem = ev.target.id;    

    var array_s=<?php echo json_encode($s_info); ?>;
    //var id_ser = (id_elem+1)*10;
    //alert(array_s[id_elem].toString());

    //alert(id_elem.toString());

    $.ajax({
      type: 'POST',
      url:'taskdone.php',
      data: { id: array_s[id_elem], time: dateTime },
      complete: function (response) {
         // $('#output').html(response.responseText);
      },
      error: function () {
         // $('#output').html('Bummer: there was an error!');
      }
  });

  }
}, false);



// Create a new list item when clicking on the "Add" button
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
</script>

	</div>


<script type="text/javascript">	

	var ch_arr = <?php echo json_encode($checked_arr) ;?>

	let y = 0;

	while (y < ch_arr.length) {
	    //console.log(scores[i]);
	    //alert();
	    document.getElementById(ch_arr[y].toString()).classList.toggle('checked');
	    y++;
	}

	//document.getElementById('1').classList.toggle('checked'); 
</script>
</body>
</html>