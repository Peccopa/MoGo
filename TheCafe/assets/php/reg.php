<?php
function d($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// d($_COOKIE);
// echo $_COOKIE['regdone'];

// echo "<h1>Привет, $_POST[fname] $_POST[lname]!</h1>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@400;700&family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <title>TheCafe</title>
</head>
<body>

<header class="header" id="header">
    <!-- <header class="header  header--fixed"> -->
    <div class="container">
        <div class="header__inner">
            <!-- <div class="header__logo">MoGo</div> -->
            <a class="header__logo" href="../../index.php" data-scroll="#intro">TheCafe</a>
            <nav class="nav" id="nav">
                <a class="nav__link" href="../../index.php" data-scroll="#about">about</a>
                <a class="nav__link" href="../../index.php" data-scroll="#works">Arts</a>
                <a class="nav__link" href="../../index.php" data-scroll="#registration">join us</a>
                <a class="nav__link" href="../../index.php" data-scroll="#blog">Blogs</a>
                <!-- <a class="nav__link" href="#">Registration</a> -->
                <a class="nav__link" href="#" data-scroll="#footer">Contact</a>
                <a class="nav__link whatsup" href="https://api.whatsapp.com/send?phone=79168291896">
                <i class="fa-brands fa-whatsapp fa-2xl"></i>
                </a>
                <!-- <a class="nav__link" href="#">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>     -->
            </nav>

            <button class="nav-toggle" id="nav_toggle" type="button">
                <span class="nav-toggle__item">Menu</span>
            </button>

        </div>
    </div>
</header>

<div class="page">

    <!-- about  -->
    <section class="section" id = "about">
        <div class="container">
            
            <div class="section__header">
                <h3 class="section__suptitle">Welcom to TheCafe ...</h3>
                <!-- <h2 class="section__title">?="$_POST[fname] $_POST[lname]!";?></h2> --> 
                <h2 class="section__title"><?= $_COOKIE['postToReg']; ?></h2>
                <div class="section__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
            </div>
                    
        </div>

        <div class="exit__cookie">
            <a href="exit.php"><button class="exit__button" type="button">Exit</button></a>
        </div>
    </section>

    <!-- footer  -->
    <footer class="footer" id="footer">
        <div class="container">

            <div class="footer__inner">
                <div class="footer__col footer__col--first">
                    <div class="footer__logo">TheCafe</div>
                    <div class="footer__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>

                    <div class="footer__social">
                        <div class="footer__social-header">
                            <b>15k</b> followers
                        </div>
                        <div class="footer__social-content">
                            Follow Us:
                            <a href="#" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fab fa-html5"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fab fa-js"></i>
                            </a>
                        </div>
                    </div>

                    <form class="subscribe" action="./assets/php/reg.php" method="POST">
                        <input class="subscribe__input" type="email" name="footersub" placeholder="Your Email...">
                        <button class="subscribe__button" type="submit">Subscribe</button>

                    </form>
                </div> <!--footer__col-->

                <div class="footer__col footer__col--second">
                    <div class="footer__title">Blogs</div>
                    <div class="blogs">
                        <div class="blogs__item">
                            <img class="blogs__img" src="../images/footer/blogs/1.png" alt="">
                            <div class="blogs__content">
                                <a class="blogs__title" href="#"><p>Lorem ipsum dolor sit amet, consectetur adipiscing</p></a>
                                <div class="blogs__date">
                                    Jan 9, 2016
                                </div>
                            </div>
                        </div>
                        <div class="blogs__item">
                            <img class="blogs__img" src="../images/footer/blogs/2.png" alt="">
                            <div class="blogs__content">
                                <a class="blogs__title" href="#"><p>Consectetur adipiscing elit, sed do eiusmod tempor</p></a>
                                <div class="blogs__date">
                                    Jan 9, 2016
                                </div>
                            </div>
                        </div>
                        <div class="blogs__item">
                            <img class="blogs__img" src="../images/footer/blogs/3.png" alt="">
                            <div class="blogs__content">
                                <a class="blogs__title" href="#"><p>sed do eiusmod tempor 
                                    incididunt ut labore</p></a>
                                <div class="blogs__date">
                                    Jan 9, 2016
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="footer__col footer__col--third">
                    <div class="footer__title">Instagram</div>
                    <div class="instagram">
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/a1.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/b1.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/c1.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/a2.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/b2.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/c2.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/a3.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/b3.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="../images/footer/instagram/c3.png" alt="">
                        </a>
                    </div>
                </div>

            </div> <!--footer__inner-->

        </div> <!--cont-->
    </footer>

</div>









    <script src="https://kit.fontawesome.com/48db125bfd.js" crossorigin="anonymous"></script> <!--fonts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script><!--jquery-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script><!--slider-->
    <!-- <script src="../js/jquery.js"></script> -->
    <!-- <script src="../js/app.js"></script> -->
</body>
</html>