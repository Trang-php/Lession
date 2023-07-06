<?php
require_once 'pdo.php';
require_once 'helper.php';

$request = $_POST;

$product = [
    'name' => $request['name'],
    'id_category' => $request['id_category'],
];

create($product);
redirectHome();
?>