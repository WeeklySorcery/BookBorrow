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
                    <li><a href="profiles.php" class="headin">Users</a></li>
                    <li><a href="dashboard.php" class="headin">Products</a></li>
                    <li><a href="order.php" class="headin">Orders</a></li>
                    <li><a href="logout_admin.php">Logout</a></li>
                </ul>
            </nav>
        </header>

    <div class="extra-nav">
        <div class="searchwrapper-container">
            <div class="searchwrapper">
                <div class="searchbox">
                    <form action="search.php" method="POST" autocomplete="off">
                    <input type="text" class="search-txt input big" name="search" placeholder="search . . .">
                    <button type="submit" class="close-btn" name="submit-search">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
<?php
if(isset($_POST['logout-link'])){
    session_start();
    unset($_SESSION["user_active"]);
    unset($_SESSION["username"]);
    header("Location: index.php");
}
?>