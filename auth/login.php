<?php
include "../conect.php";


$email = filtterrequst("email");
$password = filtterrequst("password");

$stmt = $con->prepare("SELECT * FROM `users` WHERE `email`=? AND `password`=?");
$stmt->execute(array($email, $password));

$count = $stmt->rowCount();
$data=$stmt->fetch(PDO::FETCH_ASSOC);

if ($count > 0) {
    echo json_encode(array("status" => "Sucsses","data" =>$data));
} else {
    echo json_encode(array("status" => "fails"));
}
