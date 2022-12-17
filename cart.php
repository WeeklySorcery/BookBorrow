<?php 
require 'config.php';
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
    <link rel="stylesheet" href="CSS/cart.css">
    <script src="JS/js.js" defer></script>
    <script src="JS/ad.js" defer></script>
</head>
<body >
    <div class="Whole-Container">
    <?php require 'header.php'; ?>

    <!--Mema muna-->
    <div class="contain-er">
        <div class="row">
            <div class="text-center">
                <h1 class="h1">MY CART</h1>
            </div>
            <div class="float">
                <div class="col">
                    <table class="table table-dark">
                        <thead class="text-center">
                            <tr>
                            <th >#</th>
                            <th >Product Name</th>
                            <th >Product Price</th>
                            <th >Quantity</th>
                            <th >Total</th>
                            <th ></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php 
                                if(isset($_SESSION['user_active'])){ $user_id = $_SESSION['user_active']; 
                                
                                    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = $user_id") or die('query failed');
                                

                                $grand_total = 0;
                                $sr = 0;

                                
                                if(mysqli_num_rows($cart_query) > 0){
                                    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
                                        $sr = $sr+1;
                                        $productname =  "$fetch_cart[book_id]";
                                        $cart_id = "$fetch_cart[cart_id]";
                                        
                                        $product_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = $productname") or die('query failed');
                                        $prod_row = mysqli_fetch_assoc($product_query);

                                        $user_query = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = $user_id") or die('query failed');
                                        $user_row = mysqli_fetch_assoc($product_query);

                                        $data = array();
                                        $data[] = `$prod_row[product_name]`;

                                        echo "
                                            <tr>
                                                <td>$sr</td>
                                                <td>$prod_row[product_name]</td>
                                                <td>$prod_row[product_price]<input type='hidden' class='iprice' value='$prod_row[product_price]'></td>
                                                <td>
                                                    <form action='manage_cart.php' method='POST'>
                                                        <input type='hidden' name='cart_id' value='$fetch_cart[cart_id]'>
                                                        <input class='text-center iquantity' name='cart_quantity' type='number' value= '$fetch_cart[qty]' min='1' max='100'>
                                                        <input type='submit' name='update_cart' value='update' class='update-it'>
                                                        <input type='hidden' name='product_name' value='$prod_row[product_name]'>
                                                    </form>
                                                </td>
                                                <td class='itotal'></td>
                                                <form action='manage_cart.php' method='POST'>
                                                <input type='hidden' name='cart_id' value='$fetch_cart[cart_id]'>
                                                <td>
                                                <input type='hidden' name='product_name' value='$prod_row[product_name]'>
                                                </td>
                                                <td>
                                                <button name='Remove_Item' class='text-center remove-thy-button' > REMOVE </button>
                                                </td>
                                                </form>
                                            </tr>
                                        ";
                                    }
                                }
                                }
                                else {
                                }
                            ?>
                        </tbody>
                        
                    </table>
                </div>
                <div class="tot">
                    <h3 class="h3" id="gtotal"></h3>
                    <?php 
                        if(isset($_SESSION['user_active']) && mysqli_num_rows($cart_query) > 0){

                    ?>
                    <form action="purchase.php" method="POST">
                        <div class="form-group">
                            <label>Phone Number</label><br>
                            <input type="text" name="phone_no" class="form-control imp" required>
                        </div>
                        <div class="form-group">
                            <label> Address</label><br>
                            <input type="text" name="address" class="form-control imp" required>
                        </div>
                        <div class="form-check"><br>
                        <input class="form-check-input imp" type="radio" name="pay_mode" id="COD" value="COD" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Cash on Delivery
                        </label>
                        </div>
                        <button class="make-purchase" name="purchase">Purchase</button>
                    </form>
                    <?php     
                }
                else if(!isset($_SESSION['user_active'])){

                }   ?>
                </div>
            </div>
        </div>
    </div>
        

    </div>
</body>

<script defer>

var gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');

function subTotal(){
    gt=0;
    for(i=0;i<iprice.length;i++){
        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        gt=gt+(iprice[i].value) * (iquantity[i].value);
    }

    gtotal.innerText=('Total: ' + gt);

}

subTotal();

</script>

</html>