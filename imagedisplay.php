<?php

$id = addslashes($_REQUEST['id']);

$image = mysqli_query($dbconnect , "SELECT * from `img` where `id`=".$id."");
$image = mysqli_fetch_assoc($image);
$image = $image['img']

header("Content-type: image/jpeg");

echo $image;
?>