<?php

$host='localhost';
$username='root';
$password='';
$database='talmicloud';
$charset = 'utf8mb4';
$options=[
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn="mysql:host=$host;dbname=$database;charset=$charset";



try{
$conn=new PDO($dsn,$username,$password,$options);

// echo "connected";

}catch(PDOException $e){
// 	die("Database connection failed: " . $e->getMessage());

}

?>