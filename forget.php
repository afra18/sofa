<?php 
session_start()
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Forgot Password</title>
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

     <!-- PHP CONNECTION FILE -->
	 <?php include 'connect.php' ?>

    </head>


    <?php
   
if(isset($_POST['submit'])){
    $email = $_POST['nemail'];
  
    $email_search="select * from sample where email = '$email'";
    $query = mysqli_query($conn,$email_search);

    $email_count = mysqli_num_rows($query);
   
   
    if($email_count==1){
        
        // $pass = mysqli_fetch_assoc($query);
        // $db_pass = $pass['Password'];
        $newPassword = substr((uniqid(mt_rand(), true)), 0, 8);
        $hashedPassword = ($newPassword);
        $sql = "UPDATE sample SET password = '$hashedPassword', cpassword = '$hashedPassword' WHERE Email = '$email'";
        if(mysqli_query($conn,$sql))
        {
            ?>
            <script>
                alert("Successful");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Failed");
            </script>
            <?php
        }
        ?>
        <script>
         var variableData = "<?php echo $newPassword; ?>";
         alert(variableData);
        </script>
        <?php
      
    }
        else{
            ?>
            <script>
                alert("Invalid Email")
            </script>
            <?php
        }
    }
    
?>


    <body>
        
    <div class="form_bg text-center">
       
       <div class="container">
       
       <div class="row">
       <div class="col-12 col-md-12 col-lg-6 box2 ">
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
         <div class="backicon d-flex">
         <a href="Login.php" data-toggle="tooltip" title="Login"><i class="fa-solid fa-right-to-bracket fa-rotate-180"></i></a> 
       <h5>Forgot Password</h5>&nbsp;&nbsp;
       </div>
       <div class="logo">
         <img src="images\banner.png" width="70px" height="90px"><br>
       </div>
       <br>
       <div class="form-group">
             <i class="fa-solid fa-envelope icon"></i>
           <input class="form-control" type="email" placeholder="Email"  name="nemail" required>
       </div>
      
      
       <div class="form-group">
             <input class=" btn" type="submit" value="Submit" name="submit">
       </div>
       
       </form>
   </div>
   </div>
   </div>
     </div>
    </body>
</html>