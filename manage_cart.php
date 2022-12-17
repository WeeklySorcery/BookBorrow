<?php 
require 'config.php';

if(isset($_POST['add_to_cart'])){

    $product_id = $_POST['product_id'];
    $user_id = $_POST['c_user_id'];
    $product_quantity = $_POST['qty'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE book_id = '$product_id' AND user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($select_cart) > 0){
    echo("<script> alert('product already in the cart!')  </script>");
    echo "<script>window.location.href = 'details.php?id=$product_id';</script>";
    } else {

    $stmt = $conn->prepare('INSERT INTO cart (`book_id`, `user_id`, `qty`)
    values(?, ? ,?)');
    $stmt->bind_param("iii", $product_id, $user_id ,$product_quantity);

    $stmt->execute();
    echo("<script> alert('added successfully!')  </script>");
    echo "<script>window.location.href = 'details.php?id=$product_id';</script>";
    $stmt->close();
    }

 };

 if(isset($_POST['Remove_Item'])){
    $remove_id = $_POST['cart_id'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$remove_id'") or die('query failed');
    echo("<script> alert('deleted successfull!')  </script>");
    echo "<script>window.location.href = 'cart.php';</script>";
 }

 if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET qty = '$update_quantity' WHERE cart_id = '$update_id'") or die('query failed');
    echo("<script> alert('update successfull!')  </script>");
    echo "<script>window.location.href = 'cart.php';</script>";
 }



 
 ?>
