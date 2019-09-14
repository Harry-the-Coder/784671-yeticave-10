<?php
$categories2 = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$products = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 10999,
        'url' => 'img/lot-1.jpg',
        'expiration_date' => '2019-09-15 12:20:50'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 159999,
        'url' => 'img/lot-2.jpg',
        'expiration_date' => '2019-08-30 16:30:00'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => 8000,
        'url' => 'img/lot-3.jpg',
        'expiration_date' => '2019-12-10 14:30:00'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => 10999,
        'url' => 'img/lot-4.jpg',
        'expiration_date' => '2019-12-01 16:38:00'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => 7500,
        'url' => 'img/lot-5.jpg',
        'expiration_date' => '2019-10-02 10:25:00'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'url' => 'img/lot-6.jpg',
        'expiration_date' => '2019-08-20 21:30:00'
    ],
];

function edit_price($price) {
    $price_content = '<b class="rub">р</b>';
    $price = ceil($price);
    if ($price >= 1000) {
      $price = number_format($price, null, null, ' ');
    }
    return $price . ' ' . $price_content;
}

function get_time($exp_date) {
  $current_date = date_create(date('Y-m-d H:i:s'));
  $expiration_date = date_create($exp_date);

  $interval = date_diff($expiration_date, $current_date);
  $remaining_time['hours'] = $interval->d * 24 + $interval->h;
  $remaining_time['minutes'] = str_pad($interval->i, 2, "0", STR_PAD_LEFT);

  return $remaining_time['hours'] . ':'. $remaining_time['minutes'];
}

function isRemaining ($exp_date) {
  $expiration_date = strtotime($exp_date);
  $now = strtotime('now');
  return ($expiration_date - $now) / 3600 <= 1;
}

$con = mysqli_connect("localhost", "root", "", "yeti");

mysqli_set_charset($con, "utf8");

function isResult ($query_func, $con) {
   if ($query_func == false) {
     $error = mysqli_error($con);
     echo("Ошибка MySQL " . $error);
   } else {
       $array = mysqli_fetch_all($query_func, MYSQLI_ASSOC);
   }
   return $array;
}

function getPostVal ($name) {
    return $_POST[$name] ?? "";
}

$select_lots = "SELECT * FROM lots WHERE finishing_date > NOW()";

$lots = isResult(mysqli_query($con, $select_lots), $con);

$select_categories = "SELECT * FROM categories";

$categories = isResult(mysqli_query($con, $select_categories), $con);

?>
