<?php

include_once "../Database/connectivity.php";

session_start();

$createdAt = date('Y-m-d H:i:s');
// $updatedAt = date('Y-m-d H:i:s');
if(isset($_POST["cart_id"])){
    $userId =  "". $_SESSION["id"] . "";
    $cart_id = $_POST["cart_id"];
    $sql = "INSERT INTO `user_cart` (`userid` , `cart_id` , `createdAt` ) 
                     VALUES ('$userId' , '$cart_id' , '$createdAt')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo " <script>
                alert('Product added to cart successfully!');
                 window.location.href = 'http://localhost/project/pages/allproducts.php';
              </script>";
    } else {
       echo "<Script>
                    alert('Failed to add product in the cart.');
                 window.location.href = 'http://localhost/project/pages/allproducts.php';
            </script>";
    }

}
else {
    echo "<script>
                alert('Server Error');
         </script>";
    }
?>
