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
 $result = mysqli_query($link, "SELECT*FROM zayav WHERE id>0") or die(mysqli_error($link)); 
 
 
 ?> 
 <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="img/icon.svg" type="image/x-icon">
    <title>Дальневосточный гектар Саган - Нур</title>
</head>
<body class="body">


    <!-- Шапка -->
    <header class="header" id="header">
        <div class="header__logo">
            <a class="header__logo-link" href="index.php"><img src="img/Logosan.svg" alt="logo" class="header__logo-img"></a> 
        </div>
        <div class="header__menu">
            <ul class="header__menu-list">
                <li class="list"><a href="#section__title" class="list__link">о программе</a></li>
                <li class="list"><a href="#section__img" class="list__link">меры поддержки</a></li>
                <li class="list"><a class="list__link" href="#section_price">участок</a></li>
            </ul>
        </div>
        <div class="header__button">
            <a class="header__button-link" href="#section__buy">Перейти к форме</a>
        </div>
    </header>
    <main class="main" >

        <!-- Кнопка "ВВЕРХ" -->
<div class="scrool-Btn" id="scroolBLT">
    <a href="#header">
    <img src="img/arrow.svg" alt="стрелка">
</a>
</div>

        <!-- Секция "О товаре"-->
       <section class="section" id="section__title">
        <div class="container-ptoduct" >
            <div class="container__title">
                <h2>Дальневосточный гектар</h2>
                <p class="container__text-text">
               Государственная программа, которая позволяет гражданам России бесплатно получить земельный участок площадью до 1 га на территории Дальневосточного федерального округа (ДФО). Действующие регионы: Республика Бурятия, Республика Саха (Якутия), Забайкальский край, Камчатский край, Приморский край, Хабаровский край, Чукотский автономный округ, Еврейская автономная область, Амурская область, Магаданская область, Сахалинская область
            </p>
        </div>
            <div class="container__img-stir">
                <img src="img/дальний восток.svg" class="zoom-effect2 "alt="дальний восток">
            </div>
        </div>
    </section>



    <!-- Секция Плюсы -->
        <section class="section" style="background-image: url('img/ПОЛЕ.jpg'); background-size: cover;" id="section__img">
            <h2 class="section__title">Меры поддержки для участников программы</h2>
        <div class="container">
            
            <div class="container__img" id="imgPluses">
                <img src="img/ипотека.svg" class="zoom-effect" alt="Ипотека">
            </div>
            <div class="container__features">
                <h4>Дальневосточная ипотека</h4>
                <p>Дальневосточная ипотека – программа льготного кредитования получателей земли по программе «Дальневосточный гектар» для строительства жилого дома на этой земле.  </p>
            </div>
        </div>
        <div class="container" id="container__img">
            <div class="container__features">
                <h4>Квота на заготовку древесины для строительства жилого дома</h4>
                <p> Для каждого гражданина Российской Федерации  </p>
            </div>
            <div class="container__img" id="imgPluses2">
                <img src="img/древесина.svg" class="zoom-effect" alt="Древесина" >
            </div>
        </div>
        <div class="container" id="container__img">
            <div class="container__img" id="imgPluses3">
                <img src="img/грант.svg" class="zoom-effect" alt="Грант">
            </div>
            <div class="container__features">
                <h4>Грант начинающим предпринимателям на создание собственного дела</h4>
                <p> Для граждан, впервые зарегистрированных в качестве ЮЛ или ИП </p>
            </div>
        </div>
        <div class="container" id="container__img">
            <div class="container__features">
                <h4> До 450 000 рублей семьям с детьми на погашение ипотеки в Республике Бурятия</h4>
                <p> Для семей с тремя детьми </p>
            </div>
            <div class="container__img" id="imgPluses4">
                <img src="img/ключ.svg" class="zoom-effect" alt="Ключ">
            </div>
        </div>
    </section>



    <!-- Секция оценок -->
    <section class="section" id="section__feedback">
        <h2 class="section__title">Бесплатный земельный участок под ваши цели!</h2>
        <div class="gallery">
  <div class="card" style="background-image: url('img/ДОМ.jpg');">
    <div class="caption">Дом, усадьба, поместье, дача</div>
  </div>

  <div class="card" style="background-image: url('img/ФЕРМА.jpg');">
    <div class="caption">Ферма и агробизнес</div>
  </div>

  <div class="card" style="background-image: url('img/БИЗНЕС.jpg');">
    <div class="caption">Развитие бизнеса</div>
  </div>

  <div class="card" style="background-image: url('img/ОСТРОВ.jpg');">
    <div class="caption">Остров безопасности</div>
  </div>
</div>
    </section>


    <!-- Секция заказа -->
    <section class="section__buy" id="section__buy">
        <div class="container__buy">
        <h2 class="section__title2">Лучшее время выбрать</h2>
        <h2 class="section__title2">земельный участок </h2>
        <h2 class="section__title2"><span style="color: rgb(0, 158, 30);">бесплатно!</span> </h2>
        <div class="container__buy_box-form">
        <form class="container__buy_form" name="zayavka" action="register.php" method="POST">
                <input class="container__buy_form-input" type="text" placeholder="Имя" required>
                <input class="container__buy_form-input" type="text" placeholder="Фамилия" required>
                <input class="container__buy_form-input" type="text" placeholder="Отчество (при наличии)">
                <input class="container__buy_form-input" type="tel" placeholder="Ваш номер телефона" required>
                <input class="container__buy_form-input" type="text" placeholder="Ваш E-mail" required>
                <button class="container__buy_form-button" type="submit">Получить информацию</button>
                
        </form>

       
    </div>
    </div>
    </section>
    </main>
    <footer class="footer">
        <div class="footer__logo">
             <a class="footer__logo-link" href="index.html"><img src="img/Logosan.svg" alt="logo" class="footer__logo-img"></a> 
        </div>
        <div class="footer__network">
            <ul class="footer__network-list">
                 <li class="list"><a href="#" class="list__link"><img src="img/VK.svg" alt="vk" class="lis__link-icon"></a></li>
                <li class="list"><a href="#" class="list__link"><img src="img/ODNOKL.svg" alt="ok" class="lis__link-icon"></a></li>
                <li class="list"><a href="#" class="list__link"><img src="img/TELEGA.svg" alt="tg" class="lis__link-icon"></a></li>
                <li class="list"><a href="#" class="list__link"><img src="img/YOUTUBE.svg" alt="ok" class="lis__link-icon"></a></li>
                <li class="list"><a href="#" class="list__link"><img src="img/DZEN.svg" alt="tg" class="lis__link-icon"></a></li>
            </ul>
        </div>
        <div class="footer__information">
            <ul class="footer__information-list">
                <li class="list">Почта: adminsagannur@mail.ru</li>
                <li class="list">Телефон: +7(983) 303-44-59</li>
                <li class="list">Адрес: пос. Саган - Нур, Лесная улица 2</li>
            </ul>
        </div>
    </footer>







    <!-- JS код -->
    <script>
        // Переменные
        const strela = window.document.querySelector('#scroolBLT');
        const feedback = window.document.querySelector('#feedback');
        const feedback2 = window.document.querySelector('#feedback2');
        const stars0 = window.document.querySelector('#stars0');
        const stars1 = window.document.querySelector('#stars1');
        const stars2 = window.document.querySelector('#stars2');
        const stars3 = window.document.querySelector('#stars3');
        const stars4 = window.document.querySelector('#stars4');
        const stars5 = window.document.querySelector('#stars5');
        const stars6 = window.document.querySelector('#stars6');
        const stars7 = window.document.querySelector('#stars7');
        const stars8 = window.document.querySelector('#stars8');
        const stars9 = window.document.querySelector('#stars9');
        const pluses= window.document.querySelector('#imgPluses');
        const pluses2= window.document.querySelector('#imgPluses2');
        const pluses3= window.document.querySelector('#imgPluses3');
        const pluses4= window.document.querySelector('#imgPluses4');
        let active = 1;
        let active2 = 1;


        // ****************функции***************


        // анимация отзывов
        function animationFeedback() {
            feedback.style.animationName = "feedback";
            const time = setTimeout(() => {
                feedback2.style.animationName = "feedback";
            }, 1500)
        }


        function animationPlses() {
            pluses.style.animationName = "plusesAnim";
            const time=setTimeout(()=>{
                pluses2.style.animationName = "plusesAnim";
            },500)
            const time1=setTimeout(()=>{
                pluses3.style.animationName = "plusesAnim";
            },1000)
            const time2=setTimeout(()=>{
                pluses4.style.animationName = "plusesAnim";
            },1500)
            
        
        
        }
        

        function animationArrow() {
            strela.style.display = "block";
            strela.style.animationName = "moveforward";
        }





        function animationStars() {
            const time1 = setTimeout(() => {
            stars0.style.animationName = "starsAnim";
            const time1 = setTimeout(() => {
                stars1.style.animationName = "starsAnim";
            }, 200)
            const time2 = setTimeout(() => {
                stars2.style.animationName = "starsAnim";
            }, 400)
            const time3 = setTimeout(() => {
                stars3.style.animationName = "starsAnim";
            }, 600)
            const time4 = setTimeout(() => {
                stars4.style.animationName = "starsAnim";
            }, 800)
        }, 1500)
                stars5.style.animationName = "starsAnim";
            const time5 = setTimeout(() => {
                stars6.style.animationName = "starsAnim";
            }, 200)
            const time6 = setTimeout(() => {
                stars7.style.animationName = "starsAnim";
            }, 400)
            const time7 = setTimeout(() => {
                stars8.style.animationName = "starsAnim";
            }, 600)
            const time8 = setTimeout(() => {
                stars9.style.animationName = "starsAnim";
            }, 800)

    }





        // проверка скрола
        window.addEventListener('scroll', function () {
            let scrollPos = window.scrollY;
            if (scrollPos > 1000) {
                animationStars();
                if (active2 == 1 && active == 1) {
                    animationArrow();
                    animationFeedback();
                    animationPlses()
                }
                strela.style.display = "block";
                strela.style.animationName = "moveforward";
            } else {
                strela.style.animationName = "moveNext";
            }
        });





        feedback.addEventListener('mouseover', function () {
            feedback.style.animationName = "none";
            feedback2.style.animationName = "none";
            active = 0;
        });
        feedback.addEventListener('mouseout', function () {
            active = 1;
        });




        feedback2.addEventListener('mouseover', function () {
            feedback2.style.animationName = "none";
            feedback.style.animationName = "none";
            active2 = 0;
        });
        feedback2.addEventListener('mouseout', function () {
            active2 = 1;
        });


    </script>
</body>
</html>

<!-- .container__feedback_user:hover{
    box-shadow: var(--Color-shadow-table) 0px 0px 55px 0px;


    padding: 1vw;
} -->



<!-- https://proweb63.ru/help/js/smooth-scroll-by-js


https://ru.hexlet.io/qna/javascript/questions/kak-otslezhivat-skroll-js
-->