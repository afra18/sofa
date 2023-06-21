<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sofa Collection Webiste</title>
    <!-- Style Css Link -->
    <link rel="stylesheet" href="style.css">
    <!-- Style Css Link -->
    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Font Awesome Cdn -->

</head>
<body>

    <!-- Header Start -->
    <div class="header">
        <nav>
            <input type="checkbox" id="show-search">
            <input type="checkbox" id="show-menu">
            <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
            <div class="content">
                <div class="logo"><a href="index.html"><img src="./images/logo.png" alt=""></a></div>

                <ul class="links">
                    <li><a href="#" id="first">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#Best Seller">Best Seller</a></li>
                    <li><a href="cart.php">products</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><button class="main-btn">sign Up</button></li>
                </ul>
            </div>
            <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
            <form action="#" class="search-box">
                <input type="text" placeholder="Search" required>
                <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
            </form>

        </nav>
    </div>
    <!-- Header End -->





    <!-- Home Section Start -->
    <div class="home">
        <div class="main-text">
            <h1>Discover The Best <br>Furniture For You</h1>
            <p>Furniture will fill a space full of memories and a heart full of love</p>
            <button id="btn">View More</button>
        </div>
    </div>
    <!-- Home Section End -->





    <!-- Top Section Card Start -->
    <section class="offers">
        <div class="offer-content">
            <div class="row">
                <i class="fa-solid fa-truck-fast"></i>
                <h3>Free Delivery</h3>
            </div>
            <div class="row">
                <i class="fa-solid fa-headset"></i>
                <h3>Support 24/7</h3>
            </div>
            <div class="row">
                <i class="fa-solid fa-rotate-left"></i>
                <h3>30 Day Return</h3>
            </div>
            <div class="row">
                <i class="fa-solid fa-cart-shopping"></i>
                <h3>Secure Shopping</h3>
            </div>
        </div>
    </section>
    <!-- Top Section Card End -->





    <!-- About Section Start -->
    <section class="about" id="about">
        <div class="about-img">
            <img src="./images/about-img.png" alt="">
        </div>
        <div class="about-text">
            <h3>Furniture service About us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nemo maxime, eligendi nesciunt quis quaerat cupiditate rerum enim obcaecati eum totam facilis, sunt tempore libero officia. Ad, excepturi. Qui, voluptatem officia aspernatur iure nam, architecto quos molestiae assumenda nesciunt porro voluptatum dolorum consequatur odit. Laudantium saepe sunt perspiciatis dolores ex.</p>

            <button id="about-btn">Read More...</button>
        </div>
        
    </section>
    <!-- About Section End -->





    <!-- Best Seller Section Start -->
    <section class="Best Seller" id="Best Seller">
        <div class="main-txt">
            <h3>Best Seller</h3>
        </div>
        <div class="card-content">
            <div class="row">
                <img src="./images/p1.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $1000</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p2.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $800</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p3.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $1050</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p4.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
        </div>

        <div class="card-content">
            <div class="row">
                <img src="./images/p5.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $850</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p6.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p7.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $2000</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p8.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $1500</h5>
                    <button>Order Now</button>
                </div>
            </div>
        </div>

    </section>
    <!-- Best Seller Section End -->

    <!-- Sale Products Start -->
    <section class="product" id="products" style="margin-top: 50px;">
        <div class="main-txt">
            <h3>50% off products</h3>
        </div>
        <div class="card-content">
            <div class="row">
                <img src="./images/p9.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p10.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p11.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="./images/p12.png" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
        </div>

    </section>
    <!-- Sale Products End -->





    <!-- Our Gallary Start -->
    <div class="gallary">
        <h3>Our Gallary</h3>
        <div class="gallary-img">
            <div class="img1">
                <img src="./images/g1.png" alt="">
            </div>
            <div class="img1">
                <img src="./images/g2.png" alt="">
                <img src="./images/g3.png" alt="">
            </div>
        </div>
    </div>
    <!-- Our Gallary End -->





    <!-- Contact Section Start -->
    <section class="contact" id="contact">
        <div class="content-text">
            <h2>Get In <span>Touch</span<h2>
            <div class="list">
                <li><a href="#">+9200000000000000</a></li>
                <li><a href="#">example@gmail.com</a></li>
                <li><a href="#">bangalore north</a></li>
            </div>
        </div>

        <div class="contact-form">
            <form action="#">
                <input type="name" placeholder="Name" required>
                <input type="number" placeholder="Phone" required>
                <input type="email" placeholder="Email" required>
                <textarea name="" id="" cols="35" rows="10" placeholder="Message"></textarea>
                <input type="submit" value="Send" class="submit" required>

            </form>
        </div>

    </section>
    <!-- Contact Section End -->
    <!-- Footer Start -->
    <footer id="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="./images/logo.png" alt="">
            </div>
            <div class="socail-links">
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-pinterest-p"></i>
            </div>
        </div>
        <hr>
        <div class="footer-bottom-content">
            <div class="copyright">
                <p>&copy;Copyright <strong> Coding</strong>.All Rights Reserved</p>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <a href="#" class="arrow"><i><img src="./images/up-arrow.png" alt="" width="50px"></i></a>
</body>
</html>