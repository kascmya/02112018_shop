<?php 
include($_SERVER['DOCUMENT_ROOT'] .'/moduls/connect.php' );
include($_SERVER['DOCUMENT_ROOT'] .'/moduls/functions.php' );

$find_cat = (empty($_GET)) ? 1 : $_GET['cat'] ;


$page_data = [];

$query = "SELECT * FROM `categories` WHERE `parent_id` = 0";
$cats = mysqli_query($db, $query);

while($parent = mysqli_fetch_assoc($cats)) {
    $page_data['parent_cats'][] = $parent;
};


?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/dest/catalog.css">
    <title>Описание товара</title>
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
    <main>
        <div class="descrgood">
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