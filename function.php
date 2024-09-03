<?php
define("mb", 1048576);
function filtterrequst($request)
{
  return  htmlspecialchars(strip_tags($_POST[$request]));
}

function uploadfiles($requesfile)
{
  global $error;
  $imagename = rand(1000, 10000) . $_FILES[$requesfile]['name'];
  $size = $_FILES[$requesfile]['size'];
  $tmp_name = $_FILES[$requesfile]['tmp_name'];

  $allowext = array("jpg", "png", "pdf", "gif", "mp3");
  $strtoarry = explode(".", $imagename);
  $ext = end($strtoarry);
  $ext = strtolower($ext);
  if (!empty($imagename) && !in_array($ext, $allowext)) {
    $error[] = "ext error";
  } elseif ($size > 3 * mb) {
    $error[] = "size error";
  } elseif (empty($error)) {
    move_uploaded_file($tmp_name, "../upload/" . $imagename);
    return $imagename;
  } else {
    return "fail";
  }
}
function deletefiles($dir, $imagename)
{
  if (file_exists($dir . "/" . $imagename)) {
    unlink($dir . "/" . $imagename);
  }
}
// function uploadfiles($requestfile){

//   global $error;
//   $imagename=$_FILES[$requestfile]['name'];
//   $tmbname=$_FILES[$requestfile]['tmp_name'];
//   $size=$_FILES[$requestfile]['size'];
//   $allowext=array("jpg","pdf","png","gif","mb3","mp4");
//   $srrtoarry=explode(".",$imagename);

//   $ext=end($srrtoarry);
//   $ext=strtolower($ext);

//   if(!empty($imagename && !in_array($ext,$allowext))){
//     echo $error[]="ext error";
//   }elseif($size>3*mb){
//     echo $error[]="size";
//   }elseif(empty($error)){
//      move_uploaded_file($tmbname,"upload/".$imagename);
//   }else{
//     echo "<pre>";
//     print_r($error);
//     echo "</pre>";
//   }
  
// }