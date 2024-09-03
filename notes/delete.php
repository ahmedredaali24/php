<?php
include "../conect.php";


$noteid = filtterrequst("note_id");
$note_image=filtterrequst("note_image");


$stmt = $con->prepare("DELETE FROM `notes` WHERE `note_id`= ?");
$stmt->execute(array($noteid));

$count = $stmt->rowCount();

if ($count > 0) {
    deletefiles("../upload",$note_image);
    echo json_encode(array("status" => "Sucsses"));
} else {
    echo json_encode(array("status" => "fails"));
}
