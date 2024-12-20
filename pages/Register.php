
<?php
  include_once "../Database/connectivity.php";
     if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $password = $_POST['password'];

          $hashed_password = password_hash($password, PASSWORD_BCRYPT);
         
          // Your email address and password for sending emails
          if(!empty($email) && !empty($password) && !empty($phone) && !empty($name)) {
               $query = "INSERT INTO `users` (`username`, `phone`, `email`, `password`) 
                    VALUES ('$name','$phone','$email' , '$hashed_password')"; 

               $result = mysqli_query($conn, $query);
               
               if($result){
                    echo "<script>alert('User Registered Successfully')</script>";
                    header('Location:./Login.php'); 
               } else {
                    echo "<script>alert('Failed to Register')</script>";
                    header('Location:./Register.php'); 
               }
          }
          else{
                echo "<script>alert('Please fill all the fields')</script>";
                header('Location:./Register.php');
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
               <span>Already Registered click to </span>
               <a href="./Login.php">
                   Login 
               </a>
          </div>
         
     </div>
     <div class="main">
          <div class="col-md-6 col-sm-12">
               <div class="login-form">
                    <form action="Register.php" method="POST"> 
                         <div class="form-group">
                              <label>User Name</label>
                              <input type="text" class="form-control" name="name" placeholder="User Name">
                         </div>
                         <div class="form-group">
                              <label>Phone</label>
                              <input type="text" class="form-control" name="phone" placeholder="User Phone">
                         </div>
                         <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="User Email">
                         </div>
                         <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" name="password" placeholder="Password">
                         </div>
                         <button type="submit" name="submit" value="submit" class="btn btn-lg btn-success">Signup</button>
                    </form>

               </div>
          </div>
     </div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>