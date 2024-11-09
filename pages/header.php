<?php

$userNotLoggedIn = true;
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
     // header("Location: login.php");
     // exit();
} else {
     $userNotLoggedIn = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="./assets/css/header.css">
     <!-- <link rel="stylesheet" href="./assets/css/bootstrap.css"> -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
     .loggedIn{
          display: flex;
          align-items: center;
          justify-content: right;
          /* border: 1px solid #000; */
          gap: 15px;
          margin-right: 50px;
     }
     .loggedIn span {
          font-size: 20px;
          border: 1px solid #ddd;
          padding: 10px 12px;
          border-radius: 50%;
     }
     /* Usericon */
     /* Basic styling for user icon */
.user-icon-container {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

.user-icon {
    width: 35px;
    height: 35px;
    border-radius: 50%; /* Make the icon circular */
}

/* Dropdown menu styling */
.dropdown-menu {
    display: none; /* Hidden by default */
    position: absolute;
    top: 50px; /* Adjust as needed */
    right: 0;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    min-width: 150px;
    z-index: 1;
     
}

.dropdown-menu a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
}

.dropdown-menu a:hover {
    background-color: #f2f2f2;
}

/* Show dropdown on hover */
.user-icon-container:hover .dropdown-menu {
    display: block;
}

.dropdown-menu.show {
    display: block;
}

</style>

<body>
     <div class="container-fluid">
          <div class="row nav">
               <div class="col-4 social-icon">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/"> <i class="fab fa-linkedin"></i></a>
                    <a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
               </div>
               <div class="col-4 discounts">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">


                         <div class="carousel-inner text-slider">
                              <div class="item active">
                                   <p>summer sale is <span style="color:red">live now </span></p>
                              </div>

                              <div class="item">
                                   <p>summer sale discounts <span style="color: red;">70% off</span> </p>
                              </div>

                              <div class="item">
                                   <p>spring season sale <span style="color:red">On</span> </p>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-4 Register">
                    <?php
                    if (!isset($_SESSION['loggedIn'])) {
                         if ($userNotLoggedIn) {
                              echo ' <a href="http://localhost/project/pages/Login.php">
                                     <button class="btn btn-lg btn-primary"> Login </button>
                                   </a>
                                   <a href="http://localhost/project/pages/Register.php">
                                        <button class="btn btn-lg btn-primary">Register</button>
                                   </a>
                                   '
                              ;
                         } 
                    }
                    else {
                         echo "<div class='loggedIn' >
                                   <h2> <b>Welcome " . $_SESSION['username'] . "</b></h2>
                                   <div class='user-icon-container'>
                                   <a href='http://localhost/project/pages/users/profile.php'>
                                        <img src='http://localhost/project/assets/img/user.png' alt='User Icon' class='user-icon'>
                                   </a>
                              </div> 
                                </div>";
                    }

                    ?>
               </div>
          </div>
     </div>
     



</body>
<script>
     document.addEventListener("DOMContentLoaded", function() {
    const userIconContainer = document.querySelector('.user-icon-container');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    userIconContainer.addEventListener('click', function() {
        dropdownMenu.classList.toggle('show');
    });

    // Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!userIconContainer.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>