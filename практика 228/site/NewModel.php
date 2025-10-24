<?php
session_start(); 
//Устанавливаем доступы к базе данных:   
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost   
$user = 'root'; //имя пользователя, по умолчанию это root 
$password = ''; //пароль, по умолчанию пустой   
$db_name = 'adminsagannur'; //имя базы данных 
 
 //Соединяемся с базой данных используя наши доступы:   
 $link = mysqli_connect($host, $user, $password, $db_name); 

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$sos = $_SESSION['sos'];

setcookie('login', $login);
setcookie('password', $password);

$login = $_COOKIE['login'];
$password = $_COOKIE['password'];

$AddChek = 0;
$AddChek = $_COOKIE['AddChek'];
setcookie('AddChek', '', time() - 3600);
$result = mysqli_query($link, "SELECT family, name, otchestvo FROM users WHERE login LIKE '$login' and password LIKE '$password'") or die(mysqli_error($link)); 
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

if(mysqli_num_rows($result)==0){
    $connect= 'Ошибка';
}else{
    $connect= 'Успех';
}
$i=1;
foreach ( $data as $chel){
    foreach ( $chel as $ex){
        if($i==1){
            $name = $ex;
            setcookie('name', $name);
        }elseif($i==2){
            $family = $ex;
            setcookie('family', $family);
        }elseif($i==3){
            $otch = $ex;
            setcookie('otch', $otch);
        }
    
        $i++;
}
}

$result2 = mysqli_query($link, "SELECT role FROM users WHERE login LIKE '$login' and password LIKE '$password'") or die(mysqli_error($link)); 
for ($data2 = []; $row2 = mysqli_fetch_assoc($result2); $data2[] = $row2);
$roles=2;
foreach ( $data2 as $chel){
    foreach ( $chel as $ex){
        $roles=$ex;
}
}
$result4 = mysqli_query($link, "SELECT number FROM users WHERE login LIKE '$login' and password LIKE '$password'") or die(mysqli_error($link)); 
for ($data4 = []; $row4 = mysqli_fetch_assoc($result4); $data4[] = $row4);
foreach ( $data4 as $chel){
    foreach ( $chel as $ex){
       $numder= $ex;
       setcookie('number', $numder);
}
}


if($connect=='Успех' && $sos=='Да' && $roles==1){
    echo " <!DOCTYPE html>
    <html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style/style.css?<?echo time();?>'>
    <link rel='shortcut icon' href='img/icon.svg' type='image/x-icon'>
    <title>Новый быт</title>
</head>
<body class='body'>


    <!-- Шапка -->
    <header class='header' id='header'>
        <div class='header__logo'>
            <a class='header__logo-link' href='index.php'><img src='img/logo.svg' alt='logo' class='header__logo-img'></a> 
        </div>
        <div class='header__menu'>
            <ul class='header__menu-list'>
                <li class='list'>
                " ;
                
                foreach ( $data as $chel){
                    echo "<p> ";
                foreach ( $chel as $ex){
                    
                echo " $ex ";
                
                
                }
                
                echo "</p>
                </li>
                
            </ul>
        
        
        </div>
        <div class='header__button'>
        <a class='container__newmodel-button' href='zayavki.php'>Вернуться в админ панель</a>
            <form name='exit' action='request.php' method='POST'>
            <button class='header__button-link' type='submit' name='exit'>Выйти</button>
            </form>
        </div>
    </header>";
    if($AddChek==1){
        echo "Модель успешно добавлена!";
        $AddChek = 0;
    }
    echo "
<section class='section__buy' id='section__buy'>
        <div class='container__buy'>
        <h3 class='section__title'>Добавление новой машины</h3>
        <div class='container__buy_box-form'>
        <img src='img/mashina stir buy.svg' class='container__buy_box-img' alt='стиральная машина'>
<form class='container__buy_form' name='AddModel' action='request.php' method='POST'>
                <input class='container__buy_form-input' type='text' placeholder='Название модели' required name='NameModel'>
                <input class='container__buy_form-input' type='text' placeholder='Объем' required name='volume'>
                <input class='container__buy_form-input' type='number' placeholder='Цена' required name='price'>
                <button class='header__button-link' type='submit' name='AddModel'>Добавить</button>
        </form>

        
    </div>
    </div>
    </section>
</body>
</html>
";
}


}


?>