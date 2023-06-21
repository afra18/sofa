<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: -webkit-linear-gradient(left, #a445b2, #fa4299);
}
::selection{
  background: #fa4299;
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 5px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 5px;
  background: -webkit-linear-gradient(left, #a445b2, #fa4299);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #fc83bb;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #b3b3b3;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #fa4299;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #a445b2, #fa4299, #a445b2, #fa4299);
  border-radius: 5px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}
</style>
   </head>
   <body>
   <?php

if(isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($conn, $_POST['nusername']);
    $email = mysqli_real_escape_string($conn, $_POST['nemail']);
    $mobile = mysqli_real_escape_string($conn, $_POST['nphone']);
    $password = mysqli_real_escape_string($conn, $_POST['npassword']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['ncpassword']);

	$pass = md5($password);
	$cpass = md5($password);

    $emailquery = "select * from signup where email = '$email'"; 
    $emailquery_run = mysqli_query($conn, $emailquery);
    $emailquery_num = mysqli_num_rows($emailquery_run);
    if($emailquery_num > 0)
    {
		?>
		<script>
			alert("Email Already Exists");
		</script>
		<?php
    }
	else 
	{
		if($password === $cpassword)
		{
			$insertquery = "insert into signup (username, email, mobile, password, cpassword) values ('$username', '$email', '$mobile', '$pass', '$cpass')";
			$iquery = mysqli_query($conn, $insertquery);
			if($iquery)
            {
				?>
				<script>
					alert("Account Created Successfully");
					window.location.href = "success.php";
				</script>
				<?php
            }
            else
            {
               ?>
			   <script>
				alert("Error Occured");
				</script>
				<?php
            }
		}
		else
		{
			?>
			<script>
				alert("Passwords do not match");
			</script>
			<?php
		}
	}
}
?>

<?php
if(isset($_POST['login']))
{
    $email = $_POST['nemail'];
	$password = $_POST['npassword'];

	$loginquery = "select * from signup where email = '$email'";
	$query = mysqli_query($conn, $loginquery);
	
	$count = mysqli_num_rows($query);
	
	if($count)
	{
		$pass = mysqli_fetch_assoc($query);

		if(md5($password) === $pass["password"])
		{
			?>
		    <script>
			   alert("Login Successfull");
			   window.location.href = "index.php";
		    </script>
		    <?php
		}
		else
		{
			?>
		    <script>
			  alert("Invalid Password");
		    </script>
		    <?php
		}	
	}
	else
	{
		?>
		<script>
			alert("Invalid Email");
		</script>
		<?php
	}	
}
?>

 <!-- Rest of the HTML Code -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>OR USE YOUR EMAIL FOR REGISTERATION.</span>
			<input id="text" type="text" name="nusername" placeholder="Userame" required/>
			<input id="text" type="email" name="nemail" placeholder="Email" required/>
			<input id="number" type="number" name="nphone" placeholder="Phone Number" maxlength=10 required/>
			<input id="epass" type="password" name="npassword" placeholder="Password" required/>
            <input id="ecpass" type="password" name="ncpassword" placeholder="Confirm Password" required/>
			<button type="submit" name="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>OR USE YOUR ACCOUNT.</span>
			<input id="text" type="email" name="nemail" placeholder="Email" required/>
			<input id="epass" type="password" name="npassword" placeholder="Password" required/>
			<a href="forgot.php">Forgot your password?</a>
            <a href="change.php">Change Password</a>
			<button type="login" name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
                <div id="icon-container">
                    <a href="index.php"><i class="fa-solid fa-house" style="color: #f0ecea;"></i></a>
                </div>
				<h1>Welcome to BREWTOPIA</h1>
				<p>Already have an Account!</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
                <div id="icon-right">
                    <a href="index.php"><i class="fa-solid fa-house" style="color: #f0ecea;"></i></a>
                </div>
				<h1>Welcome to BREWTOPIA</h1>
				<p>Do not have any Account!</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
    
    <!-- js code -->
    <script>
       const signUpButton = document.getElementById('signUp');
       const signInButton = document.getElementById('signIn');
       const container = document.getElementById('container');

       signUpButton.addEventListener('click', () => {
	      container.classList.add("right-panel-active");
       });

       signInButton.addEventListener('click', () => {
	      container.classList.remove("right-panel-active");
       });

    </script>

</body>
</html>