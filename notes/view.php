<?php
include "../conect.php";


$userid = filtterrequst("note_users");

$stmt = $con->prepare("SELECT * FROM `notes` WHERE `note_users`=? ");
$stmt->execute(array($userid));

$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count > 0) {
    echo json_encode(array("status" => "Sucsses", "data" => $data));
} else {
    echo json_encode(array("status" => "fails"));
}
