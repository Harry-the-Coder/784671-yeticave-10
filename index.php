<?php
require_once('helpers.php');
require_once('model.php');

date_default_timezone_set('Europe/Moscow');

$is_auth = rand(0, 1);

$user_name = 'Denis';

$title_main = 'Главная';

if ($con == false) {
    echo ("ошибка подключения: " . mysqli_connect_error());
} else {
$page_content = include_template('main.php', ['lots' => $lots, 'categories' => $categories]);
$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'categories' => $categories,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'title_main' => $title_main
]);
print ($layout_content);
}

?>
