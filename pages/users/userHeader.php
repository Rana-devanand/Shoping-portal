<?php
session_start();
include_once "../../Database/connectivity.php";
if(isset($_SESSION['id'])){
     $id = $_SESSION['id'];
     $query = "SELECT * from `users` WHERE `id` = '$id'";
     $result = mysqli_query($conn, $query);
     if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
          $user = $row['username'];
          $phone = $row['phone'];
          $email = $row['email'];
     }
     else{
          echo "No user found";
     }
}

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
                         <span>
                         <h5><?php echo $user ?></h5></span>
                         <span><h6><?php echo $email ?></h6></span>
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