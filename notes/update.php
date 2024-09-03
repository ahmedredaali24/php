<?php
include "../conect.php";


$noteid = filtterrequst("note_id");
$note_name = filtterrequst("note_name");
$note_content = filtterrequst("note_content");
$note_images = filtterrequst("note_images");

if (isset($_FILES['note_image'])) {
    deletefiles("../upload", $note_image);
    $note_images = uploadfiles("note_image");
}

$stmt = $con->prepare("UPDATE `notes` SET `note_name`=?,`note_content`=?,`note_image`=? WHERE `note_id`=?");
$stmt->execute(array($note_name, $note_content, $note_images, $noteid));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "Sucsses"));
} else {
    echo json_encode(array("status" => "fails"));
}
