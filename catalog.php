<?php 
include($_SERVER['DOCUMENT_ROOT'] .'/moduls/connect.php' );
include($_SERVER['DOCUMENT_ROOT'] .'/moduls/functions.php' );

// $find_cat = '';
// if (empty($_GET)) {
//     $find_cat = 1;
// } else {
//     $find_cat = $_GET['cat'];
// }
$find_cat = (empty($_GET)) ? 1 : $_GET['cat'] ;


$page_data = [];

$query = "SELECT * FROM `categories` WHERE `parent_id` = 0";
$cats = mysqli_query($db, $query);

while($parent = mysqli_fetch_assoc($cats)) {
    $page_data['parent_cats'][] = $parent;
};

$query = "SELECT * FROM `categories` WHERE `parent_id` = {$find_cat}";
$cats = mysqli_query($db, $query);

while($parent = mysqli_fetch_assoc($cats)) {
    $page_data['cats'][] = $parent;
};
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/dest/catalog.css">
    <title>Каталог магазина</title>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="logo"></div>
            <nav class="navigation">
                <?php foreach($page_data['parent_cats'] as $key => $value):?>
                <a  href="catalog.php?cat=<?=$value['id']?>" class="navigation__link"><?=$value['name']?></a>
                <?php endforeach ?>
                <a class="navigation__link" href="#">Новинки</a>
                <a class="navigation__link" href="#">О нас</a>            
            </nav>
            <div class="login">
                <div class="login__pic"></div>  
                <div class="login__text">
                    Привет, Алексей! (<span class="inside-text inside-text_orange">выйти</span>)
                </div>
            </div>
            <div class="bascket">
                <div class="bascket__pic"></div>
                <div class="bascket__text">
                    Корзина(6)
                </div>
            </div>
        </header>
        <main class="main">
            <div class="main__card">
                <h1 class="main__cardhl">МУЖЧИНАМ</h1>
                <p class="main__cardtext">Все товары</p>
                <select class="filter" name="category" id="catSelect">
                    <option hidden>Категория</option>
                    <?php foreach($page_data['cats'] as $key => $value):?>
                    <option value="<?=$value['id']?>"><?=$value['name']?></option>
                    <?php endforeach ?>
                </select>
                <select name="size">
                    <option>Размер</option>
                    <option name="l">L</option>
                    <option name="m">M</option>
                    <option name="s">S</option>
                </select>
                <select name="cost">
                    <option>Стоимость</option>
                    <option name="1000">0 - 1000 руб.</option>
                    <option name="3000">1000 - 3000 руб.</option>
                    <option name="6000">3000 - 6000 руб.</option>
                    <option name="20000">6000 - 20000 руб.</option>
                </select>
            </div>
            <div class="card">     
            </div>
            <div class="fullInfo">
                <div class="fullInfo__good"></div>
                <h3 class="fullInfo__name"></h3>
                <p>Артикул</p>
                <p>Цена</p>
                <p>Описание товара</p>
                <p>Размер</p>
                <button>Добавить в корзину</button>
            </div>
            <div class="numbpages">
            </div>
        </main>        
        <footer class="footer">
            <div class="collection">
                <h3 class="footer__hl">КОЛЛЕКЦИИ</h3>
                <a class="footer__link" href="#women">Женщинам(1725)</a><br>
                <a class="footer__link" href="#men">Мужчинам(635)</a><br>
                <a class="footer__link" href="#kids">Детям(2514)</a><br>
                <a class="footer__link" href="#new">Новинки(76)</a><br>
            </div>
            <div class="shop">
                <h3 class="footer__hl">МАГАЗИН</h3>
                <a class="footer__link" href="#aboutUs">О нас</a><br>
                <a class="footer__link" href="#deliver">Доставка</a><br>
                <a class="footer__link" href="#collab">Работа с нами</a><br>
                <a class="footer__link" href="#contacts">Контакты</a><br>
            </div>
            <div class="contacts">
                <h3 class="footer__hl">МЫ В СОЦИАЛЬНЫХ СЕТЯХ</h3>
                <p>Сайт разработан в inordic.ru</p>
                <p>2018 &#169; Все права защищены</p>         
            </div>
        </footer>
    </div>     
</body>
<script src="catalog.js"></script>
</html>