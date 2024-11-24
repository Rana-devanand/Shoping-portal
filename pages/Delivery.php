<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="http://localhost/project/assets/css/allProducts.css">
     <link rel="stylesheet" href="http://localhost/project/assets/css/delivery.css">

</head>

<body>

     <?php include "./header.php"; ?>
     <?php include_once "../Database/connectivity.php"; ?>
     <?php include "./Navbar.php"; ?>

     <?php
     $productId = "";
     $productName = "";
     $ProductImage = "";
     $ProductTotalPrice = "";
     $userId = $_SESSION['id'];
   
     if (isset($_GET['id'])) {
          $productId = $_GET['id'];
          
     } else {
              echo "ID parameter is missing.";
     }

     $url = "https://dummyjson.com/products";
     $response = file_get_contents($url);

     if ($response === FALSE) {
          die("Error occurred while calling API");
     }
     // Decode JSON response
     $data = json_decode($response, true);
    

     foreach ($data['products'] as $product) {
         
          if ($product['id'] == $productId) {
               $productName = $product['title'];
               $price = $product['price'];
               $ProductImage = $product['images'][0];
               $ProductTotalPrice = $price + 15;
               
               // echo "Name: " . $product['title'] . "<br>";
               // echo "Price: $" . $product['price'] . "<br><br>";
               // echo "<img src='". $product['images'][0]. "' alt='Product Image'><br>";
               break;
          }
     }

     $orderID = "ORD" . strtoupper(bin2hex(random_bytes(4)));
     if (isset($_POST['submit'])) {
          $fullName = $_POST['fullName'];
          $phone = $_POST['Number'];
          $address = $_POST['streetAddress'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $country = $_POST['country'];
          $zip = $_POST['zip'];
          $message = $_POST['additionalInfo'];
          $payment = $_POST['paymentMethod'];
          
          
          $userQuery = "INSERT INTO `users_details` (`order_id`,`full_name`,`number`,`street`,`city`,`state`,`country`,`zip`,`message`) VALUES ('$orderID','$fullName', '$phone','$address','$city','$state','$country','$zip','$message')";
          
          $userResult = mysqli_query($conn, $userQuery);
          
          if ($userResult) {
            echo "<script>alert('Your Address is Added Successfully.');
                 window.location.href = 'http://localhost/project/pages/orderConfirmation.php?productId=$productId&orderId=$orderID';
                  </script>";;
          }
          else{
                echo "<script>alert('Failed to Add Address. Please try again.');
                  window.location.href = 'http://localhost/project/pages/delivery.php?id=$productId';
                  </script>";;
          }
      }
      
     ?>

     <div class="form-container">

          <div class="product-order-details">
               <h2>Product Order Details</h2>
               <?php echo "<img src='$ProductImage' alt='$productName' />";
               echo "<h5>Product  :$productName</h5>";
               echo "<h5>Price : ₹$price</h5>";
               echo "<h5>Delivery Charges :  <span style='color:green'>FREE</span></h5>";
               echo "<h5>Platform fee : ₹15</h5>";
               echo "<hr></br>";
               echo "<b>Total Price : ₹" . $ProductTotalPrice . "</b>";
               ?>

          </div>
          <!-- http://localhost/project/Database/order.php -->
          <form action="" method="POST">
               <input type="hidden" name="productId" value="<?= $productId ?>">
               <div class="form-group">
                    <h2>Enter Your Full Address</h2>
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>

                    <label for="fullName">Number</label>
                    <input type="text" id="Number" name="Number" placeholder="Enter Contact Number" required>

                    <label for="streetAddress">Street Address</label>
                    <input type="text" id="streetAddress" name="streetAddress" placeholder="Enter street address"
                         required>

                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="Enter your city" required>

                    <label for="state">State/Province</label>
                    <input type="text" id="state" name="state" placeholder="Enter state or province" required>

                    <label for="country">Country</label>
                    <select id="country" name="country" required>
                         <option value="">Select your country</option>
                         <option value="USA">United States</option>
                         <option value="India">India</option>
                         <option value="Canada">Canada</option>
                         <option value="UK">United Kingdom</option>
                         <option value="Australia">Australia</option>
                    </select>

                    <label for="postalCode">Postal Code</label>
                    <input type="text" id="zip" name="zip" placeholder="Enter postal code" required>

                    <label for="additionalInfo">Additional Information (Optional)</label>
                    <textarea id="additionalInfo" name="additionalInfo" rows="4"
                         placeholder="Provide any additional details"></textarea>

                    <!-- <button type="submit">Submit Address</button> -->

               </div>
               <div class="payment-methods">
                    <h3>Payment Methods</h3>
                    <div class="payment-method" style="background-color: #F3F3F3">

                         <div class="radio-container">
                              <input style="display: none;" class="radio" type="radio" id="credit-card"
                                   name="paymentMethod" value="credit-card">
                              <label class="radio-label" for="credit-card">
                                   <img src="https://www.citypng.com/public/uploads/preview/credit-card-payment-black-icon-png-701751695035015q2icpmhzsb.png?v=2024111008"
                                        alt="Credit Card Logo">
                                   Credit Card
                              </label>
                         </div>

                         <label for="creditCard">Credit Card</label>
                         <div class="payment-details">
                              <label for="cardNumber">Card Number</label>
                              <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter card number">
                              <label for="expiryDate">Expiry Date</label>
                              <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                              <label for="cvv">CVV</label>
                              <input type="text" id="cvv" name="cvv" placeholder="CVV">
                         </div>
                    </div>


                    <div class="payment-method" style="background-color : #F3F3F3">
                         <div class="radio-container">
                              <input style="display: none;" class="radio" type="radio" id="paypal" name="paymentMethod"
                              value="paypal">
                              <label class="radio-label" for="paypal">
                                   <img src="https://img.icons8.com/color/48/000000/paypal.png" alt="PayPal Logo">
                                   PayPal
                              </label>
                         </div>
                         <label for="paypal">PayPal</label>
                         <div class="payment-details">
                              <label for="emailAddress">Email Address</label>
                              <input type="email" id="emailAddress" name="emailAddress"
                                   placeholder="Enter email address" required>
                         </div>
                    </div>


                    <div class="payment-method" style="background-color : #F3F3F3">
                         <div class="radio-container">
                              <input style="display: none;" class="radio" type="radio" id="cod" name="paymentMethod" value="cash on delivery" required>"
                              <label class="radio-label" for="cod">
                                   <img src="https://png.pngtree.com/png-clipart/20210530/original/pngtree-online-shop-cash-on-delivery-icon-png-image_6364043.jpg"
                                        alt="PayPal Logo">
                                   Cash On Delivery
                              </label>
                         </div>
                         <label for="paypal">Cash of Delivery</label>

                    </div>

                    <button type="submit" value="submit" name="submit" class="btn-primary">Place Order</button>
               </div>
          </form>
     </div>

     <?php include "./footer.php" ?>

</body>

</html>