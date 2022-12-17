<?php 
    require '../config.php';
    $select = "SELECT * FROM orders";
    $query = mysqli_query($conn, $select);

    if(!$_SESSION["user_active"]){
        header("location: ../index.php");
    } else if($_SESSION["user_active"]){
        $detect = $_SESSION['user_active'];
        if($detect != 1){
            header("location: ../index.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../RESOURCES/SVGs/book-icon.svg" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend-A-Book</title>
    <link rel="stylesheet" href="../CSS/global.css">
    <link rel="stylesheet" href="../CSS/message.css">
</head>

<body>
    <div class="Whole-Container search-espesyal">
        <?php include 'header-admin.php'; ?>

    <div class="pro">
            <h2>Orders</h2>
    </div>


    <div class="container-crud">
        
        <table class="table dash" border="1" cellpadding="0">
            <thead>
               <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Cart ID.</th>
                    <th>Book ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Phone No.</th>
                    <th>Address</th>
                    <th>Pay Mode</th>
               </tr> 
            </thead>
            <tbody>
                <?php 
                $conn = mysqli_connect("localhost", "root", "", "lend-a-book");
                
                $sql = "SELECT * FROM orders";
                $user_result=mysqli_query($conn, $sql);

                //read data
                while($user_fetch=mysqli_fetch_assoc($user_result)){
                    echo"    
                    <tr>
                        <td class='td'>$user_fetch[order_id]</td>
                        <td class='td'>$user_fetch[user_id]</td>
                        <td class='td'>$user_fetch[cart_id]</td>
                        <td class='td'>$user_fetch[book_id]</td>
                        <td class='td'>$user_fetch[f_name]</td>       
                        <td class='td'>$user_fetch[quantity]</td>       
                        <td class='td'>$user_fetch[phone_no]</td>       
                        <td class='td'>$user_fetch[address]</td>       
                        <td class='td'>$user_fetch[pay_mode]</td>       
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>