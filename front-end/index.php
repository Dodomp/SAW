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
                <h1>Discover & Shop<br />The Trend Ss19</h1>
                <button class="btn">SHOP NOW</button>
            </div>
            <div class="header__image">
                <img src="assets/Orologi/Crono/crono8.jpeg" alt="header" />
            </div>
        </div>
    </header>

    <section class="section__container collection__container">
        <img src="assets/collection.jpg" alt="collection" />
        <div class="collection__content">
            <h2 class="section__title">New Collection</h2>
            <p>#35 ITEMS</p>
            <h4>Available on Store</h4>
            <button class="btn">SHOP NOW</button>
        </div>
    </section>

    <section class="section__container sale__container">
        <h2 class="section__title">On Sale</h2>
        <div class="sale__grid" style="width: auto">
            <div class="sale__card">
                <img src="assets/Orologi/c.png" alt="sale" style="height: 100%; width: 100%; " />
                <div class="sale__content">
                    <p class="sale__subtitle">LAST STATUS WATCH</p>
                    <h4 class="sale__title">sale <span>40%</span> off</h4>

                    <button class="btn sale__btn">SHOP NOW</button>
                </div>
            </div>
            <div class="sale__card">
                <img src="assets/Orologi/d.png" alt="sale" style="height: 100%; width: 100%;"/>
                <div class="sale__content">
                    <p class="sale__subtitle">CASIO GOLD</p>
                    <h4 class="sale__title">sale <span>25%</span> off</h4>

                    <button class="btn sale__btn">SHOP NOW</button>
                </div>
            </div>
            <div class="sale__card">
                <img src="assets/Orologi/e.png" alt="sale" style="height: 100%; width: 100%;" />
                <div class="sale__content">
                    <p class="sale__subtitle">POCKET WATCH</p>
                    <h4 class="sale__title">sale <span>20%</span> off</h4>

                    <button class="btn sale__btn">SHOP NOW</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section__container musthave__container">
        <h2 class="section__title">Must Have</h2>
        <div class="musthave__nav">
            <a href="#">ALL</a>
            <a href="#">MAN</a>
            <a href="#">WOMEN</a>
            <a href="#">BAG</a>
            <a href="#">SHOES</a>
        </div>
        <div class="musthave__grid">
            <div class="musthave__card">
                <img src="assets/musthave-1.png" alt="must have" />
                <h4>Basic long sleeve T-shirt</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-2.png" alt="must have" />
                <h4>Ribbed T-shirt with buttons</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-3.png" alt="must have" />
                <h4>Jacket withside strips</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-4.png" alt="must have" />
                <h4>High-heel tubular sandals</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-5.png" alt="must have" />
                <h4>Coral fabric belt bag</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-6.png" alt="must have" />
                <h4>Piggy skater slogan T-shirt</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-7.png" alt="must have" />
                <h4>White platform boots</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-8.png" alt="must have" />
                <h4>Sweater vest with sleeves</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-9.png" alt="must have" />
                <h4>Slim fit pants</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-10.png" alt="must have" />
                <h4>Gray backpack</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-11.png" alt="must have" />
                <h4>Neon sweatshirt</h4>
                <p><del>$45.00</del> $75.00</p>
            </div>
            <div class="musthave__card">
                <img src="assets/musthave-12.png" alt="must have" />
                <h4>Hooded nautical jacket</h4>
                <p><del>$45.00</del> $75.00</p>
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
                        <h4>OROLOGIO DI LUSSO</h4>
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
                        <h4>OROLOGIO DI LUSSO</h4>
                        <hr />

                        <a href="#"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="news__card">
                    <img src="assets/h.jpg" alt="news" />
                    <div class="news__details">
                        <p>
                            APPLE WATCH<i class="ri-checkbox-blank-circle-fill"></i>
                            <span>SERIES 8</span>
                            <i class="ri-checkbox-blank-circle-fill"></i> 2024
                        </p>
                        <h4>SMART WATCH</h4>
                        <hr />

                        <a href="#"><i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__container brands__container">
        <div class="brand__image">
            <img src="assets/brand-1.png" alt="brand" />
        </div>
        <div class="brand__image">
            <img src="assets/brand-2.png" alt="brand" />
        </div>
        <div class="brand__image">
            <img src="assets/brand-3.png" alt="brand" />
        </div>
        <div class="brand__image">
            <img src="assets/brand-4.png" alt="brand" />
        </div>
        <div class="brand__image">
            <img src="assets/brand-5.png" alt="brand" />
        </div>
        <div class="brand__image">
            <img src="assets/brand-6.png" alt="brand" />
        </div>
    </section>

    <hr />

    <footer class="section__container footer__container">
        <div class="footer__col">
            <h4 class="footer__heading">CONTACT INFO</h4>
            <p>
                <i class="ri-map-pin-2-fill"></i> 123, London Bridge Street, London
            </p>
            <p><i class="ri-mail-fill"></i> support@monsa.com</p>
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
            <p>Shoes</p>
        </div>
        <div class="footer__col">
            <h4 class="footer__heading">INSTAGRAM</h4>
            <div class="instagram__grid">
                <img src="assets/instagram-1.jpg" alt="instagram" />
                <img src="assets/instagram-2.jpg" alt="instagram" />
                <img src="assets/instagram-3.jpg" alt="instagram" />
                <img src="assets/instagram-4.jpg" alt="instagram" />
                <img src="assets/instagram-5.jpg" alt="instagram" />
                <img src="assets/instagram-6.jpg" alt="instagram" />
            </div>
        </div>
    </footer>

    <hr />

    <div class="section__container footer__bar">
        <div class="copyright">
            Copyright © 2023 Web Design Mastery. All rights reserved.
        </div>

    </div>




<!-- Aggiungi altri attributi o stili all'ancora secondo le tue esigenze -->

<script>
    // Puoi aggiungere eventuali script JavaScript qui, se necessario
</script>

</body>
</html>
