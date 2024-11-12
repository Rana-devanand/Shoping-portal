<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <link rel="stylesheet" href="./assets/css/bootstrap.css"> -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     
     <link rel="stylesheet" href="./assets/css/index.css">
     <title>Shop Online</title>
</head>

<body>
     <div class="container-fluid m-0 p-0">
          <?php
          include_once "./Database/connectivity.php";
          include './pages/header.php';
          include './pages/Navbar.php';
          ?>

          <div class="main">
               <div class="row">

               </div>
          </div>
          <div class="scrollbar">
               <marquee direction="left" behavior="scroll" loop="">
                    <div style="display: flex; gap: 30px; align-items: center; white-space: nowrap; margin-right :15px">
                         <h1 style="display: flex; align-items: center;">
                              <img style="width: 30px; height: 30px; margin-right: 5px;"
                                   src="./assets/img/electricity.png" alt="">
                              Spring Clearance Event: Save up to 70% off
                         </h1>
                         <h1 style="display: flex; align-items: center;">
                              <img style="width: 30px; height: 30px; margin-right: 5px;"
                                   src="./assets/img/electricity.png" alt="">
                              Free Shipping on Orders Over $50
                         </h1>

                         <h1 style="display: flex; align-items: center;">
                              <img style="width: 30px; height: 30px; margin-right: 5px;"
                                   src="./assets/img/electricity.png" alt="">
                              Free Shipping on Orders Over $50
                         </h1>

                         <h1 style="display: flex; align-items: center;">
                              <img style="width: 30px; height: 30px; margin-right: 5px;"
                                   src="./assets/img/electricity.png" alt="">
                              Free Shipping on Orders Over $50
                         </h1>
                    </div>
               </marquee>
          </div>

          <div class="card-category">
               <div class="heading">
                    <h1>Shop by category</h1>
               </div>
               <div class="category-detail">
                    <div class="products">
                         <img src="./assets/img/collection-17.jpg" alt="">
                    </div>
                    <div class="products">
                         <img src="./assets/img/collection-14.jpg" alt="">
                    </div>
                    <div class="products">
                         <img src="./assets/img/collection-18.jpg" alt="">
                    </div>
                    <div class="products">
                         <img src="./assets/img/collection-15.jpg" alt="">
                    </div>
               </div>
          </div>

          <div class="best-sellers">
               <div class="heading">
                    <h1>Best Sellers</h1>
                    <p>shop by Latests styles : Stay ahead of the curve with our newest arrivals.</p>
               </div>

               <div class="card-category">
                    <div class="category-detail p-10">
                         <div class="products">
                              <img id="pink" src="./assets/img/orange-1.jpg" alt="">
                              <p class="tittle"> Ribbed Tank Top</p>
                              <b class="Price">$15</b>
                         </div>

                         <div class="products">
                              <img id="purple" src="./assets/img/purple.jpg" alt="">
                              <p class="tittle"> Ribbed Tank Top</p>
                              <b class="Price">$15</b>
                         </div>

                         <div class="products">
                              <img id="white" src="./assets/img/white-3.jpg" alt="">
                              <p class="tittle"> Ribbed Tank Top</p>
                              <b class="Price">$15</b>
                         </div>

                         <div class="products">
                              <img id="brown" src="./assets/img/brown.jpg" alt="">
                              <p class="tittle"> Ribbed Tank Top</p>
                              <b class="Price">$15</b>
                         </div>

                         <div class="products">
                              <img id="brown-2" src="./assets/img/brown-2.jpg" alt="">
                              <p class="tittle"> Ribbed Tank Top</p>
                              <b class="Price">$15</b>
                         </div>

                         <div class="products">
                              <img id="black" src="./assets/img/black-4.jpg" alt="">
                              <p class="tittle"> Ribbed Tank Top</p>
                              <b class="Price">$15</b>
                         </div>

                         <div class="products">
                              <img id="white-2" src="./assets/img/white-8.jpg" alt="">
                              <p class="tittle"> Ribbed Tank Top</p>
                              <b class="Price">$15</b>
                         </div>

                         <div class="products">
                              <img id="light-green" src="./assets/img/light-green-1.jpg" alt="">
                              <p class="tittle"> Ribbed Tank Top</p>
                              <b class="Price">$15</b>
                         </div>

                    </div>
               </div>
          </div>

          <div class="shop-look">
               <div class="heading">
                    <h1>Shop Look</h1>
                    <p>Inspire and let yourself be inspired, from one unique fashion to another.</p>
               </div>
               <div class="look_detail" style="margin-left:3px">
                    <img style="width:670px;height:500px" src="./assets/img/lookbook-3.jpg" alt=""/>
                    <img style="width:660px;height:500px" src="./assets/img/lookbook-4.jpg" alt=""/>
               </div>
          </div>

          <div class="testimonials">
               <?php include "./pages/testimonials.php" ?>
          </div>
         <div class="footer">
          <?php include "./pages/footer.php" ?> 
         </div>
     </div>

     <script src="./assets/js/index.js"></script>
</body>

</html>