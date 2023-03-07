<?php

/*
   session_start();
   
   if(session_destroy()) {
   	  //$url = '../index.php';
   	  //$url = 'https://google.com'
      header("Location: $url");
   }

   */

   session_start();
   session_destroy();
   $url = 'index.php';
   header("Location: $url");
?>