<?php

$file1="image.png";

$strtoarray=explode(".",$file1);
$name=end($strtoarray);
$arry1=array("png","jpg","web");

if(in_array($name,$arry1)){
    echo"yes";
}else{
    echo"no";
}

$file = $_FILES['file'];
echo "pre";
print_r($file);
echo "/pre";