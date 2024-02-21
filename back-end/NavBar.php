<?php
    if (isset($_SESSION["login"]))
    {
        if (isset($_SESSION["admin"])){
            echo"
             <nav class='section__container nav__container'>
                <a href='#' class='av__logo'> </a>
                <ul class='nav__links'>
                    <li class='link'><a href='index.php'>HOME</a></li>
                    <li class='link'><a href='shop.php'>SHOP</a></li>
                    <li class='link'><a href='carrello.php'>CARRELLO</a></li>
                    <li class='link'><a href='show_profile.php'>PROFILO</a></li>                    
                    <li class='link'><a href='newsletter.php'>NEWSLETTER</a></li>
                    <li class='link'><a href='UserManagement.php'>ADMIN AREA</a></li>  
                    <li class='link'><a href='../back-end/logout.php' style='color: darkred;'>LOG OUT</a></li>

                </ul>
                <div class='nav__icons'>                  
                </div>
            </nav>
        ";
        }
        else{
            echo"
             <nav class='section__container nav__container'>
                <a href='#' class='av__logo'></a>
                <ul class='nav__links'>
                    <li class='link'><a href='index.php'>HOME</a></li>
                    <li class='link'><a href='shop.php'>SHOP</a></li>
                    <li class='link'><a href='carrello.php'>CARRELLO</a></li>
                    <li class='link'><a href='show_profile.php'>PROFILO</a></li>                    
                    <li class='link'><a href='../back-end/logout.php' style='color: darkred;'>LOG OUT</a></li>

                </ul>
                <div class='nav__icons'>
                </div>
            </nav>
        ";
        }

    }

    else {
        echo"
             <nav class='section__container nav__container'>
                <a href='#' class='av__logo'></a>
                <ul class='nav__links'>
                    <li class='link'><a href='index.php'>HOME</a></li>
                    <li class='link'><a href='shop.php'>SHOP</a></li>
                    <li class='link'><a href='#'>CHI SIAMO</a></li>
                    <li class='link'><a href='login.php'>SIGN IN</a></li>
                    <li class='link'><a href='registration.php'>SIGN UP</a></li>

                </ul>
                <div class='nav__icons'>
                </div>
            </nav>
        ";
    }