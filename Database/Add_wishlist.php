<?php

include_once "../Database/connectivity.php";

session_start();

$createdAt = date('Y-m-d H:i:s');
// $updatedAt = date('Y-m-d H:i:s');

if(isset($_POST["wishlist_id"])){
    $userId =  "". $_SESSION["id"] . "";
    $Wishlist_id = $_POST["wishlist_id"];
    $sql = "INSERT INTO `users_wishlist` (`userid` , `Wishlist_id` , `createdAt` ) 
                     VALUES ('$userId' , '$Wishlist_id' , '$createdAt')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo " <script>
                alert('Wishlist added to cart successfully!');
                 window.location.href = 'http://localhost/project/pages/allproducts.php';
              </script>";
    } else {
       echo "<Script>
                    alert('Failed to add Wishlist in the DB.');
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
