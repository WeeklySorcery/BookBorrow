<?php  require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="RESOURCES/SVGs/book-icon.svg" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend-A-Book</title>
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/search.css">
    <script src="JS/js.js" defer></script>
    <script src="JS/ad.js" defer></script>
</head>

<body>
    <div class="Whole-Container search-espesyal">
        <?php include 'header.php'; ?>

    <div class="search-container">
        <button id="back-top">⬏</button>

        <?PHP 
            if (isset($_POST['submit-search'])){
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                if($queryResult > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='book-search-info'>
                                <h3 class='searchbook-title'><a href='details.php?id={$row['product_id']}' class='searchLink'>" .$row['product_name']. "</a></h3>
                                <a href='details.php?id={$row['product_id']}'><img class='search-image-size' src='".$row['image_source']."'></a>
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
</html>