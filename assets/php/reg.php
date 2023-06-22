

<?php

require '../php/DBConnect.php';
$pdo = DBConnect::getConnection();
//$query = "SELECT blogs.`id` AS blogs_id, `title`, `fullblog`, `image`, `day`, `month`, blogers.id AS blogers_id, first_name, last_name
//        FROM `blogs`, blogers
//        WHERE blogers.id = author_id
//        ORDER BY `blogs`.`day` DESC";

DBConnect::d($_POST);
DBConnect::d($_POST);
DBConnect::d($_GET);
DBConnect::d($_COOKIE);
//
//$first_name = htmlspecialchars(trim($_POST['fname']));
//$last_name = htmlspecialchars(trim($_POST['lname']));
//$login = 'Login';
//$avatar_path = 'img';
//$email = htmlspecialchars(trim($_POST['email']));
//$password = htmlspecialchars(trim($_POST['pword']));
//
//// 3. Записываем данные в БД
//$query = "INSERT INTO users VALUES( ?, ?, ?, ?, ?, ?, ? );";
//$result = $pdo->prepare($query);
//$result->execute( [NULL, $first_name, $last_name, $login, $email, $password, $avatar_path] );
//
//// перезагружаем страницу
//
//DBConnect::d($_POST);

//header('Location: ./php/reg.php');
// exit;


if(isset($_COOKIE['postToReg'])) {

    // 1. Экранируем данные < > ' "
    $first_name = htmlspecialchars(trim($_POST['fname']));
    $last_name = htmlspecialchars(trim($_POST['lname']));
    $login = 'Login';
    $avatar_path = 'img';
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['pword']));

// 3. Записываем данные в БД
    $query = "INSERT INTO users VALUES( ?, ?, ?, ?, ?, ?, ? );";
    $result = $pdo->prepare($query);
    $result->execute( [NULL, $first_name, $last_name, $login, $email, $password, $avatar_path] );

    $navlinkreg = '<a class="nav__link" href="./assets/php/reg.php"><b>' . htmlspecialchars(trim($_COOKIE['postToReg'])) . '</b></a>';
    $hidereg = 'class="section section--registration hide"';





} else {
    if($_SERVER['REQUEST_METHOD'] !== 'POST') {

        $hidereg = 'class="section section--registration"';
        $navlinkreg = $_COOKIE['postToReg'] = '<a class="nav__link" href="../../index.php#registration">join us</a>';

    } else {

        $hidereg = 'class="section section--registration hide"';
        $navlinkreg = '<b>' . htmlspecialchars(trim($_COOKIE['postToReg'])) . '</b>';
        $postToReg = htmlspecialchars(trim($_POST['fname'])) . ' ' . htmlspecialchars(trim($_POST['lname']));




        // перезагружаем страницу

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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@400;700&family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
            <a class="header__logo" href="../../index.php">TheCafe</a>
            <nav class="nav" id="nav">
                <!-- <a class="nav__link" href="#" data-scroll="#registration">?=$navlinkreg;?></a> -->
                <?=$navlinkreg;?>
                <a class="nav__link" href="../../index.php#about">about</a>
                <a class="nav__link" href="../../index.php#works">Arts</a>
                <a class="nav__link" href="../../index.php#blog">Blogs</a>
                <a class="nav__link" href="../../index.php#footer">Contact</a>
                <a class="nav__link" href="exit.php"><b>LOGout</b></a>
<!--                <a class="nav__link whatsup" href="https://api.whatsapp.com/send?phone=79168291896">-->
<!--                    <i class="fa-brands fa-whatsapp fa-2xl"></i></a>-->

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


<!-- intro  -->
<div class="intro intro--noback" id="intro">
</div>




<!--    <section class="section" id="blog">-->
<!--            <div class="container">-->
<!---->
<!--                <div class="section__header">-->
<!--                    <h3 class="section__suptitle">Our stories...</h3>-->
<!--                    <h2 class="section__title">Latest blog</h2>-->
<!--                </div>-->


<div class="exit__cookie">
    <a href="exit.php"><button class="exit__button" type="button">Exit</button></a>
</div>
















<script src="https://kit.fontawesome.com/48db125bfd.js" crossorigin="anonymous"></script> <!--fonts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script><!--jquery-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script><!--slider-->
<script src="../js/jquery.js"></script>
<!--                <script src="./assets/js/app.js"></script>-->





</body>
</html>


