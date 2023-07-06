<?php

require_once 'pdo.php';
require_once 'helper.php';

if ($_POST['id'] > 0 && is_numeric($_POST['id'])) {
    delete(['id' => $_POST['id']]);
}

redirectHome();