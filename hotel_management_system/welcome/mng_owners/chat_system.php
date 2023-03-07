
<?php
include('../../session.php');

$_SESSION['ch_status'] = 'active';


$log_file = $_SESSION['h_name'];

    if(strval($login_level) == '3' || strval($login_level) == '4' || strval($login_level) == '5' || strval($login_level) == '6' || strval($login_level) == '7'){
        $url = '../../404_page_error/error.html'; 

        header( "Location: $url" );
    }

//echo gettype($log_file);


// delete file
if(file_exists($log_file)){
    if ((time() - filectime($log_file)) > 86400) {  // 86400 = 60*60*24
        unlink($log_file);
    }
}


// delete file

function setToInactive(){
	//Simple exit message 

    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['login_user'][0] ."</b> has left the chat session.</span><br></div>";
    file_put_contents($log_file, $logout_message, FILE_APPEND | LOCK_EX);    
	
	//session_destroy();
	//header("Location: chat_system.php"); //Redirect the user 	
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Chat</title>
        <meta name="description" />
        <!-- liks -->
        <link rel="stylesheet" href="style.css" />

        <link rel="stylesheet" href="nav.css">

    </head>
    <body onmouseover="changeStatus(true);" onmouseout="changeStatus(false);" style="background-image: url('../../img/background.jpg');">     

    <div class="container" style="position: relative; width: 44%; margin-left: 5%;">
        <div class="topnav">
          <a href="#home">Welcome, <?php echo $login_session; ?></a>
          <a href="#"><?php echo $position; ?></a>
          <a href="#"><?php echo "Hotel: ".$_SESSION['h_name']; ?></a>
          <a href = "../welcome_owr.php">Back</a>      
          <a href = "../../logout.php">Sign Out</a>
        </div>
      </div>

    	<script type="text/javascript">
		  var i=0;
		  var pageStatus=true;



		  function changeStatus(status) { 
		    i+=1;
		    if (status==true) {
		      //console.log(i+' Page is active');
		      pageStatus=true;		      
		      /* change the users status to active */
		    } else {
		      pageStatus=false;
		      window.setTimeout(function() { if(pageStatus==false) { /*console.log(i+' Page is inactive'); */ <?php setToInactive(); ?> /* change the users status to inactive */ } }, 1000);
		    }
		  }
		</script>

        <div id="wrapper">
            <div id="menu">
              <!--  <p class="welcome">Welcome, <b><?php //echo $login_session; ?> <a href = "../../logout.php"> | Sign Out</a></b><a href = "../welcome_owr.php"> | Go Back</a></p> -->
              <p style="text-align: center; margin-left: 30%;">Chat System For Owners Only</p>
                
            </div>
            <div id="chatbox">
            <?php
            if(file_exists($log_file) && filesize($log_file) > 0){
                $contents = file_get_contents($log_file); 
                echo $contents;
            }

            ?>
            </div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document 
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });

                var log_file = <?php echo json_encode($log_file); ?>


                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request 
                    $.ajax({
                        url: log_file,
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div 
                            //Auto-scroll 
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request 
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div 
                            }	
                        }
                    });
                }
                setInterval (loadLog, 2500);
                
            });


        </script>
    </body>
</html>
