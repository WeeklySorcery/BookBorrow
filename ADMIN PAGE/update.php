<?php 
$conn = mysqli_connect("localhost", "root", "", "lend-a-book");


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE product_id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $name = $row["product_name"];
    $desc = $row["product_desc"];
    $desc = mysqli_escape_string($conn, $desc);
    $price = $row["product_price"];
    $sarsa = $row["image_source"];
    $categ = $row["category_id"];
    
} else {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $price = $_POST["price"];
    $sarsa = $_POST["sarsa"];
    $categ = $_POST["categ"];

    $desc = mysqli_escape_string($conn, $_POST['desc']);


    $sql = "UPDATE products SET product_name = '$_POST[name]', product_desc = '$_POST[desc]', product_price = '$_POST[price]', image_source = '$_POST[sarsa]', category_id = $_POST[categ] WHERE product_id = '$id'";
    
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
        <?php include 'header-admin.php';  ?>

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
            <label for="">Category ID</label>
            <br>
            <input type="number" name="categ" value="<?php echo $categ; ?>" class="imp" required>
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
