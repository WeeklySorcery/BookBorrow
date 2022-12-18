<?php 
    require '../config.php';
    $select = "SELECT * FROM products";
    $query = mysqli_query($conn, $select);

    if(isset($_GET['idProduct'])){
        $id= $_GET['idProduct'];
        $delete=mysqli_query($conn, "DELETE FROM `products` WHERE `idProduct` = '$id'");
        header("location:dahboard.php");
    }

    if(!$_SESSION["user_active"]){
        header("location: ../index.php");
    } else if($_SESSION["user_active"]){
        $detect = $_SESSION['user_active'];
        if($detect != 1){
            header("location: ../index.php");
        }
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
    <link rel="stylesheet" href="../CSS/message.css">
</head>

<body>
    <div class="Whole-Container search-espesyal">
    <?php  include 'header-admin.php'; ?>
    


    <div class="pro">
            <h2>Products</h2>
            <div class="a-hole">
                <a class='btn-primary' href="create.php" role="button"> New Product </a>
            </div>
            <br>
    </div>


    <div class="container-crud">
        
        <table class="table dash" border="1" cellpadding="0">
            <thead>
               <tr>
                    <th>IMAGE</th>
                    <th>ID</th>
                    <th><Nav>NAME</Nav></th>
                    <th class="bs-desc">DESCRIPTIONS</th>
                    <th>PRICE</th>
                    <th>IMAGE SOURCES</th>
                    <th>DELETE</th>
                    <th>UPDATE</th>
               </tr> 
            </thead>
            <tbody>
                <?php 
                $conn = mysqli_connect("localhost", "root", "", "lend-a-book");
                
                if ($conn->connect_error){
                    die("Connect error: " + $conn->connect_error);
                }
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                if(!$result){
                    die('Invalid query:' + $conn->error);
                }

                //read data
                while($row = $result->fetch_assoc()){
                    echo"    
                    <tr>
                        <td class='td'><img src='../$row[image_source]' height='250px'></td>
                        <td class='td'>$row[product_id]</td>
                        <td class='td'>$row[product_name]</td>
                        <td class='td bs-desc'>$row[product_desc]</td>
                        <td class='td'>$row[product_price]</td>
                        <td class='td'>$row[image_source]</td>
                        <td class='td'>
                            <a class='btn-act' href='delete.php?id=$row[product_id]' role='button'> Delete </a>
                        </td>
                        <td class='td'>
                            <a class='btn-act' href='update.php?id=$row[product_id]' role='button'> Update </a>
                        </td>        
                        </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>

    </div>
</body>
</html>