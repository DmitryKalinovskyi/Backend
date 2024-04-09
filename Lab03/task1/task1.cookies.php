<?php
session_start();

const FONT_SIZE_COOKIE = "font_size_cookie";
const MINIMUM_FONT_SIZE = 10;
const DEFAULT_FONT_SIZE = 14;
const MAXIMUM_FONT_SIZE = 20;

if (isset($_COOKIE[FONT_SIZE_COOKIE]) === false) {
    setcookie(FONT_SIZE_COOKIE, DEFAULT_FONT_SIZE, time() +  (84000 * 30), "/");
}

if($_SERVER["REQUEST_METHOD"] === "POST" and isset($_POST['fs'])){
    setcookie(FONT_SIZE_COOKIE, $_POST['fs'], time() +  (84000 * 30), "/");
}
