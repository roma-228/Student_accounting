<?php
include 'vendor/connect.php';
$Students = $_POST["id_Subjects"];
$id_Subjectsnot= $_POST["id_Subjectsnot"];
$resu = $_POST["result"];

        $connect->query("UPDATE `students` SET `id_ group`=(SELECT `id_ group` FROM `groups` WHERE `name` like '%$resu%'),`groups`='$resu' WHERE `id_Students`=$Students");
        $connect->query("UPDATE `students` SET `id_ group`=12 WHERE `id_Students`=$id_Subjectsnot");

