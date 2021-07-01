<?php
session_start();
include("includes/config.php");
$_SESSION['talmicloud']=="";
session_unset();
session_destroy();

header('location:index.php');

?>

