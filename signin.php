<?php
session_start();
include 'connect.php';
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

     <!-- PHP CONNECTION FILE -->
	 <?php include 'connect.php' ?>
</head>
<body>
     <?php
     if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search="select * from sample where email = '$email'";
        $query = mysqli_query($conn,$email_search);
        $email_count = mysqli_num_rows($query);
        if($email_count){
            $pass = mysqli_fetch_assoc($query);
            if (($password) === $pass["password"]) {
                ?>
                <script>
                    alert("Successful")
                    </script>
                    <?php
            }
            else{
                ?>
                <script>
                    alert("invalid password")
                    </script>
                    <?php
            }
            }
            else{
                ?>
                <script>
                    alert("Invalid email")
                    </script>
                    <?php
            }
        }
     ?>
     <!DOCTYPE html>
     <html>
        <head>
            <tittle>Login</title>
    </head>
    <body>
        <div>
            <h1>Login</h1>
            <Form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="email">email:</label>
            <input type="text" name="email" required>
            <br></br>
            <label for="password">password:</label>
            <input type="password" name="password" required>
            <br><br>
            <input type="submit" value="login" name="submit">
            <div>
                <a href = "change.php"> Change Password </a>
    </div>
    <div>
        <a href = "forgot.php"> Forgot password </a>
    </div>
    </Form>
    </body>
    </html>
    </div>
    </html>