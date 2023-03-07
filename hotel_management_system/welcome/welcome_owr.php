<?php
   include('../session.php');
   //include("../functions/config.php");


?>  

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<!-- Bootstrap 5 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<link rel="stylesheet" href="nav.css"> 

</head>
<body style="background-image: url('../img/background.jpg');">

				   

    <div class="container" style="position: relative; width: 100%; margin-left: 23%; font-size: 1.5em; ">
        <div class="topnav">
      <!--    <a href=""><img width="3%" height="3%" style="padding-bottom: 1%;" src="mng_owners/avatars/<?php echo $avatar_nm_ses; ?>"></a>  -->      		
          <a href="#home"><button>Welcome, <?php echo $login_session; ?></button></a>
          <a href="#"><button><?php echo $position; ?></button></a>
          <a href="#"><button><?php echo "Hotel: ".$_SESSION['h_name']; ?></button></a>              
          <a href = "../logout.php"><button>Sign Out</button></a>
        </div>
      </div>

	<section class="bg-light pt-5 pb-5 shadow-sm">
  <div class="container">
    <div class="row pt-5">
      <div class="col-12">
        <h3 class="text-uppercase border-bottom mb-4">SELECT WHERE TO GO</h3>
      </div>
    </div>




     <div class="row" style="position: relative;">
      
      <div id="workboard_emp" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/done_1.png" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Workboard</h5>
            <p class="card-text mb-4">Some things to do...</p>
            <a style="width: 100%;" href="mng_owners/workboard.php" class="btn btn-primary text-white mt-auto align-self-start">Go</a>
          </div>
        </div>
      </div>

      <div id="progrss_b" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/progress.jpg" class="card-img-top" alt="Card Image" >
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Progress Board</h5>
            <p class="card-text mb-4">Checking The Progress</p>
            <a style="width: 100%;" href="mng_owners/workcheck.php" class="btn btn-primary text-white mt-auto align-self-start" id="progress_b">Go</a>
          </div>
        </div>
      </div>


      <div id="up_guests_b" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/up_guests.png" class="card-img-top" alt="Card Image" >
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Upcomming Guests</h5>
            <p class="card-text mb-4">See the schedule</p>
            <a style="width: 100%;" href="mng_owners/up_guests.php" class="btn btn-primary text-white mt-auto align-self-start">Go</a>
          </div>
        </div>
      </div>

       <div id="dep_guests_b" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/departure.png" class="card-img-top" alt="Card Image" >
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Guests Departure Schedule</h5>
            <p class="card-text mb-4">See the schedule</p>
            <a style="width: 100%;" href="mng_owners/dep_guests.php" class="btn btn-primary text-white mt-auto align-self-start">Go</a>
          </div>
        </div>
      </div>



        
      <div id="own_mngm" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/owners_mng.jpg" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Owners Management</h5>
            <p class="card-text mb-4">Manage owners</p>
            <a style="width: 100%;" href="mng_owners/mng_owners.php" class="btn btn-primary text-white mt-auto align-self-start" id="mng_ow">Go</a>
          </div>
        </div>
      </div>
      <!--ADD CLASSES HERE d-flex align-items-stretch-->
      <div id="chat_system_o" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/chat_sys_8.png" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Owners Chat System</h5>
            <p class="card-text mb-4">Owners Chat System.</p>
            <a style="width: 100%;" href="mng_owners/chat_system.php" class="btn btn-primary text-white mt-auto align-self-start" id="chat_sys">Go</a>
          </div>
        </div>
      </div>
      <!--ADD CLASSES HERE d-flex align-items-stretch-->
      <div id="staff_acc_c" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/staff_cr.png" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Staff Account Management</h5>
            <p class="card-text mb-4">Staff Account Management.</p>
            <a style="width: 100%;" href="mng_owners/staff_acc_crt.php" class="btn btn-primary text-white mt-auto align-self-start" id="staff_acr">Go</a>
          </div>
        </div>
      </div>
    

        
      <!--ADD CLASSES HERE d-flex align-items-stretch-->
      <div id="per_info_b" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/pers_info.png" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Personal Info</h5>
            <p class="card-text mb-4">Personal Information</p>
            <a style="width: 100%;" href="mng_owners/personal_info.php" class="btn btn-primary text-white mt-auto align-self-start" id="pers_info">Go</a>
          </div>
        </div>
      </div>
      <!--ADD CLASSES HERE d-flex align-items-stretch-->
      <div id="ho_cap" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div id="hidde" class="card">
          <img src="mng_owners/work/hotel_cap.png" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Hotel Capacity</h5>
            <p class="card-text mb-4">Hotel Capacity</p>
            <a style="width: 100%;" href="mng_owners/h_capacity.php" class="btn btn-primary text-white mt-auto align-self-start" id="hot_cap">Go</a>
          </div>
        </div>
      </div>
      <!--ADD CLASSES HERE d-flex align-items-stretch-->
      <div id="reserv_b" class="col-lg-4 mb-3 d-flex align-items-stretch" style="position: relative; float: left;">
        <div class="card">
          <img src="mng_owners/work/reservations.png" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Reservations</h5>
            <p class="card-text mb-4">Manage Reservations.</p>
            <a style="width: 100%;" href="mng_owners/reserv_mng.php" class="btn btn-primary text-white mt-auto align-self-start" id="mng_res">Go</a>
          </div>
        </div>
      </div>
    


  </div>
</section>


</body>
<script type="text/javascript">
	var level = <?php echo json_encode($login_level); ?>;	
	

		if(level == 3){ //manager
			document.getElementById('own_mngm').remove();
			document.getElementById('chat_system_o').remove();					
		}else if(level == 4){ //receptionist
			document.getElementById('own_mngm').remove();
			document.getElementById('ho_cap').remove();
			document.getElementById('chat_system_o').remove();	
			document.getElementById('staff_acc_c').remove();
			
		}else if(level == 5 || level == 6 || level == 7){
			document.getElementById('progrss_b').remove();
		document.getElementById('own_mngm').remove();
		document.getElementById('chat_system_o').remove();		
		document.getElementById('staff_acc_c').remove();		
		document.getElementById('ho_cap').remove();
		document.getElementById('reserv_b').remove();

		}
				
	

</script>
</html> 