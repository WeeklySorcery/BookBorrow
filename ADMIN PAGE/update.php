<?php 
$conn = mysqli_connect("localhost", "root", "", "reglog");

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE idProduct='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $name = $row["product_name"];
    $desc = $row["product_desc"];
    $price = $row["product_price"];
    $sarsa = $row["image_book"];
    
} else {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $price = $_POST["price"];
    $sarsa = $_POST["sarsa"];

    $sql = "UPDATE products SET product_name = '$_POST[name]', product_desc = '$_POST[desc]', product_price = '$_POST[price]', image_book = '$_POST[sarsa]' WHERE idProduct = '$id'";
    
    $result = $conn->query($sql);

    
    header("location: dashboard.php");
    exit;
} 


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../RESOURCES/SVGs/book-icon.svg" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend-A-Book</title>
    <link rel="stylesheet" href="../CSS/global.css">
    <link rel="stylesheet" href="../CSS/form.css">
    <script src="../JS/js.js" defer></script>
</head>

<body>
    <div class="Whole-Container search-espesyal">
        <header id="header">
            <img src="../RESOURCES/LogosEnShiz/Lend-A-Book-logos_black.png" alt="Header" id="header-img" >

            <a href="#" class="toggle-burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

            <nav id="nav-bar" class="nav-bar">
                <ul>
                    <li><a href="../ADMIN PAGE/message.php" class="headin">Message</a></li>
                    <li><a href="z_Sample1.php" class="headin">Profile</a></li>
                    <li><a href="dashboard.php" class="headin">Dashboard</a></li>
                </ul>
            </nav>
        </header>

    <div class="extra-nav">
        <div class="searchwrapper-container">
            <div class="searchwrapper">
                <div class="searchbox">
                    <form action="admin-search.php" method="POST" autocomplete="off">
                    <input type="text" class="search-txt input small" name="search" placeholder="search . . .">
                    <input type="button" class="close-btn" name="submit-search" value="Search">
                    <button type="submit" class="close-btn" name="submit-search">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="create-contain">
        
        <form action="" method="POST" class="create-form" autocomplete="off">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <h2>New Product</h2>
            <label for="">Name</label>
            <br>
            <input type="text" name="name" value="<?php echo $name ?>" class="imp" required>
            <br>
            <label for="">Sources</label>
            <br>
            <input type="text" name="sarsa" value="<?php echo $sarsa?>" class="imp" required>
            <br>
            <label for="">Descriptions</label>
            <br>
            <textarea name="desc" id="" cols="30" rows="10" class="imp" required><?php echo $desc?></textarea>
            <br>
            <label for="">Price</label>
            <br>
            <input type="number" name="price" value="<?php echo $price?>" class="imp" required>
            <br>
            <button type="submit" class="imp" name="submit">Submit</button>
            <br>
            <br>
            <div class="acont">
                <a href="dashboard.php" class="imp" role="button"> Cancel </a>
            </div>
        </form>
    </div>

</div>
</body>
</html>
