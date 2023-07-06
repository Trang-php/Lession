<?php

function redirect($url) {
    header("Location: $url");
    exit;
}

function redirectHome() {
    redirect('index.php');
}