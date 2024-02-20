<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
            href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="Style/homepage.css" />
    <script src="js/newsletter.js"></script>
    <title>Web Design Mastery | Watch It</title>
</head>
<body>
        <?php
            include "../back-end/NavBar.php";
        ?>



    <header>
        <div class="section__container header__container">
            <div class="header__content">
                <p>EXTRA 55% OFF IN SPRING SALE</p>
                <h1>Discover & Shop<br /></h1>
                <a class="btn" href="shop.php">SHOP NOW</a>
            </div>
            <div class="header__image">
                <img src="assets/a.jpg" alt="header" />
            </div>
        </div>
    </header>

    <section class="section__container collection__container">
        <img src="assets/b.jpg" alt="collection" />
        <div class="collection__content">
            <h2 class="section__title">New Collection</h2>
            <p>#35 ITEMS</p>
            <h4>Available on Store</h4>
            <a class="btn" href="shop.php">SHOP NOW</a>
        </div>
    </section>

    <section class="section__container sale__container">
        <h2 class="section__title">On Sale</h2>
        <div class="sale__grid">
            <div class="sale__card">
                <img src="assets/sale-1.jpg" alt="sale" />
                <div class="sale__content">
                    <p class="sale__subtitle">MAN </p>
                    <h4 class="sale__title">sale <span>40%</span> off</h4>
                    <p class="sale__subtitle">- DON'T MISS -</p>
                    <a class="btn sale__btn" href="shop.php">SHOP NOW</a>
                </div>
            </div>
            <div class="sale__card">
                <img src="assets/sale-2.jpg" alt="sale" />
                <div class="sale__content">
                    <p class="sale__subtitle">WOMAN </p>
                    <h4 class="sale__title">sale <span>25%</span> off</h4>
                    <p class="sale__subtitle">- DON'T MISS -</p>
                    <a class="btn sale__btn" href="shop.php">SHOP NOW<a>
                </div>
            </div>
            <div class="sale__card">
                <img src="assets/sale-3.jpg" alt="sale"/>
                <div class="sale__content">
                    <p class="sale__subtitle">kids</p>
                    <h4 class="sale__title">sale <span>20%</span> off</h4>
                    <p class="sale__subtitle">- DON'T MISS -</p>
                    <a class="btn sale__btn" href="shop.php">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>


    <section class="news">
        <div class="section__container news__container">
            <h2 class="section__title">Latest News</h2>
            <div class="news__grid">
                <div class="news__card">
                    <img src="assets/news-1.jpg" alt="news" />
                    <div class="news__details">
                        <p>
                            FASHION <i class="ri-checkbox-blank-circle-fill"></i>
                            <span>JAMES SIMSON</span>
                            <i class="ri-checkbox-blank-circle-fill"></i> FEB 22, 2024
                        </p>
                        <h4>Seasonal Trends</h4>
                        <hr />
                        <p>
                            Discuss the latest fashion trends for the current season and
                            offer tips and ideas on how to incorporate these trends into
                            your wardrobe.
                        </p>
                        <a href="#"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="news__card">
                    <img src="assets/news-2.jpg" alt="news" />
                    <div class="news__details">
                        <p>
                            TRENDS <i class="ri-checkbox-blank-circle-fill"></i>
                            <span>JAMES SIMSON</span>
                            <i class="ri-checkbox-blank-circle-fill"></i> APR 15, 2019
                        </p>
                        <h4>Fashion Tips and Advice</h4>
                        <hr />
                        <p>
                            Provide your readers with practical tips and advice on how to
                            dress for different occasions, body types, or style preferences.
                        </p>
                        <a href="#"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="news__card">
                    <img src="assets/news-3.jpg" alt="news" />
                    <div class="news__details">
                        <p>
                            STYLE <i class="ri-checkbox-blank-circle-fill"></i>
                            <span>JAMES SIMSON</span>
                            <i class="ri-checkbox-blank-circle-fill"></i> JUL 22, 2019
                        </p>
                        <h4>Sustainable Fashion</h4>
                        <hr />
                        <p>
                            Cover the growing trend of eco-conscious fashion and explore the
                            various ways to be sustainable in your fashion choices.
                        </p>
                        <a href="#"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__container brands__container">
        <div class="brand__image">

        </div>
        <div class="brand__image">
            <img src="assets/brand-patek.png" alt="brand" />
        </div>
        <div class="brand__image">
            <img src="assets/brand 3.png" alt="brand" />
        </div>
        <div class="brand__image">
            <img src="assets/brand-rolex.png" alt="brand" />
        </div>
        <div class="brand__image">
            <img src="assets/brand-omega.png" alt="brand" />
        </div>
        <div class="brand__image">

        </div>
    </section>

    <hr />

    <footer class="section__container footer__container">
        <div class="footer__col">
            <h4 class="footer__heading">CONTACT INFO</h4>
            <p>
                <i class="ri-map-pin-2-fill"></i> 123, London Bridge Street, London
            </p>
            <p><i class="ri-mail-fill"></i> progettosaw24@gmail.com</p>
            <p><i class="ri-phone-fill"></i> (+012) 3456 789</p>
        </div>
        <div class="footer__col">
            <h4 class="footer__heading">COMPANY</h4>
            <p>Home</p>
            <p>About Us</p>
            <p>Work With Us</p>
            <p>Our Blog</p>
            <p>Terms & Conditions</p>
        </div>
        <div class="footer__col">
            <h4 class="footer__heading">USEFUL LINK</h4>
            <p>Help</p>
            <p>Track My Order</p>
            <p>Men</p>
            <p>Women</p>
        </div>
    </footer>

    <hr />

    <div class="section__container footer__bar">
        <div class="copyright">
            Copyright © 2024 Martino Start UP. All rights reserved.
        </div>

    </div>




<!-- Aggiungi altri attributi o stili all'ancora secondo le tue esigenze -->

<script>
    // Puoi aggiungere eventuali script JavaScript qui, se necessario
</script>

</body>
</html>
