<?php
include 'vendor/connect.php';


$student = $_POST['stu'];
$fun = $_POST['fun'];
if($fun == 1){
$R1 = $connect->query("SELECT `groups` FROM `students` WHERE `id_Students`=$student");
while ($row = $R1->fetch_assoc()) {
	$t1 = $row["groups"];
}

$R2 =$connect->query("SELECT `id_ group` FROM `groups` WHERE `name` LIKE '%$t1%'");
while ($row = $R2->fetch_assoc()) {
	$t2 = $row["id_ group"];
}

$R3 =$connect->query("UPDATE `students` SET `id_ group`='$t2 ' WHERE `id_Students`=$student");
}
if($fun == 22){
	$connect->query("DELETE FROM `students` WHERE `id_Students`=$student");
}
?>