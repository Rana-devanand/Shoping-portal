<?php

     include_once "../../Database/connectivity.php";

     $productId = $_GET['id'] ?? "";
     $query = "UPDATE `order_details` SET `status` = 'Cancelled' WHERE `order_details`.`id` = $productId";
     $result = mysqli_query($conn, $query);
     if ($result) {
          echo "<script>alert('Product Cancelled Successfully');</script>";
          header('Location:./profile.php');
     } else {
          echo "<script>alert('Failed to Cancel Product');</script>";
          header('Location:./admin_orders.php');
     }
     mysqli_close($conn);
  
?>