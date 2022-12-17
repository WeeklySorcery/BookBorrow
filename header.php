<header id="header">
            <img src="RESOURCES/LogosEnShiz/Lend-A-Book-logos_black.png" alt="Header" id="header-img" >

            <a href="#" class="toggle-burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

            <nav id="nav-bar" class="nav-bar">
                <ul>
                    <li><a href="index.php" class="headin">Home</a></li>
                    <li><a href="browse.php" class="headin">Browse</a></li>
                    <li><a href="plans.php" class="headin">Our Plans</a></li>
                    <li><a href="contact.php" class="headin">Contact</a></li>
                    <li><a href="<?php 
                    if(!empty($_SESSION['user_active'])){
                        echo "myBookList.php";
                    }
                    else {
                        echo "login.php";
                    }
                    ?>" class="headin"><?php 
                    if(!empty($_SESSION['user_active'])){
                        echo "Logout";
                    }
                    else {
                        echo "Login";
                    }
                    
                    ?></a></li>
                    <li><a href="myBookList.php" class="headin">Your Library</a></li>
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
        <div class="cart">
            <?php 
                $count=0;
                $con = mysqli_connect("localhost", "root", "", "lend-a-book");
                if(isset($_SESSION['user_active'])){
                    $user_id = $_SESSION['user_active'];
                    $cart_count = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = $user_id") or die('query failed');
                    $count = mysqli_num_rows($cart_count);
                } else if(!isset($_SESSION['user_active'])){
                    $count = 0;
                }
            
            ?>
            <div class="leftsider dropdown" data-dropdown>
                <button class="category" data-dropdown-button>CATEGORIES</button>
                <div class="dropdown-menu">
                    <ul>
                        <?php 
                        $conn = mysqli_connect("localhost", "root", "", "lend-a-book");
                        $sqlheader = "SELECT * FROM category";
                        $resultheader = mysqli_query($conn, $sqlheader);
                        $queryResult = mysqli_num_rows($resultheader);

                        if($queryResult > 0){
                            while($rowheader = mysqli_fetch_assoc($resultheader)) {
                                echo "<li><a href=category.php?genre={$rowheader['category_id']}>";
                                echo $rowheader['name'];
                                echo "</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="rightsider">
                <div class="add-to-cart-btn">
                    <h2 class="user-cart" >YOUR CART</h2>
                    <a href="cart.php" class="unset-a" id="unset-a"><img src="RESOURCES/LogosEnShiz/cart1.svg" height="40px" width="40px" style="position: relative; top:10px"></a>
                    <a href="cart.php"> <?php echo $count?></a>
                </div>
            </div>
                
        </div>
