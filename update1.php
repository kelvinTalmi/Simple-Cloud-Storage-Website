<?php

require 'includes/config.php';

$title=$_POST['title'];
$link=$_POST['link'];
$id=$_POST['id'];


$sql="UPDATE links set title=:title,link=:link WHERE id=:id";

$query=$conn->prepare($sql);

$query->execute([':title'=>$title,':link'=>$link,':id'=>$id]);






?>

