<?php
include_once "../Database/connectivity.php";
// if (session_status() === PHP_SESSION_NONE) {
     session_start(); 
// }

// ------------------------------------------------------------------------------
// Generate Order ID and CAPTCHA
// ------------------------------------------------------------------------------

function generateCaptcha()
{
     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
     $captcha = substr(str_shuffle($characters), 0, 6);
     $_SESSION['captcha'] = $captcha; // Store in the session
     return $captcha;
}

// Generate CAPTCHA only if it hasn't been set
if (!isset($_SESSION['captcha'])) {
     $_SESSION['captcha'] = generateCaptcha();
}

// Display the CAPTCHA
$generatedCaptcha = $_SESSION['captcha'];



// ------------------------------------------------------------------------------
// Order and Product Details
// ------------------------------------------------------------------------------
$productId = $_GET['productId'] ?? "";
$orderID = $_GET['orderId'] ?? "";
$productName = "";
$ProductImage = "";
$ProductTotalPrice = "";
$userId = $_SESSION['id'] ?? null;

if (!$productId) {
     die("Product ID parameter is missing.");
}
if (!$orderID) {
     die("Order ID parameter is missing.");
}

$url = "https://dummyjson.com/products";
$response = file_get_contents($url);
if ($response === FALSE) {
     die("Error occurred while fetching API data.");
}

$data = json_decode($response, true);
foreach ($data['products'] as $product) {
     if ($product['id'] == $productId) {
          $productName = $product['title'];
          $price = $product['price'];
          $ProductImage = $product['images'][0];
          $ProductTotalPrice = $price + 15; // Add extra charges
          break;
     }
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify'])) {
//      $userInput = $_POST['captcha_input'];
//      if ($userInput === $_SESSION['captcha']) {
//           echo "<script>alert('CAPTCHA verified! Proceed to order.');</script>";
//           unset($_SESSION['captcha']); // Reset CAPTCHA after successful verification
//      } else {
//           echo "<script>alert('Incorrect CAPTCHA. Please try again.');</script>";
//           $_SESSION['captcha'] = generateCaptcha(); // Regenerate a new CAPTCHA
//           $generatedCaptcha = $_SESSION['captcha']; // Update the displayed CAPTCHA
//      }
// }

// ------------------------------------------------------------------------------
// Order Submission Logic
// ------------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify'])) {
  $userInput = $_POST['captcha_input'];

  if (!isset($_POST['notRobotCheckbox'])) {
      echo "<script>alert('Please confirm you are not a robot.');</script>";
  } elseif ($userInput === $_SESSION['captcha']) { // Case-insensitive comparison
      $query = "INSERT INTO `order_details` 
                (`productid`, `order_id`, `prod_name`, `prod_img`, `prod_price`, `userid`, `status`) 
                VALUES ('$productId', '$orderID', '$productName', '$ProductImage', '$ProductTotalPrice', '$userId', 'PENDING')";
      $result = mysqli_query($conn, $query);

      if ($result) {
          unset($_SESSION['captcha']); // Reset CAPTCHA after success
          echo "<script>alert('CAPTCHA verified! Order confirmed.');
                window.location.href = 'http://localhost/project/pages/allproducts.php';
                </script>";
          exit;
      } else {
          echo "<script>alert('Failed to place order. Try again later.');</script>";
      }
  } else {
      echo "<script>alert('Incorrect CAPTCHA. Please try again.');</script>";
      $captcha = generateCaptcha(); // Regenerate CAPTCHA
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Order Confirmation</title>
     <link rel="stylesheet" href="http://localhost/project/assets/css/order.css">
</head>

<body>
     <?php include "../pages/header.php"; ?>
     <?php include "../pages/Navbar.php"; ?>

     <div class="captcha_center">
          <div class="cap">
               <h3>Order-ID <?php echo htmlspecialchars($orderID); ?></h3>
               <h6>Product: <?php echo htmlspecialchars($productName); ?></h6>
               <b>CAPTCHA Verification</b>
               <hr>

               <form action="" method="POST">
                    <div class="captcha"><?= htmlspecialchars($generatedCaptcha); ?></div>
                    <input type="text" name="captcha_input" placeholder="Enter the CAPTCHA" required>
                    <div class="captcha-container">
                         <label class="checkbox-label">
                              <input type="checkbox" class="checkbox-input" id="notRobotCheckbox"
                                   name="notRobotCheckbox">
                              <div class="custom-checkbox"></div>
                              I'm not a robot
                         </label>
                         <div class="captcha-info">Protected by reCAPTCHA</div>
                    </div>
                    <button type="submit" class="submit-btn" id="submitButton" name="verify">Place Order</button>
               </form>
          </div>
     </div>

     <script>
          // Enable the submit button only if the checkbox is checked
          const checkbox = document.getElementById('notRobotCheckbox');
          const submitButton = document.getElementById('submitButton');

          checkbox.addEventListener('change', () => {
               submitButton.disabled = !checkbox.checked;
          });
     </script>
</body>

</html>