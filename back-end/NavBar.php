<?php
    if (isset($_SESSION["login"]))
    {
        if (isset($_SESSION["admin"])){
            echo"
             <nav class='section__container nav__container'>
                <a href='#' class='av__logo'>Mona </a>
                <ul class='nav__links'>
                    <li class='link'><a href='#'>HOME</a></li>
                    <li class='link'><a href='shop.php'>SHOP</a></li>
                    <li class='link'><a href='#'>CHI SIAMO</a></li>
                    <li class='link'><a href='carrello.php'>CARRELLO</a></li>
                    <li class='link'><a href='#'>ADMIN AREA</a></li>
                    <li class='link'><a href='../back-end/logout.php'>LOG OUT</a></li>

                </ul>
                <div class='nav__icons'>
                    <span><i class='ri-shield-user-line'></i></span>
                    <span><i class='ri-search-line'></i></span>
                    <span><i class='ri-shopping-bag-2-line'></i></span>
                </div>
            </nav>
        ";
        }
        else{
            echo"
             <nav class='section__container nav__container'>;
                <a href='#' class='av__logo'>'Mon'sa' </a>
                <ul class='nav__links'>
                    <li class='link'><a href='#'>HOME</a></li>
                    <li class='link'><a href='shop.php'>SHOP</a></li>
                    <li class='link'><a href='#'>CHI SIAMO</a></li>
                    <li class='link'><a href='carrello.php'>CARRELLO</a></li>
                    <li class='link'><a href='../back-end/logout.php'>LOG OUT</a></li>

                </ul>
                <div class='nav__icons'>
                    <span><i class='ri-shield-user-line'></i></span>
                    <span><i class='ri-search-line'></i></span>
                    <span><i class='ri-shopping-bag-2-line'></i></span>
                </div>
            </nav>
        ";
        }

    }

    else {
        echo"
             <nav class='section__container nav__container'>;
                <a href='#' class='av__logo'>Mon'sa</a>
                <ul class='nav__links'>
                    <li class='link'><a href='#'>HOME</a></li>
                    <li class='link'><a href='shop.php'>SHOP</a></li>
                    <li class='link'><a href='#'>CHI SIAMO</a></li>
                    <li class='link'><a href='login.php'>SIGN IN</a></li>
                    <li class='link'><a href='registration.php'>SIGN UP</a></li>

                </ul>
                <div class='nav__icons'>
                    <span><i class='ri-shield-user-line'></i></span>
                    <span><i class='ri-search-line'></i></span>
                    <span><i class='ri-shopping-bag-2-line'></i></span>
                </div>
            </nav>
        ";
    }