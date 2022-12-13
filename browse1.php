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
    <link rel="shortcut icon" type="image/x-icon" href="RESOURCES/SVGs/book-icon.svg" />
</head>
<body>
    <div class="Whole-Container">
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
                    <li><a href="login.php" class="headin">Login</a></li>
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
    </div>
    <div class="cart">
        <h2 class="user-cart">Your Cart</h2>
        <div class="add-to-cart-btn">
            <a href="cart.php"> View Cart</a>
        </div>
    </div>

    <div class="gridlayout">
        <div class="sidebar">
            <div class="side-links">
                <h2>CATEGORIES</h2>
                <a href="#" class="top-link">
                    Books
                </a>
                <a href="#">
                    Poem
                </a>
                <a href="#">
                    Magazines
                </a>
                <a href="#">
                    Comics
                </a>
                <a href="#">
                    Books
                </a>
                <a href="#">
                    Poem
                </a>
                <a href="#">
                    Magazines
                </a>
                <a href="#">
                    Comics
                </a>
                <a href="#">
                    Books
                </a>
                <a href="#">
                    Poem
                </a>
                <a href="#">
                    Magazines
                </a>
                <a href="#" class="bottom-apple-jeans">
                    Comics
                </a>
                <a href="#">
                    Magazines
                </a>
                <a href="#" class="bottom-apple-jeans">
                    Comics
                </a>
            </div>
        </div> 

        <button id="back-top">⬏</button>
        
        <div class="main-content">
            <div class="box-images">
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/howlMovingCastle.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/the hobbit.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="book-enclosure">
                    <div class="book-case">
                        <a href="#">
                            <img src="RESOURCES/Books/list-of-books/starsight.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="numero">
            <div class="num">
                <a href="browse.php">1</a>
                <a href="browse1.php" id="local">2</a>
                <a href="browse2.php">3</a>
            </div>
        </div>
    </div>
    <footer>
        <p class="footer-class">ABOUT | BLOG | BROWSE BOOKS | SUBSCRIPTION PLANS | CONTACT LIBRARY | LINKS | PRIVACY POLICY | TERMS AND CONDITION </p>
    </footer>
</body>
</html>