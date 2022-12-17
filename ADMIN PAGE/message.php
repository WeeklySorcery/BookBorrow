<?php 
    require '../config.php';
    $select = "SELECT * FROM user_message";
    $query = mysqli_query($conn, $select);

    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $delete=mysqli_query($conn, "DELETE FROM `user_message` WHERE `id_message` = '$id'");
        header("location:message.php");
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
    <script src="../JS/js.js" defer></script>
</head>

<body>
    <div class="Whole-Container search-espesyal">
    <?php include 'header-admin.php'; ?>

    <div class="message-box">

        <table border="1" cellpadding="0">
            <tr>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Operations</th>
            </tr>
            <?php 
                $num=mysqli_num_rows($query);
                if ($num>0){
                    while ($result= mysqli_fetch_assoc($query)){
                        echo"    
                        <tr>
                            <td class='td'> ".$result['email']." </td>
                            <td class='td'> ".$result['message']." </td>
                            <td class='td'> ".$result['date']." </td>
                            <td class='td'>
                                <a href='message.php?id=".$result['id_message']."' class='btn-del'> Delete </a>
                            </td>
                        </tr>
                        ";
                    };

                };
            
            ?>
        </table>
    </div>

</div>
</body>