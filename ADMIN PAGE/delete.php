<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "reglog");

$sql = "DELETE FROM products WHERE idProduct=$id";
$conn->query($sql);


}

header("location: dashboard.php");
exit; 


?>