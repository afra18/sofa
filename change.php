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