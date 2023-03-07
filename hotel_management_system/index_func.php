<?php
       
        
   include('functions/config.php');
   //include('redirect_lvl.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = md5($_POST['password']); 
      
      $sql = "SELECT * FROM login WHERE username = '".$myusername."' and pass = '".$mypassword."'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = array();
         $_SESSION['login_user'][0] = $myusername;
         //$_SESSION['login_user'][1] = $row['level']; //!
         //include('redirect_lvl.php');
         //redirect_lvl();
         
         $url = "welcome/welcome.php";
         header("location: $url");
         
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

    ?>
