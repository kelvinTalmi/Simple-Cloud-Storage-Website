<?php

require 'includes/config.php';

$title=$_POST['title'];

$id=$_POST['id'];


$sql="UPDATE files set title=:title WHERE id=:id";

$query=$conn->prepare($sql);

$query->execute([':title'=>$title,':id'=>$id]);






?>

