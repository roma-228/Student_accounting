<?php
session_start();
$connect = mysqli_connect('localhost', 'student', '00375237', 'accounting_students');
if ($connect) {
    $connect->query('SET NAMES "utf8"');
} else {
    die('Error connect to DataBase');
}
