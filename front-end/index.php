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
    <title>Time Haven</title>
</head>
<body>
        <?php
            include "../back-end/NavBar.php";
        ?>



    <header style="margin-top: 85px">
        <div class="section__container header__container">
            <div class="header__content">
                <h1>Time Haven</h1>
                <p style="font-size: larger">Per quanto tempo è per sempre?</p>
                <p style="font-size: larger">A volte, solo un secondo</p>
                <a href="shop.php"><button class="btn sale__btn">SHOP NOW</button></a>
            </div>
            <div class="header__image">
                <img src="assets/a.jpg" alt="header" style="border: solid 5px black" />
            </div>
        </div>
    </header>

    <section class="section__container collection__container">
        <img src="assets/b.jpg" alt="collection" style="width: 100%; border: solid 5px black "/>
        <div class="collection__content">
            <h2 class="section__title">New Collection</h2>
            <a href="shop.php"><button class="btn sale__btn">SHOP NOW</button></a>
        </div>
    </section>

    <section class="section__container sale__container">
        <h2 class="section__title">On Sale</h2>
        <div class="sale__grid">
            <div class="sale__card">
                <img src="assets/c.png" alt="sale" style="width: 100%; height: 100%" />
                <div class="sale__content">
                    <p class="sale__subtitle">LUXORY WATCH</p>
                    <h4 class="sale__title">sale <span>40%</span> off</h4>
                    <a href="shop.php"><button class="btn sale__btn">SHOP NOW</button></a>
                </div>
            </div>
            <div class="sale__card">
                <img src="assets/d.png" alt="sale" style="width: 100%; height: 100%" />
                <div class="sale__content">
                    <p class="sale__subtitle">CASIO GOLD</p>
                    <h4 class="sale__title">sale <span>25%</span> off</h4>
                    <a href="shop.php"><button class="btn sale__btn">SHOP NOW</button></a>
                </div>
            </div>
            <div class="sale__card">
                <img src="assets/e.png" alt="sale" style="width: 100%; height: 100%" />
                <div class="sale__content">
                    <p class="sale__subtitle">POCKET WATCH</p>
                    <h4 class="sale__title">sale <span>20%</span> off</h4>
                    <a href="shop.php"><button class="btn sale__btn">SHOP NOW</button></a>
                </div>
            </div>
        </div>
    </section>



    <section class="news">
        <div class="section__container news__container">
            <h2 class="section__title">Latest News</h2>
            <div class="news__grid">
                <div class="news__card">
                    <img src="assets/f.jpg" alt="news" />
                    <div class="news__details">
                        <p>
                            PATEK PHILIPPE <i class="ri-checkbox-blank-circle-fill"></i>
                            <span>NAUTILUS</span>
                            <i class="ri-checkbox-blank-circle-fill"></i> 2024
                        </p>
                        <h4>Seasonal Trends</h4>
                        <hr />

                        <a href="#"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="news__card">
                    <img src="assets/g.jpg" alt="news" />
                    <div class="news__details">
                        <p>
                            ROLEX <i class="ri-checkbox-blank-circle-fill"></i>
                            <span>DAYTONA</span>
                            <i class="ri-checkbox-blank-circle-fill"></i> 2024
                        </p>
                        <h4>Fashion Tips and Advice</h4>
                        <hr />

                        <a href="#"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="news__card">
                    <img src="assets/h.jpg" alt="news" />
                    <div class="news__details">
                        <p>
                            APPLE WATCH <i class="ri-checkbox-blank-circle-fill"></i>
                            <span>SERIES 8</span>
                            <i class="ri-checkbox-blank-circle-fill"></i> 8
                        </p>
                        <h4>Sustainable Fashion</h4>
                        <hr />

                        <a href="#"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__container brands__container" style="align-content: center">
        <div class="brand__image">
            <img src="assets/brand-omega.png" alt="brand" />
        </div>

        <div class="brand__image">
            <img src="assets/brand-patek.png" alt="brand" />
        </div>

        <div class="brand__image">
            <img src="assets/brand-rolex.png" alt="brand" />
        </div>

        <div class="brand__image">
            <img src="assets/brand-AP.png" alt="brand" />
        </div>

        <div class="brand__image">
            <img src="assets/brand-casio.jpg" alt="brand" />
        </div>

        <div class="brand__image">
            <img src="assets/brand-apple.png" alt="brand" />
        </div>

    </section>

    <hr />

    <footer class="section__container footer__container">
        <div class="footer__col">
            <h4 class="footer__heading">CONTACT INFO</h4>
            <p>
                <i class="ri-map-pin-2-fill"></i> Università di Genova
            </p>
            <p><i class="ri-mail-fill"></i> progettosaw24@gmail.com</p>
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
            <h4 class="footer__heading">INSTAGRAM</h4>
            <div class="instagram__grid">
                <img src="assets/Orologi/AppleWatch7.jpg" alt="instagram" />
                <img src="assets/Orologi/GalaxyWatch5Pro.jpg" alt="instagram" />
                <img src="assets/Orologi/7118_1200A_Nautilus.jpg" alt="instagram" />
                <img src="assets/Orologi/GM-110GC-1A.jpg" alt="instagram" />
                <img src="assets/Orologi/SpeedmasterDarkSideOfTheMoon.jpg" alt="instagram" />
                <img src="assets/Orologi/SpeedmasterMoonwatchProfessional.jpg" alt="instagram" />
            </div>
        </div>
    </footer>

    <hr />

    <div class="section__container footer__bar">
        <div class="copyright">
            Copyright © 2024 Martino Start Up. All rights reserved.
        </div>

    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>
