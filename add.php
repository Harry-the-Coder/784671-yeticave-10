<?php
require_once('helpers.php');
require_once('model.php');

date_default_timezone_set('Europe/Moscow');

$is_auth = rand(0, 1);

$user_name = 'Denis';

$data_fields = $_POST;
$errors = [];

foreach ($data_fields as $key => $field) {
    if (empty($field)) {
        $errors[$key] = 'Поле не заполнено';
    }
    if($key == 'lot-rate' or $key == 'lot-step') {
        if(is_numeric($field) && $field <= 0) {
            $errors[$key] = 'Введите корректное число';
        }
    }
    if($key == 'lot-date' && !empty($field)) {
        $date = DateTime::createFromFormat('Y-mm-dd', $field);
        if($date) {
           $errors[$key] = 'Введите дату в указанном формате';
        }
    }
};

$page_content = include_template('add-content.php', ['current_lot' => $current_lot, 'current_cat' => $current_cat, 'categories' => $categories, 'errors' => $errors]);

$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'categories' => $categories,
    'current_cat' => $current_cat,
    'current_lot' => $current_lot,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'errors' => $errors
]);

print ($layout_content);

?>
