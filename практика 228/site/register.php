<?php
//Устанавливаем доступы к базе данных:   
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost   
$user = 'root'; //имя пользователя, по умолчанию это root 
$password = ''; //пароль, по умолчанию пустой   
$db_name = 'adminsagannur'; //имя базы данных 
 
 //Соединяемся с базой данных используя наши доступы:   
 $link = mysqli_connect($host, $user, $password, $db_name); 
 
 /*   Соединение записывается в переменную $link,   которая используется дальше для работы mysqi_query.  */ 
 ?> 

<?php
        if(isset ($_POST['next']))
        {
            $name = $_POST['name'];
            $family = $_POST['family'];
            $otch = $_POST['otch'];
            $number = $_POST['number'];
        }
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="img/Logosan.svg" type="image/x-icon">
    <title>Дальневосточный гектар Саган - Нур</title>
</head>
<body class="body">
<section class="section__buy" id="section__buy">
        <div class="container__buy">
        <h2 class="section__title">Регистрация</h2>
        <h3 class="section__title">Заполните все поля</h3>
        <div class="container__buy_box-form">
<form class="container__buy_form" name="register" action="request.php" method="POST">
                <input class="container__buy_form-input" type="text" placeholder="Логин" required name="login">
                <input class="container__buy_form-input" type="text" placeholder="Имя" required value="<?=$name?>" name="name">
                <input class="container__buy_form-input" type="text" placeholder="Фамилия" required value="<?=$family?>" name="family">
                <input class="container__buy_form-input" type="text" placeholder="Отчество (при наличии)" value="<?=$otch?>" name="otch">
                <input class="container__buy_form-input" type="tel" placeholder="Ваш номер телефона" required value="<?=$number?>" name="number">
                 <input class="container__buy_form-input" type="text" placeholder="Ваш E-mail" required name="email">
                <input class="container__buy_form-input" type="password" placeholder="Ваш пароль" required name="password">
                <input class="container__buy_form-input" type="password" placeholder="Повторите пароль" required name="password2">
                <button class="header__button-link" type="submit" name="regis">Зарегистрироваться</button>
                <a class="container__newmodel-button" href="login.php">Войти</a>
                <a class="container__newmodel-button" href="index.php">на главную</a>
        </form>

        
    </div>
    </div>
    </section>
</body>
</html>
