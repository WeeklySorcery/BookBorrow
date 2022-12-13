<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../RESOURCES/SVGs/book-icon.svg" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend-A-Book</title>
    <link rel="stylesheet" href="../CSS/global.css">
    <link rel="stylesheet" href="../CSS/search.css">
    <script src="../JS/js.js" defer></script>
</head>

<body>
    <div class="Whole-Container search-espesyal">
        <header id="header">
            <a href="../index.php"><img src="../RESOURCES/LogosEnShiz/Lend-A-Book-logos_black.png" alt="Header" id="header-img" ></a>


            <a href="#" class="toggle-burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

            <nav id="nav-bar" class="nav-bar">
                <ul>
                    <li><a href="../ADMIN PAGE/message.php" class="headin">Message</a></li>
                    <li><a href="profiles.php" class="headin">Profiles</a></li>
                    <li><a href="dashboard.php" class="headin">Products</a></li>
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

    <div class="search-container">
        <?PHP 
            require '../config.php';
            if (isset($_POST['submit-search'])){
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if($queryResult > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='book-search-info'>
                                <h3 class='searchbook-title'><a href='../details.php?id={$row['idProduct']}' class='searchLink'>" .$row['product_name']. "</a></h3>
                                <img class='search-image-size' src='../".$row['image_book']."'>
                            </div>";
                    }

                } else {echo "There are no results matching your search";}
            }
        ?>
    </div>

    <footer>
        <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
    </footer>
</div>
</body>