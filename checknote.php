<?php

require 'includes/config.php';

$title=$_POST['title1'];
$description=$_POST['description1'];

$sql="INSERT INTO notepad(title,description)VALUES(:title,:description)";

$query=$conn->prepare($sql);

$query->execute([':title'=>$title,':description'=>$description]);



?>
