<?php

function d($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

//require 'DBConnect.php';
require './assets/php/DBConnect.php';
//echo DBConnect::$dbName;
//11
// d($_COOKIE);
// echo $_COOKIE['postToReg'];

$pdo = DBConnect::getConnection();
//d($pdo);
DBConnect::d($pdo);

$query = "SELECT id, first_name, last_name, photo, contact FROM blogers;";
$result = $pdo->query($query, PDO::FETCH_ASSOC);
$db_str = $result->fetch();


DBConnect::d($db_str);






if(isset($_COOKIE['postToReg'])) {
    $navlinkreg = '<a class="nav__link" href="./assets/php/reg.php"><b>' . htmlspecialchars(trim($_COOKIE['postToReg'])) . '</b></a>';
    $hidereg = 'class="section section--registration hide"';
} else {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {

            $hidereg = 'class="section section--registration"';
            $navlinkreg = $_COOKIE['postToReg'] = '<a class="nav__link" href="#" data-scroll="#registration">join us</a>';

        } else {

            $hidereg = 'class="section section--registration hide"';
            $navlinkreg = '<b>' . htmlspecialchars(trim($_COOKIE['postToReg'])) . '</b>';
            $postToReg = htmlspecialchars(trim($_POST['fname'])) . ' ' . htmlspecialchars(trim($_POST['lname']));
            // $postToReg = '111';
            // echo $postToReg;
            // setcookie('postToReg', $postToReg, time() + 60);
            setcookie("postToReg","$postToReg",time()+3600,"/");
            header('Location: ./assets/php/reg.php');
            // exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assets/css/style.css">
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
            <a class="header__logo" href="#" data-scroll="#intro">TheCafe</a>
            <nav class="nav" id="nav">
                <!-- <a class="nav__link" href="#" data-scroll="#registration">?=$navlinkreg;?></a> -->
                <?=$navlinkreg;?>
                <a class="nav__link" href="#" data-scroll="#about">about</a>
                <a class="nav__link" href="#" data-scroll="#works">Arts</a>
                <a class="nav__link" href="#" data-scroll="#blog">Blogs</a>
                <a class="nav__link" href="#" data-scroll="#footer">Contact</a>
                <!-- <a class="nav__link" href="#" data-scroll="#footer">log in</a> -->
                <a class="nav__link whatsup" href="https://api.whatsapp.com/send?phone=79168291896">
                <i class="fa-brands fa-whatsapp fa-2xl"></i></a>
                
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

    <!-- intro  -->
    <div class="intro" id="intro">

        <div class="container">
            <div class="intro__inner">
            <p class="intro__suptitle">#aCupToGo</p>
            <h1 class="intro__title">Welcome to TheCafe</h1>
            <a class="btn" href="#" data-scroll="#works">show me more</a>
            </div>
        </div>

        <div class="slider">
            <div class="container">
                <div class="slider__inner">
                    <a class="slider__item" id="inner_btn1" href="#">
                        <span class="slider__num">#</span>
                        <span class="slider__text">pure</span>
                    </a>
                    <a class="slider__item" id="inner_btn2" href="#">
                        <span class="slider__num">#</span>
                        <span class="slider__text">cozy</span>
                    </a>
                    <a class="slider__item" id="inner_btn3" href="#">
                        <span class="slider__num">#</span>
                        <span class="slider__text">sweet</span>
                    </a>
                    <a class="slider__item" id="inner_btn4" href="#">
                        <span class="slider__num">#</span>
                        <span class="slider__text">pleasure</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- about  -->
    <section class="section" id = "about">
        <div class="container">
            
            <div class="section__header">
                <h3 class="section__suptitle">What we do...</h3>
                <h2 class="section__title">Story about us</h2>
                <div class="section__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
            </div>

            <div class="card">
                <div class="card__item">
                    <div class="card__inner">
                        <div class="card__img"><img src="./assets/images/about/1.jpg" alt=""></div>
                        <div class="card__icon"><i class="fa-solid fa-umbrella"></i></div>
                        <div class="card__text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, non! </div>
                    </div>
                </div>
                <div class="card__item">
                    <div class="card__inner">
                        <div class="card__img"><img src="assets/images/about/2.jpg" alt=""></div>
                        <div class="card__icon"><i class="fa-solid fa-couch"></i></div>
                        <div class="card__text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, delectus? </div>
                    </div>
                </div>
                <div class="card__item">
                    <div class="card__inner">
                        <div class="card__img"><img src="assets/images/about/3.jpg" alt=""></div>
                        <div class="card__icon"><i class="fa-solid fa-mug-hot"></i></div>                
                        <div class="card__text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, vitae. </div>
                    </div>
                </div>
            </div>
        
        </div>
    </section>

    <!-- statistics  -->
    <div class="statistics" id="statistics">
        <div class="container">
            <div class="stat">
                <div class="stat__item"> <!--вставить скрипт счётчика (тупо таймер для визуализации часы/минуты/секунды)-->
                    <div class="stat__count"><?= mt_rand(1, 20); ?></div>
                    <div class="stat__text">art projects</div>
                </div>
                <div class="stat__item">
                    <div class="stat__count"><?= mt_rand(100, 200); ?></div>
                    <div class="stat__text">happy client</div>
                </div>
                <div class="stat__item">
                    <div class="stat__count"><?= mt_rand(5, 15); ?></div>
                    <div class="stat__text">award winner</div>
                </div>
                <div class="stat__item">
                    <div class="stat__count"><?= mt_rand(800, 999); ?></div>
                    <div class="stat__text">cup of coffee</div>
                </div>
                <div class="stat__item">
                    <div class="stat__count"><?= mt_rand(20, 30); ?></div>
                    <div class="stat__text">club members</div>
                </div>
            </div>

        </div>
    </div>

    <!-- services  -->
    <section class="section" id="services">
        <div class="container">
            
            <div class="section__header">
                <h3 class="section__suptitle">We work with...</h3>
                <h2 class="section__title">Amazing Services</h2>
            </div>

            <div class="services">
                <div class="services__item  services__item--border">
                    <!-- <img class="services__icon" src="./assets/images/servises/photography.png" alt=""> -->
                    <div class="services__icon"><i class="fa-solid fa-mug-hot"></i></i></div>
                    <div class="services__title">consectetur</div>
                    <div class="services__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</div>
                </div>
                <div class="services__item  services__item--border">
                    <!-- <img class="services__icon" src="./assets/images/servises/webdesign.png" alt=""> -->
                    <div class="services__icon"><i class="fa-solid fa-couch"></i></i></div>
                    <div class="services__title">eiusmod tempor</div>
                    <div class="services__text">Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</div>
                </div>
                <div class="services__item  services__item--border">
                    <!-- <img class="services__icon" src="./assets/images/servises/creativity.png" alt=""> -->
                    <div class="services__icon"><i class="fa-solid fa-book-open"></i></i></div>
                    <div class="services__title">adipiscing elit</div>
                    <div class="services__text">Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</div>
                </div>
                <div class="services__item">
                    <!-- <img class="services__icon" src="./assets/images/servises/seo.png" alt=""> -->
                    <div class="services__icon"><i class="fa-solid fa-utensils"></i></div>
                    <div class="services__title">sit amet</div>
                    <div class="services__text">Ipsum dolor , consectetur adipiscing elit, sed do eiusmod.</div>
                </div>
                <div class="services__item">
                    <!-- <img class="services__icon" src="./assets/images/servises/csshtml.png" alt=""> -->
                    <div class="services__icon"><i class="fa-solid fa-plate-wheat"></i></div>
                    <div class="services__title">sed do tempor</div>
                    <div class="services__text">Lorem dolor sit amet, consectetur adipiscing elit, sed do tempor.</div>
                </div>
                <div class="services__item">
                    <!-- <img class="services__icon" src="./assets/images/servises/digital.png" alt=""> -->
                    <div class="services__icon"><i class="fa-solid fa-camera"></i></div>
                    <div class="services__title">adipiscing</div>
                    <div class="services__text">Sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</div>
                </div>
            </div>

            <!-- <hr>

            <div class="services">
                
            </div> -->
        
        </div>
    </section>

    <!-- devices  -->
    <section class="section section--devices" id="devices">
        <div class="container">

            <div class="section__header">
                <h3 class="section__suptitle">For all devices...</h3>
                <h2 class="section__title">we are everywhere</h2>
            </div>
            
            <div class="devices">
                <img class="devices__item" src="assets/images/devices/ipad.png" alt="">
                <img class="devices__item devices__item--iphone" src="assets/images/devices/iphone.png" alt="">
            </div>

        </div>
    </section>

    <!-- wedo  -->
    <section class="section" id="wedo">
        <div class="container">
            
            <div class="section__header">
                <h3 class="section__suptitle">Service...</h3>
                <h2 class="section__title">what we do</h2>
                <div class="section__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>

            <div class="wedo">
                <div class="wedo__item">
                    <!-- <img src="http://placehold.it/570x830" alt=""> -->
                    <img class="wedo__img" src="./assets/images/wedo/wedo_bg.jpg" alt="">
                </div>
                <div class="wedo__item">
                    <div class="accordion">

                        <div class="accordion__item" data-collapse="#wedo_1">
                            <div class="accordion__header">
                                <img class="accordion__icon" src="./assets/images/wedo/photography.png" alt="">
                                <div class="accordion__title">consectetur</div>
                            </div>
                            <div class="accordion__content" id="wedo_1"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div> <!-- accordion__item -->

                        <div class="accordion__item active" data-collapse="#wedo_2">
                            <div class="accordion__header">
                                <img class="accordion__icon" src="./assets/images/wedo/creativity.png" alt="">
                                <div class="accordion__title">sit amet</div>
                            </div>
                            <div class="accordion__content" id="wedo_2"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div> <!-- accordion__item -->

                        <div class="accordion__item" data-collapse="#wedo_3">
                            <div class="accordion__header">
                                <img class="accordion__icon" src="./assets/images/wedo/webdesign.png" alt="">
                                <div class="accordion__title">adipiscing</div>
                            </div>
                            <div class="accordion__content" id="wedo_3"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div> <!-- accordion__item -->

                    </div> <!-- accordion -->
                </div> <!-- wedo__item -->
            </div> <!-- wedo -->

        </div>
    </section>

    <!-- reviews1  -->
    <div class="section section--grey"><!--секция без заголовка (div вместо section)-->
        <div class="container">
            
            <div class="reviews">
                <!-- <a class="reviews__btn reviews__btn--prev" href="#">Prev</a> -->
                <!-- <a class="reviews__btn reviews__btn--next" href="#">Next</a> -->

                <div data-slider>
                    <div>
                        <div class="reviews__item">
                            <img class="reviews__photo" src="./assets/images/reviews/reviews_icon.png" alt="">
                            <div class="reviews__text"><p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.”</p></div>
                            <div class="reviews__author">Jon Doe</div>
                        </div>
                    </div>

                    <div>
                        <div class="reviews__item">                     
                            <img class="reviews__photo" src="./assets/images/reviews/reviews_icon.png" alt="">
                            <div class="reviews__text"><p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.”</p></div>
                            <div class="reviews__author">Jon Doe</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- team  -->
    <section class="section" id="team">
        <div class="container">

            <div class="section__header">
                <h3 class="section__suptitle">Who we are</h3>
                <h2 class="section__title">Meet our team</h2>
                <div class="section__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
            </div>

            <div class="card">


                <div class="card__item">
                    <div class="card__inner">
                    <div class="card__img"><img src="<?=$db_str['photo'];?>" alt=""></div>
                        <div class="card__text">
                            <div class="social">
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                                </a>                        
                            </div>
                        </div>
                    </div>
                    <div class="card__info">
<!--                        <div class="card__name">Sandra Dix</div>-->
<!--                        <div class="card__prof">Barista</div>-->
                        <div class="card__name"><?=$db_str['first_name'];?> <?=$db_str['last_name'];?></div>
                        <div class="card__prof"><?=$db_str['contact'];?></div>
                    </div>
                </div>


                <div class="card__item">
                    <div class="card__inner">
                    <div class="card__img"><img src="assets/images/ourteam/campbell.jpg" alt=""></div>
                        <div class="card__text">
                            <div class="social">
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                                </a>                        
                            </div>
                        </div>
                    </div>
                    <div class="card__info">
                        <div class="card__name">Christopher Campbell</div>
                        <div class="card__prof">Client Manager</div>
                    </div>
                </div>


                <div class="card__item">
                    <div class="card__inner">
                    <div class="card__img"><img src="assets/images/ourteam/fertig.jpg" alt=""></div>
                            <div class="card__text">
                                <div class="social">
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                                </a>
                                <a class="social__item" href="#" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                                </a>                        
                            </div>
                        </div>
                    </div>
                    <div class="card__info">
                        <div class="card__name">Michael Fertig</div>
                        <div class="card__prof">Pastry Chef</div>
                    </div>
                </div>


            </div> <!--card-->
        </div> <!--cont-->
    </section>

    <!-- logos  -->
    <div class="section section--grey" id="logos">
        <div class="container">
            <div class="logos">
                <div class="logos__item">
                    <img class="logos__img" src="./assets/images/logos/01.png" alt="">
                </div>
                <div class="logos__item">
                    <img class="logos__img" src="./assets/images/logos/02.png" alt="">
                </div>
                <div class="logos__item">
                    <img class="logos__img" src="./assets/images/logos/03.png" alt="">
                </div>
                <div class="logos__item">
                    <img class="logos__img" src="./assets/images/logos/04.png" alt="">
                </div>
                <div class="logos__item">
                    <img class="logos__img" src="./assets/images/logos/05.png" alt="">
                </div>
                <div class="logos__item">
                    <img class="logos__img" src="./assets/images/logos/06.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- works  -->
    <section class="section" id="works">
        <div class="container">
            <div class="section__header">
                <h3 class="section__suptitle">What we do...</h3>
                <h2 class="section__title">some of our arts</h2>
                <div class="section__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
            </div>
        </div>

        <div class="works"> <!--вне контейнера-->
            <div class="works__col">
            <a href="./assets/php/arts.php"><div class="works__item">
                <img class="works__image" src="./assets/images/works/a1.jpg" alt="">
                    <div class="works__info">
                        <div class="works__icon">
                        <img src="./assets/images/works/worksIcon.png" alt="">
                        </div>
                        <div class="works__title">adipisicing elit</div>
                        <div class="works__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum saepe dolores blanditiis fugiat nesciunt quibusdam?</div>
                    </div>
                </div></a>
                <div class="works__item">
                    <img class="works__image" src="./assets/images/works/a2.jpg" alt="">
                    <div class="works__info">
                        <div class="works__icon">
                            <img src="./assets/images/works/worksIcon.png" alt="">
                        </div>
                        <div class="works__title">dolor sit amet</div>
                        <div class="works__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam.</div>
                    </div>
                </div>
            </div>
            <div class="works__col">
                <div class="works__item">
                    <img class="works__image" src="./assets/images/works/b1.jpg" alt="">
                    <div class="works__info">
                        <div class="works__icon">
                            <img src="./assets/images/works/worksIcon.png" alt="">
                        </div>
                        <div class="works__title">Necessitatibus</div>
                        <div class="works__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, pariatur nostrum!</div>
                    </div>
                </div>
                <div class="works__item">
                    <img class="works__image" src="./assets/images/works/b2.jpg" alt="">
                    <div class="works__info">
                        <div class="works__icon">
                            <img src="./assets/images/works/worksIcon.png" alt="">
                        </div>
                        <div class="works__title">Mollitia fugiat</div>
                        <div class="works__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia fugiat accusantium assumenda minima suscipit aperiam laudantium odio? Ratione, cum veritatis?</div>
                    </div>
                </div>
            </div>
            <div class="works__col">
                <div class="works__item">
                    <img class="works__image" src="./assets/images/works/c1.jpg" alt="">
                    <div class="works__info">
                        <div class="works__icon">
                            <img src="./assets/images/works/worksIcon.png" alt="">
                        </div>
                        <div class="works__title">vitae mo</div>
                        <div class="works__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores aperiam, vitae molestiae quasi in minus officia?</div>
                    </div>
                </div>
            </div>
            <div class="works__col">
                <div class="works__item">
                    <img class="works__image" src="./assets/images/works/d1.jpg" alt="">
                    <div class="works__info">
                        <div class="works__icon">
                            <img src="./assets/images/works/worksIcon.png" alt="">
                        </div>
                        <div class="works__title">sit amet consectetur</div>
                        <div class="works__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                </div>
                <div class="works__item">
                    <img class="works__image" src="./assets/images/works/d2.jpg" alt="">
                    <div class="works__info">
                        <div class="works__icon">
                            <img src="./assets/images/works/worksIcon.png" alt="">
                        </div>
                        <div class="works__title">ipsum dolor sit</div>
                        <div class="works__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod assumenda quia illum, excepturi soluta in, corrupti necessitatibus qui placeat, tempore aspernatur repellat possimus. Odit, cumque.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- registration  -->
    <section <?=$hidereg?> id="registration">
        <div class="container">
            
            <div class="section__header">
                <h3 class="section__suptitle">Join Us Now ...</h3>
                <h2 class="section__title">registration</h2>
                <div class="section__text"><p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum illo laboriosam dicta maiores cumque atque tempora repellat! Nemo sunt tempore corporis, eligendi assumenda aliquam totam, consequuntur ipsum qui sed quam dolor aperiam dolorem nesciunt sequi odio magni optio tenetur suscipit, fuga nam deleniti iste. Itaque corporis vel rem aspernatur aliquid! </p></div>
            </div>

            <div class="reg__form">
                <!-- <form class="method__POST" action="./assets/php/reg.php" method="POST"> -->
                <form class="method__POST" action="" method="POST">

                    <div class="reg__item">    
                        <img class="reg__img" src="" alt="">                        
                        <input class="reg__input" type="text" name="fname" id="fname" placeholder="First Name">
                        <span class="reg__span" id="fname-p"></span>
                    </div>

                    <div class="reg__item">    
                        <img class="reg__img" src="" alt="">
                        <input class="reg__input" type="text" name="lname" id="lname" placeholder="Last Name ">
                        <span class="reg__span" id="lname-p"></span>
                    </div>

                    <div class="reg__item">    
                        <img class="reg__img" src="" alt="">
                        <input class="reg__input" type="email" name="email" id="email" placeholder="E-mail">
                        <span class="reg__span" id="email-p"></span>
                    </div>

                    <div class="reg__item">    
                        <img class="reg__img" src="" alt="">
                        <input class="reg__input" type="password" name="pword" id="pword" placeholder="Password">
                        <span class="reg__span" id="pword-p"></span>
                    </div>

                    <div class="reg__item">    
                        <!-- <img class="reg__img" src="" alt=""> -->
                        <button class="reg__button" type="submit" id="btnClick">Registration</button>
                        <div class="login__button" id="loginClick">log in</div>
                        <!-- <button class="login__button" type="button" id="loginClick">log in</button> -->
                        <!-- <span class="reg__span" id="button-p"></span> -->
                    </div>

                    <!-- <div class="reg__item">    
                        <img class="reg__img" src="" alt="">
                        <button class="reg__button" type="submit" id="btnClick">just let me in</button>
                        <span class="reg__span" id="button-p"></span>
                    </div> -->

                

                </form>  
            </div>

        </div>
    </section>

    <!-- reviews2  -->
    <div class="section section--reviews2" id="reviews2">
        <div class="container">
            
            <div class="reviews">
                <!-- <a class="reviews__btn reviews__btn--prev" href="#">Prev</a> -->
                <!-- <a class="reviews__btn reviews__btn--next" href="#">Next</a> -->
                <div data-slider>

                    <div>
                        <div class="reviews__item">
                            <!-- <img class="reviews__photo" src="http://placehold.it/145" alt=""> -->
                            <img class="reviews__photo" src="./assets/images/reviews/user0.png" alt="">
                            <div class="reviews__text"><p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.”</p></div>
                            <div class="reviews__author">Joshua Earle</div>
                        </div>
                    </div>

                    <div>
                        <div class="reviews__item">
                            <!-- <img class="reviews__photo" src="http://placehold.it/145" alt=""> -->
                            <img class="reviews__photo" src="./assets/images/reviews/user0.png" alt="">
                            <div class="reviews__text"><p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.”</p></div>
                            <div class="reviews__author">Joshua Earle</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- clients  -->
    <section class="section section--clients" id="clients">
        <div class="container">

            <div class="section__header">
                <h3 class="section__suptitle">Happy Clients</h3>
                <h2 class="section__title">What people say</h2>
            </div>

            <div class="clients">
                <div class="clients__item">
                    <img class="clients__photo" src="./assets/images/clients/1.png" alt="">
                    <div class="clients__content">
                        <div class="clients__name">Matthew Dix</div>
                        <div class="clients__prof">Graphic Design</div>
                        <div class="clients__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim!</p></div>
                    </div>
                </div>
                <div class="clients__item">
                    <img class="clients__photo" src="./assets/images/clients/2.png" alt="">
                    <div class="clients__content">
                        <div class="clients__name">Nick Karvounis</div>
                        <div class="clients__prof">Graphic Design</div>
                        <div class="clients__text"><p>Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p></div>
                    </div>
                </div>
                <div class="clients__item">
                    <img class="clients__photo" src="./assets/images/clients/3.png" alt="">
                    <div class="clients__content">
                        <div class="clients__name">Jaelynn Castillo</div>
                        <div class="clients__prof">Graphic Design</div>
                        <div class="clients__text"><p>Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p></div>
                    </div>
                </div>
                <div class="clients__item">
                    <img class="clients__photo" src="./assets/images/clients/4.png" alt="">
                    <div class="clients__content">
                        <div class="clients__name">Mike Petrucci</div>
                        <div class="clients__prof">Graphic Design</div>
                        <div class="clients__text"><p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim!</p></div>
                    </div>
                </div>
            </div>


        </div> <!--cont-->
    </section>

    <!-- blog  -->
    <section class="section" id="blog">
        <div class="container">

            <div class="section__header">
                <h3 class="section__suptitle">Our stories...</h3>
                <h2 class="section__title">Latest blog</h2>
            </div>

            <div class="blog">

                <div class="blog__item">
                    <div class="blog__header">
                        <a href="./assets/php/blogs.php?id=1">
                            <img class="blog__photo" src="./assets/images/blog/1.jpg" alt="">
                        </a>
                    <div class="blog__date">
                            <div class="blog__date-day">15</div>
                            <div class="blog__date-month">Jan</div>
                    </div>
                    </div>
                    <div class="blog__content">
                        <div class="blog__title">
                            <a href="./assets/php/blogs.php?id=1">Lorem ipsum dolor sit amet</a>
                        </div>
                        <div class="blog__text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    <div class="blog__footer">
                        <div class="blog-stat">
                            <span class="blog-stat__item">
                                <i class="fa-solid fa-eye"></i>542</span>
                            <span class="blog-stat__item">
                                <i class="fa-solid fa-comment-dots"></i>17</span>
                        </div>
                    </div>
                </div>
                <div class="blog__item">
                    <div class="blog__header">
                        <a href="./assets/php/blogs.php?id=2">
                            <img class="blog__photo" src="./assets/images/blog/2.jpg" alt="">
                        </a>
                    <div class="blog__date">
                            <div class="blog__date-day">14</div>
                            <div class="blog__date-month">Jan</div>
                    </div>
                    </div>
                    <div class="blog__content">
                        <div class="blog__title">
                            <a href="./assets/php/blogs.php?id=2">sed do eiusmod tempor</a>
                        </div>
                        <div class="blog__text">Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    <div class="blog__footer">
                        <div class="blog-stat">
                            <span class="blog-stat__item">
                                <i class="fa-solid fa-eye"></i>992</span>
                            <span class="blog-stat__item">
                                <i class="fa-solid fa-comment-dots"></i>42</span>
                        </div>
                    </div>
                </div>
                <div class="blog__item">
                    <div class="blog__header">
                        <a href="./assets/php/blogs.php?id=3">
                            <img class="blog__photo" src="./assets/images/blog/3.jpg" alt="">
                        </a>
                    <div class="blog__date">
                            <div class="blog__date-day">12</div>
                            <div class="blog__date-month">Jan</div>
                    </div>
                    </div>
                    <div class="blog__content">
                        <div class="blog__title">
                            <a href="./assets/php/blogs.php?id=3">incididunt ut labore et dolore</a>
                        </div>
                        <div class="blog__text">Elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    <div class="blog__footer">
                        <div class="blog-stat">
                            <span class="blog-stat__item">
                                <i class="fa-solid fa-eye"></i>1560</span>
                            <span class="blog-stat__item">
                                <i class="fa-solid fa-comment-dots"></i>98</span>
                        </div>
                    </div>
                </div>

            </div> 

        </div>
    </section>

    <!-- map  -->
    <section class="section  section--map" id="map">
        <div class="container">
            <div class="map">    
                <h2 class="map__title">
                    <div><i class="fa-solid fa-location-dot"></i></div>
                    <a href="https://yandex.ru/maps/-/CCUkVQcODA" target="_blank" >Open Map</a>
                </h2>
            </div>
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
                            <img class="blogs__img" src="./assets/images/footer/blogs/1.png" alt="">
                            <div class="blogs__content">
                                <a class="blogs__title" href="./assets/php/arts.php"><p>Lorem ipsum dolor sit amet, consectetur adipiscing</p></a>
                                <div class="blogs__date">
                                    Jan 9, 2016
                                </div>
                            </div>
                        </div>
                        <div class="blogs__item">
                            <img class="blogs__img" src="./assets/images/footer/blogs/2.png" alt="">
                            <div class="blogs__content">
                                <a class="blogs__title" href="./assets/php/arts.php"><p>Consectetur adipiscing elit, sed do eiusmod tempor</p></a>
                                <div class="blogs__date">
                                    Jan 9, 2016
                                </div>
                            </div>
                        </div>
                        <div class="blogs__item">
                            <img class="blogs__img" src="./assets/images/footer/blogs/3.png" alt="">
                            <div class="blogs__content">
                                <a class="blogs__title" href="./assets/php/arts.php"><p>sed do eiusmod tempor 
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
                            <img src="./assets/images/footer/instagram/a1.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="./assets/images/footer/instagram/b1.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="./assets/images/footer/instagram/c1.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="./assets/images/footer/instagram/a2.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="./assets/images/footer/instagram/b2.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="./assets/images/footer/instagram/c2.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="./assets/images/footer/instagram/a3.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="./assets/images/footer/instagram/b3.png" alt="">
                        </a>
                        <a class="instagram__item" href="#" target="_blank">
                            <img src="./assets/images/footer/instagram/c3.png" alt="">
                        </a>
                    </div>
                </div>

            </div> <!--footer__inner-->

                </div>        
                    <div class="copyright">
                        © 2016 MoGo free PSD template by <span>Laaqiq</span>
                    </div>
                    <div class="date_now"><?=date(DATE_RSS)?></div>
                </div>

        </div> <!--cont-->
    </footer>

</div>


    <script src="https://kit.fontawesome.com/48db125bfd.js" crossorigin="anonymous"></script> <!--fonts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script><!--jquery-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script><!--slider-->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/app.js"></script>
</body>
</html>
