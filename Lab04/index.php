<?php

require_once "autoload.php";

use Controllers\UserController;
use Classes\Circle;
use Classes\Student;
use Classes\Programmer;
use test\FileContext;

$controller = new UserController();

$controller->Index();

$circle = new Circle(1, 2, 3);

echo "<div> $circle </div>";

$circle->SetRadius(4)->SetX(2)->SetY(1);

echo "<div> $circle </div>";

$other = new Circle(2, 1, 4);

echo "Result 1: " . ($circle->isIntersecting($other)? "intersects" : "not intersecting");

FileContext::Write("test.txt", "Hello!");
echo FileContext::Read("test.txt");

FileContext::Clear("test.txt");


$student = new Student("Dmytro", "Kalinovskyi", new DateTime(), 180, 63, 2, "ZSTU", "FICT", "IPZ-22-3");
$programmer = new Programmer("Dmytro", "Kalinovskyi", new DateTime(), 180, 63, ["c++", "c#", "php", "js", "css/scss"], 10);

echo "<div>";
$student->birthChild();
echo "</div>";
echo "<div>";
$programmer->birthChild();
echo "</div>";


echo "<div>";
$student->clearRoom();
echo "</div>";
echo "<div>";
$student->clearKitchen();
echo "</div>";

echo "<div>";
$programmer->clearRoom();
echo "</div>";
echo "<div>";
$programmer->clearKitchen();
echo "</div>";
