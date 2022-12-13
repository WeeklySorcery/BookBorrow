<?php 

session_start();
$conn = mysqli_connect("localhost", "root", "", "reglog");

if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = $result->fetch_assoc();
} else {
    header("Location: login.php");
}

if(isset($_POST['logout-btn'])){
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["username"]);
    header("Location: index.php");
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
        <link rel="stylesheet" href="CSS/myBooklist.css">
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
   
        <div class="contain-thecontainedProf">
            <div class="contain-profile">
                <div class="your-profile-pic">
                    <img src="RESOURCES/pic/prof.jpg" alt="" id="pic-obunga">
                    <h3 id="user-name"><?php echo $row['username']; ?></h3>
                </div>
                <div class="ubos-nako-ng-name">
                    <button class="btnUp" id="prof-btn">Cart</button>
                    <button class="btnUp" id="prof-btn">Wish List</button>
                    <button class="btnUp" id="prof-btn">Request</button>
                    <button class="btnUp" id="prof-btn">Settings</button>
                    <form method="POST">
                    <button class="btnUp" id="prof-btn" name="logout-btn">Log Out</button>
                    </form>
                </div>
            </div>

            <div class="recommended">
                <div class="your-profile-pic double-treble">
                    <img src="RESOURCES/Books/list-of-books/grace of kings.jpg" alt="" id="recent-bought">
                    <h3 id="user-name">Recently Bought</h3>
                </div>
                <div class="your-profile-pic double-treble">
                    <img src="RESOURCES/Books/list-of-books/howlMovingCastle.jpg" alt="" id="recent-bought">
                    <h3 id="user-name">Recently Viewed</h3>
                </div>
                <div class="your-profile-pic double-treble">
                    <img src="RESOURCES/Books/list-of-books/LionWitch.jpg" alt="" id="recent-bought">
                    <h3 id="user-name">Recently Requested</h3>
                </div>
                <div class="your-profile-pic double-treble">
                    <img src="RESOURCES/Books/list-of-books/swordinStone.jpg" alt="" id="recent-bought">
                    <h3 id="user-name">Highly Recommended</h3>
                </div>
            </div>
        </div>
        <footer class="booklist-footer">
            <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
        </footer>
    </div>
</body>
</html>