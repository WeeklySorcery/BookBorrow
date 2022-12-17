<?php 

include 'config.php';

$user_id = $_SESSION['user_active'];

$select = "SELECT DISTINCT orders.quantity, payment.status, products.product_name FROM `products`, `orders`, `payment`  WHERE orders.user_id = payment.user_id AND orders.book_id = products.product_id AND orders.user_id = $user_id" ;

$query = mysqli_query($conn, $select);

if(!empty($_SESSION["user_active"])){
    $id = $_SESSION["user_active"];
    $result = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = $id");
    $row_received = $result->fetch_assoc();
} else {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="RESOURCES/SVGs/book-icon.svg" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lend-A-Book</title>
        <link rel="stylesheet" href="CSS/global.css">
        <link rel="stylesheet" href="CSS/message.css">
        <script src="JS/js.js" defer></script>
        <script src="JS/ad.js" defer></script>
    </head>
<body>
    <div class="Whole-Container">

        <?php include 'header.php'; ?>

    <div class="message-box">
        <table border="1" cellpadding="0">
            <tr>
                <th>Book</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
            <?php 
                $num=mysqli_num_rows($query);
                if ($num>0){
                    while ($result= mysqli_fetch_assoc($query)){
                        echo"    
                        <tr>
                            <td class='td'> ".$result['product_name']." </td>
                            <td class='td'> ".$result['quantity']." </td>
                            <td class='td'> ".$result['status']." </td>
                        </tr>
                        ";
                    };
                };
            ?>
        </table>
    </div>
    
    </div>
</body>
</html>