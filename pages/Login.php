<?php

     session_start();
     include_once "../Database/connectivity.php";
     if (isset($_POST['submit'])) {
         $email = $_POST['email'];
         $password = $_POST['password'];
          
         echo $email;
         echo $password;

         if (!empty($email) && !empty($password)) {
             $query = "SELECT * FROM `users` WHERE email = '$email'";
             $result = mysqli_query($conn, $query);

             if (mysqli_num_rows($result) > 0) {

               $user = mysqli_fetch_assoc($result);
              

               $hashedPassword = $user['password'];  
                    if (password_verify($password, $hashedPassword)) {
                        
                         $_SESSION['loggedIn'] = true;
                         $_SESSION['id'] = $user['id'];                            

                     echo "<script>alert('User Logged In Successfully')</script>";
                     header("Location: ../index.php");
                     exit;
                 } else {
                    echo "Incorrect password!";
                 }
             } else {
                 echo "User not found!";
             }
         } else {
             echo "Please enter both email and password.";
         }
     }

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="./assets/css/header.css">
     <!-- <link rel="stylesheet" href="./assets/css/bootstrap.css"> -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <link rel="stylesheet" href="../assets/css/header.css">
     <link rel="stylesheet" href="../assets/css/Login.css">

</head>

<body>
     <?php include __DIR__ . '/Navbar.php' ?>

     <div class="sidenav">
          <div class="login-main-text">
               <h2>Application<br> Login Page</h2>
               <p>Login or register from here to access.</p>
               <span>Not Register yet click to-</span>
               <a href="./Register.php">
                   Register 
               </a>
          </div>
         
     </div>
     <div class="main">
          <div class="col-md-6 col-sm-12">
               <div class="login-form">
                    <form action="Login.php" method="POST">
                         <div class="form-group">
                              <label>User Name</label>
                              <input type="text" class="form-control" name="email" placeholder="User Email">
                         </div>
                         <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" name="password" placeholder="User Password">
                         </div>
                         <button type="submit" name="submit" value="submit" class="btn btn-lg btn-success">Login</button>
                    </form>
               </div>
          </div>
     </div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>