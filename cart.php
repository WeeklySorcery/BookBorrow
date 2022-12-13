<?php 
session_start();

    //ID of User
    if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $conn = mysqli_connect("localhost", "root", "", "reglog");
    $resultID = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $rowID = mysqli_fetch_assoc($resultID);
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
    <link rel="stylesheet" href="CSS/cart.css">
    
    <script src="JS/js.js" defer></script>
</head>
<body >
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
                                if(isset($_SESSION['cart']))
                                    {
                                    foreach($_SESSION['cart'] as $key => $value){
                                        $sr=$key+1;

                                        echo "
                                            <tr>
                                                <td>$sr</td>
                                                <td>$value[product_name]</td>
                                                <td>$value[product_price]<input type='hidden' class='iprice' value='$value[product_price]'></td>
                                                <td>
                                                    <form action='manage_cart.php' method='POST'>
                                                        <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value= '$value[Quantity]' min='1' max='100'>
                                                        <input type='hidden' name='product_name' value='$value[product_name]'>
                                                    </form>
                                                </td>
                                                <td class='itotal'></td>
                                                <form action='manage_cart.php' method='POST'>
                                                <td>
                                                <input type='hidden' name='product_name' value='$value[product_name]'>
                                                </td>
                                                <td>
                                                <button name='Remove_Item' class='text-center remove-thy-button' > REMOVE </button>
                                                </td>
                                                </form>
                                            </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                        
                    </table>
                </div>
                <div class="tot">
                    <h3 class="h3" id="gtotal"></h3>
                    <?php 
                        if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
                    ?>
                    <form action="purchase.php" method="POST">
                        <!-- Bullshit Alert -->
                        <!-- <div class="form-group">
                            <input type="hidden" class="form-control" value="<php echo $rowID["id"]; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<php echo $rowID["name"]; ?>">
                        </div>
                        <div class="form-group">
                            <label>Products</label>
                            <input type="text" class="form-control" value="<php 
                            foreach($_SESSION['cart'] as $key => $value){
                            echo $value['product_name'];} ?>">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" value="<php 
                            foreach($_SESSION['cart'] as $key => $value){
                            echo $value['Quantity'] * $value['product_price'];} ?>">
                        </div> -->
                        <!-- -->
                        <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control" value="<?php echo $rowID["id"]; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="full_name"  class="form-control" value="<?php echo $rowID["name"]; ?>">
                        </div>
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
                    <?php } ?>
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