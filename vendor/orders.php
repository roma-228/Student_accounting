<?php
include 'connect.php';
$input1 = $_POST["input1"];
$input2 = $_POST["input2"];
$input3 = $_POST["input3"];
$student = $_POST["student"];

        $connect->query("INSERT INTO `orders`(`kurse`, `name`, `text`, `id_Students`) VALUES ('$input1','$input2','$input3','$student')");