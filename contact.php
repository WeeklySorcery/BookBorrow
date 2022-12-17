<?php include 'config.php'; ?>

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
<body>
    <div class="Whole-Container">
    <?php include 'header.php'; ?>
            
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

$email = $_POST['email'];
$message = $_POST['message'];
$date = date("Ymd");

    $stmt = $conn->prepare('INSERT INTO user_message (email, `date`, `message`)
    values(?, ? ,?)');
    $stmt->bind_param("sds", $email, $date ,$message);

    $stmt->execute();
    echo("<script> alert('sent successfully!')  </script>");
    $stmt->close();

}
?>