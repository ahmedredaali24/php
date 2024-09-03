<?php
include "../conect.php";


$note_name = filtterrequst("note_name");
$note_content = filtterrequst("note_content");
$note_users = filtterrequst("note_users");
$note_image = uploadfiles("note_image");

if ($note_image != "fila") {
    $stmt = $con->prepare("INSERT INTO `notes` (`note_name`,`note_content`,`note_users`,`note_image`) VALUES (?,?,?,?)");
    $stmt->execute(array($note_name, $note_content, $note_users,$note_image));

    $count = $stmt->rowCount();

    if ($count > 0) {
        echo json_encode(array("status" => "Sucsses"));
    } else {
        echo json_encode(array("status" => "fails"));
    }
} else {
    echo json_encode(array("status" => "fails"));
}
