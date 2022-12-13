<?php 
require 'config.php';
$ID = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM products WHERE idProduct='$ID'";
$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
$row = mysqli_fetch_array($result);

if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result2 = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row2 = mysqli_fetch_assoc($result2);
}

if(isset($_POST['add_to_cart'])){
    
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend-A-Book</title>
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/productStyle.css">
    <script src="JS/js.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="RESOURCES/SVGs/book-icon.svg" />
</head>

<body class="bookie">
    <div class="Whole-Container">
    <header id="header">
            <img src="RESOURCES/LogosEnShiz/Lend-A-Book-logos_black.png" alt="Header" id="header-img" >
    
            <a href="#" class="toggle-burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
    
            <nav id="nav-bar" class="nav-bar">
                <ul>
                    <li><a href="index.php" class="headin">Home</a></li>
                    <li><a href="browse.php" class="headin">Browse</a></li>
                    <li><a href="plans.php" class="headin">Our Plans</a></li>
                    <li><a href="contact.php" class="headin">Contact</a></li>
                    <li><a href="login.php" class="headin">Login</a></li>
                    <li><a href="myBookList.php" class="headin">Your Library</a></li>
                </ul>
            </nav>
        </header>

        <div class="extra-nav">
            <div class="searchwrapper-container">
                <div class="searchwrapper">
                    <div class="searchbox">
                    <form action="search.php" method="POST" autocomplete="off">
                    <input type="text" class="search-txt input big" name="search" placeholder="search . . .">
                    <button type="submit" class="close-btn" name="submit-search">Search</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart">
            <?php 
                $count=0;
                if(isset($_SESSION['cart'])){
                    $count=count($_SESSION['cart']);
                }
            
            ?>
            <div class="add-to-cart-btn">
                <a href="cart.php" class="unset-a"><img src="RESOURCES/LogosEnShiz/cart1.svg" height="40px" width="40px" style="position: relative; top:10px"></a>
                <a href="cart.php"> <?php echo $count?></a>
            </div>
            <h2 class="user-cart" style="position: relative; top:5px">Your Cart</h2>
        </div>

        <div class="whole-product">
            <div class="book-info">
                
                <img src="<?php echo $row['image_book']?>"  class="product-size">
                <div class="product-desc">
                    <div class="product-title"><?php echo $row['product_name']?></div>
                <?php echo $row['product_desc']?>
                <br>

                <div class="btn-info">
                    <div class="cost">
                        <?php echo $row['product_price']?>
                        
                    </div>
                    <form method="POST" action="manage_cart.php" >
                        <input type="hidden" name="product_name" value="<?php echo $row['product_name']?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['product_price']?>">
                        <input type="hidden" name="product_id" value="<?php echo $row['idProduct']?>">
                        <button type="submit" class="add-to-cart" name="add_to_cart">
                            Add to Cart
                        </button>
                    </form>
   
                </div>
                </div>
            </div>
        </div>
    </div>
</body>