<?php 
session_start();

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
    <link rel="stylesheet" href="CSS/payment.css">
    <script src="JS/js.js" defer></script>
</head>
<body>
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

        <div class="container">

            <form action="">
        
                <div class="row">
        
                    <div class="col">
        
                        <h3 class="title">billing address</h3>
        
                        <div class="inputBox">
                            <span>full name :</span>
                            <input type="text" placeholder="john deo">
                        </div>
                        <div class="inputBox">
                            <span>email :</span>
                            <input type="email" placeholder="example@example.com">
                        </div>
                        <div class="inputBox">
                            <span>address :</span>
                            <input type="text" placeholder="room - street - locality">
                        </div>
                        <div class="inputBox">
                            <span>city :</span>
                            <input type="text" placeholder="mumbai">
                        </div>
        
                        <div class="flex">
                            <div class="inputBox">
                                <span>state :</span>
                                <input type="text" placeholder="india">
                            </div>
                            <div class="inputBox">
                                <span>zip code :</span>
                                <input type="text" placeholder="123 456">
                            </div>
                        </div>
        
                    </div>
        
                    <div class="col">
        
                        <h3 class="title">payment</h3>
        
                        <div class="inputBox">
                            <span>cards accepted :</span>
                            <img src="RESOURCES/LogosEnShiz/card_img.png" alt="">
                        </div>
                        <div class="inputBox">
                            <span>name on card :</span>
                            <input type="text" placeholder="mr. john deo">
                        </div>
                        <div class="inputBox">
                            <span>credit card number :</span>
                            <input type="number" placeholder="1111-2222-3333-4444">
                        </div>
                        <div class="inputBox">
                            <span>exp month :</span>
                            <input type="text" placeholder="january">
                        </div>
        
                        <div class="flex">
                            <div class="inputBox">
                                <span>exp year :</span>
                                <input type="number" placeholder="2022">
                            </div>
                            <div class="inputBox">
                                <span>CVV :</span>
                                <input type="text" placeholder="1234">
                            </div>
                        </div>
        
                    </div>
            
                </div>
        
                <input type="submit" value="proceed to checkout" class="submit-btn">
            </form>
        
        </div>  

        <footer>
            <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
        </footer>

    </div>
</body>
</html>