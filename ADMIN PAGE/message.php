<?php 
    require '../config.php';
    $select = "SELECT * FROM users_input";
    $query = mysqli_query($conn, $select);

    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $delete=mysqli_query($conn, "DELETE FROM `users_input` WHERE `id` = '$id'");
        header("location:message.php");
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
        <header id="header">
            <a href="../index.php"><img src="../RESOURCES/LogosEnShiz/Lend-A-Book-logos_black.png" alt="Header" id="header-img" ></a>

            <a href="#" class="toggle-burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

            <nav id="nav-bar" class="nav-bar">
                <ul>
                    <li><a href="message.php" class="headin">Message</a></li>
                    <li><a href="profiles.php" class="headin">Profiles</a></li>
                    <li><a href="dashboard.php" class="headin">Products</a></li>
                    <li><a href="order.php" class="headin">Orders</a></li>
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

    <div class="message-box">

        <table border="1" cellpadding="0">
            <tr>
                <th>Email</th>
                <th>Message</th>
                <th>Operations</th>
            </tr>
            <?php 
                $num=mysqli_num_rows($query);
                if ($num>0){
                    while ($result= mysqli_fetch_assoc($query)){
                        echo"    
                        <tr>
                            <td class='td'> ".$result['input_email']." </td>
                            <td class='td'> ".$result['input_message']." </td>
                            <td class='td'>
                                <a href='message.php?id=".$result['id']."' class='btn-del'> Delete </a>
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