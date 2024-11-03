<?php

     include_once "../Database/connectivity.php";

     $query = "SELECT password FROM `users` where email = 'sumit@gmail.com'";
     $result = mysqli_query($conn, $query);
     if(mysqli_num_rows($result) > 0) {
      
          $row = mysqli_fetch_assoc($result);
          $password = $row["password"];
          echo $password;
          $pass = "12345";

          echo "</br>";

          $hashedPassword = md5($pass);
          echo $hashedPassword;

          echo "</br>";

          if(password_verify($pass , $password)){
               echo "Login Successful";
          }
          else{
               echo "Login Failed";
          }
     }
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <h1>Dashboard</h1>
</body>
</html>