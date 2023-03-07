
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  //die("Connection failed: " . mysqli_connect_error());
  $url = "../404_page_error/error.html";
  header("Location: $url");
}
//echo "Connected successfully";

$sql = "SELECT * FROM login";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["pass"]. "<br>";
  }
} else {
  //echo "0 results";
	header("Refresh:0");
}
$conn->close();


?>

