<?php 
    require '../config.php';
    $select = "SELECT * FROM user_orders";
    $query = mysqli_query($conn, $select);

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
        <header id="header">
            <a href="../index.php"><img src="../RESOURCES/LogosEnShiz/Lend-A-Book-logos_black.png" alt="Header" id="header-img" ></a>

            <a href="#" class="toggle-burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

            <nav id="nav-bar" class="nav-bar">
                <ul>
                    <li><a href="../ADMIN PAGE/message.php" class="headin">Message</a></li>
                    <li><a href="profiles.php" class="headin">Profile</a></li>
                    <li><a href="dashboard.php" class="headin">Products</a></li>
                    <li><a href="order.php" class="headin">Orders</a></li>
                </ul>
            </nav>
        </header>


    <div class="extra-nav">
        <div class="searchwrapper-container">
            <div class="searchwrapper">
                <div class="searchbox">
                    <form action="admin-search.php" method="POST" autocomplete="off">
                    <input type="text" class="search-txt input small" name="search" placeholder="search . . .">
                    <input type="button" class="close-btn" name="submit-search" value="Search">
                    <button type="submit" class="close-btn" name="submit-search">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="pro">
            <h2>Orders</h2>
    </div>


    <div class="container-crud">
        
        <table class="table dash" border="1" cellpadding="0">
            <thead>
               <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Phone No.</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Orders</th>
               </tr> 
            </thead>
            <tbody>
                <?php 
                $conn = mysqli_connect("localhost", "root", "", "reglog");
                
                $sql = "SELECT * FROM order_manager";
                $user_result=mysqli_query($conn, $sql);

                //read data
                while($user_fetch=mysqli_fetch_assoc($user_result)){
                    echo"    
                    <tr>
                        <td class='td'>$user_fetch[Order_id]</td>
                        <td class='td'>$user_fetch[Full_Name]</td>
                        <td class='td'>$user_fetch[Phone_No]</td>
                        <td class='td'>$user_fetch[Address]</td>
                        <td class='td'>$user_fetch[Pay_Mode]</td>       
                        <td class='td'>
                            <table class=`table dash` border=`1` cellpadding=`0`>
                                <thead>
                                <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                </tr> 
                                </thead>
                                <tbody>" ;
                        $order_query="SELECT * FROM `user_orders` WHERE `Order_id`= $user_fetch[Order_id]";
                        $order_result=mysqli_query($conn,$order_query);
                        while($order_fetch=mysqli_fetch_assoc($order_result)){
                            echo"
                                <tr>
                                    <td class='pad-me-up'>$order_fetch[product_name]</td>
                                    <td class='pad-me-up'>$order_fetch[product_price]</td>
                                    <td class='pad-me-up'>$order_fetch[Quantity]</td>
                                </tr>
                            ";
                        }
                        echo "
                                </tbody>
                            </table>
                        </td>      
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>