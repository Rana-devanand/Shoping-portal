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
                    <a href="./pages/Login.php">
                         <button class="btn btn-lg btn-primary"> Login </button>
                    </a>
                    <a href="./pages/Register.php">
                         <button class="btn btn-lg btn-primary">Register</button>
                    </a>
               </div>
          </div>
     </div>
     <?php include __DIR__. "/Navbar.php" ?>
     


</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>