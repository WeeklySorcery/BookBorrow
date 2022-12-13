<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend-A-Book</title>
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/plans.css">
    <script src="JS/js.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="RESOURCES/SVGs/book-icon.svg" />
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
        </div>
    
        <div class="subs-wrapper">
            <h2>Subscriptions</h2>
            <div class="subs-container">
                <div class="subs-box">
                        <p>
                            $10 <br>
                            2 rented books a month
                        </p>
                        <input type="button" value="Select" class="btnPlans">
                        <h3><br>Benefits</h3>
                        <p class="benefits-par">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, excepturi molestiae. Dolorem ad dolor voluptate soluta accusamus placeat et praesentium nulla dolore sit, dolores natus velit, temporibus ipsa! Culpa, animi?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur magnam tempore consequatur sint, porro atque vero officiis, placeat excepturi laborum voluptatum quia est veritatis? Assumenda facilis eos impedit reiciendis obcaecati.
                        </p>
                </div>
                <div class="subs-box">
                        <p>
                            $10 <br>
                            2 rented books a month
                        </p>
                        <input type="button" value="Select" class="btnPlans">
                        <h3><br>Benefits</h3>
                        <p class="benefits-par">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, excepturi molestiae. Dolorem ad dolor voluptate soluta accusamus placeat et praesentium nulla dolore sit, dolores natus velit, temporibus ipsa! Culpa, animi?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi earum debitis ea a! Voluptatum voluptatibus at dolore quo amet deleniti voluptate debitis? Vero odit esse unde dolores expedita aut veritatis?
                        </p>
                </div>
                <div class="subs-box">
                    <p>
                        $10 <br>
                        2 rented books a month
                    </p>
                    <input type="button" value="Select" class="btnPlans">
                    <h3><br>Benefits</h3>
                    <p class="benefits-par">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, excepturi molestiae. Dolorem ad dolor voluptate soluta accusamus placeat et praesentium nulla dolore sit, dolores natus velit, temporibus ipsa! Culpa, animi?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam unde modi aspernatur, laudantium praesentium vero est id iure ad fuga voluptates voluptatem laboriosam asperiores odit excepturi adipisci, sint dolorem magni?
                    </p>
                </div>
            </div>
        </div>
        <footer>
            <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
        </footer>
    </div>
</body>
</html>