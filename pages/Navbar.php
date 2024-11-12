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
</head>
<style>
     .dropdown-menu {
          font-size: 1.2rem;
          color: #fff;
          border: none;
          padding: 10px;
          cursor: pointer;
          width: 250px;
     }

     .totalCart {
          position: absolute;
          right: 58px;
          top: 88px;
          font-size: 18px;
          color: red;
          /* border-radius: 50%; */
          /* padding: 5px; */
          cursor: pointer;
          font-weight: 800;
          /* background-color: red; */
          font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
     }
     .totalWish{
          position: absolute;
          right: 105px;
          top: 82px;
          font-size: 18px;
          color: red;
          border-radius: 50%;
          padding: 5px;
          cursor: pointer;
          font-weight: 800;
          font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

     }
     .bell{
          position: absolute;
          right: 150px;
          top: 80px;
          font-size: 18px;
          color: red;
          border-radius: 50%;
          padding: 5px;
          cursor: pointer;
          font-weight: 800;
          font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
     }
</style>

<body>
     <div class="row header p-0 m-0">
          <div class="col-3">
               <h1>
                    <span class="fa fa-shopping-bag"></span>
                    Shop Online
               </h1>
               </h1>
          </div>
          <div class="col-6">
               <nav class="navbar navbar-expand-lg">
                    <div class="container">
                         <div class="navbar-collapse" id="navbarNav">
                              <ul class="navbar-nav">

                                   <li class="nav-item">
                                        <a class="nav-link" href="http://localhost/project/index.php">Home</a>
                                   </li>

                                   <li class="nav-item">
                                        <a class="nav-link" href="http://localhost/project/pages/allProducts.php"
                                             id="shopDropdown">All Products</a>
                                        <!-- <div class="dropdown-menu">
                                             <a class="dropdown-item" href="#">Shop Item 1</a>
                                             <a class="dropdown-item" href="#">Shop Item 2</a>
                                             <a class="dropdown-item" href="#">Shop Item 2</a>
                                             <a class="dropdown-item" href="#">Shop Item 2</a>
                                             <a class="dropdown-item" href="#">Shop Item 2</a>
                                             <a class="dropdown-item" href="#">Shop Item 2</a>
                                        </div> -->
                                   </li>

                                   <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="productsDropdown">Products</a>
                                        <div class="dropdown-menu">
                                             <a class="dropdown-item"
                                                 href="http://localhost/project/pages/Product.php?category=electronics">electronics</a>

                                             <a class="dropdown-item" 
                                                  href="http://localhost/project/pages/Product.php?category=jewelery">jewelery</a>

                                             <a class="dropdown-item" 
                                                  href="http://localhost/project/pages/Product.php?category=men's clothing">men's clothing</a>

                                             <a class="dropdown-item"
                                                  href="http://localhost/project/pages/Product.php?category=women's clothing">women's clothing</a>
                                        </div>
                                   </li>

                                   <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown">Pages</a>
                                        <div class="dropdown-menu">
                                             <a class="dropdown-item" href="#">Page 1</a>
                                             <a class="dropdown-item" href="#">Page 2</a>
                                        </div>
                                   </li>

                                   <li class="nav-item">
                                        <a class="nav-link" href="#">Blog</a>
                                   </li>

                                   <li class="nav-item">
                                        <a class="nav-link" href="#">Buy Now</a>
                                   </li>

                              </ul>
                         </div>
                    </div>
               </nav>
          </div>
          <div class="col-3 notification">
<?php

$userNotLoggedIn = true;
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
     // header("Location: login.php");
     // exit();
} else {
     $userNotLoggedIn = false;
}
          ?>
          <?php

                if (isset($_SESSION['id'])) {
                          $id = $_SESSION['id'];
                    // $q = "SELECT * FROM `user_cart`
                    //       LEFT JOIN `users_wishlist` ON `user_cart.id` = `users_wishlist.id`
                    //       UNION
                    //       SELECT * FROM `users_wishlist`
                    //       RIGHT JOIN `user_cart` ON `users_wishlist.id` = `user_cart.id`";

                         $query = "SELECT Distinct `cart_id` FROM `user_cart` WHERE `userid` = '$id'";
                         $result = mysqli_query($conn, $query);
                         $totalCart = mysqli_num_rows($result);

                         // print_r($totalCart);die();

                         $wishlistQuery = "SELECT Distinct `Wishlist_id` FROM `users_wishlist` WHERE `userid` = '$id'";
                         $wishlistResult = mysqli_query($conn, $wishlistQuery);
                         $totalWishlist = mysqli_num_rows($wishlistResult);                                 

                         $bell =0;
                    if (!$userNotLoggedIn) {
                         echo " 
                         <a href='#'>
                              <span class='bell'>$bell</span>
                              <span class='fa fa-bell'></span>
                         </a>

                         <a href='http://localhost/project/pages/users/profile.php?data=wishlist'>
                              <span class='totalWish'>$totalWishlist</span>
                              <span class='fas fa-heart'></span>
                         </a>

                         <a href='http://localhost/project/pages/users/profile.php?data=cart'>
                              <span class='totalCart'>$totalCart</span>
                              <span class='fa fa-shopping-cart'></span>
                         </a>


                         <a href='http://localhost/project/pages/users/profile.php'>
                              <span class='fa fa-user'></span>
                         </a>";
                    }
                } else {
                    echo "";
                 }
 ?> 
              

               <!-- <a href="#">
                    <span class="fa fa-search"></span>
               </a> -->
          </div>
     </div>

     <!-- <script>

          const fetchData = async (data) => {
               console.log(data);
               const URL = `https://fakestoreapi.com/products/category/${data}`;
               try {
                    const response = await fetch(URL);
                    const data = await response.json(); 
                    console.log(data);
               } catch (error) {
                    console.log(error);
               }
          }

     </script> -->

</body>

</html>