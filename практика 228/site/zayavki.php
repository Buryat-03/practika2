<?php
session_start(); 
//Устанавливаем доступы к базе данных:   
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost   
$user = 'root'; //имя пользователя, по умолчанию это root 
$password = ''; //пароль, по умолчанию пустой   
$db_name = 'adminsagannur'; //имя базы данных 
 
 //Соединяемся с базой данных используя наши доступы:   
 $link = mysqli_connect($host, $user, $password, $db_name); 


$sos = $_SESSION['sos'];
$regist = $_SESSION['regist'];
if ($_SESSION['login'] !=null && $_SESSION['password'] !=null ){
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];  
}else{
    $login = $_COOKIE['login'];
    $password = $_COOKIE['password'];
}

setcookie('login', $login);
setcookie('password', $password);
$result = mysqli_query($link, "SELECT family, name, otchestvo FROM users WHERE login LIKE '$login' and password LIKE '$password'") or die(mysqli_error($link)); 
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

if(mysqli_num_rows($result)==0){
    $connect= "Ошибка";
}else{
    $connect= "Успех";
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

if($connect=="Успех" && $sos=="Да"){
    echo "
    <!DOCTYPE html>
    <html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style/style.css?<?echo time();?>'>
    <link rel='shortcut icon' href='img/Logosan.svg' type='image/x-icon'>
    <title>Дальневосточный гектар Саган - Нур</title>
</head>
<body class='body'>


    <!-- Шапка -->
    <header class='header' id='header'>
        <div class='header__logo'>
            <a class='header__logo-link' href='index.php'><img src='img/Logosan.svg' alt='logo' class='header__logo-img'></a> 
        </div>
        <div class='header__menu'>
            <ul class='header__menu-list'>
                <li class='list'>
                " ;
                
                foreach ( $data as $chel){
                    echo "<p> Вы,";
                foreach ( $chel as $ex){
                    
                echo " $ex ";
                
                
                }
                
                echo "</p>";
}
echo " </li>
                
            </ul>
        </div>
        <div class='header__button'>
            <form name='exit' action='request.php' method='POST'>
            <button class='header__button-link' type='submit' name='exit'>Выйти</button>
            </form>
        </div>
    </header>
    <main class='main' >
    <div>  <form name='zayav' class='zayavki-form' action='request.php' method='POST'>
    <select class='zayavki-form_input' name='models' size='1'>
     ";
     $result6 = mysqli_query($link, "SELECT name, volume, price FROM models WHERE 1") or die(mysqli_error($link)); 
     for ($data6 = []; $row6 = mysqli_fetch_assoc($result6); $data6[] = $row6);
         
     foreach ( $data6 as $chel){
        $id=1;
         foreach ( $chel as $ex){
            if($id==1){
               echo "<option selected value='$ex'>Модель $ex"; 
            }
            if ($id==2){
                echo " (объём $ex л.)";
            }
            if ($id==3){
                echo " - $ex р.</option>";
            }
            $id++;
         }
        }
   echo " </select>
   <button class='header__button-link' type='submit' name='zayav'>Создать заявку</button>
            </form> </div>
            <h1 class='header-zayav'>Все заявки</h1>
    ";

    if($roles==2){
        $result3 = mysqli_query($link, "SELECT id, name, family, otchestvo, number, model, status FROM zayav WHERE login LIKE '$login'") or die(mysqli_error($link)); 
        $id=1;
        for ($data3 = []; $row3 = mysqli_fetch_assoc($result3); $data3[] = $row3);
            $i=1;
            $class='td';

                foreach ( $data3 as $chel){
                    foreach ( $chel as $ex){
                        if($i==1){
                            $idModel = $ex;
                            //$_SESSION = $idModel;
                        }
                        break;
                        $i++;
                        
                        $i=1;
                    }
                  
                        foreach ( $chel as $ex){
                            if($i==7){
                                $status = $ex;
                               // $_SESSION = $idModel;
                               break;
                            }
                            
                            
                            $i++;
                            
                            
                            
                        }
                        
                
                    $i=1;
                    echo "<div class='container__zav'>
                           <div class='container__head-zav'>
                <h3 class='container__headtext-zav'>Заявка №$idModel: </h3>
                <p class='container__statustext-zav' value='Статус: $status' id='status$id'>Статус: $status</p>
                <form name='delete' action='request.php' method='POST'>
                <input type='hidden' name='IdNode' value='$idModel'>
                <input class='container__buttondell-zav' type='submit' value='Удалить' name='delete'>
                </form>
                </div>
                <table>
                            
                            
                            <tr><th class='$class'>№ заявки</th> <th class='$class'>Имя</th> <th class='$class'>Фимилия</th><th class='$class'>Отчество</th><th class='$class'>Номер</th><th class='$class'>Модель</th></tr>
                                <tr>";
                            
                foreach ( $chel as $ex){
                    if($i!=7){
                        echo "<td class='$class'> $ex </td>";
                    $i++;
                    }
                }
                
                $result7 = mysqli_query($link, "SELECT name FROM status WHERE 1") or die(mysqli_error($link)); 
                                        for ($data7 = []; $row7 = mysqli_fetch_assoc($result7); $data7[] = $row7);
                                        $i7=1;
                                        foreach ( $data7 as $chel){
                                            
                                            foreach ( $chel as $ex){
                                                if($i7==1){
                                                    $status1=$ex;
                                               
                                                }
                                                if($i7==2){
                                                    $status2=$ex;
                                                }
                                                
                                                
                                            }
                                            $i7++;
                                            if($i7>2){
                                                $i7=1;
                                            }
                                        }
                                        
                echo "<script> 
                    
                const status$id = window.document.querySelector('#status$id');
                console.log(status$id);
                
                if('$status' == '$status2'){
                status$id.style.background = '#43c020';
                status$id.style.borderRadius= '0.5vw';
                status$id.style.textAlign = 'center';
                status$id.style.padding= '0.2vw 0';
                }
                if('$status' == '$status1'){
                status$id.style.background = '#dbca30';
                status$id.style.borderRadius= '0.5vw';
                status$id.style.textAlign = 'center';
                status$id.style.padding= '0.2vw 0';
                }
                
                
                
                
                
                </script>";
                $i=1;
                $id++;
                echo  "
                </tr> 
                </table>
                </div>";
    
}



}elseif($roles==1){
    echo "<h2 class='header-zayav_ad'>Админ панель</h2>
     <a class='container__newmodel-button' href='users.php'>Список всех пользователей</a>";

    $result5 = mysqli_query($link, "SELECT id, name, family, otchestvo, number, model, status FROM zayav WHERE role LIKE 2") or die(mysqli_error($link)); 
    for ($data5 = []; $row3 = mysqli_fetch_assoc($result5); $data5[] = $row3);
        $id=1;
        $i=1;
        $class='td';
        
    foreach ( $data5 as $chel){
        foreach ( $chel as $ex){
            if($i==1){
                $idModel = $ex;
                //$_SESSION = $idModel;
            }
            break;
            $i++;
            
            $i=1;
        }
      
            foreach ( $chel as $ex){
                if($i==7){
                    $status = $ex;
                   // $_SESSION = $idModel;
                   break;
                }
                
                
                $i++;
                
                
                
            }
            
    
        $i=1;
        echo "<div class='container__zav'>
                <div class='container__head-zav'>
                <h3 class='container__headtext-zav'>Заявка №$idModel: </h3>
                <p class='container__statustext-zav' value='Статус: $status' id='status$id'>Статус: $status</p>
                <form name='update' class='container__form-zav' action='request.php' method='POST'>
                <input type='hidden' name='IdNode' value='$idModel'>
                <select class='zayavki-form_input-up' name='newstatus' size='1'> 
                ";
                
                $result8 = mysqli_query($link, "SELECT name FROM status WHERE 1") or die(mysqli_error($link)); 
                for ($data8 = []; $row8 = mysqli_fetch_assoc($result8); $data8[] = $row8);
                    
                foreach ( $data8 as $chel2){
                    foreach ( $chel2 as $ex2){
                           echo " <option selected value='$ex2'>$ex2</option>"; 
                    }
                   }

                echo " </select> 
                <button class='header__buttonup-zav' type='submit' name='update'>Обновить статус</button>
                </form>
                <form name='delete' action='request.php' method='POST'>
                <input type='hidden' name='IdNode' value='$idModel'>
                <input class='container__buttondell-zav' type='submit' value='Удалить' name='delete'>
                </form>
                </div>
                <table>
                
                
                <tr><th class='$class'>№ заявки</th> <th class='$class'>Имя</th> <th class='$class'>Фамилия</th><th class='$class'>Отчество</th><th class='$class'>Номер</th><th class='$class'>Модель</th></tr>
                    <tr>";
                
    foreach ( $chel as $ex){
        if($i!=7){
            echo "<td class='$class'> $ex </td>";
        $i++;
        }
       
        
        
        
    }

    $result7 = mysqli_query($link, "SELECT name FROM status WHERE 1") or die(mysqli_error($link)); 
                            for ($data7 = []; $row7 = mysqli_fetch_assoc($result7); $data7[] = $row7);
                            $i7=1;
                            foreach ( $data7 as $chel){
                                
                                foreach ( $chel as $ex){
                                    if($i7==1){
                                        $status1=$ex;
                                   
                                    }
                                    if($i7==2){
                                        $status2=$ex;
                                    }
                                    
                                    
                                }
                                $i7++;
                                if($i7>2){
                                    $i7=1;
                                }
                            }
                            
    echo "<script> 
        
    const status$id = window.document.querySelector('#status$id');
    console.log(status$id);

    if('$status' == '$status2'){
    status$id.style.background = '#43c020';
    status$id.style.borderRadius= '0.5vw';
    status$id.style.textAlign = 'center';
    status$id.style.padding = 0;
    status$id.style.padding= '0.2vw 0';
    }
    if('$status' == '$status1'){
    status$id.style.background = '#dbca30';
    status$id.style.borderRadius= '0.5vw';
    status$id.style.textAlign = 'center';
    status$id.style.padding = 0;
    status$id.style.padding= '0.2vw 0';
    }

   
    
    

    </script>";
    $i=1;
    $id++;
    echo  "
    </tr> 
    </table>
    </div>";
    
}

}
    

 echo   "</main>
    <footer class='footer'>
        <div class='footer__logo'>
            <a class='footer__logo-link' href='index.html'><img src='img/Logosan.svg' alt='logo' class='footer__logo-img'></a> 
        </div>
        <div class='footer__network'>
            <ul class='footer__network-list'>
                <li class='list'><a href='#' class='list__link'><img src='img/vk.svg' alt='vk' class='lis__link-icon'></a></li>
                <li class='list'><a href='#' class='list__link'><img src='img/ok.svg' alt='ok' class='lis__link-icon'></a></li>
                <li class='list'><a href='#' class='list__link'><img src='img/tg.svg' alt='tg' class='lis__link-icon'></a></li>
            </ul>
        </div>
        <div class='footer__information'>
            <ul class='footer__information-list'>
                <li class='list'><h4>О нас:</h4></li>
                <li class='list'>Почта: stiralkaNovBit@mail.ru</li>
                <li class='list'>Телефон: +7(942) 642-27-12</li>
                <li class='list'>Адрес: г Екатеринбург, пр-кт Космонавтов, д 275</li>
            </ul>
        </div>
    </footer>

    </body>
</html>";
}else if($regist=="Да"){
    unset($_SESSION['regist']);
    echo "<html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style/style.css?<?echo time();?'>
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
                    <li class='list'> Вы успешно зарегистрировались, а теперь давайте войдем! </li>
                    
                </ul>
            </div>
            <div class='header__button'>
                <form name='exit' action='request.php' method='POST'>
                <button class='header__button-link' type='submit' name='exit'>Войти</button>
                </form>
            </div>
        </header>
        <main class='main' >
    
    
        </main>
        <footer class='footer'>
            <div class='footer__logo'>
                <a class='footer__logo-link' href='index.html'><img src='img/logo.svg' alt='logo' class='footer__logo-img'></a> 
            </div>
            <div class='footer__network'>
                <ul class='footer__network-list'>
                    <li class='list'><a href='#' class='list__link'><img src='img/vk.svg' alt='vk' class='lis__link-icon'></a></li>
                    <li class='list'><a href='#' class='list__link'><img src='img/ok.svg' alt='ok' class='lis__link-icon'></a></li>
                    <li class='list'><a href='#' class='list__link'><img src='img/tg.svg' alt='tg' class='lis__link-icon'></a></li>
                </ul>
            </div>
            <div class='footer__information'>
                <ul class='footer__information-list'>
                    <li class='list'><h4>О нас:</h4></li>
                    <li class='list'>Почта: stiralkaNovBit@mail.ru</li>
                    <li class='list'>Телефон: +7(942) 642-27-12</li>
                    <li class='list'>Адрес: г Екатеринбург, пр-кт Космонавтов, д 275</li>
                </ul>
            </div>
        </footer>
    
        </body>
    </html>";

}else if($connect=="Ошибка" || $sos=="Нет"){
    echo "<html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style/style.css?<?echo time();?'>
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
                    <li class='list'> Возможно вы допустили ошибку, попробуйте снова </li>
                    
                </ul>
            </div>
            <div class='header__button'>
                <form name='exit' action='request.php' method='POST'>
                <button class='header__button-link' type='submit' name='exit'>Войти</button>
                </form>
            </div>
        </header>
        <main class='main' >
    
    
        </main>
        <footer class='footer'>
            <div class='footer__logo'>
                <a class='footer__logo-link' href='index.html'><img src='img/Logosan.svg' alt='logo' class='footer__logo-img'></a> 
            </div>
            <div class='footer__network'>
                <ul class='footer__network-list'>
                    <li class='list'><a href='#' class='list__link'><img src='img/VK.svg' alt='vk' class='lis__link-icon'></a></li>
                    <li class='list'><a href='#' class='list__link'><img src='img/ODNOKL.svg' alt='ok' class='lis__link-icon'></a></li>
                    <li class='list'><a href='#' class='list__link'><img src='img/TELEGA.svg' alt='tg' class='lis__link-icon'></a></li>
                     <li class='list'><a href='#' class='list__link'><img src='img/YOUTUBE.svg' alt='ok' class='lis__link-icon'></a></li>
                    <li class='list'><a href='#' class='list__link'><img src='img/DZEN.svg' alt='tg' class='lis__link-icon'></a></li>
                </ul>
            </div>
            <div class='footer__information'>
                <ul class='footer__information-list'>
                <li class='list'>Почта: adminsagannur@mail.ru</li>
                <li class='list'>Телефон: +7(983) 303-44-59</li>
                <li class='list'>Адрес: пос. Саган - Нур, Лесная улица 2</li>
                </ul>
            </div>
        </footer>
    
        </body>
    </html>";
}






?>