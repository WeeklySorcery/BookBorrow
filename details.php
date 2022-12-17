<?php 
require 'config.php';
$ID = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM products WHERE product_id='$ID'";
$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
$row = mysqli_fetch_array($result);

if(!empty($_SESSION["user_active"])){

$use_id_cart = $_SESSION["user_active"];
} else {
    $use_id_cart = 0;
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
    <script src="JS/ad.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="RESOURCES/SVGs/book-icon.svg" />
</head>

<body class="bookie">
    <div class="Whole-Container">
    <?php include 'header.php' ?>

        <div class="whole-product">
            <div class="book-info">
                
                <img src="<?php echo $row['image_source']?>"  class="product-size">
                <div class="product-desc">
                    <div class="product-title"><?php echo $row['product_name']?></div>
                <?php echo $row['product_desc']?>
                <br>

                <div class="btn-info">
                    <div class="cost">
                        <?php echo $row['product_price']?>
                        
                    </div>
                    <form method="POST" action="<?php 
                    
                    if(!empty($_SESSION["user_active"])){
                        echo 'manage_cart.php';
                    } else {
                        echo 'login.php';
                    }
                    ?>">
                        <input type="hidden" name="product_name" value="<?php echo $row['product_name']?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['product_price']?>">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
                        <input type="hidden" name="qty" value=1>
                        <input type="hidden" name="c_user_id" value=<?php echo $use_id_cart?>>
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
</html>





