<?php
require_once('helpers.php');
require_once('model.php');

date_default_timezone_set('Europe/Moscow');

$is_auth = rand(0, 1);

$user_name = 'Denis';

if (isset($_GET['lot'])) {
    $current_id = $_GET['lot'];
} else {
    http_response_code(404);
}

$select_lot = "SELECT * FROM lots WHERE id = $current_id";

$current_lot = isResult(mysqli_query($con, $select_lot), $con);

$current_lot = $current_lot[0];

$cat_id = $current_lot['category_id'];

$select_cat = "SELECT name FROM categories WHERE id = ?";
$stmt = db_get_prepare_stmt($con, $select_cat, [$cat_id]);
mysqli_stmt_execute($stmt);
$id = mysqli_insert_id($con);

$current_cat = isResult(mysqli_query($con, $select_cat), $con);

$current_cat = $current_cat[0];

$page_content = include_template('lot-content.php', ['current_lot' => $current_lot, 'current_cat' => $current_cat, 'categories' => $categories]);

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
