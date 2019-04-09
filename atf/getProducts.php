<?php 

require($_SERVER['DOCUMENT_ROOT'].'/moduls/connect.php');

$catalogData = [
    'items' => [],
    'pagination' => [
        'countPages' => 5,
        'currentPage' => $_GET['page'],
    ],   

];
$productsOnPage = 10;
// 1 получить кол-во товара из БД
// 2 подеть на количество товаров на одной странице

$request_cat = ($_GET['category'] !=0) ? "WHERE `category` = '{$_GET['category']}'" : '' ;

$lastProductNumber = $_GET['page'] * $productsOnPage;
$firstProductNumber = ($_GET['page']- 1 ) * $productsOnPage + 1;

$query = "SELECT * FROM `goods` {$request_cat} LIMIT {$firstProductNumber}, {$lastProductNumber}";
// $query = "SELECT * FROM `goods` {$request_cat}";
$products = mysqli_query($db, $query);
$productsCount = mysqli_num_rows($products);
$pagesCount = ceil($productsCount / $productsOnPage);
$catalogData['pagination']['countPages'] = $pagesCount;


while ($result = mysqli_fetch_assoc($products)) {
    array_push($catalogData['items'], $result);
}

//print_r($all_products);

echo json_encode($catalogData);

?>