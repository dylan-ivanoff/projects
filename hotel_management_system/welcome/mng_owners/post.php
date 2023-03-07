<?php
//session_start();
include('../../session.php');

    $text = $_POST['text'];

    $log_file = $_SESSION['h_name'];


	
	$text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$login_session."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
    file_put_contents($log_file, $text_message, FILE_APPEND | LOCK_EX);
    

?>