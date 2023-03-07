

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./style.css">

  <?php include 'index_func.php';?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form method="post">
  <div class="form-field">
    <input style="width: 86%;" type="text" placeholder="Username" name="username" required/>
  </div>
  
  <div class="form-field">
    <input style="width: 100%;" type="password" placeholder="Password" id="password" name="password" required/>   
    <i style="padding-left: 3%; cursor: pointer;" class="far fa-eye" id="togglePassword"></i>                      
  </div>
  
  <div class="form-field">
    <button style="margin-left: 29%;" class="btn" type="submit" name="button1">Log in</button>
  </div>
</form>
<!-- partial -->
  
</body>

<script type="text/javascript">
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>

</html>
