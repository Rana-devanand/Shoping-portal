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
               height: 100vh;
               /* Full viewport height */
               background-color: #333;
               color: white;
               padding: 20px;
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
          .wishlist{
               background-color: #17A2B8;
          }
          .cart{
               background-color: #28A745;
          }
          .order{
               background-color: #FFC107;
          }
          .cancel{
               background-color: #DC3545;
          }
          .account{
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
     </style>
</head>

<body>
     <?php include "./userHeader.php" ?>
     <div class="profile">
          <!-- Sidebar -->
          <div class="sidebar">
               <h4>shopping </h4>
               <hr>
               <div class="my-wishlist">
                    <a onclick="showContent('section1')"><i class="fas fa-tachometer-alt">&nbsp;&nbsp; </i>Dashboard</a>
               </div>

               <div class="my-wishlist">
                    <a onclick="showContent('section1')"><i class="fas fa-heart">&nbsp;&nbsp;</i> My wishlist</a>
               </div>
               <div class="my-cart">
                    <a onclick="showContent('section2')"><i class="fas fa-shopping-cart">&nbsp;&nbsp;</i>My cart</a>
               </div>

               <div class="My orders">
                    <a onclick="showContent('section3')"><i class="fas fa-box">&nbsp;&nbsp;</i>My orders</a>
               </div>
               <a onclick="showContent('section4')"><i class="fas fa-ban">&nbsp;&nbsp;</i>My cancellation order</a>
               <a onclick="showContent('section4')"><i class="fas fa-key">&nbsp;&nbsp;</i> Update password</a>
               <a onclick="showContent('section4')"><i class="fas fa-user-slash">&nbsp;&nbsp;</i>Account Deactivate</a>

               <a href="./logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>

          </div>

          <!-- Main Content -->
          <div class="content" id="content">
               <h5>Welcome</h5>
               <h2><?php echo "" . $_SESSION["username"] . "" ?></h2>

               <div class="box">
                    <div class="box-size">
                         <a href="#">
                              <div class="wishlist box-container">
                                   <div class="box-detail">
                                        <h4>4</h4>
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
                                        <h4>10</h4>
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
                                        <h4>15</h4>
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
                                        <h4>3</h4>
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
                                        <h4>4</h4>
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
                                        <h4>10</h4>
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
                                        <h4>15</h4>
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
                                        <h4>3</h4>
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
               } else if (section === 'section2') {
                    contentHTML = `
                    <h1>My Cart</h1>
                    <p>This is the content for Section 2. It is displayed when you click on the "Section 2" link in the sidebar.</p>
                `;
               }
               else if (section === 'section3') {
                    contentHTML = `
                    <h1>My orders</h1>
                    <p>This is the content for Section 2. It is displayed when you click on the "Section 2" link in the sidebar.</p>
                `;
               } else if (section === 'section4') {
                    contentHTML = `
                    <h1>Section 3</h1>
                    <p>This is the content for Section 3. It is displayed when you click on the "Section 3" link in the sidebar.</p>
                `;
               }

               // Update the content area with the selected section's content
               contentDiv.innerHTML = contentHTML;
          }
     </script>

</body>

</html>