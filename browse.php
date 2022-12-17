<?php include 'config.php';


if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
 
//products display per page

$total_prod_per_page = 12;
$offset = ($page_no - 1) * $total_prod_per_page;

//prev and next page
$prev_page = $page_no - 1;
$next_page = $page_no + 1;

$result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM products");
$records = mysqli_fetch_array($result_count);

$total_records = $records['total_records'];

$total_no_pages = ceil($total_records / $total_prod_per_page);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend-A-Book</title>
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/browse.css">
    <script src="JS/js.js" defer></script>
    <script src="JS/ad.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="RESOURCES/SVGs/book-icon.svg" />
</head>
<body>
    <div class="Whole-Container">
        <?php include 'header.php';?>

    <div class="php-product-list">
        <button id="back-top">⬏</button>
        <?PHP 
            $sql = "SELECT * FROM products LIMIT $offset , $total_prod_per_page";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);
        ?>
        
        <div class="main-content">
            <div class="box-images">
            <?php 
            if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class ='book-enclosure'>
                        <div class = 'book-case'>
                            <a class='a' href='details.php?id={$row['product_id']}'>
                                <img src='".$row['image_source']."'>
                            </a>
                        </div>
                    </div>";
                };
            }
            ?>
            </div>
        </div>
        <div class="numero">
            <div class="num">
                <a  class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?> " <?= ($page_no > 1)? 'href=?page_no=' .$prev_page : "" ?>>Prev</a>

                <?php for($counter = 1; $counter <= $total_no_pages; $counter++){ ?>
                <a href="?page_no=<?= $counter; ?>"><?= $counter; ?></a>
                <?php } ?>
                
                <a class="page_link <?= ($page_no >= $total_no_pages) ? 'disabled' : ''; ?>" <?= ($page_no < $total_no_pages)? 'href=?page_no=' .$next_page : "" ?>>Next</a>
            </div>
        </div>
    </div>
    <footer>
        <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
    </footer>
</body>
</html>