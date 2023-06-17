<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in || Sign up</title>
     <!-- font awesome icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script src="https://kit.fontawesome.com/0fce55e2d6.js" crossorigin="anonymous"></script>

	 <!-- PHP CONNECTION FILE -->
	 <?php include 'connect.php' ?>

<style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');


 @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: url(./img/home-img.jpeg);
    background-repeat: no-repeat;
    background-size: cover;
	background-attachment: fixed;
    margin: 0 auto;
    overflow: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 10px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #4f3228;
	background-color: #4f3228;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
    cursor: pointer;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background:#94695c;
	background: -webkit-linear-gradient(to right, #94695c, #925542);
	background: linear-gradient(to right, #94695c, #925542);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

#icon-container {
  position: fixed;
  top: 30px;
  left: 30px;
  cursor: pointer;
}

#icon-right {
  position: fixed;
  top: 30px;
  right: 30px;
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