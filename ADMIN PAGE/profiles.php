<?php 
    require '../config.php';
    $select = "SELECT * FROM tb_user";
    $query = mysqli_query($conn, $select);

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
                    <li><a href="profiles.php" class="headin">Profile</a></li>
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
                $conn = mysqli_connect("localhost", "root", "", "reglog");
                
                if ($conn->connect_error){
                    die("Connect error: " + $conn->connect_error);
                }
                $sql = "SELECT * FROM tb_user";
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