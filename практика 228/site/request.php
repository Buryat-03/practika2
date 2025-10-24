<?php
session_start(); 
error_reporting(E_ALL);
	ini_set('display_errors', 'on');
//Устанавливаем доступы к базе данных:   
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost   
$user = 'root'; //имя пользователя, по умолчанию это root 
$password = ''; //пароль, по умолчанию пустой   
$db_name = 'adminsagannur'; //имя базы данных 
 
 //Соединяемся с базой данных используя наши доступы:   
 $link = mysqli_connect($host, $user, $password, $db_name); 
 
 /*   Соединение записывается в переменную $link,   которая используется дальше для работы mysqi_query.  */ 

         if(isset ($_POST['regis']))
         {
             $rlogin = $_POST['login'];
             $rname = $_POST['name'];
             $rfamily = $_POST['family'];
             $rotch = $_POST['otch'];
             $rnumber = $_POST['number'];
             $rpassword = $_POST['password'];
             $rpassword2 = $_POST['password2'];
             
               $_SESSION['login'] = $rlogin;
               $_SESSION['password'] = $rpassword;
               $_SESSION['regist'] = "Да";
               setcookie('login', $rlogin);
               setcookie('password', $rpassword);
             if($rpassword==$rpassword2){
                $result = mysqli_query($link, "INSERT INTO users (login, name, family, otchestvo, number, password, role) 
                VALUE ('$rlogin', '$rname', '$rfamily', '$rotch', $rnumber, '$rpassword', 2)
                ") or die(mysqli_error($link)); 
                 
    
                 header('Location: http://localhost:82/site/login.php');
             }else{
                echo "есть проблемы";
             }
            
            
         }
         if(isset($_POST['login']))
         {
            
            
            $llogin = $_POST['llogin'];
            $lpassword = $_POST['lpassword'];
            $result = mysqli_query($link, "SELECT family, name, otchestvo FROM users WHERE login LIKE '$llogin' and password LIKE '$lpassword'") or die(mysqli_error($link)); 
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            if(mysqli_num_rows($result)==0){

               $sos = "Нет";
            }else{ 

               $sos = "Да";
               $_SESSION['login'] = $llogin;
               $_SESSION['password'] = $lpassword;
               
            }
            $_SESSION['sos'] =  $sos;

            header('Location: http://localhost:82/site/zayavki.php');
      }

         if(isset($_POST['exit']))
         {
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            setcookie('login', '', time() - 3600);
            setcookie('name', '', time() - 3600);
            setcookie('number', '', time() - 3600);
            setcookie('family', '', time() - 3600);
            setcookie('otch', '', time() - 3600);
            setcookie('AddChek', '', time() - 3600);
            header('Location: http://localhost:82/site/login.php');
         }

         if(isset($_POST['zayav']))
         {
            $models=$_POST['models'];
            $login=$_COOKIE['login'];
            $name = $_COOKIE['name'];
            $number = $_COOKIE['number'];
            $family = $_COOKIE['family'];
            $otch = $_COOKIE['otch'];
            $result = mysqli_query($link, "INSERT INTO zayav (login, name, family, otchestvo, number, model, role, status) 
            VALUE ('$login', '$name', '$family', '$otch', $number, '$models', 2, 'В работе')
            ") or die(mysqli_error($link)); 
            
            header('Location: http://localhost:82/site/zayavki.php');
         }


if(isset($_POST['delete'])){
   $idNode=$_POST['IdNode'];
   $result = mysqli_query($link, "DELETE FROM zayav WHERE id = '$idNode'") or die(mysqli_error($link)); ;
   header('Location: http://localhost:82/site/zayavki.php');
}

      if(isset($_POST['AddModel'])){
         $NameModel = $_POST['NameModel'];
         $Price = $_POST['price'];
         $Volume = $_POST['volume'];
         $result = mysqli_query($link, "INSERT INTO models (name, volume, price) VALUE ('$NameModel', $Volume, $Price)") or die(mysqli_error($link));
         $AddChek = 1;
         setcookie('AddChek', $AddChek);
         header('Location: http://localhost:82/site/NewModel.php');
      }

      if(isset($_POST['update'])){
         $idNode=$_POST['IdNode'];
         $newstat = $_POST['newstatus'];
         $result = mysqli_query($link, "UPDATE zayav SET status='$newstat' WHERE id = '$idNode'") or die(mysqli_error($link));
         header('Location: http://localhost:82/site/zayavki.php');
      }
      
?>