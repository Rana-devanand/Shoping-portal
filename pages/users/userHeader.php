<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="http://localhost/project/assets/css/user/userHeader.css">
     <title>Dashboard</title>
</head>

<body>
     <div class="nav">
          <div class="navbar">
               <div class="user">
                    <div class="user-icon">
                         <img src="../../assets/img/user.png" alt="user-icon">
                    </div>
                    <div class="user-detail">
                         <!-- <p>Welcome</p> -->
                         <h3><?php echo "". $_SESSION["id"] ."" ?></h3>
                    </div>

               </div>
               <div class="other">
                    <a href="../../index.php">Home</a>
                    <a href="#">Account Settings</a>
                    <a href="#">Payment Methods</a>
                    <a href="#">My Stuff</a>
                    <a href="#">Help</a>
                    <a href="#">Contact Us</a>
                    <a href="#">About Us</a>
               </div>
          </div>
     </div>
</body>

</html>