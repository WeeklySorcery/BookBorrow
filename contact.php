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

        <div class="subs-wrapper">
            <h2>Contact Us!</h2>
            <div class="subs-container">
                <div class="subs-box contact-page">
                    <h3>  Got a question? We'd love to hear from you. Send us a message or call us, and we'll respond as soon as possible</h3>
                    <div class="login-page contact-login-page">
                        <div class="form">
                            <form class="login-form" autocomplete="off" action='contact.php' method='post'>
                            <input type="text" placeholder="Email:" name="email" required/>
                            <input type="text" placeholder="Message:" class="messager" name="message" required />
                            <button type="submit" name="submit">Send Message</button>
                            </form>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        <footer>
            <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
        </footer>

    </div>
</body>
</html>

<?php 
if(isset($_POST["submit"])){

require 'config.php';
$email = $_POST['email'];
$message = $_POST['message'];

    $stmt = $conn->prepare('INSERT INTO users_input(input_email, input_message)
    values(?, ?)');
    $stmt->bind_param("ss", $email, $message);

    $stmt2 = $conn->prepare('INSERT INTO users_input_data(input_email, input_message)
    values(?, ?)');
    $stmt2->bind_param("ss", $email, $message);

    $stmt->execute();
    $stmt2->execute();
    echo("<script> alert('sent successfully!')  </script>");
    $stmt->close();
    $stmt2->close();

}
?>