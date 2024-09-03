<?php
include "../conect.php";


$username = filtterrequst("username");
$email = filtterrequst("email");
$password = filtterrequst("password");

$stmt = $con->prepare("INSERT INTO `users` (`username`,`email`,`password`) VALUES (?,?,?)");
$stmt->execute(array($username, $email, $password));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "Sucsses"));
} else {
    echo json_encode(array("status" => "fails"));
}
