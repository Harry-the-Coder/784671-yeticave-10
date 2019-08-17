<?php
require_once('helpers.php');
require_once('model.php');

$is_auth = rand(0, 1);

$user_name = 'Denis';

$title_main = 'Главная';

function edit_price($price) {
    $price_content = '<b class="rub">р</b>';
    $price = ceil($price);
    if ($price >= 1000) {
      $price = number_format($price, null, null, ' ');
    }
    return $price . ' ' . $price_content;
};

$page_content = include_template('main.php', ['products' => $products, 'categories' => $categories]);

$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'categories' => $categories,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'title_main' => $title_main
    ]);

print ($layout_content);

?>
