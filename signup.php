<?php include 'config.php'; ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
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
          <form class="register-form" action="" method="POST" autocomplete="off">
            <input type="text" placeholder="name" name="name" id="name" required value=""/>
            <input type="text" placeholder="username" name="username" id="username" required value=""/>
            <input type="text" placeholder="email address" name="email" id="email" required value=""/>
            <input type="password" placeholder="password" name="password" id="password" required value=""/>
            <input type="password" placeholder="confirm password" name="confirmpassword" id="confirmpassword" required value=""/>
            <button type="submit" name="submit">create</button>
            <p class="message">Already registered? <a href="login.php">Sign In</a></p>
          </form>
        </div>
      </div>
    <footer>
        <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
    </footer>
</body>
</html>

<?PHP 

if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email has already been taken')  </script>";
    } 
    else {
        if($password == $confirmpassword){
            $query = "INSERT INTO users (`name`, `username`, `email`, `password`) 
            VALUES('$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query); 
        echo
        "<script> alert('Registration Succesful')
        window.location.href = 'myBookList.php';
        </script>";
        }
        else {
            echo
        "<script> alert('Password does not match')  </script>";
        }
    }
}
?>