<?php
require_once('helpers.php');
require_once('model.php');

date_default_timezone_set('Europe/Moscow');

$is_auth = rand(0, 1);

$user_name = 'Denis';

$data_fields = $_POST;
$errors = [];

foreach ($data_fields as $field) {
    if (empty($field)) {
        $errors[$key] = 'поле не заполнено';
    }
};

print_r($errors);

$page_content = include_template('add-content.php', ['current_lot' => $current_lot, 'current_cat' => $current_cat, 'categories' => $categories]);

$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'categories' => $categories,
    'current_cat' => $current_cat,
    'current_lot' => $current_lot,
    'user_name' => $user_name,
    'is_auth' => $is_auth
]);

print ($layout_content);

?>
