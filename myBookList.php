<?php 

include 'config.php';

if(!empty($_SESSION["user_active"])){
    $id = $_SESSION["user_active"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $id");
    $row = $result->fetch_assoc();
} else {
    header("Location: login.php");
}

if(isset($_POST['logout-btn'])){
    session_start();
    unset($_SESSION["user_active"]);
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
        <script src="JS/ad.js" defer></script>
    </head>
<body>
    <div class="Whole-Container">

        <?php include 'header.php'; ?>

        <div class="contain-thecontainedProf">
            <div class="contain-profile">
                <div class="your-profile-pic">
                    <img src="RESOURCES/pic/prof.jpg" alt="" id="pic-obunga">
                    <h3 id="user-name"><?php echo $row['username']; ?></h3>
                </div>
                <div class="ubos-nako-ng-name">
                    <a href="received.php"><button class="btnUp" id="prof-btn">Ordered</button></a>
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