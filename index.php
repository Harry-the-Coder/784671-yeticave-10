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
  $current_date = date_create(date('Y-m-d H:i:s'));
  $expiration_date = date_create($exp_date);

  $interval = date_diff($expiration_date, $current_date);
  $remaining_time['hours'] = $interval->d * 24 + $interval->h;
  $remaining_time['minutes'] = str_pad($interval->i, 2, "0", STR_PAD_LEFT);

  echo $remaining_time['hours'] . ':'. $remaining_time['minutes'];
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
