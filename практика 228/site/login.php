<?php
//Устанавливаем доступы к базе данных:   
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost   
$user = 'root'; //имя пользователя, по умолчанию это root 
$password = ''; //пароль, по умолчанию пустой   
$db_name = 'adminsagannur'; //имя базы данных 
 
 //Соединяемся с базой данных используя наши доступы:   
 $link = mysqli_connect($host, $user, $password, $db_name); 
 
 /*   Соединение записывается в переменную $link,   которая используется дальше для работы mysqi_query.  */ 

 //Внутри функции PHP mysqli_query стоит обычная строка:  
 $login = $_COOKIE['login'];
 $password = $_COOKIE['password'];
 
 if($login != null){

    header('Location: http://localhost:82/site/zayavki.php');
 }
 ?> 


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Дальневосточный гектар Саган - Нур</title>
</head>
<body class="body">
<section class="section__buy" id="section__buy">
        <div class="container__buy">
        <h2 class="section__title">Вход в аккаунт</h2>
        <h3 class="section__title">Заполните логин и пароль</h3>
        <div class="container__buy_box-form">
        <img src="img/Logosan.svg" class="container__buy_box-img" alt="стиральная машина">
<form class="container__buy_form" name="login" action="request.php" method="POST">
    
                <input class="container__buy_form-input" type="text" placeholder="Логин" required name="llogin">
                <input class="container__buy_form-input" type="password" placeholder="Ваш пароль" required name="lpassword">
                <button class="header__button-link" type="submit" name="login">Войти</button>
                <a class="container__newmodel-button" href="register.php">Регистрация</a>
                <a class="container__newmodel-button" href="index.php">на главную</a>
        </form>

        
    </div>
    </div>
    </section>
</body>
</html>