<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Change Password</title>
    <style>
        /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #7d2ae8;
  padding: 30px;
}
.container{
  position: relative;
  max-width: 850px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  perspective: 2700px;
}
.container .cover{
  position: absolute;
  top: 0;
  left: 50%;
  height: 100%;
  width: 50%;
  z-index: 98;
  transition: all 1s ease;
  transform-origin: left;
  transform-style: preserve-3d;
}
.container #flip:checked ~ .cover{
  transform: rotateY(-180deg);
}
 .container .cover .front,
 .container .cover .back{
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.cover .back{
  transform: rotateY(180deg);
  backface-visibility: hidden;
}
.container .cover::before,
.container .cover::after{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background: #7d2ae8;
  opacity: 0.5;
  z-index: 12;
}
.container .cover::after{
  opacity: 0.3;
  transform: rotateY(180deg);
  backface-visibility: hidden;
}
.container .cover img{
  position: absolute;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: 10;
}
.container .cover .text{
  position: absolute;
  z-index: 130;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.cover .text .text-1,
.cover .text .text-2{
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  text-align: center;
}
.cover .text .text-2{
  font-size: 15px;
  font-weight: 500;
}
.container .forms{
  height: 100%;
  width: 100%;
  background: #fff;
}
.container .form-content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form-content .login-form,
.form-content .signup-form{
  width: calc(100% / 2 - 25px);
}
.forms .form-content .title{
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .title:before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 25px;
  background: #7d2ae8;
}
.forms .signup-form  .title:before{
  width: 20px;
}
.forms .form-content .input-boxes{
  margin-top: 30px;
}
.forms .form-content .input-box{
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
}
.form-content .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.form-content .input-box input:focus,
.form-content .input-box input:valid{
  border-color: #7d2ae8;
}
.form-content .input-box i{
  position: absolute;
  color: #7d2ae8;
  font-size: 17px;
}
.forms .form-content .text{
  font-size: 14px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .text a{
  text-decoration: none;
}
.forms .form-content .text a:hover{
  text-decoration: underline;
}
.forms .form-content .button{
  color: #fff;
  margin-top: 40px;
}
.forms .form-content .button input{
  color: #fff;
  background: #7d2ae8;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.forms .form-content .button input:hover{
  background: #5b13b9;
}
.forms .form-content label{
  color: #5b13b9;
  cursor: pointer;
}
.forms .form-content label:hover{
  text-decoration: underline;
}
.forms .form-content .login-text,
.forms .form-content .sign-up-text{
  text-align: center;
  margin-top: 25px;
}
.container #flip{
  display: none;
}
@media (max-width: 730px) {
  .container .cover{
    display: none;
  }
  .form-content .login-form,
  .form-content .signup-form{
    width: 100%;
  }
  .form-content .signup-form{
    display: none;
  }
  .container #flip:checked ~ .forms .signup-form{
    display: block;
  }
  .container #flip:checked ~ .forms .login-form{
    display: none;
  }
}
</style>

   
     <!-- PHP CONNECTION FILE -->
	 <?php include 'connect.php' ?>

   


</head>

<?php
if(isset($_POST['login']))
{
  // Get User Input from Form
  $email = $_POST['nemail'];
  $oldPassword = $_POST['opassword']; 
  $newPassword = $_POST['npassword']; 
  $confirmPassword = $_POST['cpassword']; 

  // Check Old Password against what's stored in DB
  $sql = "SELECT * FROM sample WHERE email = '$email' AND password = '".($oldPassword)."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $count = mysqli_num_rows($result);

  // If Old Password is correct
  if($count == 1)
  {
    // Check if New Password and Confirm Password match
    if($newPassword == $confirmPassword)
    {
        // Update Password in DB 
       $sql = "UPDATE sample SET password = '".($newPassword)."' WHERE email = '$email'";

       $result = mysqli_query($conn, $sql);

       // Check Result of Query
       if ($result) 
       {
        ?>
		<script>
			alert("Password Changed Successfully.");
			window.location.href = "index.php";
		</script>
		<?php
       }
       else 
       {
        ?>
		<script>
			alert("The two passwords do not match.");
		</script>
		<?php
       }
    }
    else
    {
        ?>
		<script>
			alert("Error Occured.");
		</script>
		<?php
    }
}
else
{
    ?>
	<script>
		alert("Your old password do not Match with our records.");
	</script>
	<?php
}
}
?>


<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="card">
        <p class="lock-icon"><i class="fas fa-lock"></i></p>
        <h2>Change Password</h2>
        <p>YOU CAN RESET YOUR PASSWORD HERE.</p>
        <input id="text" type="email" class="passInput" name="nemail" placeholder="Email" required/>
        <input id="epass" type="password" class="passInput" name="opassword" placeholder="Old Password" />
        <input id="epass" type="password" class="passInput" name="npassword" placeholder="New Password" />
        <input id="epass" type="password"class="passInput" name="cpassword" placeholder="Confirm Password" />
        <button type="login" name="login">Reset My Password</button>
    </div>
</form>
</body>

</html>