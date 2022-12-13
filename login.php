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

    <div class="login-page">
        <div class="form login-form-off">
          <form class="login-form" action="" method="POST" autocomplete="off">
            <input type="text" placeholder="username or email" name="usernameemail" id="usernameemail" required value=""/>
            <input type="password" placeholder="password" name="password" id="password" required value=""/>
            <button type="submit" name="submit">login</button>
            <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
          </form>
        </div>
      </div>
    <footer>
        <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
    </footer>
</body>
</html>

<?php 
$conn = mysqli_connect("localhost", "root", "", "reglog");

if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){

        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            if($row['usertype'] == "user"){
            header("location: myBooklist.php");
            }
            if($row['usertype'] == "admin"){
                header("location: ADMIN PAGE/dashboard.php");
            }
    }
        else {
            echo
        "<script> alert('Wrong Password')  </script>";
        }
    } 
    else if($password != $row["password"]){
        echo
        "<script> alert('User Not Registered.')  </script>";
    }
}

?>
