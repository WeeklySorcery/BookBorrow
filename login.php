<?php
include 'config.php';

if(!empty($_SESSION['user_active'])){
    session_start();
    header("Location: myBooklist.php");
}

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
    <script src="JS/ad.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="RESOURCES/SVGs/book-icon.svg" />
</head>

<body class="bookie">
    <div class="Whole-Container">
   
   <?php include 'header.php'; ?>
    <div class="login-page">
        <div class="form login-form-off">
          <form class="login-form" action="" method="POST" autocomplete="off">
            <input type="text" placeholder="username or email" name="usernameemail" id="usernameemail" required value=""/>
            <input type="password" placeholder="password" name="password" id="password" required value=""/>
            <button type="submit" name="login_submit">login</button>
            <p class="message"><a href="signup.php">Not registered? Create an account</a></p>
          </form>
        </div>
      </div>
    <footer>
        <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
    </footer>
</body>
</html>

<?php 

if(isset($_POST["login_submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){

        if($password == $row["password"]){
            $_SESSION["login_submit"] = true;
            $_SESSION["user_active"] = $row["user_id"];
            if($row['usertype'] == "user"){
            header("location: myBooklist.php");
            echo "<meta http-equiv='refresh' content='0'>";
            }
            if($row['usertype'] == "admin"){
                echo "<script>window.location.href = 'ADMIN PAGE/dashboard.php';</script>";
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
