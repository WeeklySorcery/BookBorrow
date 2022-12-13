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
    <link rel="stylesheet" href="CSS/style.css">
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



    <!-- Top Rated -->
    <div class="package">
        <div class="title-row">
            <h1 class="topsi">Top Searches</h1>
            <div class="progress-bar"></div>
        </div>
    <div class="row">
        <button class="handle left-handle">&#8249;</button>
        <div class="list-a-book">
            <a href="z_Sample4.php">
                <img src="RESOURCES/Books//list-of-books/howlMovingCastle.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/the hobbit.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/starsight.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/4.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/harry potter.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/ninthhouse.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/Margarita.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/swordinStone.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/unicorn.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/game of thrones.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/LionWitch.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/grace of kings.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/1.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/2.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/3.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/5.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/6.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/starsight.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/7.jpg" alt="" class="row-book row-large">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/8.jpg" alt="" class="row-book row-large">
            </a>
        </div>
        <button class="handle right-handle">&#8250;</button>
    </div>
    </div>

    <!-- New -->
    <div class="package">
    <h1>New Releases</h1>
    
    <div class="row">
        <button class="handle left-handle">&#8249;</button>
        <div class="list-a-book B">
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/11.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/17.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/14.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/9.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/10.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/12.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/13.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/14.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/24.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/25.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/27.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/28.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/29.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/30.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/31.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/32.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/33.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/34.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/35.jpg" alt="" class="row-book">
            </a>
            <a href="#">
            <img src="RESOURCES/Books//list-of-books/36.jpg" alt="" class="row-book">
            </a>
        </div>
        <button class="handle right-handle">&#8250;</button>
    </div>
    </div>

    <!-- Discover -->
    <div class="package">
    <h1>Discover Something New</h1>

    <div class="row">
        <button class="handle left-handle">&#8249;</button>
        <div class="list-a-book C">
            <a href="#">
                <img src="RESOURCES/Books//list-of-books/15.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/16.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/23.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/18.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/19.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/20.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/21.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/22.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/23.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/26.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/37.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/38.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/39.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/40.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/41.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/42.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/43.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/44.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/45.jpg" alt="" class="row-book">
                </a>
                <a href="#">
                <img src="RESOURCES/Books//list-of-books/46.jpg" alt="" class="row-book">
                </a>
        </div>
        <button class="handle right-handle">&#8250;</button>
    </div>
    </div>
    </div>
    <footer>
            <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
    </footer>
</body>
</html>

