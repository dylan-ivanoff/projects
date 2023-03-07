<?php

    include('../../session.php');

    header('Content-Type: application/json');

    
    $id_s = $_POST['id'];
    $time_s = $_POST['time'];


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

        $sql = "SELECT checked FROM guest_serv WHERE id='".$id_s."';";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {              
            $ch = $row['checked'];             
          }
        } else {
          //echo "0 results";
        }

        if($ch == 1){
          $ch = 0;
        }elseif ($ch == 0) {
          $ch = 1;
        }


        $sql = "UPDATE guest_serv SET checked ='".$ch."', ch_time = '".$time_s."' WHERE id ='".$id_s."' ;";

          if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . mysqli_error($conn);
          }



    echo json_encode($aResult);

?>
