<?php
   include('functions/config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'][0];
   
   $ses_sql = mysqli_query($db,"select * from login where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $login_level = $row['level'];

   $position = "";
   if($login_level == 1){
      $position = 'Admin';
   }else if($login_level == 2){
      $position = 'Owner';
   }else if($login_level == 3){
      $position = 'Manager';
   }else if($login_level == 4){
      $position = 'Receptionist';
   }else if($login_level == 5){
      $position = 'Housekeeper';
   }else if($login_level == 6){
      $position = 'Food Service';
   }else if($login_level == 7){
      $position = 'Security';
   }

   $_SESSION['ch_status'] = 'inactive'; //for chat_system.php

   //check hotel name
            $sql_1 = "SELECT name FROM hotels_emp JOIN login ON hotels_emp.user_id = login.id JOIN hotels_info ON hotels_emp.hotel_id = hotels_info.id WHERE login.username = '".$login_session."';";
         $result = mysqli_query($db, $sql_1);

         if (mysqli_num_rows($result) > 0) {
           // output data of each row
           while($row = mysqli_fetch_assoc($result)) {
             $hotel_name_1 = $row['name'];
             //echo $hotel_name_1;
             $_SESSION['h_name'] = $hotel_name_1; 
           }
         } else {
           //echo "0 results";
         }
   // ----check hotel name  

         // avatar
         $sql_2 = "SELECT * FROM personal_info JOIN login ON personal_info.u_id = login.id WHERE login.username = '".$login_session."';";
         $result_2 = mysqli_query($db, $sql_2);

         if (mysqli_num_rows($result_2) > 0) {
           // output data of each row
           while($row = mysqli_fetch_assoc($result_2)) {
             //$hotel_name_1 = $row['name'];
             $u_avatar = $row['avatar'];
             //echo $hotel_name_1;
             $_SESSION['u_avatar'] = $u_avatar;

             // get other than avatar info


             $_SESSION['pers_info'][0] = $row['f_name'];
             $_SESSION['pers_info'][1] = $row['l_name'];            
             $_SESSION['pers_info'][2] = $row['b_day'];
             $_SESSION['pers_info'][3] = $row['gender'];
             $_SESSION['pers_info'][4] = $row['ph_num'];             

           }
         } else {
           //echo "";
           $_SESSION['pers_info'][0] = "";
             $_SESSION['pers_info'][1] = "";            
             $_SESSION['pers_info'][2] = "";
             $_SESSION['pers_info'][3] = "";
             $_SESSION['pers_info'][4] = "";  
         }

         // --- avatar


         if(empty($_SESSION['u_avatar'])){
                           $avatar_nm_ses = "no-avatar-300.png";
                        }else{
                           $avatar_nm_ses = $_SESSION['u_avatar'];
                        }

         $avatar_ses = "welcome/mng_owners/avatars/".$avatar_nm_ses;

         // --- user id
         $sql_u_lid = "SELECT id FROM login WHERE username='".$login_session."';";
         $result_lid = mysqli_query($db, $sql_u_lid);

         if (mysqli_num_rows($result_lid) > 0) {
           // output data of each row
           while($row = mysqli_fetch_assoc($result_lid)) {
             $user_lid = $row['id'];
             //echo $hotel_name_1;
             $_SESSION['u_id'] = $user_lid; 
           }
         } else {
           //echo "0 results";
         }


         if(strval($login_level) != '1'){ //admin login
                     // hotel id
         $sql_hid = "SELECT id FROM hotels_info WHERE name='".$hotel_name_1."';";
         $result_hid = mysqli_query($db, $sql_hid);

         if (mysqli_num_rows($result_hid) > 0) {
           // output data of each row
           while($row = mysqli_fetch_assoc($result_hid)) {
             $hid = $row['id'];
             //echo $hotel_name_1;
             $_SESSION['hid'] = $hid; 
           }
         } else {
           //echo "0 results";
         }

         }





   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>