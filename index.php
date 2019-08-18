<?php
require_once('helpers.php');
require_once('model.php');

date_default_timezone_set('Europe/Moscow');

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

function get_time($exp_date) {
  $current_time = time();
  $expiration_time = strtotime($exp_date);
  $remaining_hours = floor(($expiration_time - $current_time) / 3600);
  $remaining_minutes = floor(($expiration_time - $current_time) / 60 - $remaining_hours * 60);
  $remaining_time = ['hours' => $remaining_hours, 'minutes' => $remaining_minutes];
  return $remaining_time;
}

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
