<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>
   <?php include'Links.php' ?>
   <?php include'connect.php' ?>
   <link rel="stylesheet" href="styleproduct1.css">

</head>
<header class="header">

   <div class="flex">
   <a href="Admin.php" ><i class="fa-solid fa-house"></i></a> 
      <a href="#" class="logo">Furniture</a>

      <nav class="navbar">
         <ah href="#" class=""><h1>Delivery</h1></a>
        
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
<body>

<form action="" method="post">
<section class="display-product-table">

   <table>

      <thead>
     
         <th>Orders Delivered</th>
         <th>Order Processing</th>
         <th>Orders onboard</th>
         <th>action</th>
      </thead>

      <tbody>
        

         <tr>
          
            <td> A12345T</td>
            <td> B456RT</td>
            <td> R575667R
            </td>
            <td class="view"><button>Update</button></td>
         </tr>

         <tr>
           
            <td> A12345T</td>
            <td> A12345T</td>
            <td> A12345T
            </td>
            <td class="view"><button>Update</button></td>
         </tr>

         <tr>
            
            <td>A12345T</td>
            <td> A12345T</td>
            <td> A12345T
            </td>
            <td class="view"><button>Update</button></td>
         </tr>
      </tbody>
   </table>

</section>
        </form>
        </body>
        </html>