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

          .pending {
               background-color: #CAA3AB;
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
          .sidebar a.active {
               background-color: #007bff;
               color: #fff;
               border-radius: 5px;
          }
     </style>
</head>

<body>

     <?php include "../users/userHeader.php" ?>
     <?php

     // session_start();
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

     $query = "SELECT * FROM users";
     $result = mysqli_query($conn, $query);
     $totalusers = mysqli_num_rows($result);


     $queryPending = "SELECT * FROM `order_details` WHERE `status` = 'PENDING'";
     $resultPending = mysqli_query($conn, $queryPending);
     $totalPendingOrder = mysqli_num_rows($resultPending);

     $querySuccess = "SELECT * FROM `order_details` WHERE `status` = 'SUCCESS'";
     $resultOrder = mysqli_query($conn, $querySuccess);
     $totalOrder = mysqli_num_rows($resultOrder);

     $queryCancelled = "SELECT * FROM `order_details` WHERE `status` = 'CANCELLED'";
     $resultCancel = mysqli_query($conn, $queryCancelled);
     $totalCancel = mysqli_num_rows($resultCancel);

     $quertCart = "SELECT * FROM `user_cart`";
     $resultCart = mysqli_query($conn, $quertCart);
     $totalCart = mysqli_num_rows($resultCart);

     ?>

     <div class="profile">
          <!-- Sidebar -->
          <div class="sidebar">
               <h4>Shopping</h4>
               <hr>
               <div class="my-wishlist">
                    <a onclick="showContent('section1'); setActive(this)"><i class="fas fa-tachometer-alt">&nbsp;&nbsp;
                         </i>Dashboard</a>
               </div>

               <div class="my-wishlist">
                    <a onclick="showContent('users'); setActive(this)"><i class="fas fa-heart">&nbsp;&nbsp;</i> Total
                         Users</a>
               </div>

               <div class="my-wishlist">
                    <a onclick="showContent('pending_order'); setActive(this)"><i class="fas fa-box">&nbsp;&nbsp;</i>
                         Total Pending Order</a>
               </div>

               <div class="my-orders">
                    <a onclick="showContent('myorder'); setActive(this)"><i class="fas fa-box">&nbsp;&nbsp;</i> Total
                         Success Orders</a>
               </div>

               <a onclick="showContent('cancel_order'); setActive(this)"><i class="fas fa-ban">&nbsp;&nbsp;</i> Total
                    Cancellation Order</a>
               <a onclick="showContent('section4'); setActive(this)"><i class="fas fa-key">&nbsp;&nbsp;</i> Update
                    Password</a>
               <a onclick="showContent('section4'); setActive(this)"><i class="fas fa-user-slash">&nbsp;&nbsp;</i>
                    Account Deactivate</a>

               <a href="../users/logout.php" class="btn btn-danger"><i
                         class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
          </div>


          <!-- Main Content -->
          <div class="content" id="content">
               <div class="box">
                    <div class="box-size">
                         <a href="#">
                              <div class="wishlist box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalusers; ?></h4>
                                        <p>Total Users</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-user-tag"></i>
                                   </div>
                              </div>

                         </a>

                    </div>
                    <div class="box-size">
                         <a href="#">
                              <div class="pending box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalPendingOrder ?></h4>
                                        <h5 style="font-family:'Times New Roman', Times, serif">Total Pending Order</h5>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-hourglass-half"></i>
                                   </div>
                              </div>

                         </a>

                    </div>
                    <div class="box-size">
                         <a href="#">
                              <div class="order box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalOrder ?></h4>
                                        <h5 style="font-family: 'Times New Roman', Times, serif;">Total Success Order</h5>
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
                                        <h4><?php echo $totalCancel?></h4>
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
                    <h4>My Dashboard</h4>
                     <div class="box">
                    <div class="box-size">
                         <a href="#">
                              <div class="wishlist box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalusers ?></h4>
                                        <p>Total Users</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-user-tag"></i>
                                   </div>
                              </div>

                         </a>

                    </div>
                      <div class="box-size">
                         <a href="#">
                              <div class="pending box-container">
                                   <div class="box-detail">
                                        <h5><?php echo $totalPendingOrder ?></h5>
                                        <p>Total Pending Order</p>
                                   </div>
                                   <div class="icon">
                                        <i class="fas fa-hourglass-half"></i>
                                   </div>
                              </div>

                         </a>

                    </div>
                    <div class="box-size">
                         <a href="#">
                              <div class="order box-container">
                                   <div class="box-detail">
                                        <h4><?php echo $totalOrder ?></h4>
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
                                        <h4><?php echo $totalCancel ?></h4>
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
               else if (section === 'users') {
                    contentHTML = `
               <div class="container mt-4">
                    <div class="order_data">
                         <h4 class="mb-3">Total Users</h4>
                         <table class="table table-striped table-bordered">
                              <thead class="table-dark">
                                   <tr>
                                        <th scope="col">sr.no</th>
                                        <th scope="col">UserName</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Account Created</th>
                                        <th scope="col">Account Status</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                              if ($totalusers > 0) {
                                   $index = 1;
                                   while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $index++ . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['createdAt'] . "</td>";
                                        echo "<td>
                                                   <center>
                                                       <div class='active'>
                                                            <p  style='background-color:green;padding:5px; width:80px; border-radius:5px; color:white'> Active</p>
                                                       </div>
                                                  </center>
                                                  </td>";
                                        echo "</tr>";
                                   }
                              } else {
                                   echo "No users found";
                              }

                              ?>
                              </tbody>
                         </table>
                    </div>
               </div>

                `;
               }
               else if (section === 'pending_order') {
                    contentHTML = `
               <div class="container mt-4">
                    <div class="order_data">
                         <h4 class="mb-3">Total Pending Order</h4>
                         <table class="table table-striped table-bordered">
                              <thead class="table-dark">
                                   <tr>
                                        <th scope="col">sr.no</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Product Status</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php

                             
                              if ($totalPendingOrder > 0) {
                                   $index = 1;
                                   while ($row = mysqli_fetch_assoc($resultPending)) {
                                        echo "<tr>";
                                        echo "<td>" . $index++ . "</td>";
                                        echo "<td>
                                                  <center>
                                                       <img src='" . $row['prod_img'] . "' style='height:80px;width:80px;'/> 
                                                  </center>
                                                  </td>";
                                        echo "<td>" . $row['order_id'] . "</td>";
                                        echo "<td>" . $row['productid'] . "</td>";
                                        echo "<td>" . $row['prod_name'] . "</td>";

                                        echo "<td>" . $row['prod_price'] . "</td>";
                                        echo "<td>
                                        <center>     
                                             <div style='background-color:#008000; padding:10px;border-radius:3px;height:45px;width:150px'>
                              <a  href='http://localhost/project/pages/users/approveOrder.php?id=" . $row['id'] . "'style='text-decoration:none;color:white; name='approve'> Approve Order <i class='fas fa-check-circle'></i></a>
                                                       </div>
                                        </center>
                                             </td>";
                                        echo "</tr>";
                                   }
                              } else {
                                   echo "No order found";
                              }

                              ?>
                              </tbody>
                         </table>
                    </div>
               </div>

                `;
               } else if (section === 'myorder') {
                    contentHTML = `
               <div class="container mt-4">
                    <div class="order_data">
                         <h4 class="mb-3">Total Product <span style='color:green'>Success</span>:</h4>
                         <table class="table table-striped table-bordered">
                              <thead class="table-dark">
                                   <tr>
                                        <th scope="col">sr.no</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Order-id</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Order Date</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php
                              if ($totalOrder > 0) {
                                   $index = 1;
                                   while ($row = mysqli_fetch_assoc($resultOrder)) {
                                        echo "<tr>";
                                        echo "<td>" . $index++ . "</td>";
                                        echo "<td>";
                                        echo "<img src='" . $row['prod_img'] . "' style='height:80px;width:80px;' />";
                                        echo "</td>";
                                        echo "<td>" . $row['prod_name'] . "</td>";
                                        echo "<td>" . $row['order_id'] . "</td>";
                                        echo "<td>₹" . $row['prod_price'] . "</td>";
                                        if ($row['status'] === 'PENDING') {
                                             echo "<td>
                                                       <div style='background-color:#F89C0E; padding:5px;border-radius:3px;height:35px'>
                                                            <p>Pending</p>
                                                       </div>                                                  
                                                  </td>";
                                        } else if ($row['status'] === 'SUCCESS') {
                                             echo "<td>
                                                  <div style='color:#fff;background-color:#008000; padding:5px;border-radius:3px;height:35px'>
                                                            <p>SUCCESS</p>
                                                       </div>  
                                                  </td>";
                                        } else {
                                             echo "<td>
                                                       <div style='background-color:#FF5B3D; padding:5px;border-radius:3px;height:35px color:white'>
                                                            <p>Cancelled <i class='fas fa-ban'></i></p>
                                                       </div>                                                  
                                                  </td>";
                                        }

                                        if ($row['status'] === 'Cancelled') {
                                             echo "<td>
                                                   <div style='background-color:#FF5B3D; padding:5px;border-radius:3px;height:35px'>
                                                            <p>Cancelled <i class='fas fa-ban'></i></p><i class='fas fa-ban'></i>
                                                       </div>                                                  
                                                  </td>";
                                        } else {
                                             echo "<td>
                                             <div style='background-color:#DC3545; padding:5px;border-radius:3px;height:35px'>
                                                  <a  href='http://localhost/project/pages/users/cancelOrder.php?id=" . $row['id'] . "' style='text-decoration:none;color:white; name='cancel'>Remove</a>
                                      
                                             </div>
                                        </td>";

                                        }

                                        echo "<td>" . $row['createdAt'] . "</td>";
                                        echo "</tr>";
                                        ?>
                                                                     <?php
                                   }
                              } else {
                                   echo "No order found";
                              }

                              ?>
                         </tbody>
                         </table>
                    </div>
               </div>

                `;
               } else if (section === 'cancel_order') {
                    contentHTML = `
               <div class="container mt-4">
                    <div class="order_data">
                         <h4 class="mb-3">Total Product <span style='color:red'>CANCELLED</span>:</h4>
                         <table class="table table-striped table-bordered">
                              <thead class="table-dark">
                                   <tr>
                                        <th scope="col">sr.no</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Order-id</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Order Date</th>
                                   </tr>
                              </thead>
                              <tbody>
                              <?php

                              if ($totalCancel > 0) {
                                   $index = 1;
                                   while ($row = mysqli_fetch_assoc($resultCancel)) {
                                        echo "<tr>";
                                        echo "<td>" . $index++ . "</td>";
                                        echo "<td>";
                                        echo "<img src='" . $row['prod_img'] . "' style='height:80px;width:80px;' />";
                                        echo "</td>";
                                        echo "<td>" . $row['prod_name'] . "</td>";
                                        echo "<td>" . $row['order_id'] . "</td>";
                                        echo "<td>₹" . $row['prod_price'] . "</td>";
                                        if ($row['status'] === 'PENDING') {
                                             echo "<td>
                                                       <div style='background-color:#F89C0E; padding:5px;border-radius:3px;height:35px'>
                                                            <p>Pending</p>
                                                       </div>                                                  
                                                  </td>";
                                        } else if ($row['status'] === 'Success') {
                                             echo "<td>
                                                  <div style='color:#fff;background-color:#008000; padding:5px;border-radius:3px;height:35px'>
                                                            <p>SUCCESS</p>
                                                       </div>  
                                                  </td>";
                                        } else {
                                             echo "<td>
                                                       <div style='background-color:#FF5B3D; padding:5px;border-radius:3px;height:35px;width:100px; color:white'>
                                                            <p>Cancelled <i class='fas fa-ban'></i></p>
                                                       </div>                                                  
                                                  </td>";
                                        }

                                        if ($row['status'] === 'Cancelled') {
                                             echo "<td>
                                                   <div style='background-color:#FF5B3D; padding:5px;border-radius:3px;height:35px;width:100px; color:white'>
                                                            <p>Cancelled <i class='fas fa-ban'></i></p>
                                                       </div>                                                  
                                                  </td>";
                                        } else {
                                             echo "<td>
                                             <div style='background-color:#DC3545; padding:5px;border-radius:3px;height:35px;width:100px'>
                                                  <a  href='http://localhost/project/pages/users/cancelOrder.php?id=" . $row['id'] . "' style='text-decoration:none;color:white; name='cancel'>Remove <i class='fas fa-trash'></i></a>
                                      
                                             </div>
                                        </td>";

                                        }

                                        echo "<td>" . $row['createdAt'] . "</td>";
                                        echo "</tr>";
                                        ?>
                                                                     <?php
                                   }
                              } else {
                                   echo "No order found";
                              }

                              ?>
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
     <script>
          function setActive(element) {
               // Remove the 'active' class from all sidebar links
               const sidebarLinks = document.querySelectorAll('.sidebar a');
               sidebarLinks.forEach((link) => {
                    link.classList.remove('active');
               });

               // Add the 'active' class to the clicked link
               element.classList.add('active');
          }

     </script>

</body>

</html>