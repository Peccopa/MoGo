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

<div class="intro intro--noback" id="intro"></div>


<h1>Работа с сотрудниками</h1>
<?php
/**
 * создаем таблицу для хранения данных
 * id, first_name, last_name, login, email, password, avatar
 */
$query = "CREATE TABLE IF NOT EXISTS users(
                    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    first_name VARCHAR(255) NOT NULL,
                    last_name VARCHAR(255) NOT NULL,
                    login VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    password VARCHAR(255) NOT NULL,
                    avatar TEXT NOT NULL
                );";
$pdo->exec($query);

/**
 * 2. Если нажата ссылка <a href='?add'>Добавить нового пользователя</a>
 * показываем форму для заполнения
 * id, first_name, last_name, login, email, password, avatar
 */
if(isset($_GET['add'])){
    echo <<<_HTML
                <h2>Добавление нового пользователя</h2>   
                <form method="POST" enctype="multipart/form-data">
                    <label>Имя:</label>
                    <input type="text" name="first_name"><br>
                    
                    <label>Фамилия:</label>
                    <input type="text" name="last_name"><br>

                    <label>Логин:</label>
                    <input type="text" name="login"><br>
                    
                    <label>Электронная почта:</label>
                    <input type="email" name="email"><br>
                    
                    <label>Пароль:</label>
                    <input type="password" name="password"><br>
                    
                    <label>Аватар:</label>
                    <input type="file" name="avatar"><br>  
                    
                    <input type="submit" name="action" value="Создать">                                                
                </form>
_HTML;

}

/**
 * 3. Если нажата кнопка name="action" value="Создать"
 * обрабатываем введенные данные
 */
if( isset($_POST['action']) && $_POST['action'] === 'Создать' ){

    // получаем данные о картинке
    $avatar = $_FILES['avatar']; // массив

    // проверка на пустые поля
    if( !empty($_POST['first_name']) &&
        !empty($_POST['last_name']) &&
        !empty($_POST['login']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password']) &&
        $avatar['size'] !== 0 )
    { // если НЕ пусто, продолжаем
        // экранируем, переносим картинку в папку, заносим данные в БД

        // 1. Экранируем данные < > ' "
        $first_name = htmlspecialchars(trim($_POST['first_name']));
        $last_name = htmlspecialchars(trim($_POST['last_name']));
        $login = htmlspecialchars(trim($_POST['login']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        // 2. Обрабатываем картинку
        // 2.1 Формируем путь к картинке 'images/avatar.png'
        $avatar_path = '../images/users/'. $avatar['size'] . '_'. time() .'_' . $avatar['name'];
        // echo $avatar_path; // images/97314_1685534255_photo1685362216.jpeg

        // 2.2 Перемещаем картинку в нужную папку
        move_uploaded_file($avatar['tmp_name'], $avatar_path);

        // 3. Записываем данные в БД
        $query = "INSERT INTO users VALUES( ?, ?, ?, ?, ?, ?, ? );";
        $result = $pdo->prepare($query);
        $result->execute( [NULL, $first_name, $last_name, $login, $email, $password, $avatar_path] );

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
    $query = "SELECT avatar
                      FROM users
                      WHERE id = ?;";
    $result = $pdo->prepare($query);
    $result->execute([$id]);
    $avatar_path = $result->fetch()['avatar']; // string
    //echo $avatar_path;

    // 2.2 Проверяем, есть ли такая картинка в папке
    if( file_exists($avatar_path) ){
        // 2.3 Если картинка есть, удаляем
        unlink($avatar_path);
    }

    // 3. Удаляем пользователя с указанным ID из БД
    $query = "DELETE 
              FROM users
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
    $query = "SELECT id, first_name, last_name, login, email, password
                      FROM users
                      WHERE id = ?";
    $result = $pdo->prepare($query);
    $result->execute([$id]);
    $user = $result->fetch();
    //DBConnect::d($user);

    // 3. Отображаем форму для изменения данных
    echo <<<_HTML
                <h2>Изменение пользователя $user[first_name] $user[last_name]</h2>   
                <form method="POST" enctype="multipart/form-data">
                    <label>Имя:</label>
                    <input type="text" name="first_name" value="$user[first_name]"><br>
                    
                    <label>Фамилия:</label>
                    <input type="text" name="last_name" value="$user[last_name]"><br>

                    <label>Логин:</label>
                    <input type="text" name="login" value="$user[login]"><br>
                    
                    <label>Электронная почта:</label>
                    <input type="email" name="email" value="$user[email]"><br>
                    
                    <label>Пароль:</label>
                    <input type="text" name="password" value="$user[password]"><br>
                    
                    <label>Аватар:</label>
                    <input type="file" name="avatar"><br>  
                    
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
    if( !empty($_POST['first_name']) &&
        !empty($_POST['last_name']) &&
        !empty($_POST['login']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password']) )
    { // если все поля заполнены

        // 1. Экранируем данные < > ' "
        $first_name = htmlspecialchars(trim($_POST['first_name']));
        $last_name = htmlspecialchars(trim($_POST['last_name']));
        $login = htmlspecialchars(trim($_POST['login']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        // 2. Забираем ID
        $id = (int)$_POST['id'];

        /**
         * 3. работа с новой картинкой
         */
        $avatar = $_FILES['avatar'];

        if($avatar['size'] === 0){ // если новая картинка не передана
            // Обновляем в БД только текстовые данные
            $query = "UPDATE users
                              SET first_name = ?, last_name = ?, login = ?, email = ?, password = ?
                              WHERE id = ?";
            $result = $pdo->prepare($query);
            $result->execute([$first_name, $last_name, $login, $email, $password, $id]);

        }else{ // если новая картинка передана
            // Формируем путь к новой картинке
            $avatar_path = '../images/users/'. $avatar['size'] . '_'. time() .'_' . $avatar['name'];
            // загружаем новую картинку в папку images
            move_uploaded_file($avatar['tmp_name'], $avatar_path);

            // удаляем старую картинку
            // 1. получаем ссылку на старую картинку
            $query = "SELECT avatar FROM users WHERE id = ?";
            $result = $pdo->prepare($query);
            $result->execute([$id]);
            $del_avatar_path = $result->fetch()['avatar'];

            // 2. если картинка есть, удаляем старую картинку
            if(file_exists($del_avatar_path)){
                unlink($del_avatar_path);
            }

            // записываем данные в базу включая ссылку на новую картинку
            $query = "UPDATE users 
                    SET first_name = ?, last_name = ?, login = ?, email = ?, password = ?, avatar = ? 
                    WHERE id = ?";
            $result = $pdo->prepare($query);
            $result->execute([$first_name, $last_name, $login, $email, $password, $avatar_path, $id]);

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
$query = "SELECT id, first_name, last_name, login, email, password, avatar
		            FROM users
		            ORDER BY first_name;";
$result = $pdo->query($query);

echo "<h2>Список всех пользователей</h2>";

// 1. Ссылка на добавление нового пользователя
echo "<a href='?add'>Добавить нового пользователя</a>";

// тестовый вывод юзеров
// DBConnect::d( $result->fetchAll() );
// вывод пользователей в документ
echo "<div class='container'>";
while( $user = $result->fetch() ){
    echo <<<_HTML_
                    <div class="box">
                        <img src="$user[avatar]" alt="$user[first_name] $user[last_name]">
                        <p>ID: <span>$user[id]</span></p>
                        <p>Имя: <span>$user[first_name]</span></p>
                        <p>Фамилия: <span>$user[last_name]</span></p>
                        <p>Логин: <span>$user[login]</span></p>
                        <p>Электронная почта: <span>$user[email]</span></p>
                        
                        <form method="POST">
                            <input type="hidden" name="id" value="$user[id]">
                            
                            <input type="submit" name="action" value="Изменить">
                            <input type="submit" name="action" value="Удалить">
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