<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "lend-a-book");

$sql = "DELETE FROM products WHERE product_id=$id";
$conn->query($sql);

}

header("location: dashboard.php");
exit; 


?>