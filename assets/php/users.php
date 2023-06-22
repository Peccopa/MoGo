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

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Работа с сотрудниками</title>
    <style>
        .container{
            display: flex;
            margin: 20px;
            gap: 20px;
            flex-wrap: wrap;
        }
        .box{
            border: 3px solid skyblue;
            border-radius: 7px;
            padding: 10px;
            width: 200px;
        }

        .box span{
            color: brown;
        }

        .box img{
            width: 100%;
        }

        .error-msg{
            color: red;
            padding: 10px;
            border: 3px solid red;
        }
    </style>
</head>
<body>
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
              // 2.1 Формируем путь к картинке '../images/users/avatar.png'
              $avatar_path = '../images/users/'. $avatar['size'] . '_'. time() .'_' . $avatar['name'];
              // echo $avatar_path; // images/97314_1685534255_photo1685362216.jpeg

              // 2.2 Перемещаем картинку в нужную папку
              move_uploaded_file($avatar['tmp_name'], $avatar_path);

              // 3. Записываем данные в БД
              $query = "INSERT INTO users VALUES( ?, ?, ?, ?, ?, ?, ? );";
              $result = $pdo->prepare($query);
              $result->execute( [NULL, $first_name, $last_name, $login, $email, $password, $avatar_path] );

              // перезагружаем страницу
              header('Location: /');

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
			header('Location: /');
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
                    // загружаем новую картинку в папку ../images/users/
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
                header('Location: /');


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

</body>
</html>