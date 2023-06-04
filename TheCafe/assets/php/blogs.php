<?php

require '../php/DBConnect.php';
$pdo = DBConnect::getConnection();
$query = "SELECT blogs.`id` AS blogs_id, `title`, `full`, `image`, `day`, `month`, blogers.id AS blogers_id, first_name, last_name 
        FROM `blogs`, blogers 
        WHERE blogers.id = author_id 
        ORDER BY `blogs`.`day` DESC";
$result = $pdo->query($query);
$blogs = $result->fetchAll();
$blogId = (int)$_GET['id'];
$blog = $blogs[$blogId -1];
//DBConnect::d($blogs);




//function d($arr) {
//    echo '<pre>';
//    print_r($arr);
//    echo '</pre>';
//}
//
//d($pdo);

//$blogs = [
//    ['id' => 1, 'day' => '111', 'month' => '111', 'photo' => './assets/images/blog/test.png', 'title' => 'Lorem', 'text' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты). '],
//    ['id' => 2, 'day' => '222', 'month' => '222', 'photo' => './assets/images/blog/test.png', 'title' => 'asdfsadfs', 'text' => 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или "невозможных" слов.'],
//    ['id' => 3, 'day' => '333', 'month' => '333', 'photo' => './assets/images/blog/test.png', 'title' => 'asdfsadfs', 'text' => 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, "consectetur", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги "de Finibus Bonorum et Malorum" ("О пределах добра и зла"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, "Lorem ipsum dolor sit amet..", происходит от одной из строк в разделе 1.10.32'],
//    ['id' => 4, 'day' => '444', 'month' => '444', 'photo' => './assets/images/blog/test.png', 'title' => 'asdfsadfs', 'text' => 'sdafwfwefsaefawes'],
//];

//$blogId = (int)$_GET['id'];
//$blog = $blogs[$blogId -1];


if(isset($_COOKIE['postToReg'])) {
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


<!-- intro  -->
<div class="intro intro--noback" id="intro">
<!---->
<!--    <div class="container">-->
<!--        <div class="intro__inner">-->
<!--            <p class="intro__suptitle">#aCupToGo</p>-->
<!--            <h1 class="intro__title">Welcome to TheCafe</h1>-->
<!--            <a class="btn" href="#" data-scroll="#works">show me more</a>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="slider">-->
<!--        <div class="container">-->
<!--            <div class="slider__inner">-->
<!--                <a class="slider__item" id="inner_btn1" href="#">-->
<!--                    <span class="slider__num">#</span>-->
<!--                    <span class="slider__text">pure</span>-->
<!--                </a>-->
<!--                <a class="slider__item" id="inner_btn2" href="#">-->
<!--                    <span class="slider__num">#</span>-->
<!--                    <span class="slider__text">cozy</span>-->
<!--                </a>-->
<!--                <a class="slider__item" id="inner_btn3" href="#">-->
<!--                    <span class="slider__num">#</span>-->
<!--                    <span class="slider__text">sweet</span>-->
<!--                </a>-->
<!--                <a class="slider__item" id="inner_btn4" href="#">-->
<!--                    <span class="slider__num">#</span>-->
<!--                    <span class="slider__text">pleasure</span>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
</div>




<!--    <section class="section" id="blog">-->
<!--            <div class="container">-->
<!---->
<!--                <div class="section__header">-->
<!--                    <h3 class="section__suptitle">Our stories...</h3>-->
<!--                    <h2 class="section__title">Latest blog</h2>-->
<!--                </div>-->


                <section class="section" id="blog">
                    <div class="container">

                        <div class="section__header">
                            <h3 class="section__suptitle">Our stories...</h3>
                            <h2 class="section__title">Latest blog</h2>
                        </div>




                        <div class="blog blog--opened">

                            <div class="blog__item blog__item--opened">

                                <div class="blog__header blog__header--opened">

                                    <div class="blog__inner--opened">
                                    <a class="blog__img--opened" href="./assets/php/blogs.php?id=1">
<!--                                        <img class="blog__photo blog__photo--active" src="../images/blog/11.jpg" alt=""></a>-->
                                        <img class="blog__photo blog__photo--active" src="../images/blog/<?=$blog['image']?>" alt=""></a>

                                    <div class="blog__date blog__date--opened">
                                        <div class="blog__date-day blog__date-day--opened"><?=$blog['day']?></div>
                                        <div class="blog__date-month blog__date-month--opened"><?=$blog['month']?></div>
                                    </div>
                                    </div>




                                <div class="blog__photo--under">
                                        <div class="blog__footer">
                                        <div class="blog-stat">
                                        <span class="blog-stat__item">
                                        <i class="fa-solid fa-eye"></i>542</span>
                                            <span class="blog-stat__item">
                                        <i class="fa-solid fa-comment-dots"></i>17</span>
                                        </div>
                                        </div>

                                        <div class="blog__author">
                                            <b>Author: </b><a href="../../index.php#team"><?=$blog['first_name']?> <?=$blog['last_name']?></a>
                                        </div>




                                </div>

                                    <div class="footer__col footer__col--second--blogs">

                                        <div class="blogs__blogs">
                                            <div class="blogs__item">
                                                <img class="blogs__img" src="../images/footer/blogs/1.png" alt="">
                                                <div class="blogs__content">
                                                    <a class="blogs__title" href="../php/arts.php"><p>Lorem ipsum dolor sit amet, consectetur adipiscing</p></a>
                                                    <div class="blogs__date">
                                                        Jan 9, 2016
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blogs__item">
                                                <img class="blogs__img" src="../images/footer/blogs/2.png" alt="">
                                                <div class="blogs__content">
                                                    <a class="blogs__title" href="../php/arts.php"><p>Consectetur adipiscing elit, sed do eiusmod tempor</p></a>
                                                    <div class="blogs__date">
                                                        Jan 9, 2016
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blogs__item">
                                                <img class="blogs__img" src="../images/footer/blogs/3.png" alt="">
                                                <div class="blogs__content">
                                                    <a class="blogs__title" href="../php/arts.php"><p>sed do eiusmod tempor
                                                            incididunt ut labore</p></a>
                                                    <div class="blogs__date">
                                                        Jan 9, 2016
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="blog__content blog__content--opened">
                                    <div class="blog__title blog__title--opened">
                                        <a href="./assets/php/blogs.php?id=1"><?=$blog['title']?></a>
                                    </div>
                                    <p class="blog__text blog__text--opened"><?=$blog['full'] = str_replace("\r\n\r\n",'<br><br>', $blog['full'])?></p>
                                </div>
                            </div>
                            <a href="../../index.php#blog" class="back__button" id="backClick">back to blogs</a>
                            <a href="../php/admin.php" class="back__button" id="backClick">add news</a>
                        </div>
                    </div>

                </section>





    <div class="blog">

<!--        <h2>Date: --><?//=$blog['month']?><!-- --><?//=$blog['day']?><!--</h2>-->
<!--        <h3>Date: --><?//=$blog['photo']?><!-- --><?//=$blog['title']?><!--</h3>-->
<!--        <p>Date: --><?//=$blog['text']?><!--</p>-->


    </div>




                <script src="https://kit.fontawesome.com/48db125bfd.js" crossorigin="anonymous"></script> <!--fonts-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script><!--jquery-->
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script><!--slider-->
                <script src="../js/jquery.js"></script>
<!--                <script src="./assets/js/app.js"></script>-->





</body>
</html>