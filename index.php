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
        <div class="container">

            <div class="row">

                <!-- Logo -->
                <div class="col-1-2">
                    <a href="#" class="logo si-jump">
                        <span class="logo-icon">
                            <img src="images/logo.png" alt=" ">
                        </span>
                    </a>
                    <div class="logo-text">
                        <div class="logo-title">
                            Двери Истра
                        </div>
                        <p>
                            Межкомнатные двери
                            из массива
                        </p>
                    </div>
                </div>

                <!-- Phone block -->
                <div class="col-1-2 align-right">
                    <div class="si-phone">
                        <a href="tel:+74983140196" class="phone-link">+7 (498) 314 01 96</a>
                        <a href="#" class="btn open-lite-modal consult" data-extra="1">Заказать звонок</a>
                    </div>
                </div>

            </div>
            <div class="nav-block">
                <div class="nav-item">
                    <div class="nav">
                        <a href="#" class="burger-menu">
                            <?php include('svg/burger.svg'); ?>
                        </a>
                    </div>

                    <div class="menu">
                        <ul>
                            <li>
                                <a class="si-jump" href="#trade">Возможности</a>
                            </li>
                            <li>
                                <a class="si-jump" href="#registration-tab">Схема регистрации</a>
                            </li>
                            <li>
                                <a class="si-jump" href="#packet-tab">Тарифы</a>
                            </li>
                            <li>
                                <a class="si-jump" href="#lite-tab">Преимущества</a>
                            </li>
                            <li>
                                <a class="si-jump" href="#more-tab">Полезные новости</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="title-block">
                <h1>
                    <span>Роскошные</span> межкомнатные
                    двери из <span>100% массива</span>
                </h1>
                <div class="sub_title">
                    Изготовление с индивидуальным подходом
                    к каждому изделию и Вашим желаниям.
                </div>
                <a href="#" class="btn-ghost brown-button">
                    Связь с консультантом
                </a>
            </div>

                    <div class="header-door-block">
                        <img class="header-door" src="images/door-header-1.png" alt=" ">
                        <img class="header-door i-1" src="images/door-header-2.png" alt=" ">
                        <img class="header-door i-2" src="images/door-header-3.png" alt=" ">
                    </div>

            <div class="sub-header">
                <div class="sub-header-block">
                    <p>
                        изготовление
                    </p>
                    <span>
                        Заводское
                    </span>
                </div>
                <div class="sub-header-block">
                    <p>
                        гарантия на двери
                    </p>
                    <span>
                        2 года
                    </span>
                </div>
                <div class="sub-header-block">
                    <p>
                        на обмен и возврат
                    </p>
                    <span>
                        30 дней
                    </span>
                </div>
            </div>
        </div>
        <div class="down">
            Вниз
        </div>
    </header>

    <!--===================================================== section range -->
    <section class="section-range" id="range">
        <div class="container">

            <h2>
                В нашем ассортименте Вы найдете свою
                идеальную дверь
            </h2>

            <div class="title-line"></div>

            <div class="sub_h2">
                Выберите нужные параметры, чтобы мы предложили Вам идеальный вариант
            </div>

            <div class="range-basic-block">
                <div class="range-block-row">
                    <h4>
                        Воспользуйтесь фильтром
                    </h4>
                    <label>
                        <input type="text" name="research" placeholder="Поиск дверей">
                        <button>
                            Найти
                        </button>
                    </label>
                </div>

                <div class="range-block-row">
                    <div class="range-block-col">
                        <p class="title-range">
                            Ценовой диапазон
                        </p>
                        <form action="" method= "POST">
                            <div class="slider">
                                <a class="ui-slider-handle" href="#"></a>
                                <ul class="value-text">
                                    <li class="a-1">
                                        10 000
                                    </li>
                                    <li class="a-1">
                                        11 000
                                    </li>
                                    <li class="a-1">
                                        12 000
                                    </li>
                                    <li class="a-1">
                                        13 000
                                    </li>
                                    <li class="a-1">
                                        14 000
                                    </li>
                                    <li class="a-1">
                                        15 000
                                    </li>
                                </ul>

                                <input id="znch" name="znch" type="hidden" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--===================================================== section form-x -->
    <section class="section-form form-x" id="form-x">
        <div class="container align-center">

            <h2>

            </h2>

            <p>

            </p>

            <form method="post" class="send-form" autocomplete="off">
                <div class="row">
                    <div class="col-1-3">
                        <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">
                    </div>

                    <div class="col-1-3">
                        <input type="tel" name="client_phone" class="client-phone" placeholder="Ваш телефон">
                    </div>

                    <div class="col-1-3">
                        <input type="email" name="client_mail" class="client-mail" placeholder="Ваш e-mail">
                    </div>
                </div>

                <input type="hidden" name="send_type" class="send-type" value="2">
                <input type="hidden" name="send_extra" class="send-extra" value="1">
				<input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
				<?php //Поле выше для защиты формы от спам-ботов ?>

                <div class="btn-holder">
                    <button type="submit" class="btn">Позвоните мне</button>
                    <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                </div>

                <!-- Agreement -->
                <div class="form-agree align-left">
                    <label class="checkbox-label form-agree-check checked">
                        <input type="checkbox" checked>
                        Нажимая кнопку "ПОЗВОНИТЕ МНЕ", я&nbsp;даю своё согласие на&nbsp;обработку
                        моих персональных данных в&nbsp;соответствии с&nbsp;Федеральным законом
                        от&nbsp;27.07.2006&nbsp;года №152&#8209;ФЗ "О&nbsp;персональных данных",
                        на&nbsp;условиях и&nbsp;для&nbsp;целей, определённых
                        в&nbsp;Согласии на&nbsp;обработку персональных данных.
                    </label>
                </div>
            </form>

        </div>
    </section>

    <!--===================================================== section map -->
    <div class="section-map">
        <div class="map-holder" id="map"></div>
    </div>


    <!--===================================================== Footer -->
    <footer class="layout-footer">
        <div class="container">
            <div class="row">

                <!-- company info block -->
                <div class="col-1-2">
                    <div class="company-info-block">
                        <address>
                            <dl>
                                <dt>Адрес:</dt>
                                <dd></dd>
                            </dl>
                        </address>

                        <dl>
                            <dt>ИНН:</dt>
                            <dd></dd>
                        </dl>

                        <dl>
                            <dt>ОГРН:</dt>
                            <dd></dd>
                        </dl>

                        <p>
                            <a href="mailto:info@domen.ru">info@domen.ru</a>
                        </p>
                    </div>
                </div>

                <!-- Phone block -->
                <div class="col-1-2 align-right">
                    <div class="si-phone">
                        <div class="si-phone-text">Звонок бесплатный</div>
                        <a href="tel:+78009001111" class="phone-link dark">8 (800) 900-11-11</a>
                        <a href="#" class="open-phone-modal" data-extra="2">Заказать консультацию</a>
                    </div>
                </div>
            </div>

            <div class="copyright-holder row">
                <div class="col-1-2">
                    <a href="#" class="dark open-text-modal" data-id="1">
                        Согласие на обработку персональных данных
                    </a>
                </div>

                <!-- copyright block -->
                <div class="col-1-2 align-right">
                    <a href="http://hello-brand.ru/" class="dark" target="_blank" rel="nofollow noopener">
                        Разработано в "Hello, brand!"
                    </a>
                </div>
            </div>
        </div>
    </footer>


    <!--===================================================== Modals -->
    <!-- Overlay(s) -->
    <div class="si-overlay"></div>
    <div class="si-overlay-2"></div>

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
	
        <!--============================================== phone modal -->
        <div class="si-modal phone-modal">
            <a href="#" class="si-close"></a>

            <div class="modal-container align-center">

                <div class="modal-form-title">
                    Закажите консультацию
                </div>

                <div class="modal-time">
                    Ответ в течение 15 минут
                </div>

                <form method="post" class="send-form" autocomplete="off">
                    <div class="row">
                        <div class="col-1-2">
                            <input type="text" name="client_name" class="client-name" placeholder="Ваше имя">
                        </div>

                        <div class="col-1-2">
                            <input type="tel" name="client_phone" class="client-phone" placeholder="Ваш телефон">
                        </div>
                    </div>

                    <textarea name="client_message" class="client-message" placeholder="Ваш вопрос"></textarea>

                    <input type="hidden" name="send_type" class="send-type" value="1">
                    <input type="hidden" name="send_extra" class="send-extra" value="1">
					<input type="hidden" name="key" value="<?php echo $_SESSION['sf_key'] ?>">
					<?php //Поле выше для защиты формы от спам-ботов ?>

                    <div class="btn-holder">
                        <button type="submit" class="btn">Позвоните мне</button>
                        <!--<div class="g-recaptcha" id="g-recaptcha"></div>-->
                    </div>

                    <!-- Agreement -->
                    <div class="form-agree align-left">
                        <label class="checkbox-label form-agree-check checked">
                            <input type="checkbox" checked>
                            Нажимая кнопку "ПОЗВОНИТЕ МНЕ", я&nbsp;даю своё согласие на&nbsp;обработку
                            моих персональных данных в&nbsp;соответствии с&nbsp;Федеральным законом
                            от&nbsp;27.07.2006&nbsp;года №152&#8209;ФЗ "О&nbsp;персональных данных",
                            на&nbsp;условиях и&nbsp;для&nbsp;целей, определённых
                            в&nbsp;Согласии на&nbsp;обработку персональных данных.
                        </label>
                    </div>
                </form>

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
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

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