<?php

// session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <title>Sidebar with Dynamic Content</title>
     <link rel="stylesheet" href="http://localhost/project/assets/css/user/profile.css">
     <style>
          /* Basic reset and styling */
          * {
               margin: 0;
               padding: 0;
               box-sizing: border-box;
          }

          body {
               font-family: Arial, sans-serif;
          }

          /* Container holding sidebar and content */
          .profile {
               display: flex;
               /* border: 1px solid #000; */
               /* margin-top: 10px; */
          }

          /* Sidebar styling */
          .sidebar {
               width: 250px;
               height: 545px;
               /* Full viewport height */
               background-color: #333;
               color: white;
               padding: 20px;
               font-size: 14px;
          }

          .sidebar h2 {
               margin-bottom: 20px;
          }

          .sidebar a {
               display: block;
               color: white;
               text-decoration: none;
               margin: 10px 0;
               padding: 10px;
               border-radius: 4px;
               cursor: pointer;
          }

          .sidebar a:hover {
               background-color: #555;
          }

          /* Content styling */
          .content {
               flex: 1;
               /* Take up remaining space */
               padding: 20px;
          }

          .box {
               display: flex;
               flex-wrap: wrap;
               gap: 10px;
               justify-content: start;
          }

          .box-size {
               width: 250px;
               height: 160px;
               padding: 5px;
               /* border: 1px solid black; */
               /* background-color: red; */
          }

          .box-container {
               width: 240px;
               height: 150px;
               padding: 10px;

               display: flex;
               align-items: start;
               justify-content: space-between;
               /* background-color: #4CAF50; */
               /* border: 1px solid #000; */
               border-radius: 8px;

               color: black;
               font-size: 16px;

               cursor: pointer;
               text-align: start;
          }

          .wishlist {
               background-color: #17A2B8;
          }

          .cart {
               background-color: #28A745;
          }

          .order {
               background-color: #FFC107;
          }

          .cancel {
               background-color: #DC3545;
          }

          .account {
               background-color: #343A40;
          }

          .box-size h4 {
               /* border: 1px solid #000; */
               padding: 5px;
          }

          .box-size p {
               /* border: 1px solid #000; */
               font-size: 22px;
               padding: 5px;
               font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
          }

          .box-size a {
               text-decoration: none;

          }

          .icon {
               width: 120px;
               height: 100px;
               /* border: 1px solid #000; */
          }

          .icon i {
               font-size: 60px;
               margin-top: 30px;
               margin-left: 35px;
               opacity: 0.3;
          }

          .remove_cart {
               background-color: #28A745;
          }
     </style>
</head>

<body>
     <?php include "./userHeader.php" ?>
     <?php
     session_start();
     // Database connection
     include_once "../../Database/connectivity.php";
     if (isset($_SESSION['id'])) {
          $id = $_SESSION['id'];
          $query = "SELECT * from `users` where `id` = '$id'";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    $user = $row['username'];
                    $phone = $row['phone'];
                    $email = $row['email'];
               }
          } else {
               echo "No user found";
          }
     }

     if (isset($_SESSION['id'])) {
          $id = $_SESSION['id'];

          $wishlistArray = [];
          $cartArray = [];

          $query = "SELECT DISTINCT `cart_id` FROM `user_cart` WHERE `userid` = '$id'";
          $result = mysqli_query($conn, $query);
          $totalCart = mysqli_num_rows($result);
          if ($totalCart > 0) {
               while ($row = mysqli_fetch_array($result)) {
                    $cartArray[] = $row['cart_id'];
               }
          } else {
               echo "No items in your Cart.";
          }
          echo "<script>const userCartlist = " . json_encode($cartArray) . ";</script>";



          $wishlist_query = "SELECT DISTINCT `Wishlist_id` FROM `users_wishlist` WHERE `userid` = '$id'";
          $wishlist_result = mysqli_query($conn, $wishlist_query);
          $totalWishlist = mysqli_num_rows($wishlist_result);
          if ($totalWishlist > 0) {
               while ($row = mysqli_fetch_array($wishlist_result)) {
                    $wishlistArray[] = $row['Wishlist_id'];
               }
          } else {
               echo "No items in your wishlist.";
          }
          echo "<script>const userWishlist = " . json_encode($wishlistArray) . ";</script>";


     }

     ?>
     <div class="profile">
          <!-- Sidebar -->
          <div class="sidebar">
               <h4>shopping </h4>
               <hr>
               <div class="my-wishlist">
                    <a onclick="showContent('section1')"><i class="fas fa-tachometer-alt">&nbsp;&nbsp; </i>Dashboard</a>
               </div>

               <div class="my-wishlist">
                    <a onclick="showContent('wishlist')"><i class="fas fa-heart">&nbsp;&nbsp;</i> My wishlist</a>
               </div>
               <div class="my-cart">
                    <a onclick="showContent('cart')"><i class="fas fa-shopping-cart">&nbsp;&nbsp;</i>My cart</a>
               </div>

               <div class="My orders">
                    <a onclick="showContent('myorder')"><i class="fas fa-box">&nbsp;&nbsp;</i>My orders</a>
               </div>
               <a onclick="showContent('section4')"><i class="fas fa-ban">&nbsp;&nbsp;</i>My cancellation order</a>
               <a onclick="showContent('section4')"><i class="fas fa-key">&nbsp;&nbsp;</i> Update password</a>
               <a onclick="showContent('section4')"><i class="fas fa-user-slash">&nbsp;&nbsp;</i>Account Deactivate</a>

               <a href="./logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>

          </div>

          <!-- Main Content -->
          <div class="content" id="content">
               <div class="box">
                    <div class="box-size">
                         <a href="#">
                              <div class="wishlist box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalWishlist ?></h4>
                                        <p>Total wishlist</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-heart"></i>
                                   </div>
                              </div>

                         </a>

                    </div>
                    <div class="box-size">
                         <a href="#">
                              <div class="order box-container">
                                   <div class="box-detail">
                                        <h4>0</h4>
                                        <p>Total Order</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-box"></i>
                                   </div>
                              </div>
                         </a>

                    </div>

                    <div class="box-size">
                         <a href="#">
                              <div class="cart box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalCart ?></h4>
                                        <p>Total Cart</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                   </div>
                              </div>
                         </a>
                    </div>

                    <div class="box-size">
                         <a href="#">
                              <div class="cancel box-container">
                                   <div class="box-detail">
                                        <h4>0</h4>
                                        <p>Total cancellation</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-ban"></i>
                                   </div>
                              </div>
                         </a>
                    </div>

                    <div class="box-size">
                         <a href="#">
                              <div class="account box-container">
                                   <div class="box-detail">
                                        <h4>My Account</h4>
                                        <p></p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-user"></i>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
          </div>


     </div>

     <script>

          // JavaScript function to display content based on sidebar section clicked
          function showContent(section) {
               const contentDiv = document.getElementById('content');
               let contentHTML = '';

               if (section === 'section1') {
                    contentHTML = `
                    <h1>My Dashboard</h1>
                     <div class="box">
                    <div class="box-size">
                         <a href="#">
                              <div class="wishlist box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalWishlist ?></h4>
                                        <p>Total wishlist</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-heart"></i>
                                   </div>
                              </div>

                         </a>

                    </div>
                    <div class="box-size">
                         <a href="#">
                              <div class="order box-container">
                                   <div class="box-detail">
                                        <h4>0</h4>
                                        <p>Total Order</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-box"></i>
                                   </div>
                              </div>
                         </a>

                    </div>

                    <div class="box-size">
                         <a href="#">
                              <div class="cart box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalCart ?></h4>
                                        <p>Total Cart</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                   </div>
                              </div>
                         </a>
                    </div>

                    <div class="box-size">
                         <a href="#">
                              <div class="cancel box-container">
                                   <div class="box-detail">
                                        <h4>0</h4>
                                        <p>Total cancellation</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-ban"></i>
                                   </div>
                              </div>
                         </a>
                    </div>

                    <div class="box-size">
                         <a href="#">
                              <div class="account box-container">
                                   <div class="box-detail">
                                        <h4>My Account</h4>
                                        <p></p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-user"></i>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
                    
                `;
               }
               else if (section === 'wishlist') {
                    const url = 'https://dummyjson.com/products';

                    async function fetchPhoneDetails() {
                         // const contentDiv = document.getElementById('phone-container');
                         contentHTML = `
                              <div class="loader">
                                   <img src="http://localhost/project/assets/img/loader/loading.svg" alt=""/>
                              </div>
                         `;

                         try {
                              const response = await fetch(url);
                              if (!response.ok) {
                                   throw new Error(`Error: ${response.status}`);
                              }
                              const data = await response.json();
                              const products = data.products;
                              displayPhoneData(products);
                         } catch (error) {
                              console.error('Error fetching data:', error);
                         }
                    }


                    function displayPhoneData(data) {
                         const contentDiv = document.getElementById('content');
                         contentDiv.innerHTML = '<h4>Your Wishlist :  </h4>';

                         // Filter data to only include items that are in the wishlist
                         const userCartList = data.filter(phone => userWishlist.includes(phone.id.toString()));

                         // Iterate over the filtered data and build HTML
                         userCartList.forEach(phone => {
                              // Construct HTML for each phone item that is wishlisted
                              const phoneItemHTML = `
                              <div class="wishlist_data">
                                   <div class="phone-item">
                                        <h2>${phone.title}</h2>
                                        <div class="wishlist-status">Wishlisted</div>
                                        <img src="${phone.images[0]}" alt="${phone.name}">
                                        <h4>${phone.category}</h4>
                                        <p>${phone.description}</p>
                                        <p>Price: ${phone.price}</p>

                                        <form action="" method="POST">
                                             <div class="order" style="color:#fff;">
                                                  <button type="button" class="wishlist btn">
                                                       Place Order
                                                       <i class="fas fa-shopping-bag"></i>
                                                  </button>
                                              </div>  
                                              
                                              <div class="order" style="background-color:pink ; color:blue; margin-top:2px">
                                                  <button type="button" class="wishlist btn">
                                                      Remove Wishlist
                                                       <i class="fas fa-heart"></i>
                                                  </button>
                                              </div>  
                                        </form>
                                   </div>
                              </div>
                                  `;

                              contentDiv.innerHTML += phoneItemHTML;
                         });
                    }
                    fetchPhoneDetails();
               }
               else if (section === 'cart') {
                    const url = 'https://dummyjson.com/products';

                    async function fetchPhoneDetails() {
                         // const contentDiv = document.getElementById('phone-container');
                         contentHTML = `
                                   <div class="loader">
                                        <img src="http://localhost/project/assets/img/loader/loading.svg" alt=""/>
                                   </div>
                              `;
                         try {
                              const response = await fetch(url);
                              if (!response.ok) {
                                   throw new Error(`Error: ${response.status}`);
                              }
                              const data = await response.json();
                              const products = data.products;
                              displayPhoneData(products);
                         } catch (error) {
                              console.error('Error fetching data:', error);
                         }
                    }


                    function displayPhoneData(data) {
                         const contentDiv = document.getElementById('content');
                         contentDiv.innerHTML = '<h4>Your Cart Product :  </h4>';

                         // Filter data to only include items that are in the wishlist
                         const userCartList = data.filter(phone => userCartlist.includes(phone.id.toString()));

                         // Iterate over the filtered data and build HTML
                         userCartList.forEach(phone => {
                              // Construct HTML for each phone item that is wishlisted
                              const phoneItemHTML = `
                              <div class="wishlist_data">
                                   <div class="phone-item">
                                        <h2>${phone.title}</h2>
                                        <img src="${phone.images[0]}" alt="${phone.name}">
                                        <h4>${phone.category}</h4>
                                        <p>${phone.description}</p>
                                        <p>Price: ${phone.price}</p>
                                        <form action="" method="POST">
                                             <div class="order" style="color:#fff;">
                                                  <button type="button" class="wishlist btn">
                                                       Place Order
                                                       <i class="fas fa-shopping-bag"></i>
                                                  </button>
                                              </div>  
                                              
                                              <div class="order" style="background-color:red ; color:#fff; margin-top:2px">
                                                  <button type="button" class="wishlist btn">
                                                      Remove cart
                                                       <i class="fa fa-shopping-cart"></i>
                                                  </button>
                                              </div>  
                                        </form>
                                   </div>
                                   
                              </div>
                              `;

                              contentDiv.innerHTML += phoneItemHTML;
                         });
                    }
                    fetchPhoneDetails();
               } else if (section === 'myorder') {
                    contentHTML = `
               <div class="container mt-4">
                    <div class="order_data">
                         <h4 class="mb-3">Your Order Product:</h4>
                         <table class="table table-striped table-bordered">
                              <thead class="table-dark">
                                   <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <tr>
                                        <td>iPhone 12</td>
                                        <td>1</td>
                                        <td>$1000</td>
                                        <td>Pending</td>
                                        <td>$1000</td>
                                        <td>
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Samsung Galaxy S21</td>
                                        <td>2</td>
                                        <td>$800</td>
                                        <td>Pending</td>
                                        <td>$1600</td>
                                        <td>
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Google Pixel 5</td>
                                        <td>3</td>
                                        <td>$600</td>
                                        <td>Pending</td>
                                        <td>$1800</td>
                                        <td>
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>
               </div>

                `;
               }

               // Update the content area with the selected section's content
               contentDiv.innerHTML = contentHTML;
          }


          // Get the query parameters from the URL
          const urlParams = new URLSearchParams(window.location.search);

          // Get the value of the 'category' parameter
          const category = urlParams.get('data');
          if (category === 'wishlist') {
               showContent('wishlist');
          }
          else if (category === 'cart') {
               showContent('cart');
          }

     </script>

</body>

</html>