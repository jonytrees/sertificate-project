<?php
//Две строчки ниже для защиты форм от спам-ботов
session_start();
$_SESSION['sf_key'] = md5(substr( session_id(), mt_rand(0,10), mt_rand(3,10) ) . time() ); 

header('Content-Type: text/html; charset=utf-8');
header('X-UA-Compatible: IE=edge');
include 'functions.php';

$title = 'Title';
$desc = 'Description';
$url = SI_CurrentPageURL();
$image = SI_CurrentPageImage();

//https://sypexgeo.net/ru/about/
if (file_exists('SxGeo.php')) {
    include 'SxGeo.php';
    $web_time = '';

    $SxGeo = new SxGeo('SxGeo.dat');
    $SxGeoCity = new SxGeo('SxGeoCity.dat');
    $ip = $_SERVER['REMOTE_ADDR'];
    $country = $SxGeo->getCountry($ip);
    $region = $SxGeoCity->getCityFull($ip);
    $regionCity = $region["city"]["name_ru"];

    if ($country == "RU") {
        $web_time = '12:00';
        switch ($regionCity) {
            case 'Калининград':
                $web_time = '10:00';
                break;
            case 'Москва':
                $web_time = '11:00';
                break;
            case 'Санкт-Петербург':
                $web_time = '11:00';
                break;
        }
    } else if ($country == "UA") {
        $web_time = '10:00';
    } else if ($country == "BY") {
        $web_time = '11:00';
    } else {
        $web_time = '12:00 по Москве';
    }
}
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" class="loading">


<head>

    <!-- Meta information (content-type + mobile mod) -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
    <meta name="cmsmagazine" content="2f345f737ed0d95e9259d18f5edc8cd7">
    <meta name="tagline" content="http://hello-brand.ru/">


    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon -->
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="shortcut icon" href="favicon.png" type="image/png">


    <!-- CSS styles -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/jquery.formstyler.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/swiper.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style-fix.css" type="text/css" media="screen">


    <!-- OGP -->
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:description" content="<?php echo $desc; ?>"/>
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php echo $image; ?>">


    <!-- Page title -->
    <title><?php echo $title; ?> | <?php echo $desc; ?></title>


</head>


<body id="main">
<div id="global-wrapper">

    <!--===================================================== Loader -->
    <!--    <div class="loader">-->
    <!--        <div class="pseudo-table">-->
    <!--            <div class="pseudo-table-cell align-center">-->
    <!---->
    <!--                <div class="a-loader a-loader-2">-->
    <!--                    <div class="bar-1"></div>-->
    <!--                    <div class="bar-2"></div>-->
    <!--                    <div class="bar-3"></div>-->
    <!--                    <div class="bar-4"></div>-->
    <!--                    <div class="bar-5"></div>-->
    <!--                    <div class="bar-6"></div>-->
    <!--                    <div class="bar-7"></div>-->
    <!--                    <div class="bar-8"></div>-->
    <!--                </div>-->
    <!---->
    <!--                <div class="loader-text">-->
    <!--                    загрузка-->
    <!--                </div>-->
    <!---->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->


    <!--===================================================== Header -->
    <header class="layout-header">
        <div class="woman-block">
            <img src="images/header-woman.png" alt=" "/>
        </div>
        <div class="container">

            <div class="row">

                <!-- Logo -->
                <div class="col-1-2">
                    <a href="#" class="logo si-jump">
                        <span class="logo-icon">
                            <?php include('svg/logo.svg'); ?>
                        </span>
                    </a>
                    <div class="logo-text">
                        <div class="logo-title">
                            Экспресс патент
                        </div>
                        <p>
                            Экспресс оформление
                            товарного знака
                        </p>
                    </div>
                    <div class="time-text">
                        <div class="time-title">
                            Режим работы
                        </div>
                        <p>
                            с 10 до 19 по Москве
                        </p>
                    </div>
                </div>

                <!-- Phone block -->
                <div class="col-1-2 align-right">
                    <a href="tel:+74955329441" class="phone-link">+7 (495) 532-94-41</a>
                    <a href="#" class="btn btn-ghost open-lite-modal consult" data-extra="1">Оставьте заявку</a>
                </div>

            </div>
            <div class="nav-block">
                <div class="nav-item">
                    <div class="nav">
                        <a class="burger-menu" href="#">
                            <?php include('svg/burger.svg'); ?>
                        </a>
                    </div>

                    <div class="menu">
                        <ul>
                            <li>
                                <a class="si-jump" href="#trade">Возможности</a>
                            </li>
                            <li>
                                <a class="si-jump" href="#registration">Схема регистрации</a>
                            </li>
                            <li>
                                <a class="si-jump" href="#packet">Тарифы</a>
                            </li>
                            <li>
                                <a class="si-jump" href="#lite">Преимущества</a>
                            </li>
                            <li>
                                <a class="si-jump" href="#more">Полезные новости</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <h1>
                Зарегистрируйте свой бренд
                в Роспатент за 3 месяца
            </h1>
            <div class="sub_title">
                Оформление заявок на товарные знаки<br>
                и сопровождение на всех этапах экспертизы.
            </div>
        </div>
    </header>


    <!--===================================================== section form-header -->
    <section class="section-form form-header" id="form-header">
        <div class="container align-center">


            <form method="post" class="send-form" autocomplete="off">
                <div class="form-block">
                    <div class="sub-form-block">
                        <p>Имя</p>
                        <input type="text" name="client_name" class="client-name" placeholder="Как Вас зовут?">
                    </div>

                    <div class="sub-form-block">
                        <p>Ваш теефон</p>
                        <input type="tel" name="client_phone" class="client-phone" placeholder="+7 (___) ___-__-__">
                    </div>

                    <div class="sub-form-block">
                        <div class="btn-holder">
                            <button type="submit" class="btn green-button">Оставьте заявку</button>
                            <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                            <!-- Agreement -->
<!--                            <div class="form-agree align-left">-->
<!--                                <label class="checkbox-label form-agree-check checked">-->
<!--                                    <input type="checkbox" checked>-->
<!--                                    Нажимая кнопку "Оставьте заявку", я&nbsp;даю своё согласие на&nbsp;обработку-->
<!--                                    моих персональных данных-->
<!--                                </label>-->
<!--                            </div>-->
                        </div>
                    </div>

                <input type="hidden" name="send_type" class="send-type" value="2">
                <input type="hidden" name="send_extra" class="send-extra" value="1">
                <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                <?php //Поле выше для защиты формы от спам-ботов ?>
                </div>
            </form>

        </div>
    </section>



    <!--===================================================== section sub_header -->
    <section class="section-sub_header" id="sub_header">
        <div class="container">
            <div class="row">
                <div class="col-1-3">
                    <div class="sub_header-icon card-icon">
                        <?php include('svg/card.svg'); ?>
                    </div>
                    <div class="sub_header-block">
                        <div class="sub_header-title">
                            До <span>15000</span> руб.
                        </div>
                        <div class="sub_header-text">
                            ваша выгода
                            на госпошлине
                        </div>
                    </div>
                </div>
                <div class="col-1-3 align-center">
                    <div class="sub_header-center">
                        <div class="sub_header-icon stopwatch-icon">
                            <?php include('svg/stopwatch.svg'); ?>
                        </div>
                        <div class="sub_header-block">
                            <div class="sub_header-title">
                                От <span>90</span> дней
                            </div>
                            <div class="sub_header-text">
                                ускоренная
                                процедура
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="sub_header-right">
                        <div class="sub_header-icon">
                            <?php include('svg/title.svg'); ?>
                        </div>
                        <div class="sub_header-block">
                            <div class="sub_header-title">
                                Более <span>8</span> лет
                            </div>
                            <div class="sub_header-text">
                                опыт
                                специалистов
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--===================================================== section trade -->
    <section class="section-trade" id="trade">
        <div class="container">
            <h2>
                <span>Товарный знак откроет</span> возможности<Br>
                развития бизнеса
            </h2>
            <div class="find-block">
                <div class="find-title">
                    5 ключевых критериев,
                </div>
                <div class="find-text">
                    на которые <span>смотрит
                    экспертиза</span>
                </div>
                <a class="btn find-button open-get-modal" href="#">
                    Узнайте
                </a>
            </div>
            <div class="row">
                <div class="col-1-3">
                   <div class="trade-block">
                       <img src="images/rocket.png" alt=" "/>
                       <div class="trade-title">
                           Стартапы
                       </div>
                       <ul class="trade-list">
                           <li>
                               <span>Закрепите за собой исключительное право на нейминг и логотип</span>
                           </li>
                           <li>
                               <span>Обретите защиту от копирования и подражания</span>
                           </li>
                           <li>
                              <span> Привлекайте инвестиции
                               к своему бренду</span>
                           </li>
                       </ul>
                   </div>
                </div>
                <div class="col-1-3">
                    <div class="trade-block">
                        <img class="market" src="images/market.png" alt=" "/>
                        <div class="trade-title">
                            Магазины и сфера услуг
                        </div>
                        <ul class="trade-list">
                            <li>
                                <span>Разместите вывеску на законных основаниях</span>
                            </li>
                            <li>
                                <span>Получите правовое основание для развития франчайзинговой сети</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-1-3">
                    <img class="factory" src="images/factory.png" alt=" "/>
                    <div class="trade-title">
                        Производство и В2В
                    </div>
                    <ul class="trade-list">
                        <li>
                           <span> Выводите защищённые бренды на рынок</span>
                        </li>
                        <li>
                            <span>Получите инструмент для борьбы с контрафактной продукцией</span>
                        </li>
                        <li>
                           <span> Привлекайте инвестиции
                            к своему бренду</span>
                        </li>
                    </ul>
                </div>
            </div>
            <a class="btn yellow-button open-commercial-modal" href="#">
                Получите консультацию<br>
                и коммерческое предложение
            </a>
        </div>
    </section>


    <!--===================================================== section brand -->
    <section class="section-brand" id="brand">
<!--        <div class="container">-->
            <div class="wrapper-brand-slider">

                <!-- Swiper -->
                <div class="swiper-container brand-slider">
                    <div class="swiper-wrapper">

                        <!-- single slide -->
                        <div class="swiper-slide">
                            <div class="wrapper-slide">
                                <h2>
                                    Ваш бренд <span>правоохранный</span>?
                                </h2>
                                <div class="sub_h2">
                                    Ответьте на несколько вопросов и получите аудит Вашего фирменного обозначения, в который входит:
                                </div>

                                <div class="frame-basic">
                                    <div class="frame-block">
                                        <div class="frame-title">
                                            01
                                        </div>
                                        <div class="frame-line"></div>
                                        <div class="frame-text">
                                            Анализ соответствия Вашего обозначения требованиям Роспатент.
                                        </div>
                                    </div>
                                    <div class="frame-block">
                                        <div class="frame-title">
                                            02
                                        </div>
                                        <div class="frame-line"></div>
                                        <div class="frame-text">
                                            Проверка по актуальной базе Роспатент зарегистрированных товарных знаков РФ.
                                        </div>
                                    </div>
                                    <div class="frame-block">
                                        <div class="frame-title">
                                            03
                                        </div>
                                        <div class="frame-line"></div>
                                        <div class="frame-text">
                                            Рекомендации по доработке Вашего обозначения для повышения вероятности положительного решения (при необходимости).
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next yellow-button brand-next">
                                    Узнайте
                                </div>
                            </div>
                        </div>

                        <!-- single slide -->
                        <div class="swiper-slide">
                            <div class="wrapper-slide">
                               <h2>
                                   Как называется Ваш бренд?
                               </h2>

                                   <form method="post" class="send-form" autocomplete="off">
                                       <input type="text" name="client_name" class="client-name" placeholder="Введите название бренда">

                                       <div class="btn-holder">
                                           <button type="submit" class="swiper-button-next btn brand-next yellow-button">Далее</button>
                                       </div>
                                       <div>
                                           <input type="hidden" name="send_type" class="send-type" value="2">
                                           <input type="hidden" name="send_extra" class="send-extra" value="1">
                                           <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                                           <?php //Поле выше для защиты формы от спам-ботов ?>
                                       </div>
                                   </form>

                            </div>
                        </div>

                        <!-- single slide -->
                        <div class="swiper-slide">
                            <div class="wrapper-slide">
                                <h2>
                                    Выберите отрасль
                                </h2>

                                <div class="row questions-block">
                                    <div class="col-1-3">
                                        <div class="question_block active cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Химические товары
                                                </p>

                                                <div class="answer">
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Химические продукты;
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Краски, олифы лаки;
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Препараты для чистки, парфюмерия и косметика;
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Препараты для чистки, парфюмерия и косметика;
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Фармацевтические препараты
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="question_block active cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Машины и устройства
                                                </p>

                                                <div class="answer">
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Машинки, станки и двигатели
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Приборы, инструменты, оборудование
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Устройства для получения тепла
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Транспортные средства
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="question_block active cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Металлы и сплавы
                                                </p>

                                                <div class="answer">
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Обычные металлы и сплавы
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Благородные металлы и их  сплавы, изделия из них
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-1-3">
                                        <div class="question_block margin-center cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Изделия и материалы
                                                </p>
                                            <div class="answer">
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Бумага и изделия из бумаги
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Резина, асбет, пластмассы
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Кожа и имитация кожи
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Неметаллические строительные материалы
                                                </label>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="question_block margin-center cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Товары для дома
                                                </p>

                                                <div class="answer">
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Мебель и другие изделия
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Домашняя и кухонная утварь
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Игрушки и спортные товары
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question_block margin-center cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Текстиль и одежда
                                                </p>

                                                <div class="answer">
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Веревочно-канатные изделия
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Нити текстильные и пряжа
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Ткани, одеяла, покрывала и скатерти
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Одежда, обувь, головные уборы
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Галантерейные и басонные изделия
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Покрытия для полов
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question_block margin-center cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Приборы и инструменты
                                                </p>

                                                <div class="answer">
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Ручные инструменты
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Медицинские приборы и инструменты
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Огнестрельное оружие и пиротехнические средства
                                                    </label>
                                                    <label class="radio-label i-1">
                                                        <input name="special" type="radio" checked>
                                                        Музыкальные инструменты
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1-3">

                                        <div class="question_block margin-right cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Продукты питания
                                                </p>

                                            <div class="answer">
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Продукты животного происхождения
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Растительные пищевые продукты
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Продукты земледелия и лесного хозяйства
                                                </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question_block margin-right cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Напитки и табак
                                                </p>

                                            <div class="answer">
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Безалкогольные напитки и пиво
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Алкогольные напитки (за исключением пива)
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Табак и курительные принадлежности
                                                </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question_block margin-right cre-animate" data-animation="scale-up" data-speed="1200" data-delay="300"
                                             data-offset="90%" data-easing="ease">

                                            <div class="question-item">
                                                <p class="point-menu">
                                                    Услуги
                                                </p>

                                            <div class="answer">
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Помощь в управлении бизнесом
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Финансовые услуги
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Строительство и ремонт
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Телекоммуникации
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Перевозка людей и товаров
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Обработка материалов
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Услуги обучения и развлекательные мероприятия
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Научные и технические услуги
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Гостиницы, кейтеринг
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Медицинские и косметологические услуги
                                                </label>
                                                <label class="radio-label i-1">
                                                    <input name="special" type="radio" checked>
                                                    Юридические услуги и службы безопасности
                                                </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="swiper-button-next yellow-button margin-under brand-next">
                                    Далее
                                </div>
                            </div>
                        </div>
                        <!-- single slide -->
                        <div class="swiper-slide">
                            <div class="wrapper-slide">
                                <h2>
                                    Загрузите логотип
                                </h2>
                                <div class="sub_h2">
                                    При наличии
                                </div>
                                <label>
                                    <div class="jq-file">
                                        <input type="file" name="file" id="uploade-file">
                                        <span>Выберите файл</span>
                                    </div>

                                </label>
                                <input type="submit" value="Отправить">
                                <div class="swiper-button-next yellow-button brand-next">
                                    Далее
                                </div>
                            </div>
                        </div>

                        <!-- single slide -->
                        <div class="swiper-slide">
                            <div class="wrapper-slide">
                                <h2>
                                    Почти готово!
                                </h2>
                                <div class="sub_h2">
                                    Куда направить результаты
                                </div>

                                <form method="post" class="send-form" autocomplete="off">
                                    <input type="email" name="client_mail" class="client-mail" placeholder="Ваш email">

                                    <div class="btn-holder">
                                        <button type="submit" class="swiper-button-next btn brand-next yellow-button">Далее</button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="send_type" class="send-type" value="2">
                                        <input type="hidden" name="send_extra" class="send-extra" value="1">
                                        <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                                        <?php //Поле выше для защиты формы от спам-ботов ?>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <!-- single slide -->
                        <div class="swiper-slide">
                            <div class="wrapper-slide">
                                <h2>
                                    Подтвердите бесплатный заказ
                                </h2>
                                <div class="sub_h2">
                                    Мы перезвоним Вам и уточним детали заказа
                                </div>

                                <form method="post" class="send-form" autocomplete="off">
                                    <input type="text" name="client_text" class="client-text" placeholder="Ваше имя">
                                    <input type="tel" name="client_tel" class="client-tel" placeholder="Ваш телефон">

                                    <div class="btn-holder">
                                        <button type="submit" class="btn yellow-button">Подтвердите</button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="send_type" class="send-type" value="2">
                                        <input type="hidden" name="send_extra" class="send-extra" value="1">
                                        <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                                        <?php //Поле выше для защиты формы от спам-ботов ?>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
<!--                    <div class="swiper-button-next yellow-button brand-next">-->
<!--                        Узнайте-->
<!--                    </div>-->
                </div>
        </div>
<!--        </div>-->
    </section>





    <!--===================================================== section registration -->
    <section class="section-registration" id="registration">
        <div class="container">
            <h2>
                <span>Поможем в регистрации</span> Вашего бренда.
            </h2>
            <div class="sub_h2">
                Возьмём на себя всю работу.
            </div>

            <div class="registration-basic-row-1">
                <div class="registration-block">
                    <div class="right-hover-icon right-hover">
                        <?php include('svg/righ_hover.svg'); ?>
                    </div>
                    <img class="registration-img i-1" src="images/lamp.jpg" alt=" "/>
                    <div class="registration-title">
                        Подготовка
                    </div>
                </div>
                <div class="registration-block">
                    <div class="right-hover-icon right-hover">
                        <?php include('svg/righ_hover.svg'); ?>
                    </div>
                    <img class="registration-img i-2" src="images/box.jpg" alt=" "/>
                    <div class="registration-title">
                        Подача заявки
                    </div>
                </div>
                <div class="registration-block">
                    <img class="registration-img i-3" src="images/sertificate.jpg" alt=" "/>
                    <div class="registration-title">
                        Сопровождение
                    </div>
                </div>
            </div>
            <div class="registration-basic-row-2">
                <div class="registration-block">
                   <div class="registration-text">
                       <div class="registration-icon checked-icon">
                           <?php include('svg/checked.svg'); ?>
                       </div>
                       <div class="registration-span">
                           Проведём классификацию
                           Ваших товаров и услуг.
                       </div>
                   </div>
                </div>
                <div class="registration-block">
                    <div class="registration-text">
                        <div class="registration-icon">
                            <?php include('svg/checked.svg'); ?>
                        </div>
                        <div class="registration-span">
                            Рассчитаем размер госпошлин и
                            обеспечим от них скидку 30%.
                        </div>
                    </div>
                </div>
                <div class="registration-block">
                    <div class="registration-text">
                        <div class="registration-icon">
                            <?php include('svg/checked.svg'); ?>
                        </div>
                        <div class="registration-span">
                            Проинформируем о  поступлении
                            корреспонденции из Роспатент.
                        </div>
                    </div>
                </div>
            </div>

            <div class="registration-basic-row-3">
                <div class="registration-block">
                    <div class="registration-text">
                        <div class="registration-icon">
                            <?php include('svg/checked.svg'); ?>
                        </div>
                        <div class="registration-span">
                            Проведём предварительный
                            аудит Вашего обозначения.
                        </div>
                    </div>
                </div>
                <div class="registration-block">
                    <div class="registration-text">
                        <div class="registration-icon">
                            <?php include('svg/checked.svg'); ?>
                        </div>
                        <div class="registration-span">
                            Сообщим Вашему бухгалтеру
                            необходимую информацию для
                            оплаты госпошлин.
                        </div>
                    </div>
                </div>
                <div class="registration-block">
                    <div class="registration-text">
                        <div class="registration-icon">
                            <?php include('svg/checked.svg'); ?>
                        </div>
                        <div class="registration-span">
                            Составим и направим от Вашего
                            имени ответы на все запросы в
                            Роспатент.
                        </div>
                    </div>
                </div>
            </div>

            <div class="registration-basic-row-4">
                <div class="registration-block">
                    <div class="registration-text">
                        <div class="registration-icon">
                            <?php include('svg/checked.svg'); ?>
                        </div>
                        <div class="registration-span">
                            Дадим рекомендации  по
                            доработке знака (если необходимо).
                        </div>
                    </div>
                </div>
                <div class="registration-block">
                    <div class="registration-text">
                        <div class="registration-icon">
                            <?php include('svg/checked.svg'); ?>
                        </div>
                        <div class="registration-span">
                            Оформим все документы и
                            подадим заявку за 1 рабочий день.
                        </div>
                    </div>
                </div>
                <div class="registration-block">
                    <div class="registration-text">
                        <div class="registration-icon">
                            <?php include('svg/checked.svg'); ?>
                        </div>
                        <div class="registration-span">
                            Сообщим о принятии решения о
                            регистрации Товарного знака.
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn yellow-button open-man-modal" href="#">
                Закажите весь комплекс услуг<Br>
                со скидкой 30% на госпошлины.
            </a>
        </div>
    </section>


    <!--===================================================== section packet -->
    <section class="section-packet" id="packet">
        <div class="container">
            <h2>
                Выбирайте <span>удобный вариант</span>
            </h2>

            <div class="row">
                <div class="col-1-3">
                    <div class="packet-block">
                        <div class="packet-title">
                            Экспресс-подача<br>
                            заявки
                        </div>
                        <div class="packet-text">
                            Вы хотите сэкономить и сами будете отвечать на запросы экспертизы.
                            <span>
                                Результат:
                            </span>
                            Приоритетная справка от Роспатент.
                            <a class="packet-link open-packet-modal" href="#">
                                Состав работ
                            </a>
                            <div class="packet-term">
                                Срок
                                <span>
                                    1 рабочий день
                                </span>
                            </div>
                            <div class="packet-price">
                                14 000
                                <div class="ruble-icon">
                                    <?php include('svg/ruble.svg'); ?>
                                </div>
                            </div>
                        </div>
                        <a class="btn packet-button open-request-modal" href="#">
                            Оставьте заявку
                        </a>
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="packet-block-complex">
                        <div class="bookmark-block">
                            <span>
                                Выгодно
                            </span>
                        </div>
                        <div class="packet-title-complex">
                            Комплекс<Br>
                            <span>
                                Экспресс-подача + Сопровождение
                            </span>
                        </div>
                        <div class="packet-text-complex">
                            Вы предпочитаете делегировать задачи профессионалам, а сами занимаетесь развитием профильного бизнеса.
                            <span>
                                Результат:
                            </span>
                            Закажите подачу и сопровождение заявки в рамках единого договора и сэкономьте ещё больше.
<!--                            <a class="packet-link-complex open-packet-complex-modal" href="#">-->
<!--                                Состав работ-->
<!--                            </a>-->
                            <div class="packet-price-complex">
                                25 000
                                <div class="ruble-icon">
                                    <?php include('svg/ruble.svg'); ?>
                                </div>
                            </div>
                            <a class="btn packet-button-complex open-request-modal" href="#">
                                Оставьте заявку
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="packet-block">
                        <div class="packet-title i-1">
                            Сопровождение<Br>
                            заявки
                        </div>
                        <div class="packet-text">
                            Вы подаете заявку самостоятельно, но взаимодействие с Роспатент доверяете профессионалам.
                            <span>
                                Результат:
                            </span>
                            Представление Ваших интересов в Роспатент и ответы на все запросы экспертов вплоть до получения решения о выдаче свидетельства на товарный знак.
                            <a class="packet-link open-packet-complex-modal" href="#">
                                Состав работ
                            </a>
                            <div class="packet-term i-2">
                                Временные рамки
                                <span>
                                   от 10 до 18 месяцев.
                                </span>
                            </div>
                            <div class="packet-price">
                                15 000
                                <div class="ruble-icon">
                                    <?php include('svg/ruble.svg'); ?>
                                </div>
                            </div>
                        </div>
                        <a class="btn packet-button open-request-modal" href="#">
                            Оставьте заявку
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!--===================================================== section wait -->
    <section class="section-wait" id="wait">
        <div class="container">
            <h2 class="align-center">
                Некогда ждать?
            </h2>
            <div class="sub_h2 align-center">
                Специальный сервис
            </div>
            <div class="wait-text align-center">
                Ускоренная регистрация
            </div>
            <div class="wait-span align-center">
                Когда для вас время дороже денег
            </div>

            <div class="wait-price">
                37 000
                <div class="wait-icon">
                    <?php include('svg/ruble-blue.svg'); ?>
                </div>
            </div>

            <div class="wait-line"></div>

            <div class="wait-result align-center">
                Результат:
            </div>
            <div class="row">
                <div class="col-1-3">
                    <div class="result-icon">
                        <?php include('svg/check.svg'); ?>
                    </div>
                    <div class="result-text">
                        Отчёт о проведении тотального патентного поиска – через 10 дней;
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="result-icon">
                        <?php include('svg/check.svg'); ?>
                    </div>
                    <div class="result-text i-1">
                        Приоритетная справка<br> Роспатент – через 2 дня;
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="result-icon">
                        <?php include('svg/check.svg'); ?>
                    </div>
                    <div class="result-text">
                        Запись в Реестре Роспатент и Свидетельство на Товарный знак – через 3 месяца.
                    </div>
                </div>
            </div>
            <div class="wait-line"></div>
            <a class="wait-link align-center open-packet-last-modal" href="#">
                Состав работ
            </a>

            <div class="wait-term align-center">
                Срок - 3 месяца
            </div>

            <a class="btn yellow-button open-request-modal" href="#">
                Оставьте заявку
            </a>
        </div>
    </section>


    <!--===================================================== section lite -->
    <section class="section-lite" id="lite">
        <div class="container">
            <h2 class="align-center">
                С нами легко и удобно работать:
            </h2>

            <div class="row">
                <div class="col-1-3">
                   <div class="lite-center a-1">
                       <img src="images/aircraft.png" alt=" "/>
                       <div class="lite-title">
                           Подача заявки
                       </div>
                       <div class="lite-text">
                           Наши специалисты помогут подобрать для Вас классы МКТУ для подачи заявки на товарный знак.
                       </div>
                   </div>
                </div>
                <div class="col-1-3">
                    <div class="lite-center a-1">
                        <img src="images/reg.png" alt=" "/>
                        <div class="lite-title">
                            Регистрация
                        </div>
                        <div class="lite-text">
                            Благодаря электронному взаимодействию с Роспатентом, мы отслеживаем информацию по Вашей заявке и своевременное выполнение этапов регистрации.
                        </div>
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="lite-center a-1">
                        <img src="images/letter.png" alt=" "/>
                        <div class="lite-title">
                            Контроль сроков
                        </div>
                        <div class="lite-text">
                            Мы контролируем сроки оплаты пошлин и направляем Вам напоминания.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-1-2">
                    <div class="lite-center a-1">
                        <img src="images/clock.png" alt=" "/>
                        <div class="lite-title">
                            Скорость работы
                        </div>
                        <div class="lite-text">
                            Вся информация о входящей корреспонденции из Роспатент направляется Вам в течение 3-5 рабочих дней с комментариями нашего Патентного поверенного.
                        </div>
                    </div>
                </div>
                <div class="col-1-2">
                    <div class="lite-center">
                        <img src="images/folder.png" alt=" "/>
                        <div class="lite-title">
                            Хранение корреспонденции
                        </div>
                        <div class="lite-text">
                            Мы храним всю корреспонденцию и документы, отправленные и полученные из Роспатента  и при необходимости предоставляем их Вам.
                        </div>
                    </div>
                </div>
            </div>

            <a class="btn yellow-button open-lite-modal" href="#">
               Заказать консультацию
            </a>
        </div>
    </section>


    <!--===================================================== section more -->
    <section class="section-more" id="more">
        <div class="container">
            <h2 class="align-center">
                <span>Узнайте ещё больше</span> про товарные знаки
            </h2>

            <div class="wrapper-more-slider">
                <div class="description-block">
                    <div class="description-title">
                        Описание:
                    </div>
                    <div class="description-text">
                        Сайт рыбатекст поможет
                        дизайнеру, верстальщику,
                        вебмастеру сгенерировать
                        несколько абзацев более
                    </div>
                </div>


                <!-- Swiper -->
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">

                        <!-- single slide -->
                        <div class="swiper-slide">
                            <a href="https://www.youtube.com/watch?v=XOIfBhSmoOc&amp;autoplay=1" class="review-item"
                               data-fancybox="review">
                            </a>
                            <div class="play-block">
                                <span> Смотреть<Br>Классическая<br>музыка</span>
                                <div class="play-icon">
                                    <?php include('svg/play.svg'); ?>
                                </div>
                            </div>
                            <img src="images/slider-bg.jpg" alt=" "/>
                        </div>


                        <!-- single slide -->
                        <div class="swiper-slide">
                            <a href="https://www.youtube.com/watch?v=XOIfBhSmoOc&amp;autoplay=1" class="review-item"
                               data-fancybox="review">
                            </a>
                            <div class="play-block">
                                <span> Смотреть<Br>Другое видео</span>
                                <div class="play-icon">
                                    <?php include('svg/play.svg'); ?>
                                </div>
                            </div>
                            <img src="images/slider-bg.jpg" alt=" "/>
                        </div>

                        <!-- single slide -->
                        <div class="swiper-slide">
                            <a href="https://www.youtube.com/watch?v=XOIfBhSmoOc&amp;autoplay=1" class="review-item"
                               data-fancybox="review">
                            </a>
                            <div class="play-block">
                                <span> Смотреть<Br>Видео 3</span>
                                <div class="play-icon">
                                    <?php include('svg/play.svg'); ?>
                                </div>
                            </div>
                            <img src="images/slider-bg.jpg" alt=" "/>
                        </div>
                    </div>

                    <!-- Add Arrows -->
                    <div class="swiper-button-next more-next"></div>
                    <div class="swiper-button-prev more-prev"></div>

                </div>
                <div class="blue-block">
<!--                    <div class="blue-icon">-->
<!--                        --><?php //include('svg/back.svg'); ?>
<!--                    </div>-->
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">

                                    Классическая музыка

                            </div>
                            <div class="swiper-slide">

                                    Другое видео

                            </div>
                            <div class="swiper-slide">

                                    Видео 3

                            </div>
                        </div>
<!--                    <div class="blue-icon-down">-->
<!--                        --><?php //include('svg/back.svg'); ?>
<!--                    </div>-->
                </div>
            </div>

            <h5 class="align-center">
                Поделитесь этим видео с коллегами и руководителем
            </h5>

            <div class="smm-wrapper">
                <div class="smm-block">
                    <a href="#" class="smm-icon i-1">
                        <?php include('svg/vk.svg'); ?>
                    </a>
                </div>
                <div class="smm-block">
                    <a href="#" class="smm-icon i-2">
                        <?php include('svg/facebook.svg'); ?>
                    </a>
                </div>
                <div class="smm-block">
                    <a href="#" class="smm-icon i-3">
                        <?php include('svg/telegram.svg'); ?>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!--===================================================== section form-registration -->
    <section class="section-form form-registration" id="form-registration">
        <div class="container">

            <form method="post" class="send-form block-form" autocomplete="off">
                <h5>
                    Вам нужна регистрация
                    товарного знака?
                </h5>
                <div class="sub_h5">
                    Заполните форму и мы <span>перезвоним Вам</span>
                    в ближайшее время!
                </div>
                <div class="row">
                    <div class="col-1-3">
                        <input type="text" name="client_name" class="client-name" placeholder="Как Вас зовут?">
                    </div>

                    <div class="col-1-3">
                        <input type="tel" name="client_phone" class="client-phone" placeholder="+7 (_)__-__-__">
                    </div>

                    <div class="col-1-3">
                        <div class="btn-holder">
                            <button type="submit" class="btn yellow-button">Обратитесь к нам</button>
                            <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                        </div>
                    </div>
                </div>

                <input type="hidden" name="send_type" class="send-type" value="2">
                <input type="hidden" name="send_extra" class="send-extra" value="1">
				<input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
				<?php //Поле выше для защиты формы от спам-ботов ?>


                <!-- Agreement -->
                <div class="form-agree">
                    <label class="checkbox-label form-agree-check checked">
                        <input type="checkbox" checked>
                        Я даю своё согласие на обработку моих персональных данных.
                    </label>
                </div>
            </form>

        </div>
    </section>

    <!--===================================================== Footer -->
    <footer class="layout-footer">
        <div class="container">

            <div class="row">

                <!-- Logo -->
                <div class="col-1-2">
                    <a href="#" class="logo si-jump">
                        <span class="logo-icon">
                            <?php include('svg/logo.svg'); ?>
                        </span>
                    </a>
                    <div class="logo-text">
                        <div class="logo-title">
                            Экспресс патент
                        </div>
                        <p>
                            Экспресс оформление
                            товарного знака
                        </p>
                    </div>
                    <div class="time-text">
                        <div class="time-title">
                            Режим работы
                        </div>
                        <p>
                            с 10 до 19 по Москве
                        </p>
                    </div>
                </div>

                <!-- Phone block -->
                <div class="col-1-2">
                    <div class="si-phone">
                        <a href="tel:+74955329441" class="phone-link">+7 (495) 532-94-41</a>
                        <a href="#" class="btn btn-ghost open-lite-modal consult" data-extra="1">Оставьте заявку</a>
                    </div>
                </div>

            </div>
        </div>
    </footer>


    <!--===================================================== Modals -->
    <!-- Overlay(s) -->
    <div class="si-overlay"></div>
    <div class="si-overlay-2"></div>

    <!--    <div class="sms-modal">-->
    <!--    <a href="#" class="si-close sms-close close">-->
    <!---->
    <!--    </a>-->
    <!---->
    <!--    <div class="modal-container align-center">-->
    <!---->
    <!--        <div class="row">-->
    <!--            <div class="col-2-3">-->
    <!--                <div class="modal-form-title">-->
    <!--                    СМС-СКИДКА-->
    <!--                </div>-->
    <!---->
    <!--                <div class="modal-sub-time">-->
    <!--                    Впишите свой телефон и получитесмс-купон на скидку:-->
    <!--                </div>-->
    <!--                <form method="post" class="send-form" autocomplete="off">-->
    <!---->
    <!---->
    <!--                   <div class="row">-->
    <!--                       <div class="col-1-2">-->
    <!--                           <input type="tel" name="client_phone" class="client-phone" placeholder="Ваш номер телефона">-->
    <!---->
    <!--                           <input type="hidden" name="send_type" class="send-type" value="1">-->
    <!--                           <input type="hidden" name="send_extra" class="send-extra" value="1">-->
    <!--                           <input type="hidden" name="key" value="--><?php //echo $_SESSION['sf_key'] ?><!--">-->
    <!--                           --><?php ////Поле выше для защиты формы от спам-ботов ?>
    <!--                       </div>-->
    <!--                       <div class="col-1-2">-->
    <!--                           <div class="btn-holder">-->
    <!--                               <button type="submit" class="btn blue-button">Получить смс-скидку</button>-->
    <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
    <!--                           </div>-->
    <!--                       </div>-->
    <!--                   </div>-->
    <!---->
    <!-- Agreement -->
    <!--                    <div class="form-agree align-left">-->
    <!--                        <label class="checkbox-label form-agree-check checked">-->
    <!--                            <input type="checkbox" checked>-->
    <!--                            Я даю своё согласие на обработку моих-->
    <!--                            персональных данных.-->
    <!--                        </label>-->
    <!--                    </div>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--            <div class="col-1-3">-->
    <!--                <img class="hand-img" src="images/sms-hand.png" alt=" ">-->
    <!--            </div>-->
    <!--        </div>-->
    <!---->
    <!--    </div>-->
    <!--</div>-->

    <div class="position-block">
        <a href="#" class="btn btn-ghost find-block-fixed open-get-modal">
            <div class="find-title">
                5 ключевых критериев,
            </div>
            <div class="find-text">
                на которые <span>смотрит<br>
                    экспертиза</span>
            </div>
        </a>
    </div>

    <!-- Wrappers -->
    <div class="si-modals-wrapper-2"></div>



    <div class="si-modals-wrapper">

        <!--============================================== success modal -->
        <div class="si-success-modal si-success-modal-1">
            <a href="#" class="si-close"></a>

            <div class="modal-container align-center">

                <div class="si-success-modal-title">
                    Спасибо!
                </div>

                <div class="success-time">
                    Наш менеджер свяжется с вами в течение 15 минут
                </div>

                <p>
                    <strong>Время работы отдела продаж:</strong>
                    пн-пт с 10.00 до 20.00 (по Москве)
                </p>

            </div>
        </div>

        <!--============================================== success modal-2 -->
        <div class="si-success-modal si-success-modal-2">
            <a href="#" class="si-close"></a>

            <div class="modal-container align-center">

                <div class="si-success-modal-title">
                    Файл уде в пути. <br>
                    Проерьте свой ящик
                </div>

            </div>
        </div>

        <!--============================================== commercial modal -->
        <div class="si-modal get-modal get-modal-1">
            <a href="#" class="si-close close">

            </a>

            <div class="modal-container align-center">

                <div class="modal-form-title">
                    Мы отправим Вам этот файл по электронной почте
                </div>

                <div class="modal-sub-time">
                    Вы согласны получать от нас и другие письма с полезной информацией?
                    <br><br>
                    <span>Вы всегда сможете отписаться</span>
                </div>
                <form method="post" class="send-form" autocomplete="off">

                    <div class="row">
                        <div class="col-1-2">
                            <input type="email" name="client_mail" class="client-mail" placeholder="Ваш email">
                        </div>
                        <div class="col-1-2">
                            <div class="btn-holder">
                                <button type="submit" class="btn blue-button">Да, присылайте</button>
                                <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="send_type" class="send-type" value="1">
                    <input type="hidden" name="send_extra" class="send-extra" value="1">
                    <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                    <?php //Поле выше для защиты формы от спам-ботов ?>

                    <!-- Agreement -->
                    <div class="form-agree">
                        <label class="checkbox-label form-agree-check checked">
                            <input type="checkbox" checked>
                            Я даю своё согласие на обработку моих
                            персональных данных.
                        </label>
                    </div>
                </form>
            </div>
        </div>
	
        <!--============================================== commercial modal -->
        <div class="si-modal commercial-modal commercial-modal-1">
            <a href="#" class="si-close close">

            </a>

            <div class="modal-container align-center">



                <div class="row">
                    <div class="col-1-2">
                        <div class="modal-form-title">
                            Закажите коммерческое
                            предложение
                        </div>

                        <div class="modal-sub-time">
                            Оставьте Ваши контактные данные<br>
                            и мы с Вами свяжемся
                        </div>
                        <form method="post" class="send-form" autocomplete="off">

                            <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">

                            <input type="tel" name="client_phone" class="client-phone" placeholder="+7 (_)__-__-__">

                            <input type="hidden" name="send_type" class="send-type" value="1">
                            <input type="hidden" name="send_extra" class="send-extra" value="1">
                            <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                            <?php //Поле выше для защиты формы от спам-ботов ?>

                            <div class="btn-holder">
                                <button type="submit" class="btn blue-button">Получить коммерческое<br>
                                    предложение</button>
                                <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                            </div>

                            <!-- Agreement -->
                            <div class="form-agree align-left">
                                <label class="checkbox-label form-agree-check checked">
                                    <input type="checkbox" checked>
                                    Я даю своё согласие на обработку моих
                                    персональных данных.
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="col-1-2">
                        <img src="images/woman-modal.jpg" alt=" ">
                    </div>
                </div>

            </div>
        </div>


        <!--============================================== man modal -->
        <div class="si-modal man-modal man-modal-1">
            <a href="#" class="si-close close">

            </a>

            <div class="modal-container align-center">



                <div class="row">
                    <div class="col-1-2">
                        <div class="modal-form-title">
                            Получите скидку 30% на госпошлины
                        </div>

                        <div class="modal-sub-time">
                            Наш менеджер свяжется с Вами в ближайшее время
                        </div>
                        <form method="post" class="send-form" autocomplete="off">

                            <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">

                            <input type="tel" name="client_phone" class="client-phone" placeholder="+7 (_)__-__-__">

                            <input type="email" name="client_mail" class="client-mail" placeholder="Ваше email">

                            <input type="hidden" name="send_type" class="send-type" value="1">
                            <input type="hidden" name="send_extra" class="send-extra" value="1">
                            <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                            <?php //Поле выше для защиты формы от спам-ботов ?>

                            <div class="btn-holder">
                                <button type="submit" class="btn blue-button">Заказать комплекс<br> услуг</button>
                                <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                            </div>

                            <!-- Agreement -->
                            <div class="form-agree align-left">
                                <label class="checkbox-label form-agree-check checked">
                                    <input type="checkbox" checked>
                                    Я даю своё согласие на обработку моих
                                    персональных данных.
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="col-1-2">
                        <img src="images/man-img.png" alt=" ">
                    </div>
                </div>

            </div>
        </div>


        <!--============================================== request modal -->
        <div class="si-modal request-modal request-modal-1">
            <a href="#" class="si-close close">

            </a>

            <div class="modal-container align-center">



                <div class="row">
                    <div class="modal-form-title">
                        Оставить заявку
                    </div>

                    <div class="modal-sub-time">
                        Наш менеджер свяжется с Вами<br> в ближайшее время
                    </div>
                    <form method="post" class="send-form" autocomplete="off">

                        <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">

                        <input type="tel" name="client_phone" class="client-phone" placeholder="+7 (_)__-__-__">

                        <input type="email" name="client_mail" class="client-mail" placeholder="Ваше email">

                        <input type="hidden" name="send_type" class="send-type" value="1">
                        <input type="hidden" name="send_extra" class="send-extra" value="1">
                        <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                        <?php //Поле выше для защиты формы от спам-ботов ?>

                        <div class="btn-holder">
                            <button type="submit" class="btn blue-button">Оставить заявку</button>
                            <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                        </div>

                        <!-- Agreement -->
                        <div class="form-agree align-left">
                            <label class="checkbox-label form-agree-check checked">
                                <input type="checkbox" checked>
                                Я даю своё согласие на обработку моих
                                персональных данных.
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--============================================== packet modal-1 -->
        <div id="1" class="si-modal packet-modal packet-modal-1">
            <a href="#" class="si-close close">

            </a>

            <div class="modal-container align-center">



                <div class="row">
                    <div class="modal-form-title">
                        Подача заявки в Роспатент
                    </div>

                    <ul class="packet-list">
                        <li>
                            Подготовка расшифровок МКТУ.
                        </li>
                        <li>
                            Подготовка комплекта заявительной документации.
                        </li>
                        <li>
                            Согласование перечня товаров и услуг с заказчиком.
                        </li>
                        <li >
                            Консультирование по оплате пошлин.
                        </li>
                        <li>
                            Электронная подача заявки в Роспатент.
                        </li>
                    </ul>

                    <div class="packet-text">
                        Итог: Получение из Роспатента приоритетной справки на товарный знак.
                    </div>

                </div>
            </div>
        </div>


        <!--============================================== packet modal-2 -->
        <div id="2" class="si-modal packet-complex-modal packet-complex-modal-2">
            <a href="#" class="si-close close">

            </a>

            <div class="modal-container align-center">

                    <div class="modal-form-title">
                        Экспертный поиск на сходство
                    </div>

                    <ul class="packet-list">
                        <li>
                            Подбор классов МКТУ.
                        </li>
                        <li>
                            Проверка по официальным российским и зарубежным базам зарегистрированных товарных знаков и поданных заявок.
                        </li>
                        <li>
                            Выявление наличия сходства до степени смешения по фонетическому, графическому и семантическому критерию.
                        </li>
                        <li>
                            Разработка оптимальных стратегий регистрации знака.
                        </li>
                        <li>
                            Доработка знака в случае необходимости.
                        </li>
                        <li>
                            Письменное экспертное заключение и консультация юриста по итогам.
                        </li>
                    </ul>

                    <div class="packet-text">
                        Итог: утверждение финального знака и определение стратегии его регистрации.
                    </div>


                <div class="modal-form-title">
                    Подача заявки в Роспатент
                </div>

                <ul class="packet-list">
                    <li>
                        Подготовка расшифровок МКТУ.
                    </li>
                    <li>
                        Подготовка комплекта заявительной документации.
                    <li>
                        Согласование перечня товаров и услуг с заказчиком.
                    </li>
                    <li>
                        Консультирование по оплате пошлин.
                    </li>
                    <li>
                        Электронная подача заявки в Роспатент
                    </li>

                </ul>

                <div class="packet-text">
                    Итог: Получение из Роспатента приоритетной справки на товарный знак.
                </div>


                <div class="modal-form-title">
                    Полное ведение делопроизводства
                </div>

                <ul class="packet-list">
                    <li>
                        Ответы на вопросы экспертизы.
                    </li>
                    <li>
                        Ответы на уведомления (предварительный отказ) экспертизы.
                    <li>
                        Процессуальные ходатайства.
                    </li>
                    <li>
                        Мониторинг делопроизводства.
                    </li>
                    <li>
                        Пересылка заказчику копий документа.
                    </li>

                </ul>

                <div class="packet-text">
                    Итог: регистрация товарного знака.
                </div>

            </div>
        </div>

        <!--============================================== packet modal-2 -->
        <div id="2" class="si-modal packet-last-modal packet-last-modal-3">
            <a href="#" class="si-close close">

            </a>


            <div class="modal-container align-center">

                    <div class="modal-form-title">
                        Экспертный поиск на сходство
                    </div>

                    <ul class="packet-list">
                        <li >
                            Подбор классов МКТУ.
                        </li>
                        <li >
                            Проверка по официальным российским и зарубежным базам зарегистрированных товарных знаков и поданных заявок.
                        </li>
                        <li>
                            Выявление наличия сходства до степени смешения по фонетическому, графическому и семантическому критерию.
                        </li>
                        <li>
                            Разработка оптимальных стратегий регистрации знака.
                        </li>
                        <li>
                            Доработка знака в случае необходимости.
                        </li>
                        <li>
                            Письменное экспертное заключение и консультация юриста по итогам.
                        </li>
                    </ul>

                    <div class="packet-text">
                        Итог: утверждение финального знака и определение стратегии его регистрации.
                    </div>

                <div class="modal-form-title">
                    Подача заявки в Роспатент
                </div>

                <ul class="packet-list">
                    <li>
                        Подготовка расшифровок МКТУ.
                    </li>
                    <li>
                        Подготовка комплекта заявительной документации.
                    </li>
                    <li >
                        Согласование перечня товаров и услуг с заказчиком.
                    </li>
                    <li >
                        Консультирование по оплате пошлин.
                    </li>
                    <li>
                        Электронная подача заявки в Роспатент.
                    </li>
                </ul>

                <div class="packet-text">
                    Итог: Получение из Роспатента приоритетной справки на товарный знак.
                </div>

                <div class="modal-form-title">
                    Полное ведение делопроизводства
                </div>

                <ul class="packet-list">
                    <li>
                        Ответы на вопросы экспертизы.
                    </li>
                    <li>
                        Ответы на уведомления (предварительный отказ) экспертизы.
                    </li>
                    <li>
                        Процессуальные ходатайства.
                    </li>
                    <li>
                        Мониторинг делопроизводства.
                    </li>
                    <li>
                        Пересылка заказчику копий документа.
                    </li>
                </ul>

                <div class="packet-text">
                    Итог: регистрация товарного знака.
                </div>

                <div class="modal-form-title">
                    Ускорение делопроизводства
                </div>

                <ul class="packet-list">
                    <li>
                        Ускоренная проверка знака Роспатентом за 10 дней.
                    </li>
                    <li>
                        Ускоренная экспертиза знака в Роспатенте за 2 месяца.
                    </li>
                    <li>
                        Дополнительная госпошлина за ускоренную процедуру – 94 400 рублей.
                    </li>
                </ul>

                <div class="packet-text">
                    Итог: регистрация товарного знака.
                </div>
            </div>
        </div>


        <!--============================================== request modal -->
        <div class="si-modal lite-modal lite-modal-1">
            <a href="#" class="si-close close">

            </a>

            <div class="modal-container align-center">



                <div class="row">
                    <div class="modal-form-title">
                        Оставьте заявку на консультацию
                    </div>

                    <div class="modal-sub-time">
                        Заполните простую форму и наш менеджер свяжется с Вами
                    </div>
                    <form method="post" class="send-form" autocomplete="off">

                        <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">

                        <input type="tel" name="client_phone" class="client-phone" placeholder="+7 (_)__-__-__">

                        <input type="email" name="client_mail" class="client-mail" placeholder="Ваше email">

                        <input type="hidden" name="send_type" class="send-type" value="1">
                        <input type="hidden" name="send_extra" class="send-extra" value="1">
                        <input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
                        <?php //Поле выше для защиты формы от спам-ботов ?>

                        <div class="btn-holder">
                            <button type="submit" class="btn blue-button">Заказать консультацию</button>
                            <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                        </div>

                        <!-- Agreement -->
                        <div class="form-agree align-left">
                            <label class="checkbox-label form-agree-check checked">
                                <input type="checkbox" checked>
                                Я даю своё согласие на обработку моих
                                персональных данных.
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--============================================== text modal 1 -->
        <div class="si-modal text-modal text-modal-1">
            <a href="#" class="si-close"></a>

            <div class="modal-container">

                <div class="modal-form-title align-center">
                    Согласие на обработку персональных данных
                </div>

                <div class="modal-text-block">
                    <p>
                        Настоящим в&nbsp;соответствии с&nbsp;Федеральным законом №152&#8209;ФЗ
                        «О&nbsp;персональных данных» от&nbsp;27.07.2006 года свободно, своей волей и&nbsp;в&nbsp;своём
                        интересе выражаю своё безусловное согласие на&nbsp;обработку моих персональных данных
                        НАЗВАНИЕ КОМПАНИИ,
                        зарегистрированным в&nbsp;соответствии с&nbsp;законодательством&nbsp;РФ по&nbsp;адресу:
                        АДРЕС КОМПАНИИ
                        (далее по&nbsp;тексту&nbsp;- Оператор).
                    </p>

                    <p>
                        Персональные данные&nbsp;- любая информация, относящаяся к&nbsp;определённому
                        или&nbsp;определяемому на&nbsp;основании такой информации физическому лицу.
                    </p>

                    <p>
                        Настоящее Согласие выдано мною на&nbsp;обработку следующих персональных данных:
                    </p>

                    <ul class="marked">
                        <li>
                            Имя;
                        </li>
                        <li>
                            Телефон;
                        </li>
                        <li>
                            E-mail;
                        </li>
                        <li>
                            Комментарий.
                        </li>
                    </ul>

                    <p>
                        Согласие дано Оператору для&nbsp;совершения следующих действий с&nbsp;моими персональными
                        данными с&nbsp;использованием средств автоматизации и/или&nbsp;без&nbsp;использования таких
                        средств: сбор, систематизация, накопление, хранение, уточнение (обновление, изменение),
                        использование, обезличивание, передача третьим лицам для&nbsp;указанных ниже целей,
                        а&nbsp;также осуществление любых иных действий, предусмотренных действующим
                        законодательством&nbsp;РФ, как&nbsp;неавтоматизированными, так&nbsp;и&nbsp;автоматизированными
                        способами.
                    </p>

                    <p>
                        Данное согласие даётся Оператору и&nbsp;третьему лицу(&#8209;ам)
                        ТРЕТЬИ ЛИЦА
                        для&nbsp;обработки моих персональных данных в&nbsp;следующих целях:
                    </p>

                    <ul class="marked">
                        <li>
                            предоставление мне услуг/работ;
                        </li>
                        <li>
                            направление в&nbsp;мой адрес уведомлений, касающихся предоставляемых услуг/работ;
                        </li>
                        <li>
                            подготовка и&nbsp;направление ответов/коммерческих предложений на&nbsp;мои запросы;
                        </li>
                        <li>
                            направление в&nbsp;мой адрес информации, в&nbsp;том числе рекламной,
                            о&nbsp;мероприятиях/товарах/услугах/работах Оператора.
                        </li>
                    </ul>

                    <p>
                        Настоящее согласие действует до&nbsp;момента его&nbsp;отзыва путём направления соответствующего
                        уведомления на&nbsp;электронный адрес
                        <a href="mailto:">ЕМЕЙЛ</a>.
                        В&nbsp;случае отзыва мною согласия на&nbsp;обработку персональных данных Оператор вправе
                        продолжить обработку персональных данных без&nbsp;моего согласия при&nbsp;наличии оснований,
                        указанных в&nbsp;пунктах 2&#8209;11 части&nbsp;1 статьи&nbsp;6, части&nbsp;2 статьи&nbsp;10
                        и&nbsp;части&nbsp;2 статьи&nbsp;11 Федерального закона №152&#8209;ФЗ
                        «О&nbsp;персональных данных» от&nbsp;26.06.2006&nbsp;г.
                    </p>
                </div>

            </div>
        </div>

    </div>

</div>

<script>
    var template_url = '<?php echo SI_RootURL(); ?>';
    //    var template_url = '<?php //echo SI_CurrentPageURL(); ?>//';
</script>


<!-- Inlcude jQuery framework + jQuery migrate -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-migrate-1.4.1.min.js"></script>

<!-- IE -->
<!--[if IE]>
<script src="js/html5shiv.js"></script> <![endif]-->

<!-- JS Scripts -->
<script src="js/plugins-all.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/smooth-scroll-1.4.4.min.js"></script>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

<!-- Google Recaptcha -->
<!--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>-->
<!--<script type="text/javascript">-->
<!--    var recaptcha1,-->
<!--        recaptcha2,-->
<!--        recaptcha3;-->
<!--    var onloadCallback = function () {-->
<!--        recaptcha = grecaptcha.render('g-recaptcha', {-->
<!--            'sitekey': ''-->
<!--        });-->
<!--    };-->
<!--</script>-->

<!-- custom scripts -->
<script src="js/main.js"></script>
<script src="js/share.js"></script>

<?php include('si-engine.php'); ?>

<!--

Digital-agency "Hello, brand!" - http://hello-brand.ru/
Дата создания: 16.03.2016
Версия: 1.0

-->


</body>
</html>