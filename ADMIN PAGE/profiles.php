<?php 
    require '../config.php';
    $select = "SELECT * FROM users";
    $query = mysqli_query($conn, $select);

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
        <?php include 'header-admin.php'; ?>

    <div class="pro">
            <h2>USERS</h2>
    </div>


    <div class="container-crud">
        
        <table class="table dash" border="1" cellpadding="0">
            <thead>
               <tr>
                    <th>NAME</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
               </tr> 
            </thead>
            <tbody>
                <?php 
                $conn = mysqli_connect("localhost", "root", "", "lend-a-book");
                
                if ($conn->connect_error){
                    die("Connect error: " + $conn->connect_error);
                }
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                if(!$result){
                    die('Invalid query:' + $conn->error);
                }

                //read data
                while($row = $result->fetch_assoc()){
                    echo"    
                    <tr>
                        <td class='td'>$row[name]</td>
                        <td class='td'>$row[username]</td>
                        <td class='td'>$row[email]</td>
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