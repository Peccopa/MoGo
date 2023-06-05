<?php

/**
 *  1. CREATE - создание таблицы, добавление данных (INSERT)
 *  2. READ - выборка (SELECT) данных из БД и отображение
 *  3. UPDATE - обновление данных в БД
 *  4. DELETE - удаление данных из БД
 *  CRUD
 */

require 'DBConnect.php';
$pdo = DBConnect::getConnection();

//echo '<h1>$_POST</h1>';
//DBConnect::d($_POST);
//echo '<h1>$_FILES</h1>';
//DBConnect::d($_FILES);
//echo '$_GET';
//DBConnect::d($_GET);

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
        header('Location: admin.php');
        // exit;
    }
}

?>
<!doctype html>
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

<section class="section" id="team">
    <div class="container">

        <div class="section__header">
            <h3 class="section__suptitle">What`s going on...</h3>
            <h2 class="section__title">post your story</h2>
            <div class="section__text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>

<section class="section--works story"></section>

<div class="intro intro--noback" id="intro"></div>



<?php
/**
 * создаем таблицу для хранения данных
 * id, category, title, shortblog, fullblog, blogimage, blogday, blogmonth, authorid
 */
$query = "CREATE TABLE IF NOT EXISTS foodblogs(
                    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    category VARCHAR(255) NOT NULL,
                    title VARCHAR(255) NOT NULL,
                    shortblog TEXT NOT NULL,
                    fullblog TEXT NOT NULL,
                    authorid INT NOT NULL,                 
                    blogday VARCHAR(255) NOT NULL,
                    blogmonth VARCHAR(255) NOT NULL,
                    blogimage TEXT NOT NULL
    
                    
                );";
$pdo->exec($query);



/**
 * 2. Если нажата ссылка <a href='?add'>Добавить нового пользователя</a>
 * показываем форму для заполнения
 * id=id, category=category, title=title, shortblog=shortblog, fullblog=fullblog, authorid=authorid, blogimage=blogimage, blogday=, blogmonth=
 */
if(isset($_GET['add'])){
    echo <<<_HTML
                
            <div class="storymenu">  
                <form method="POST" enctype="multipart/form-data">
                    <label>category</label>
                    <input type="text" name="category"><br>
                    
                    <label>title</label>
                    <input type="text" name="title"><br>

                    <label>shortblog</label>
                    <input type="text" name="shortblog"><br>
                                    
                    <label>fullblog</label>
                    <input type="text" name="fullblog"><br>                   
                    
                    <label>authorid</label>
                    <input type="text" name="authorid"><br>
                    
                    <label>blogday</label>
                    <input type="text" name="blogday"><br>
                    
                    <label>blogmonth</label>
                    <input type="text" name="blogmonth"><br>
                    
                    <label>blogimage</label>
                    <input type="file" name="blogimage"><br>  
                    
                    <input type="submit" name="action" value="Создать">                                                
                </form>
            </div>
_HTML;

}

/**
 * 3. Если нажата кнопка name="action" value="Создать"
 * обрабатываем введенные данные
 */
if( isset($_POST['action']) && $_POST['action'] === 'Создать' ){

    // получаем данные о картинке
    $blogimage = $_FILES['blogimage']; // массив

    // проверка на пустые поля
    if( !empty($_POST['category']) &&
        !empty($_POST['title']) &&
        !empty($_POST['shortblog']) &&
        !empty($_POST['fullblog']) &&
        !empty($_POST['authorid']) &&
        !empty($_POST['blogday']) &&
        !empty($_POST['blogmonth']) &&
        $blogimage['size'] !== 0 )
    { // если НЕ пусто, продолжаем
        // экранируем, переносим картинку в папку, заносим данные в БД

        // 1. Экранируем данные < > ' "
        $category = htmlspecialchars(trim($_POST['category']));
        $title = htmlspecialchars(trim($_POST['title']));
        $shortblog = htmlspecialchars(trim($_POST['shortblog']));
        $fullblog = htmlspecialchars(trim($_POST['fullblog']));
        $authorid = htmlspecialchars(trim($_POST['authorid']));
        $blogday = htmlspecialchars(trim($_POST['blogday']));
        $blogmonth = htmlspecialchars(trim($_POST['blogmonth']));

        // 2. Обрабатываем картинку
        // 2.1 Формируем путь к картинке 'images/blogimage.png'
        $blogimage_path = '../images/blogs/'. $blogimage['size'] . '_'. time() .'_' . $blogimage['name'];
        // echo $blogimage_path; // images/97314_1685534255_photo1685362216.jpeg

        // 2.2 Перемещаем картинку в нужную папку
        move_uploaded_file($blogimage['tmp_name'], $blogimage_path);

        // 3. Записываем данные в БД
        $query = "INSERT INTO foodblogs VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ? );";
        $result = $pdo->prepare($query);
        $result->execute( [NULL, $category, $title, $shortblog, $fullblog, $authorid, $blogday, $blogmonth, $blogimage_path] );

        // перезагружаем страницу
        header('Location: admin.php');

    }else{ // если хоть одно поле не заполнено, ошибка.
        echo "<h3 class='error-msg'>Вы не заполнили все поля</h3>";
    }
}


/**
 * Если нажата кнопка  name="action" value="Удалить"
 */
if( isset($_POST['action']) && $_POST['action'] === "Удалить" ){
    // 1. Получаем ID пользователя
    $id = (int)$_POST['id'];

    // 2. Удаляем картинку пользователя
    // 2.1 Получаем по ID ссылку на картинку
    $query = "SELECT blogimage
                      FROM foodblogs
                      WHERE id = ?;";
    $result = $pdo->prepare($query);
    $result->execute([$id]);
    $blogimage_path = $result->fetch()['blogimage']; // string
    //echo $blogimage_path;

    // 2.2 Проверяем, есть ли такая картинка в папке
    if( file_exists($blogimage_path) ){
        // 2.3 Если картинка есть, удаляем
        unlink($blogimage_path);
    }

    // 3. Удаляем пользователя с указанным ID из БД
    $query = "DELETE 
              FROM foodblogs
              WHERE id = ?";
    $result = $pdo->prepare($query);
    $result->execute([$id]);

    // 4. Перезагружаем страницу
    header('Location: admin.php');
}


/**
 * Если нажата кнопка  name="action" value="Изменить"
 */
if( isset($_POST['action']) && $_POST['action'] === "Изменить" ){
    // 1. Получаем ID
    $id = (int)$_POST['id'];

    // 2. Получаем данные о текущем пользователе из БД по ID
    $query = "SELECT id, category, title, shortblog, fullblog, authorid, blogday, blogmonth
                      FROM foodblogs
                      WHERE id = ?";
    $result = $pdo->prepare($query);
    $result->execute([$id]);
    $user = $result->fetch();
    //DBConnect::d($user);

    // 3. Отображаем форму для изменения данных
    echo <<<_HTML
                <h2>Изменение пользователя $user[category] $user[title]</h2>   
                <form method="POST" enctype="multipart/form-data">
                    <label>Имя:</label>
                    <input type="text" name="category" value="$user[category]"><br>
                    
                    <label>Фамилия:</label>
                    <input type="text" name="title" value="$user[title]"><br>

                    <label>Логин:</label>
                    <input type="text" name="shortblog" value="$user[shortblog]"><br>
                    
                    <label>Электронная почта:</label>
                    <input type="text" name="fullblog" value="$user[fullblog]"><br>
                    
                    <label>Электронная почта:</label>
                    <input type="text" name="blogday" value="$user[blogday]"><br>
                    
                    <label>Электронная почта:</label>
                    <input type="text" name="blogmonth" value="$user[blogmonth]"><br>
                    
                    <label>authorID:</label>
                    <input type="text" name="authorid" value="$user[authorid]"><br>
                    
                    <label>Аватар:</label>
                    <input type="file" name="blogimage"><br>  
                    
                    <input type="hidden" name="id" value="$user[id]">
                    <input type="submit" name="action" value="Обновить">                                                
                </form>
_HTML;
}

/**
 * Если нажата кнопка  name="action" value="Обновить"
 * Проверяем переданные данные и обновляем строку с пользователем в БД
 */
if( isset($_POST['action']) && $_POST['action'] === "Обновить" ){

    // проверка на пустые поля
    if( !empty($_POST['category']) &&
        !empty($_POST['title']) &&
        !empty($_POST['shortblog']) &&
        !empty($_POST['fullblog']) &&
        !empty($_POST['blogday']) &&
        !empty($_POST['blogmonth']) &&
        !empty($_POST['authorid']) )
    { // если все поля заполнены

        // 1. Экранируем данные < > ' "
        $category = htmlspecialchars(trim($_POST['category']));
        $title = htmlspecialchars(trim($_POST['title']));
        $shortblog = htmlspecialchars(trim($_POST['shortblog']));
        $blogday = htmlspecialchars(trim($_POST['blogday']));
        $blogmonth = htmlspecialchars(trim($_POST['blogmonth']));
        $fullblog = htmlspecialchars(trim($_POST['fullblog']));
        $authorid = htmlspecialchars(trim($_POST['authorid']));

        // 2. Забираем ID
        $id = (int)$_POST['id'];

        /**
         * 3. работа с новой картинкой
         */
        $blogimage = $_FILES['blogimage'];

        if($blogimage['size'] === 0){ // если новая картинка не передана
            // Обновляем в БД только текстовые данные
            $query = "UPDATE foodblogs
                              SET category = ?, title = ?, shortblog = ?, fullblog = ?, blogday = ?, blogmonth = ?, authorid = ?
                              WHERE id = ?";
            $result = $pdo->prepare($query);
            $result->execute([$category, $title, $shortblog, $blogday, $blogmonth, $fullblog, $authorid, $id]);

        }else{ // если новая картинка передана
            // Формируем путь к новой картинке
            $blogimage_path = '../images/blogs/'. $blogimage['size'] . '_'. time() .'_' . $blogimage['name'];
            // загружаем новую картинку в папку images
            move_uploaded_file($blogimage['tmp_name'], $blogimage_path);

            // удаляем старую картинку
            // 1. получаем ссылку на старую картинку
            $query = "SELECT blogimage FROM foodblogs WHERE id = ?";
            $result = $pdo->prepare($query);
            $result->execute([$id]);
            $del_blogimage_path = $result->fetch()['blogimage'];

            // 2. если картинка есть, удаляем старую картинку
            if(file_exists($del_blogimage_path)){
                unlink($del_blogimage_path);
            }

            // записываем данные в базу включая ссылку на новую картинку
            $query = "UPDATE foodblogs 
                    SET category = ?, title = ?, shortblog = ?, fullblog = ?, blogday = ?, blogmonth = ?, authorid = ?, blogimage = ? 
                    WHERE id = ?";
            $result = $pdo->prepare($query);
            $result->execute([$category, $title, $shortblog, $fullblog, $blogday, $blogmonth, $authorid, $blogimage_path, $id]);

        }

        // 4. Перезагружаем страницу
        header('Location: admin.php');


    }else{ // если хоть одно поле не заполнено, ошибка.
        echo "<h3 class='error-msg'>Вы не заполнили все поля</h3>";
    }
}


/**
 * выводим список пользователей в документ
 */
$query = "SELECT id, category, title, shortblog, fullblog, blogday, blogmonth, authorid, blogimage
		            FROM foodblogs
		            ORDER BY category;";
$result = $pdo->query($query);

//echo "<h2>Список всех пользователей</h2>";

// 1. Ссылка на добавление нового пользователя
//echo "<a href='?add'>Добавить нового пользователя</a>";
echo "<div class='postnewstory'><a href='?add' class='back__button' id='backClick'>POST NEW STORY</a></div>";
// тестовый вывод юзеров
// DBConnect::d( $result->fetchAll() );
// вывод пользователей в документ
echo "<div class='stories__block'>";
while( $user = $result->fetch() ){
    echo <<<_HTML_
                    <div class="stories__col">
                            <img src="$user[blogimage]" alt="$user[category] $user[title]">
                            <p>ID: <span>$user[id]</span></p>
                            <p>CATEGORY: <span>$user[category]</span></p>
                            <p>TITLE: <span>$user[title]</span></p>
                            <p>SHORT TEXT: <span>$user[shortblog]</span></p>
                            <p>FULL TEXT: <span>$user[fullblog]</span></p>
                            <p>DAY: <span>$user[blogday]</span></p>
                            <p>MONTH: <span>$user[blogmonth]</span></p>
                            
                            <form method="POST">
                                <input type="hidden" name="id" value="$user[id]">
                                <input class='back__button' type="submit" name="action" value="Изменить">
                                <input class='back__button' type="submit" name="action" value="Удалить">
    <!--                        <button class='back__button' type="submit" formaction='?add'>add new user</button>-->
                            </form>
                        </div>
_HTML_;
}
echo "</div>";

?>

<script src="https://kit.fontawesome.com/48db125bfd.js" crossorigin="anonymous"></script> <!--fonts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script><!--jquery-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script><!--slider-->
<script src="../js/jquery.js"></script>

</body>
</html>